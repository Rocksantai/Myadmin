<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile($id){

        if(auth()->user()->id==$id){

            $user =User::findOrFail($id);
            return view('admin.user-profile')->with('user', $user);

            }
            return back();
        }

        function updateProfile(UpdateUserRequest $request, $id){

            if(auth()->user()->id == $id) {

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


            $user->save();

            return redirect(route('dashboard'));

        }

        return back();

    }

}
