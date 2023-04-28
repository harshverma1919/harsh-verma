<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewProject;
use Illuminate\Support\Facades\DB;

class NewProjectController extends Controller
{
    //
    public function index()
    {
        $newProjects = NewProject::all();
    
        return response()->json([
            'data' => $newProjects,
        ]);
}
public function destroy($id)
{
    $project = NewProject::find($id);

    if (!$project) {
        return response()->json([
            'message' => 'Project not found',
        ], 404);
    }

    $project->delete();

    return response()->json([
        'message' => 'Project deleted successfully',
    ]);
}
public function store(Request $request)
{
    $validatedData = $request->validate([
        'project_name' => 'required|string|max:255',
        'user_id' => 'required|exists:new_users,id',
    ]);

    $project = NewProject::create($validatedData);

    return response()->json([
        'message' => 'Project created successfully',
        'data' => $project,
    ], 201);
}
public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'project_name' => 'required|string|max:255',
      //  'user_id' => 'required|exists:new_users,id',
    ]);

    $project = NewProject::find($id);

    if (!$project) {
        return response()->json([
            'message' => 'Project not found',
        ], 404);
    }

    $project->update($validatedData);

    return response()->json([
        'message' => 'Project updated successfully',
        'data' => $project,
    ]);
}

public function getUserProjects($user_id)
{
    $projects = NewProject::where('user_id', $user_id)->get();

    return response()->json([
        'data' => $projects,
    ]);
}

}