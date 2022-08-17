<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function edit()
    {
        if (Auth::user()) {

            $user = User::find(Auth::user()->id);
            if ($user) {

                return view('profile')->withUser($user);

            }else{
                return redirect()->back();
            }
        }else{
                return redirect()->back();
        }

    }
    public function update(Request $request){
    	$this->validate($request,['old_password' => [
            'required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, auth()->user()->password)) {
                    $fail(__('Old Password didn\'t match'));
                }
            },
        ]]);
        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->password){

            $user->password = bcrypt($request->password);
        }
        $user->save();
        return redirect()->back()->with('status' , 'Ju edituat Profilin tuaj me sukses');
	}
}
