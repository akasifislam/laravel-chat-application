<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $users = User::latest()->where('id', '!=', auth()->user()->id)->get();
        return response()->json($users);
    }


    public function user_message($id = null)
    {
        $user = User::findOrFail($id);
        $message = $this->message_by_user_id($id);
        return response()->json([
            'message' => $message,
            'user' => $user,
        ]);
    }


    public function message_by_user_id($id)
    {
        $message = Message::where(function ($q) use ($id) {
            $q->where('form', auth()->user()->id);
            $q->where('to', $id);
            $q->where('type', 1);
        })->orWhere(function ($q) use ($id) {
            $q->where('form', $id);
            $q->where('to', auth()->user()->id);
            $q->where('type', 1);
        })->with('user')->get();
        return $message;
    }



    public function send_message(Request $request)
    {
        $message = Message::create([
            'message' => $request->message,
            'form' => auth()->user()->id,
            'to' => $request->user_id,
            'type' => 1
        ]);
        broadcast(new MessageSend($message));
        return response()->json($message, 201);
    }
}
