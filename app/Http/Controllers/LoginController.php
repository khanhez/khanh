<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getlogin()
    {
    	return view('admin.login.metro');
    }
    public function postlogin(Request $request)

    
    {
    	$this->validate($request,
    		[
                'email' => 'required',
                'password'=>'required'
            ],
            [
               'email.required'=>'Ban chua nhap email',
               'password.required'=>'Ban chua nhap mat khau'
           ]);

    	$arr=['email'=>$request->email,'password'=>$request->password];
    	if (Auth::attempt($arr)) {
    		return redirect()->intended('/admin/Post/list');


    	}

    	else
    	{


        }

 }
 public function getlogout()
 {
     Auth::logout();
     return redirect('/login');
 }
}
?>
