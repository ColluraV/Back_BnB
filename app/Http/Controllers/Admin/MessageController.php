<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\MessagesStoreRequest;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */



        public function index()
        {
            $user = Auth::user();   //trovo l'utente loggato
            $mails = $user->apartments()->has('messages')->get();
    
            return view('admin.messages.index', compact('mails'));
        }


    /**
     * Store a newly created resource in storage.
     */
    public function store(MessagesStoreRequest $request)
    {
        //
        $data = $request->validated();
        $data['apartment_id']= 4; // * * * * * * * * * * * CHANGE THIS VALUE WITH apartment_id FETCHING THE FRONTEND ITEM' apartment_id* * * * * * * * * // 
        $newMessage=Message::create($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
        $message = Message::where('id',$message->id)->firstOrFail();
        @dd($message);
        $message->delete();

        return redirect()->route("admin.messages.index");

    }
}
