<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function resetPassword() {
        return view('auth.passwords.reset');
    }

    public function reset(Request $request) {

        $check_old_password = $request->OldPassword;

        if(!Hash::check($check_old_password, Auth::user()->password)) {
            return redirect()->back()->with('OldPasswordFailed','密碼錯誤');
        }

        $new_password = $request->password;
        $check_new_password = $request->password_confirmation;

        if($new_password != $check_new_password) {
            return redirect()->back()->with('PasswordConfirmationFailed','新密碼錯誤');
        }

        $user = Auth::user();

        $user->password = Hash::make($new_password);

        $user->save();

        Auth::logout();

        return redirect('/login')->with('success','更新成功');

    }

    public function image_post(Request $request)
    {
        // A list of permitted file extensions
        $allowed = array('png', 'jpg', 'gif','zip','jpeg');
        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){

            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $allowed)){
                echo '{"status":"error"}';
                exit;
            }
            $name = strval(time().Str::random(20));
            $ext = explode('.', $_FILES['file']['name']);
            $filename = $name . '.' . $ext[1];
            $destination = public_path().'/upload/img/'. $filename; //change this directory
            $location = $_FILES["file"]["tmp_name"];
            move_uploaded_file($location, $destination);
            echo "/upload/img/".$filename;//change this URL
        }
        exit;
    }
}
