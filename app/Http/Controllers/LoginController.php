<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getlogin()

    {
        return view('admin.login.dangnhap');
    }
    public function postlogin(Request $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
          return redirect('/admin/Post/list');
        }
        else
        {
          return redirect('/admin/Post/list');
        }
    }
        public function getlogout()

    {
        Auth::logout();

        return redirect('/login');
    }
}
?>
