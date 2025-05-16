<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\FeeType;
use App\Models\FeeGroup;

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

    }

    public function fee_group(Request $request) {
        $data['fee_group'] = FeeGroup::all();
        $fee_id = $request->get('id');

        if($fee_id != null && $fee_id != '') {
            $data['edit'] = FeeGroup::where('fee_group_id', '=', $fee_id)->first();
        }

        return view('pages.fees.fee_type', $data);
    }
}
