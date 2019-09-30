<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/(.*)ves\.ac\.in$/',],
            'password' => ['required'],
            'phone' => ['required'],
            'address' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],
            'join_date' => ['required'],
            'department' => ['required'],
            'job_type' => ['required'],   
            'native' => ['required'],
            'image' => ['nullable','max:1999'],
        ]);
        $messages = array(
            'email.regex' => 'We appreciate your interest on using our System. However at the moment we offer this service only to this company!');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $request = request();   
        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file -> move('uploads/gallery/', $filename);
           
        }
        return User::create([
            'username' => $data['username'],
            'image'=> $filename,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'role' => 'employee',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => '2',
            'phone' => $data['phone'],
            'address' => $data['address'],
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'join_date' => $data['join_date'],
            'job_type' => $data['job_type'],
            'department' => $data['department'],
            'native' => $data['native'],
       
            'sl'=>'10',
            'cl'=> '8',
            'vac'=> '35',
            'early'=>'1',
            'od'=>'6',
        ]);
    }
}
