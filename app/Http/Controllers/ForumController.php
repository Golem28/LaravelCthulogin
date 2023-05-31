<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Forum;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // Get the list of forums
        $forums = Forum::all();

        // Return the view
        return view('forum', [
            'forums' => $forums,
        ]);
    }

    public function create_form(){
        // Return the view
        return view('forum_create');
    }

    public function create($forum_name, $forum_abbreviation){
        // Add a new forum
        $user_id = auth()->user()->id;

        $forum = new Forum();
        $forum->name = $forum_name;
        $forum->abbreviation = $forum_abbreviation;
        $forum->user_id = $user_id;
        $forum->save();
    }

    public function delete($forum_id){
        // Delete a forum only if the user is the owner
        $forum = Forum::find($forum_id);
        $user_id = auth()->user()->id;

        if ($forum->user_id == $user_id){
            $forum->delete();
        }
    }
}
