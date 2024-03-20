<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Taskboard;
use Illuminate\Http\Request;

class TaskboardController extends Controller
{
    public function list () {
        $taskboards = Taskboard::all();
        return response()->json($taskboards);
    }

    public function item ($id) {
        $taskboard = Taskboard::findOrFail($id);
        return response()->json($taskboard);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'creation' => 'required|date',
            'completion' => 'nullable|date',
            'users_id' => 'required',
            'groups_id' => 'required',
            'tags_id' => 'required',
            'tasks_id' => 'required'
        ]);

        $taskboard = Taskboard::create($data);

        if ($taskboard) {
            return response()->json($taskboard, 201); // 201 Created status code
        } else {
            return response()->json(['error' => 'Something went wrong, please try again.'], 500); // 500 Internal Server Error status code
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'creation' => 'required|date',
            'completion' => 'nullable|date',
            'users_id' => 'required',
            'groups_id' => 'required',
            'tags_id' => 'required',
            'tasks_id' => 'required'
        ]);

        $taskboard = Taskboard::findOrFail($id);
        $updated = $taskboard->update($data);

        if ($updated) {
            return response()->json($taskboard, 200); // 200 OK status code
        } else {
            return response()->json(['error' => 'Something went wrong, please try again.'], 500); // 500 Internal Server Error status code
        }
    }

    public function delete($id) {
        $taskboard = Taskboard::findOrFail($id);
        $deleted = $taskboard->delete();

        if ($deleted) {
            return response()->json(['message' => 'Taskboard deleted successfully.'], 200); // 200 OK status code
        } else {
            return response()->json(['error' => 'Something went wrong, please try again.'], 500); // 500 Internal Server Error status code
        }
    }
}
