<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
  public function index()
  {
    $userId = Auth::user()->id;
    $user = User::findOrFail($userId);
    return view('admin.profile.index', compact('user'));
  }

  public function updateProfile(Request $request, $id)
  {
    $userRequest = new UserRequest();
    $validator = Validator::make(
      $request->all(),
      $userRequest->rules(true, $id),
      $userRequest->messages(),
      $userRequest->attributes()
    );

    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $user = User::findOrFail($id);
        if ($user->update($request->all())) {
          return response()->json(['status' => 'success', 'flash_message' => t('profile.message.info')]);
        }
      }
    }
    return response($request->all());
  }

  public function updatePassword(Request $request, $id)
  {
    $passwordRequest = new PasswordRequest;
    $validator = Validator::make(
      $request->all(),
      $passwordRequest->rules(),
      $passwordRequest->messages(),
      $passwordRequest->attributes()
    );
    if ($request->ajax()) {
      if ($validator->fails()) {
        return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
      } else {
        $currentPassword = Auth::user()->password;
        if (Hash::check($request->current_password, $currentPassword)) {
          $user = User::findOrFail($id);
          $user->password = bcrypt($request->new_password);
          $user->save();
          return response()->json(['status' => 'success', 'flash_message' => t('profile.message.password')]);
        } else {
          return response()->json(['status' => 'incorrect', 'error' => t('validate.incorrect_password')]);
        }
      }
    }
  }

  public function uploadAvatar(Request $request, $id)
  {
    $validator = Validator::make(
      $request->all(),
      ['avatar' => 'image'],
      ['avatar.image' => t('validate.image')]
    );

    if ($validator->fails()) {
      return response()->json(['status' => 'error', 'errors' => $validator->errors()]);
    } else {
      $user = User::findOrFail($id);
      if ($user->avatar !== 'avatar6.png') {
        File::delete('assets/img/' . $user->avatar);
      }

      $filename = $this->moveAvatar($request->file('avatar'));
      $user->avatar = $filename;
      if ($user->save()) {
        return response()->json([
          'filename' => $filename,
          'status' => 'success',
          'flash_message' => t('profile.message.upload_avatar')
        ]);
      }
    }
  }

  private function moveAvatar($image)
  {
    $extension = $image->getClientOriginalExtension();
    $filename = uniqid() . '_' . time() . '.' . $extension;
    if ($image) {
      $image->move('assets/img/', $filename);
    }
    return $filename;
  }
}
