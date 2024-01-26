<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function list () {

        $Tags = Tag::all();

        $list = [];

        foreach($Tags as $Tag){

            $object = [

                "id" => $Tag->id,
                "name" => $Tag->name,
                "priority" => $Tag->priority,
                "category" => $Tag->category,
                "description" => $Tag->description
            ];

            array_push($list,$object);
        }
        return response()->json($list);
    }
    public function item ($id) {

        $Tags = Tag::where('id','=',$id)->first();

        $object = [

            "id" => $Tag->id,
            "name" => $Tag->name,
            "priority" => $Tag->priority,
            "category" => $Tag->category,
            "description" => $Tag->description
        ];

        return response()->json($object);

    }
    public function create(Request $request) {
        
        $data = $request->validate([
            'name' => 'required|min:3',
            'category' => 'required',
        ]);
    
        $tag = Tag::create([
            'name' => $data['name'],
            'category' => $data['category'],
            
        ]);
    
        if ($tag) {
            $object = [
                "response" => 'Success: Item saved correctly.',
                "data" => $tag,
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
        $tag = Tag::find($data['id']);
    
        // Update the Tag with the new data
        $tag->update([
            'name' => $data['name'],
            'category' => $data['category'],
        ]);
    
        // Check if the update was successful
        if ($tag) {
            $object = [
                "response" => 'Success: Item updated correctly.',
                "data" => $tag,
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

