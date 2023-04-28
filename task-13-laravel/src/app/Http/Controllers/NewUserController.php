<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewUser;
use Illuminate\Support\Facades\DB;
class NewUserController extends Controller
{
    //
    public function index()
{
    $newUsers = NewUser::all();

    return response()->json([
        'data' => $newUsers,
    ]);
}
public function store(Request $request)
{
    $newUser = NewUser::create([
        'name' => $request->input('name'),
    ]);

    return response()->json([
        'message' => 'User created successfully.',
        'data' => $newUser,
    ], 201);
}
public function update(Request $request, $id)
{
    $newUser = NewUser::findOrFail($id);
    
    $newUser->update([
        'name' => $request->input('name'),
    ]);

    return response()->json([
        'message' => 'User updated successfully.',
        'data' => $newUser,
    ]);
}
public function getUserProjects($user_id)
{
    // retrieve a single user with their projects
 //   $user = NewUser::with('projects')->find($user_id);
    $projects = NewUser::with('newproject')->find($user_id);

    return response()->json([
        'data' => $projects,
    ]);
}





}
