<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guardian;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class Student extends Controller
{
    public function student() {
        
        $data['users'] = User::join('student', 'student.user_id','=','id')
        ->join('guardian', 'guardian.guardian_id', '=', 'student.guardian_id')
        ->limit(12)
        ->get();

        

        return view('pages.students.student', $data);
    }

    public function student_edit_view(Request $request) {


        $data['users'] = User::select('*', 'users.address as u_address')->join('student', 'student.user_id','=','id')
        ->join('guardian', 'guardian.guardian_id', '=', 'student.guardian_id')
        ->where('users.id', '=', $request->input('id'))
        ->first();

        // dd($data['users']);

        return view('pages.students.studentedit', $data);
    }

    public function student_create_view() {


        return view('pages.students.studentcreate');
    }


    public function student_delete(Request $request) {

        $data = $request->input('id');
        $user = User::join('student', 'student.user_id','=','id')
        ->join('guardian', 'guardian.guardian_id', '=', 'student.guardian_id')
        ->where('users.id', '=', $data)
        ->first();
        Guardian::destroy($user->guardian_id);
        User::destroy($data);

        return redirect()->route('student')->with('status',['alert' => 'alert-warning', 'msg' => 'Student deleted!'] );

    }

    public function student_create(Request $request) {

        $validated = $request->validate([
            // Student validation
            'admission_no' => 'required|string|unique:student,admission_no',
            'fname'        => 'required|string|max:100',
            'mname'        => 'nullable|string|max:100',
            'lname'        => 'required|string|max:100',
            'email'        => 'required|email|unique:users,email',
            'gender'       => 'required|in:male,female,other',
            'dob'          => 'required|date',
            'contactno'    => 'nullable|string|max:20',
            'address'      => 'nullable|string|max:255',
            'category'     => 'required|string',
            'lvl'          => 'required|numeric',
            'sem'          => 'required|string',
            'file'         => 'nullable|image|max:8192',
    
            // Guardian validation
            'guardian_name'     => 'required|string|max:150',
            'relation'          => 'required|string|max:100',
            'g_contactno'       => 'required|string|max:20',
            'occupation'        => 'nullable|string|max:100',
            'guardian_address'  => 'nullable|string|max:255',
        ]);
    
        // Handle student photo upload
        $photoPath = null;
        

        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $ext    = $file->getClientOriginalExtension();
            $photoPath = md5($validated['admission_no']) . '.' . $ext;
            $file->storeAs('uploads/student/photos', $photoPath, 'public');
        }
        
        // dd($photoPath);
        $fullName       = strtolower($request->input('fname') . $request->input('mname') . $request->input('lname'));
        $rawPassword    = substr(md5($fullName), 0, 10);
        $hashedPassword = Hash::make($rawPassword);
        // Create user (student)
        $user = User::create([
            'fname'         => $request->fname,
            'mname'         => $request->mname,
            'lname'         => $request->lname,
            'email'         => $request->email,
            'gender'        => $request->gender,
            'dob'           => $request->dob,
            'contactno'     => $request->contactno,
            'address'       => $request->address,
            'photo'         => $photoPath,
            'password'      => bcrypt($hashedPassword), 
        ]);
        
 
        
        $guardian = Guardian::create([
            'name' => $request->guardian_name,
            'relation'      => $request->relation,
            'g_contactno'     => $request->g_contactno,
            'occupation'    => $request->occupation,
            'address'       => $request->guardian_address,
        ]);

        \App\Models\student::create([
            'user_id'       => $user->id,
            'admission_no'  => $request->admission_no,
            'category'      => $request->category,
            'lvl'           => $request->lvl,
            'sem'           => $request->sem,
            'guardian_id'   => $guardian->guardian_id,
        ]);
        // Create student profile
        
    
        // Create guardian record
        


        return redirect()->back()->with( 'status',['alert' => 'alert-info', 'msg' => 'Student Created!']);

    }
}
