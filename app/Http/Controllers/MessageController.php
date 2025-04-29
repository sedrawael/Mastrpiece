<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Message::create($request->all());

        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function index()
    {
        $messages = Message::latest()->get();
        return view('content.messages', compact('messages'));
    }
   


    public function show(Message $message)
    {
        return view('content.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();
        
        return redirect()->route('messages.index')
            ->with('success', 'تم حذف الرسالة بنجاح'); // النص الذي سيظهر في الإشعار
    }}
