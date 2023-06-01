<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

use Mail;
use App\Mail\EmailVerification;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Models\PasswordReset;
use Carbon\Carbon;

class UserController extends Controller
{
    function login(Request $req) {
        $loginType = $req->input('loginType');
        $loginType = $loginType == 'phone' ? 'number' : $loginType; 
        $loginValue = $req->input($loginType);

        $user = User::where($loginType, $loginValue)->first(); 
        if (!$user || !Hash::check($req->password, $user->password)) {
            if ($loginType == 'email') {
                $errors = ['Email or password is incorrect.'];
            } else {
                $errors = ['Number or password is incorrect.'];
            }
            return view('login', ['errors' => $errors]);
        } else {
            $req->session()->put('user', $user);
            return redirect('/');
        }
    }

    public function registerFromOrder(Request $request){
        if (session()->has('user')) {
            return redirect('/ordernow');
        }

        $validator = Validator::make($request->all(), [
            'number' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            $errors = ["Please provide your phone number"];
            return view('register_from_order',['errors' => $errors]);
        }

        if($user = User::where('email', $request->input('email'))->first()){
            $user->password = null;
            return redirect('/register')->with('user', $user);
        }

        if($user = User::where('number', $request->input('number'))->first()){
            $user->password = null;
            return redirect('/register')->with('user', $user);
        }

        $request->session()->put('email', $request->input('email'));
        $request->session()->put('number', $request->input('number'));
        return redirect('/register')->with('email', $request->session()->get('email'));
    }

    public function register(Request $request)
    {
        if (session()->has('user')) {
            return redirect('/ordernow');
        }

        if(! $user = User::where('email', $request->email)->first()){
            $user = User::where('number', $request->number)->first();
        }

        if ($user) {
            $request->validate([
                'name' => 'required',
                'number' => 'required',
                'password' => 'required|min:6',
            ]);

            if (Hash::check($request->password, $user->password)) {
                $user->name = $request->name;
                $user->number = $request->number;
                $user->save();

                $request->session()->put('user', $user);
                return redirect('/ordernow');
            } else {
                return redirect()->back()->with([
                    'error' => 'Password is incorrect.', 
                ]);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'number' => 'required',
                'password' => 'required|min:6',
                'confirm_password' => 'required|min:6|same:password',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $user = new User;
            $user->name = $request->name;
            $user->number = $request->number;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $request->session()->put('user', $user);
            return redirect('/ordernow');
        }
    }

    public function showLinkRequestForm()
    {
        return view('emails.auth.email_verification');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // $request->required([
        //     'email' => 'required|email'
        // ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return redirect()->back()->with('error', 'Email not found in our database');
        } else {
            $reset_code = Str::random(200);
            PasswordReset::create([
                'user_id' => $user->id,
                'reset_code' => $reset_code
            ]);

            try {
                Mail::to($user->email)->send(new ForgotPasswordMail($user->name, $reset_code));
                return redirect()->back()->with('Success', 'We have sent you a password reset link. Please check your email.');
            } catch (\Exception $e) {
                return redirect('password/reset')->with('error', 'Failed to send email. Please try again & check that your mail is correct.');
            }

        }

    }

    public function showResetForm($reset_code){
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();

        if(!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at){
            return redirect('password/reset')->with('error','Invalid password reset link or link expired.');
        }else{
            return view('emails.auth.reset_password',compact('reset_code'));
        }
    }

    public function reset($reset_code,Request $request){
        $password_reset_data = PasswordReset::where('reset_code',$reset_code)->first();

        if(!$password_reset_data || Carbon::now()->subMinutes(10) > $password_reset_data->created_at){
            return redirect('password/reset')->with('error','Invalid password reset link or link expired.');
        }else{
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6|max:100',
                'confirm_password' => 'required|same:password'
            ]);

            $user = User::find($password_reset_data->user_id);

            if($user->email != $request->email){
                return redirect()->back()->with('error','Enter correct email.');
            }else{
                $password_reset_data->delete();
                $user->update([
                    'password' => bcrypt($request->password)
                ]);

                return redirect('login')->with('success', 'Password was successfully changed');
            }
        }
    }
}