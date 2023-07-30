<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function index()
    {
      return view('admin.auth.signin');
    }
    public function signup()
    {
      return view('admin.auth.signup');
    }

    public function login(Request $request)
   {
       $request->validate([
            
            'email_username'=>'required',
            'password' =>'required',
       ]);
        
        $email_username=$request->input('email_username');
        $password=$request->input('password');
        $user = User:: where('email','=',$email_username)->orWhere('username', '=', $email_username)->first();
        if($user)
         {   
            if (Hash::check($password, $user->password)) 
            {
               $userarr=array(
               'user_id'=>$user->id,
               'name'=>$user->name,
               );
               // Session::put('userarr', $userarr);

               $request->session()->put($userarr);
               return redirect()->route('dashboard')->with('success','Welcome Back!!'.$user->name);
            }
            else
            {
               return redirect('admin/signin')->with('warning','Password Doesnot Matches!!');
            }
            
         }
         else{
            return redirect('admin/signin')->with('danger','No user details found with provided Email/Username');
            
         }
   }
   public function logout()
   {
      if(Session::has('user_id'))
        {
            session()->flush('user_id','name');
            return redirect('index');
        }
        else
        {
            return redirect('/');
        }
   }
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'username'=>'required|min:8|unique:users',
            'email'=>'required|unique:users',
            'password' =>'required|min:8',
            ]);
            $userData= new User();
            $userData->name = $request->input('name');
            $userData->username=$request->input('username');
            $userData->email=$request->input('email');
            $userData->password=Hash::make($request->input('password'));
            $userSave=$userData->save();
            if($userSave==true)
            {
                return redirect('admin/signin')->with('success','User Login Details has been added');
            }
            else
            {
                return redirect('admin/signin')->with('warning','There must be some error!!');
            }            
    }
}
