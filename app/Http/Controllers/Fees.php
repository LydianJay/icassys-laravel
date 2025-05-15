<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\FeeType;
class Fees extends Controller
{



    public function fee_type() {

        $data['fee_type'] = FeeType::all();


        return view('pages.fees.fee_type', $data);
    }


    public function fee_type_create(Request $request) {

        $validator = Validator::make($request->all(), [
            'fee_type_name'     => 'required|max:32',
            'fees_code'         => 'required|max:16',
            'ammount'           => 'required',
        ]);

        if ($validator->fails()) {
            // Handle failed validation
            dd($validator->errors());
            return back()->with('status',['alert' => 'alert-info', 'msg' => $validator->errors()] );
           
        }

        $validated = $validator->validated();


        FeeType::create([
            'fee_type_name'     => $validated['fee_type_name'],
            'fees_code'         => $validated['fees_code'],
            'ammount'           => $validated['ammount'],
        ]);
        

        return back()->with('status',['alert' => 'alert-info', 'msg' => 'Fee Type Created!'] );
    }
}
