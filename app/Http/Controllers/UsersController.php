<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Laracast\Flash\Flash;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function index(){
      $users = User::orderBy('id', 'ASC')->paginate(5);
      return view('admin.users.index')->with('users', $users);
    }

    public function create(){
      return view('admin.users.create');
    }

    public function store(UserRequest $request){
      $user = new User($request->all());
      $user->password = bcrypt($request->password);
      $user->save();

      flash("Se ha registrado " . $user->name . " de forma exitosa!", 'success')->important();

      return redirect()->route('users.index');


    }

    public function edit($id){
      $user = User::find($id);

      return view('admin.users.edit')->with('user', $user);
    }

    public function update(Request $request, $id){
      $user = User::find($id);
      $user->fill($request->all());
      $user->save();

      flash("El Usuario " . $user->name . " Ha sido Editado de forma exitosa!", 'success')->important();
      return redirect()->route('users.index');

    }

    public function destroy($id){
      $user = User::find($id);
      $user->delete();

      flash("El Usuario " . $user->name . " Ha sido eliminado de forma exitosa!", 'danger')->important();
      return redirect()->route('users.index');
    }
}
