<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function index()
    {
        return view('post-form');
    }
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->sales = $request->sales;
        $post->cost = $request->cost;
        $post->profit = $request->profit;
        $post->save();
        return redirect('post-form')->with('status', 'Data Has Been inserted');
    }

    public function insertdata(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->sales = $request->sales;
        $post->cost = $request->cost;
        $post->profit = $request->profit;
        $post->save();
        return response()->json('data inserts');
    }
    public function get(){
        $posts = Post::all();
        return response()->json($posts);
    }
    public function update(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string',
            'sales' => 'required|numeric',
            'cost' => 'required|numeric',
            'profit' => 'required|numeric',
        ]);

        // Find the record by ID
        $record = Post::find($request->id);


        // Update the record
        $record->update($validatedData);

        // Return the updated record
        return response()->json($record);
    }
    public function destroy($id)
    {
        try {
            // Find the record by ID
            $record = Post::find($id);

            // Delete the record
            $record->delete();

            return response()->json(['message' => 'Record deleted successfully'], 200);
        } catch (\Exception $e) {
            // If the record is not found or any other error occurs
            return response()->json(['message' => 'Failed to delete the record'], 500);
        }
    }
}
