<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function list () {

        $Tasks = Task::all();

        $list = [];

        foreach($Tasks as $Task){

            $object = [

                "id" => $Task->id,
                "name" => $Task->name,
                "creation" => $Task->creation,
                "completion" => $Task->completion,
                "tags_id" => $Task->tags_id,
                "priority" => $Task->priority
            ];

            array_push($list,$object);
        }
        return response()->json($list);
    }
    public function item ($id) {

        $Tasks = Task::where('id','=',$id)->first();

        $object = [

            "id" => $Task->id,
            "name" => $Task->name,
            "creation" => $Task->creation,
            "completion" => $Task->completion,
            "tags_id" => $Task->tags_id,
            "priority" => $Task->priority
        ];

        return response()->json($object);

    }
    public function create(Request $request) {
        
        $data = $request->validate([
            'name' => 'required|min:3',
            'creation' => 'required',
        ]);
    
        $Tasks = Task::create([
            'name' => $data['name'],
            'creation' => $data['creation'],
            
        ]);
    
        if ($task) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $task,
            ];
    
            return response()->json($object, 201); // 201 Created status code
        } else {
            $object = [
                "response" => 'Error: Something went wrong, please try again.',
            ];
    
            return response()->json($object, 500); // 500 Internal Server Error status code
        }
    }
    public function update(Request $request) {
    
        $data = $request->validate([
            'id' => 'required|exists:tags,id',
            'name' => 'required|min:3',
            'category' => 'required',
        ]);
    
        // Find the Tag by its ID
        $task = Task::find($data['id']);
    
        // Update the Tag with the new data
        $task->update([
            'name' => $data['name'],
            'category' => $data['category'],
        ]);
    
        // Check if the update was successful
        if ($task) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $task,
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
