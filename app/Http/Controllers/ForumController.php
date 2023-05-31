<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Forum;
use Illuminate\Support\Facades\Validator;

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

    public function overview(){
        // Get the list of forums
        $forums = Forum::all();

        // Return the view
        return view('overview', [
            'forums' => $forums,
        ]);
    }

    public function edit_forum($forum_id){
        // Get the forum
        $forum = Forum::find($forum_id);

        // Return the view
        return view('forum_edit', [
            'forum' => $forum,
        ]);
    }

    public function edit_forum_post($forum_id, Request $request){
        $validator = Validator::make($request->all(), 
        [ 'forum_name' => 'required', 
        'forum_abbreviation' => 'required']); 

        if ($validator->fails()) 
        { 
            die("Error");
            //\Session::flash('warning', 'Please enter the valid details'); return redirect()->back()->withInput()->withErrors($validator);
        }

        // Edit a forum
        $user_id = auth()->user()->id;

        $forum = Forum::find($forum_id);

        if ($forum->user_id != $user_id){
            die("Error");
        }

        $forum->name = $request->input('forum_name');
        $forum->abbreviation = $request->input('forum_abbreviation');
        $forum->save();

        return redirect()->route('forum');
    }

    public function create_form(){
        // Return the view
        return view('forum_create');
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), 
        [ 'forum_name' => 'required', 
        'forum_abbreviation' => 'required']); 

        if ($validator->fails()) 
        { 
            die("Hello");
            //\Session::flash('warning', 'Please enter the valid details'); return redirect()->back()->withInput()->withErrors($validator);
        }

        // Add a new forum
        $user_id = auth()->user()->id;

        $forum = new Forum();
        $forum->name = $request->input('forum_name');
        $forum->abbreviation = $request->input('forum_abbreviation');
        $forum->user_id = $user_id;
        $forum->save();

        return redirect()->route('forum');
    }

    public function delete($forum_id){
        // Delete a forum only if the user is the owner
        $forum = Forum::find($forum_id);
        $user_id = auth()->user()->id;

        if ($forum->user_id == $user_id){
            $forum->delete();
        } else {
            return redirect()->back();
        }

        return redirect()->route('forum');
    }
}
