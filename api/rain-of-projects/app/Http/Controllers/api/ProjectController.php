<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list() {
        $projects = Project::all();
        $list = [];

        foreach($projects as $project) {
            $object = [
                "id" => $project->id,
                "name" => $project->name,
                "date" => $project->date,
                "duration" => $project->duration,
                "tags_id" => $project->tags_id,
                "created_at" => $project->created_at,
                "updated_at" => $project->updated_at
            ];

            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function item($id) {
        $project = Project::findOrFail($id);

        $object = [
            "id" => $project->id,
            "name" => $project->name,
            "date" => $project->date,
            "duration" => $project->duration,
            "tags_id" => $project->tags_id,
            "created_at" => $project->created_at,
            "updated_at" => $project->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'date' => 'required|date',
            'duration' => 'required',
            'tags_id' => 'required'
        ]);

        $project = Project::create([
            'name' => $data['name'],
            'date' => $data['date'],
            'duration' => $data['duration'],
            'tags_id' => $data['tags_id']
        ]);

        if ($project) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $project,
            ];

            return response()->json($object, 201); // 201 Created status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }

    public function update(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'date' => 'required|date',
            'duration' => 'required',
            'tags_id' => 'required'
        ]);

        $project = Project::findOrFail($id);

        $updated = $project->update([
            'name' => $data['name'],
            'date' => $data['date'],
            'duration' => $data['duration'],
            'tags_id' => $data['tags_id']
        ]);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $project,
            ];

            return response()->json($object, 200); // 200 OK status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];

            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }
}
