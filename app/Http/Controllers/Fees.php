<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\FeeType;
use App\Models\FeeGroup;
use App\Models\ClassMaster;
use function Laravel\Prompts\search;

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
}
