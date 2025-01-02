<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {

        $posts = Post::when($request->has('search'), function($query) use ($request){
            $query->where('first_name', 'LIKE', "%$request->search%")
                ->orWhere('last_name', 'LIKE', "%$request->search%")
                ->orWhere('email', 'LIKE', "%$request->search%")
                ->orWhere('phone', 'LIKE', "%$request->search%")
                ->orWhere('about', 'LIKE', "%$request->search%")
                ->orWhere('bank_account_number', 'LIKE', "%$request->search%");
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->paginate(5)->withQueryString();

        $trashpostcount = Post::onlyTrashed()->count();

        return view('Welcome', compact('posts', 'trashpostcount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request)
    {

        $post = new Post();

        if ($request->hasFile('file')) {
            $image =  $request->file('file');
            $fileName = $image->store('', 'public');
            $filePath = '/uploads/'. $fileName;

            $post->file = $filePath;
        }

        $post->first_name = $request->first_name;
        $post->last_name = $request->last_name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->about = $request->about;
        $post->bank_account_number = $request->bank_account_number;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('Edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostStoreRequest $request, string $id)
    {
        $post =Post::findOrFail($id);

        if ($request->hasFile('file')) {

           File::delete(public_path($post->file));

            $image =  $request->file('file');
            $fileName = $image->store('', 'public');
            $filePath = '/uploads/'. $fileName;

            $post->file = $filePath;
        }

        $post->first_name = $request->first_name;
        $post->last_name = $request->last_name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->about = $request->about;
        $post->bank_account_number = $request->bank_account_number;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        // File::delete(public_path($post->file));

        $post->delete();
        return redirect()->route('posts.index');
    }


    public function trashIndex(Request $request){

        $posts = Post::when($request->has('search'), function($query) use ($request){
            $query->where('first_name', 'LIKE', "%$request->search%")
                ->orWhere('last_name', 'LIKE', "%$request->search%")
                ->orWhere('email', 'LIKE', "%$request->search%")
                ->orWhere('phone', 'LIKE', "%$request->search%")
                ->orWhere('about', 'LIKE', "%$request->search%")
                ->orWhere('bank_account_number', 'LIKE', "%$request->search%");
        })->orderBy('id', $request->has('order') && $request->order == 'asc' ? 'ASC' : 'DESC')->onlyTrashed()->paginate(5)->withQueryString();
        return view('Trash', compact('posts'));
     }


     public function postRestore($id){

        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back();
     }


     public function postPermanentDelete(string $id)
     {
         $post = Post::onlyTrashed()->findOrFail($id);
         File::delete(public_path($post->file));
         $post->forceDelete();
         return redirect()->back();
     }

}
