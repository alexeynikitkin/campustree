<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Participation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_bio = $request->user_bio;
        $user->sex_id = $request->sex_id;
        $user->user_img = $request->user_img;
        $user->save();
        return redirect()->back()->withSuccess('User was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleteOrFail();
        return redirect()->back()->withSuccess('User was successfully deleted');
    }

    public function create(){
        return view('users.register');
    }
// Store User
    public function store(Request $request){
//        $formFields = $request->validate([
//            'name' => ['required','min:3'],
//            'email' => ['required', 'email', Rule::unique('users', 'email')],
//            'password' => ['required', 'confirmed', 'min:6'],
//            'sex_id' => ['required'],
//        ]);
//        // Hash password
//        $formFields['password'] = bcrypt($formFields['password']);
//        $formFields['user_bio'] = $request->user_bio;
//        $formFields['user_img'] = $request->user_img;
//        $user = User::create($formFields);
        $user = new User;
        $user->name = $request->fname. ' ' .$request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_bio = $request->description;
        $user->user_birth = $request->birthday;
        $user->user_img = $request->user_img;
        $user->sex_id = $request->sex;
        $user->user_img = $request->user_img;

        $user->save();

        $arrayItems = explode("-", rtrim($request->leaves, "-"));
        foreach ($arrayItems as $item) {
            $part = new Participation;
            $part->leaf_id = intval($item);
            $part->user_id = $user->id;
            $part->save();
        }

        $user->assignRole('user');
        //Login
//        auth()->login($user);

        return redirect('/')->with('message', 'User Created');
    }

    // Logout
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    //Show loginForm
    public function login(){
        return view('users.login');
    }
    //authenticate user
    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You are logged in');
        }
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }


}
