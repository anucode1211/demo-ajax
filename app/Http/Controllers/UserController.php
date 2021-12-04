<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function index()
	{
        return view('user');
	}

     public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'hobbies' => 'required'
            
        ]);
       
        // $user=new User();
        // $user->name=$request->get('name');
        // $user->email=$request->get('email');
        // $user->gender=$request->get('gender');
        // $user->qualification=$request->get('qualification');
        // $user->hobbies=$request->get('hobbies');
        // $user->save();

        if ($validator->passes()) {
            return response()->json(['success' => 'Added new records.']);
        }

        return response()->json(['error' => $validator->errors()->all()]);
    }
}
