<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function showUsers()
    {
        $users=User::all()->sortby('name');
        return view('admin.users')->with('users', $users);
    }

    public function newUser(){
        return view('admin.users-new');
    }

    public function createUser(CreateUserRequest $request) {

        $user = new User;

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->role=$request->role;
        $user->password= bcrypt($request->password);

        if($request->hasFile('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;
        }

        $mess = 'utilizatorul ' . $request->name . 'a fost
        inregistrat in baza de date. Emailul nu a fost validat';

        if($request->verified == 1)
        {
            $user->email_verified_at = now();
            $mess = 'utilizatorul ' . $request->name . 'a fost
        inregistrat in baza de date. Emailul a fost validat';
        }

        $user->save();

        return redirect(route('users'))->with('success', $mess);
    }

    function showEditForm($id){

        $user = User::findOrFail($id);
        return view('admin.users-edit')->with('user', $user);
    }

    function updateUserForm(UpdateUserRequest $request, $id){

        $this->validate($request,

            [
                'email' => 'unique:users,email,' .$id
            ],
            [
                'email.unique' => 'acest email este deja inregistrat'
            ]

        );

        $user = User::findOrFail($id);

        if($request->hasFile('photo')){

            if(!($user->photo == 'default.png')){

                File::delete('images/users/' . $user->photo);
            }

            $extension = $request->file('photo')->getClientOriginalExtension();
            $photoName = str_replace(' ', '', $request->name) . '_' . time() . '.' . $extension;

            $request->file('photo')->move('images/users', $photoName);

            $user->photo = $photoName;

        }

        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->role=$request->role;

        $mess = 'datele utilizatorului au fost actualizate';

        //verificare email

        if($request->verified=='mark')
        {
            $user->email_verified_at = now();
            $mess = "datele utilizatorului au fost actualizate si email-ul a fost validat cu seucces";
        }

        if($request->verified=='invalid')
        {
            $user->email_verified_at = null;
            $mess = "datele utilizatorului au fost actualizate si email-ul a fost ne-validat";
        }

        if($request->verified=='send')
        {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
            $mess = "datele utilizatorului au fost actualizate si email-ul a fost ne-validat";
        }

        $user->save();

        return redirect(route('users'))->with('success', $mess);

    }

    function deleteUser(Request $request, $id){
        $user = User::findOrFail($id);

        if($user->role == "admin"){
            return redirect(route('users'));
        }

        if(!($user->photo == "default.jpg")){
           File::delete('images/users/' . $user->photo);
        }

        $user->delete();
        return redirect(route('users'))->with('success', 'utilizatorul ' . $user->name . 'a fost sters definitiv din baza de date');
    }
}
