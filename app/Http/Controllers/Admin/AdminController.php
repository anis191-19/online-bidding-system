<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;


use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



   public function adminLoginForm(){
      return redirect('/');
   }

    public function adminLogin(Request $request){
        $request->validate([
           'email'=>'required',
           'password'=>'required',
        ]);
        echo $request->email;
        echo $request->password;
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
           return redirect('/admin/admin_dashboard');
        }else{
         
           return redirect()->back()->withErrors([
               'email' => 'Invalid Email or Password !!! please try again....',
               
           ]);
        }
}

 //   ///    mehtod for admin logout  ///////           ///

 public function adminLogout(){
   Auth::guard('admin')->logout();
   return redirect('/');
  }
  

//   display all the users
  public function displayUsers()
    {
        $users = User::all(); 
        return view('admin.users', compact('users')); 
    }

    // Remove a user by id
    public function removeUser($id)
    {
        $user = User::findOrFail($id); 
        $user->delete(); 
        return redirect()->route('admin.users')->with('success', 'User removed successfully');
    }
    

   

    
}
