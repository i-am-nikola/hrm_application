<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
    $roles = Role::pluck('name', 'id');
    return view('admin.users.create', compact('roles'));
  }

  public function store(UserRequest $request)
  {
    //create user
    $password = Str::random(8);
    $user = new User;
    $data = $user->getDataUser($request, $password);
    $user->create($data);

    $this->sendInfoLoginToEmail($request, $password);
    return redirect()->route('users.index')
      ->with(['flash_level' => 'success', 'flash_message' => t('user.message.create')]);
  }

  private function sendInfoLoginToEmail($request, $password)
  {
    Mail::to($request->email)->send(new UserMail([
      'name'      => $request->name,
      'email'     => $request->email,
      'password'  => $password
    ]));
  }

  public function show($id)
  {
    //
  }

  public function edit($id)
  {
    $user = User::findOrFail($id);
    $role = $user->role;
    $roles = Role::pluck('name', 'id');
    $readonly = 'readonly';
    return view('admin.users.edit', compact('user', 'roles', 'role', 'readonly'));
  }

  public function update(Request $request, $id)
  {
    $userRequest = new UserRequest;
    $this->validate(
      $request,
      $userRequest->rules(true, $id),
      $userRequest->messages(),
      $userRequest->attributes()
    );
    $user = User::find($id);
    $user->update($request->all());
    return redirect()->route('users.index')
      ->with(['flash_level' => 'success', 'flash_message' => t('user.message.update')]);
  }

  public function destroy(Request $request, $id)
  {
    if ($request->ajax()) {
      $user = User::find($request->id);
      $user->delete();
      return response(['id' => $request->id]);
    }
  }
}
