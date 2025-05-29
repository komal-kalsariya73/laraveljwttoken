<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // public function index()
    // {
    //     $users = User::where('id', '!=', Auth::id())->get();
    //     return view('chat.index', compact('users'));
    // }

 // MessageController.php

public function fetch($id)
{
    $messages = Message::where(function($q) use ($id) {
     
        $q->where('sender_id', auth()->id())
          ->where('receiver_id', $id);
    })->orWhere(function($q) use ($id) {
        $q->where('sender_id', $id)
          ->where('receiver_id', auth()->id());
    })->orderBy('created_at')->get();

    return response()->json($messages);
}

public function send(Request $request)
{
    $request->validate([
        'receiver_id' => 'required|exists:users,id',
        'message' => 'nullable|string',
        'files.*' => 'nullable|file|max:1024000', // max 1GB per file
    ]);

    $messages = [];

    $receiverId = $request->receiver_id;
    $messageText = $request->message;

    // If there are files, create a message record for each file
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $filePath = $file->store('chat_files', 'public');
            $fileType = $file->getMimeType();

            $msg = Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $receiverId,
                'message' => null,
                'file_path' => $filePath,
                'file_type' => $fileType,
            ]);

            $messages[] = $msg;
        }

        // If message text is also present, save it as a separate message
        if ($messageText) {
            $msg = Message::create([
                'sender_id' => auth()->id(),
                'receiver_id' => $receiverId,
                'message' => $messageText,
                'file_path' => null,
                'file_type' => null,
            ]);
            $messages[] = $msg;
        }
    } else {
        // No files, just a text message
        $msg = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $receiverId,
            'message' => $messageText,
            'file_path' => null,
            'file_type' => null,
        ]);
        $messages[] = $msg;
    }

    return response()->json($messages);
}



}
