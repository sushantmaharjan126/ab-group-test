<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Mails\ActivationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Str;

class RegisterController extends Controller
{
    public function index()
    {
        $registers = Register::paginate(10);

        return view('list.registers', compact('registers'));
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'full_name' => 'required|max:50',
            'email' => 'required|email|max:50',
            'username' => 'required|unique:registers|max:50|min:8',
            'password' => 'required|min:8|confirmed|max:50',
            'age' => 'required',
            'gender' => 'required',
            'profile_image' => 'image|mimes:jpeg,jpg,png,gif|required|max:2048'
        ]);

        $register = new Register;

        $register->full_name = request('full_name');
        $register->email = request('email');
        $register->username = request('username');
        $register->age = request('age');
        $register->gender = request('gender');
        // $register->status = request('status');
        $register->password = Hash::make(request('password'));
        $register->activation_code = Str::random(60);

        $file = $request->file('profile_image');
        if ($file != null) {

            $uploadDocument = 'profile-image-'.time(). '.' .$file->getClientOriginalExtension();
            $destinationPath = 'uploads/registers';
            $file->move($destinationPath, $uploadDocument);
            $register->profile_image = $uploadDocument;

        }

        $success = $register->save();

        Mail::to(request('email'))->send(new ActivationEmail($register));

        if($success){
            return redirect()->route('home')->with('success_message', 'Register saved successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Failed to save.');
        }
    }

    public function destory($id)
    {
        $register = Register::find($id);

        if($register){
            @unlink('uploads/registers/'.$register->profile_image);

            $register->delete();

            return redirect()->back()->with('succuss_message', 'Delete successfully.');
        } else {
            return redirect()->back()->with('error_message', 'Delete Failed.');
        }

    }

    public function activate($code)
    {
        $register = Register::where('activation_code', $code)->first();


        if($register) {
            $data = ([
                'status' => 1,
            ]);

            $success = $register->update($data);

            if($success){
                return redirect()->route('home')->with('success_message', 'Activation successfully.');
            } else {
                return redirect()->back()->with('error_message', 'Failed to active.');
            }

        } else {
            return redirect()->route('home')->with('error_message', 'User Not found.');
        }
    }
}
