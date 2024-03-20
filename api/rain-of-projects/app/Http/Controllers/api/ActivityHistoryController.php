<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ActivityHistory;
use Illuminate\Http\Request;

class ActivityHistoryController extends Controller
{
    public function list () {
        $activityHistories = ActivityHistory::all();
        $list = [];

        foreach($activityHistories as $activityHistory){
            $object = [
                "id" => $activityHistory->id,
                "name" => $activityHistory->name,
                "users_id" => $activityHistory->users_id,
                "tags_id" => $activityHistory->tags_id,
                "projects_id" => $activityHistory->projects_id,
                "groups_id" => $activityHistory->groups_id,
                "created_at" => $activityHistory->created_at,
                "updated_at" => $activityHistory->updated_at
            ];

            array_push($list,$object);
        }

        return response()->json($list);
    }

    public function item ($id) {
        $activityHistory = ActivityHistory::findOrFail($id);

        $object = [
            "id" => $activityHistory->id,
            "name" => $activityHistory->name,
            "users_id" => $activityHistory->users_id,
            "tags_id" => $activityHistory->tags_id,
            "projects_id" => $activityHistory->projects_id,
            "groups_id" => $activityHistory->groups_id,
            "created_at" => $activityHistory->created_at,
            "updated_at" => $activityHistory->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'users_id' => 'required',
            'tags_id' => 'required',
            'projects_id' => 'required',
            'groups_id' => 'required'
        ]);

        $activityHistory = ActivityHistory::create([
            'name' => $data['name'],
            'users_id' => $data['users_id'],
            'tags_id' => $data['tags_id'],
            'projects_id' => $data['projects_id'],
            'groups_id' => $data['groups_id']
        ]);

        if ($activityHistory) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $activityHistory,
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
            'users_id' => 'required',
            'tags_id' => 'required',
            'projects_id' => 'required',
            'groups_id' => 'required'
        ]);

        $activityHistory = ActivityHistory::findOrFail($id);

        $updated = $activityHistory->update([
            'name' => $data['name'],
            'users_id' => $data['users_id'],
            'tags_id' => $data['tags_id'],
            'projects_id' => $data['projects_id'],
            'groups_id' => $data['groups_id']
        ]);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $activityHistory,
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
