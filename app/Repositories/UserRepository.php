<?php
/**
 * Created by PhpStorm.
 * User: tititoof
 * Date: 20/02/17
 * Time: 09:01
 */

namespace App\Repositories;


use App\Models\User;
use Illuminate\Http\Request;

/**
 *
 */
class UserRepository
{

  public function save(Request $request)
  {
    return $this->update($request, new User);
  }

  public function update(Request $request, User $user)
  {
    try {
        $user->name       = $request->input('firstname').' '.$request->input('lastname');
        $user->firstname  = $request->input('firstname');
        $user->lastname   = $request->input('lastname');
        $user->email      = $request->input('email');
        $user->address    = $request->input('address');
        $user->phone      = $request->input('phone');
        $user->is_admin   = $request->input('is_admin');
        $user->is_teacher = $request->input('is_teacher');
        $user->save();
    } catch (\Exception $exception) {
        return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'error' => '', 'user_id' => $user->id, 'user_name' => $user->name ];
  }

  public function delete(User $user)
  {
      try {
          $user->delete();
      } catch (\Exception $exception) {
          return ['success' => false, 'errors' => $exception->getMessage()];
      }
      return ['success' => true, 'errors' => ''];
  }

  public function toggleAdmin(User $user)
  {
    try {
      $user->is_admin = !$user->is_admin;
      $user->save();
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'errors' => ''];
  }

  public function toggleTeacher(User $user)
  {
    try {
      $user->is_teacher = !$user->is_teacher;
      $user->save();
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'errors' => ''];
  }
  /**
   *
   */
  public function getAllTeachers()
  {
    try {
      $teachers = User::where('is_teacher', 1)
                      ->orderBy('name', 'asc')
                      ->get();
      $vueTeachers = $teachers->map(function($teacher, $key) {
        return [ 'label' => $teacher->name, 'value' => $teacher->id ];
      });
    } catch (\Exception $exception) {
      return ['success' => false, 'errors' => $exception->getMessage()];
    }
    return ['success' => true, 'errors' => '', 'objects' => $vueTeachers];
  }
}
