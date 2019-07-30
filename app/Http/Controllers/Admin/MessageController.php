<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Message;
use App\Events\MessageSent;
use App\Events\PrivateMessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
	public function __construct()
	{
	  $this->middleware('auth');
	}

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */
	// public function index()
	// {

	// }

	public function fetchMessages()
    {
        abort_unless(\Gate::allows('message_access'), 403);

        $message = Message::with('user')->get();
        // dd($message);

	  	return view('admin.messages.index', compact('message'));
    }

    public function privateMessages(User $user)
    {
        $privateCommunication= Message::with('user')
        ->where(['user_id'=> auth()->id(), 'receiver_id'=> $user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
        })
        ->get();

        return $privateCommunication;
    }

    public function sendMessage(Request $request)
    {


        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => request('receiver_id')
            ]);
        }else{
            $message = auth()->user()->messages()->create(['message' => $request->message]);

        }


        broadcast(new MessageSent(auth()->user(),$message->load('user')))->toOthers();

        return response(['status'=>'Message sent successfully','message'=>$message]);

    }

    public function sendPrivateMessage(Request $request,User $user)
    {
        if(request()->has('file')){
            $filename = request('file')->store('chat');
            $message=Message::create([
                'user_id' => request()->user()->id,
                'image' => $filename,
                'receiver_id' => $user->id
            ]);
        }else{
            $input=$request->all();
            $input['receiver_id']=$user->id;
            $message=auth()->user()->messages()->create($input);
        }

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return response(['status'=>'Message private sent successfully','message'=>$message]);

    }

        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function private()
    {
        return view('admin.messages.private');
    }

    public function users()
    {
        return User::all();
    }
}

