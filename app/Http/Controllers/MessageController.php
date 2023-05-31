<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($forum_id){
        // Get the list of messages for a forum
        $messages = Message::where('forum_id', $forum_id)->get();

        // Return the view
        return view('message', [
            'messages' => $messages,
        ]);
    }

    public function create($forum_id, $message_content){
        // Add a new message
        $user_id = auth()->user()->id;

        $message = new Message();
        $message->user_id = $user_id;
        $message->content = $message_content;
        $message->forum_id = $forum_id;
        $message->save();
    }

    public function delete($message_id){
        // Delete a message only if the user is the owner
        $message = Message::find($message_id);
        $user_id = auth()->user()->id;

        if ($message->user_id == $user_id){
            $message->delete();
        }
    }
}
