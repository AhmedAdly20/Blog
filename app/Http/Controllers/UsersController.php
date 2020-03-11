<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Alert;


class UsersController extends Controller
{
    public function index(){
        if(session('success')){
            Alert::toast(session('success'), 'success')->position('top-end');
        }
        return view('users.index')->with('users',User::all());
    }
    public function makeAdmin(User $user){
        $user->role = 'admin';
        $user->save();
        session()->flash('success', $user->name . ' Is An Admin Now');
        return redirect(route('users.index'));
    }
    public function removeAdmin(User $user){
        $user->role = 'writer';
        $user->save();
        session()->flash('success', $user->name . ' Is Not An Admin Now');
        return redirect(route('users.index'));
    }
    public function edit(User $user , Profile $profile){
        return view('users.profile')->with('user',$user)->with('profile',$user->profile);
    }
    public function update(User $user , Request $request){
        $data = $request->all();
        $profile = $user->profile;
        if($request->hasFile('picture')){
            $picture = $request->picture->store('profilesPictures','public');
            $data['avatar'] = $picture;
        }
        $profile->update($data);
        return redirect()->route('home');
    }
}
