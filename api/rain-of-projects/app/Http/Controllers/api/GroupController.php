<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function list () {
        $groups = Group::all();
        $list = [];

        foreach($groups as $group){
            $object = [
                "id" => $group->id,
                "name" => $group->name,
                "members" => $group->members,
                "creation" => $group->creation,
                "users_id" => $group->users_id,
                "created_at" => $group->created_at,
                "updated_at" => $group->updated_at
            ];

            array_push($list,$object);
        }

        return response()->json($list);
    }

    public function item ($id) {
        $group = Group::findOrFail($id);

        $object = [
            "id" => $group->id,
            "name" => $group->name,
            "members" => $group->members,
            "creation" => $group->creation,
            "users_id" => $group->users_id,
            "created_at" => $group->created_at,
            "updated_at" => $group->updated_at
        ];

        return response()->json($object);
    }

    public function create(Request $request) {
        $data = $request->validate([
            'name' => 'required|min:3',
            'members' => 'required',
            'creation' => 'required|date',
            'users_id' => 'required'
        ]);

        $group = Group::create([
            'name' => $data['name'],
            'members' => $data['members'],
            'creation' => $data['creation'],
            'users_id' => $data['users_id']
        ]);

        if ($group) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $group,
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
            'members' => 'required',
            'creation' => 'required|date',
            'users_id' => 'required'
        ]);

        $group = Group::findOrFail($id);

        $updated = $group->update([
            'name' => $data['name'],
            'members' => $data['members'],
            'creation' => $data['creation'],
            'users_id' => $data['users_id']
        ]);

        if ($updated) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $group,
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
