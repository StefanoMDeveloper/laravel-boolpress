<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'nullable|string|max:50',
            'testo' => 'string|required',
            'post_id' => 'exist:posts,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors(),
                "data" => $data,
            ], 400);
        }

        $newComment = new Comment();
        if(!empty($data["name"]) ) {
            $newComment->name = $data["name"];
        }
        $newComment->content = $data["testo"];
        $newComment->post_id = $data["post_id"];
        $newComment->save();

        //risposta
        return response()->json([
            "success" =>true
        ]);
    }
}