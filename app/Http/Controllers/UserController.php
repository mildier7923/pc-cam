<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function getAllRoles()
		{
			return response()->json(Role::all()->pluck('name'), 200);
		}

    public function getAll()
		{
			return response()->json(User::with('roles')->get(), 200);
		}

    public function getUser(User $user)
		{
			return response()->json($user->load('roles'), 200);
		}

    public function storeUser(UserCreateRequest $request)
		{
			$user = new User($request->all());
			$user->save();
			$user->assignRole($request->role);
			return response()->json(['saved' => true], 201);
		}

		public function updateUser(User $user, UserUpdateRequest $request)
		{
			$user->update($request->all());
			$user->refresh()->syncRoles($request->role);
			return response()->json([], 204);
		}

		public function deleteUser(User $user)
		{
			$user->delete();
			return response()->json([], 204);
		}
}
