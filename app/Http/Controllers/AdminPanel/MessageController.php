<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{

    public function index()
    {
        $disapproveMessages = Message::where('status', 0)->get()->sortDesc();
        $approveMessages = Message::where('status', 1)->get()->sortDesc();
        if (!auth()->check()){
            return redirect()->route('post.login')->with('error', 'ابتدا باید وارد سایت شوید');
        }else{
            return view('admin-panel.pages.messages.index', compact('disapproveMessages' , 'approveMessages'));
        }

    }
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|email',
            'title' => 'required|min:4',
            'body' => 'required',
        ]);

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if (!$message){
            return redirect()->back()->with('error', 'ارسال پیام با شکست مواجه شد.');
        }else{
            return redirect()->back()->with('success', 'پیام شما با موفقیت ارسال شد.');
        }
    }

    public function approve($id)
    {
        $approveMessage = Message::where('id' , $id)->find($id)->update([
            'status' => 1
        ]);

        return redirect()->back()->with('success', "پیامی با ایدی $id با موفقیت پاسخ داده شد.");
    }

    public function show($id)
    {
        $message = Message::where('id', $id)->find($id);
//        dd($message);
        return view('admin-panel.pages.messages.show', compact('message'));
    }

}
