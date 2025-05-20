<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\FeeType;
use App\Models\FeeGroup;
use App\Models\ClassMaster;
use function Laravel\Prompts\search;
use App\Models\User;
use App\Models\StudentFees;
class Fees extends Controller
{



    public function fee_type(Request $request) {

        
        $fee_id = $request->get('id');
        $search = $request->get('search');

        if($search != null && $search != '') {
            $data['fee_type'] = FeeType::where('fee_type_name', 'LIKE', '%' . $search . '%')
            ->limit(15)
            ->get();
        }
        else {
            $data['fee_type'] = FeeType::all();
        }

        if($fee_id != null && $fee_id != '') {
            $data['edit'] = FeeType::where('fee_type_id', '=', $fee_id)->first();
        }

        return view('pages.fees.fee_type', $data);
    }

    public function fee_type_edit(Request $request ) {

        
        $validator = Validator::make($request->all(), [
            'fee_type_name'     => 'required|max:32',
            'fees_code'         => 'required|max:16',
            'ammount'           => 'required',
            'id'                => 'required',
        ]);
       

        if ($validator->fails()) {
            
            return back()->with('status',['alert' => 'alert-danger', 'msg' => $validator->errors()] );
        }
        $validated  = $validator->validated();
        $feeType    = FeeType::find($validated['id']);


        $feeType['fee_type_name'] = $validated['fee_type_name'];
        $feeType['fees_code'] = $validated['fees_code'];
        $feeType['ammount'] = $validated['ammount'];
        return back()->with('status',['alert' => 'alert-info', 'msg' => 'Fee Type Edited!'] );
    }


    public function fee_type_create(Request $request) {

        $validator = Validator::make($request->all(), [
            'fee_type_name'     => 'required|max:32',
            'fees_code'         => 'required|max:16',
            'ammount'           => 'required',
        ]);

        if ($validator->fails()) {
            
            return back()->with('status',['alert' => 'alert-danger', 'msg' => $validator->errors()] );
        }

        $validated = $validator->validated();


        FeeType::create([
            'fee_type_name'     => $validated['fee_type_name'],
            'fees_code'         => $validated['fees_code'],
            'ammount'           => $validated['ammount'],
        ]);
        

        return back()->with('status',['alert' => 'alert-info', 'msg' => 'Fee Type Created!'] );
    }

    public function fee_type_delete(Request $request) {
        $id = $request->input('id');

        FeeType::destroy($id);

        return back()->with('status',['alert' => 'alert-danger', 'msg' => 'Fee Type Deleted!'] );
    }

    public function fee_group(Request $request) {
        
        $class_master_id = $request->input('id');


        if($class_master_id != null && $class_master_id != '') {

            $data['fee_types'] = FeeType::leftJoin('fee_group', 'fee_type.fee_type_id', '=', 'fee_group.fee_type_id')
                                ->where(function($query) use ($class_master_id) {
                                    $query->whereNull('fee_group.class_master_id') // fee_type not assigned at all
                                        ->orWhere('fee_group.class_master_id', '!=', $class_master_id); // assigned elsewhere
                                })
                                ->select('fee_type.*') // to avoid duplicate columns
                                ->distinct()
                                ->get();
            $data['class_master_id'] = $class_master_id;

           
        }
        
                            
                            
        $data['fee_group'] = ClassMaster::with('feeGroups.feeType')->get();
        // dd($data['fee_group']);
        return view('pages.fees.fee_group', $data);
    }


    public function add_fee(Request $request) {
        $classID = $request->input('class_master_id');
        $fee = $request->input('fee_type');

        FeeGroup::create([
            'class_master_id'   => $classID,
            'fee_type_id'       => $fee,
        ]);


        return redirect()->route('fee_group')->with('status',['alert' => 'alert-info', 'msg' => 'Fee Added!'] );
    }


    public function remove_fee(Request $request) {
        $id = $request->input('id');

        FeeGroup::destroy($id);
        return redirect()->route('fee_group')->with('status',['alert' => 'alert-info', 'msg' => 'Fee Removed!'] );
    }


    public function fees_get(Request $request) {
        $search = $request->input('search');

        if($search != null && $search != '') {
            $data = FeeType::where('fee_type_name', 'LIKE', '%' . $search . '%')
            ->orWhere('fees_code', 'LIKE', '%' . $search . '%')
            ->limit(15)
            ->get();

            // $data['fees'] = FeeType::leftJoin('fee_group', 'fee_type.fee_type_id', '=', 'fee_group.fee_type_id')
            // ->leftJoin('student_fees', 'fee_type.fee_type_id', '=', 'student_fees.fee_type_id')
            // ->whereNull('student_fees.fee_type_id')
            // ->get();
        }
        else {
            $data = FeeType::all();
        }
        return response()->json($data);
    }

    public function add_fee_user(Request $request) {
        $student_id = $request->input('id');
        $fee        = $request->input('fee');
        $user_id    = $request->input('user_id');

        $active_ay = \App\Models\AcademicYear::select('academic_year_id')->where('is_active', '=', true)->first();
        
        $count = StudentFees::where('student_id', '=', $student_id)
        ->where('fee_type_id', '=', $fee)
        ->where('academic_year_id', '=', $active_ay->academic_year_id)->count();

        if($count > 0) {
            return back()->with('status',['alert' => 'alert-danger', 'msg' => 'Fee Already Assigned!'] );
        }

        StudentFees::create([
            'student_id'        => $student_id,
            'fee_type_id'       => $fee,
            'academic_year_id'  => $active_ay->academic_year_id,
            'amount'           => FeeType::where('fee_type_id', '=', $fee)->first()->ammount,
        ]);
        return redirect()->route('assessment', ['id' => $user_id])->with('status',['alert' => 'alert-info', 'msg' => 'Fee Added!'] );

    }

    public function remove_fee_user(Request $request) {
        $id = $request->input('id');

        StudentFees::destroy($id);
        return back()->with('status',['alert' => 'alert-info', 'msg' => 'Fee Removed!'] );
    }

    public function assessment(Request $request) {

       
        if($request->input('id') != null || $request->input('id') != '') {
            $data['student'] = User::select('*', 'users.address as u_address')->join('student', 'student.user_id','=','id')
            ->where('users.id', '=', $request->input('id'))
            ->first();

            $data['student_id']     = $data['student']->student_id;
            $data['user_id']        = $data['student']->id;

            

            $data['student_fees'] = StudentFees::leftJoin('fee_type', 'student_fees.fee_type_id', '=', 'fee_type.fee_type_id')
            ->where('student_fees.student_id', '=', $data['student_id'])    
            ->get();

            // dd($data['student_fees']);

            $data['total']          = $data['student_fees']->sum('amount');
            // $data['academic_year']  = \App\Models\AcademicYear::select('academic_year_id', 'academic_year_name')->where('is_active', '=', true)->first();
            
           


            // dd($data['student_fees']);
        }
        
       



    

        return view('pages.fees.assessment', $data);
    }


    public function collect_fees(Request $request) {
       
        
        return view('pages.fees.collect_fees');
    }


}
