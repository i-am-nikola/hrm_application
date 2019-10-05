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
    $password = Str::random(8);
    $user = new User;
    $input = $user->getInputUser($request, $password);

    if ($user->create($input)) {
      // $this->sendInfoLoginToEmail($request, $password);
      return redirect()->route('users.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('user.message.create')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('user.message.error')]);
    }
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
    if ($user->update($request->all())) {
      return redirect()->route('users.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('user.message.update')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('user.message.error')]);
    }
  }

  public function destroy(Request $request, $id)
  {
    if ($request->ajax()) {
      $user = User::findOrFail($id);
      if ($user->delete()) {
        return response()->json(['id' => $id, 'status' => 'success', 'flash_message' => t('user.message.delete')]);
      } else {
        return response()->json(['success' => 'fails', 'flash_message' => t('role.message.no_delete')]);
      }
    }
  }
}
