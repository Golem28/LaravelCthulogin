<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Message;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $validator = Validator::make($request->all(), 
        [ 'forum_id' => 'required']); 

        if ($validator->fails()) 
        { 
            die("Error");
            //\Session::flash('warning', 'Please enter the valid details'); return redirect()->back()->withInput()->withErrors($validator);
        }

        $forum = \App\Models\Forum::find($request->input('forum_id'));

        // Get the list of messages for a forum and join the users table
        $messages = Message::where('forum_id', $forum->id)->orderBy('created_at', 'DESC')->join('users', 'users.id', '=', 'messages.user_id')->get(['messages.*', 'users.name']);

        // Return the view
        return view('comments', [
            'forum' => $forum,
            'messages' => $messages,
        ]);
    }

    public function create($forum_id, Request $request){
        $validator = Validator::make($request->all(), 
        [ 'message_content' => 'required']);
        
        if ($validator->fails()) 
        {
            die("Error"); 
            //\Session::flash('warning', 'Please enter the valid details'); return redirect()->back()->withInput()->withErrors($validator);
        }

        // Add a new message
        $user_id = auth()->user()->id;

        $message = new Message();
        $message->user_id = $user_id;
        $message->content = $request->input('message_content');
        $message->forum_id = $forum_id;
        $message->save();

        return redirect()->route('messages', ['forum_id' => $forum_id]);
    }

    public function delete($forum_id, $message_id){
        // Delete a message only if the user is the owner
        $message = Message::find($message_id);
        $user_id = auth()->user()->id;

        if ($message->user_id == $user_id){
            $message->delete();
        } else {
            return redirect()->back();
        }

        return redirect()->route('messages', ['forum_id' => $forum_id]);
    }
}
