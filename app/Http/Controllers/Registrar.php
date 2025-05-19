<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class Registrar extends Controller
{
    public function registrar(Request $request) {
        $search = $request->input('search');
        // dd(bcrypt('@default_123'));
        $data = [];
        if($search != null && $search != '') {
            $data['users'] = User::join('student', 'student.user_id','=','id')
            ->join('guardian', 'guardian.guardian_id', '=', 'student.guardian_id')
            ->where('fname', 'LIKE', '%' . $search . '%')
            ->orWhere('lname', 'LIKE', '%' . $search . '%')
            ->limit(12)
            ->get();
        }
        else {
            $data['users'] = User::join('student', 'student.user_id','=','id')
            ->join('guardian', 'guardian.guardian_id', '=', 'student.guardian_id')
            ->limit(12)
            ->get();    
        }


        

        return view('pages.registrar.registrar', $data);
    }


}
