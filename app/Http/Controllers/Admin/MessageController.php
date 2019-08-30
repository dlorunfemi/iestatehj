<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Message;
use App\Events\NewMessage;
// use App\Events\PrivateMessageSent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
	// public function __construct()
	// {
	//   $this->middleware('auth');
	// }

	/**
	 * Show chats
	 *
	 * @return \Illuminate\Http\Response
	 */

    public function index()
	{
	  	return view('admin.messages.index');
    }

    public function users()
    {

        // get all users except the authenticated one
        $contacts = User::where('id', '!=', auth()->id())->get();
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`user_id` as sender_id, count(`user_id`) as messages_count'))
            ->where('receiver_id', auth()->id())
            ->where('read', false)
            ->groupBy('user_id')
            ->get();
        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;
            return $contact;
        });
        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('user_id', $id)->where('receiver_id', auth()->id())->update(['read' => true]);
        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('user_id', auth()->id());
            $q->where('receiver_id', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('user_id', $id);
            $q->where('receiver_id', auth()->id());
        })
        ->get();
        return response()->json($messages);
    }

    public function send(Request $request)
    {

        $message = Message::create([
            'user_id' => auth()->id(),
            'receiver_id' => $request->contact_id,
            'message' => $request->message
        ]);
        broadcast(new NewMessage($message));
        return response()->json($message);
    }

	public function fetchMessages()
    {
        abort_unless(\Gate::allows('message_access'), 403);

        $message = Message::with('user')->get();
        // dd($message);

	  	return view('admin.messages.index', compact('message'));
    }

    // public function privateMessages(User $user)
    // {
    //     $privateCommunication= Message::with('user')
    //     ->where(['user_id'=> auth()->id(), 'receiver_id'=> $user->id])
    //     ->orWhere(function($query) use($user){
    //         $query->where(['user_id' => $user->id, 'receiver_id' => auth()->id()]);
    //     })
    //     ->get();

    //     return $privateCommunication;
    // }

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

    // public function sendPrivateMessage(Request $request,User $user)
    // {
    //     if(request()->has('file')){
    //         $filename = request('file')->store('chat');
    //         $message=Message::create([
    //             'user_id' => request()->user()->id,
    //             'image' => $filename,
    //             'receiver_id' => $user->id
    //         ]);
    //     }else{
    //         $input=$request->all();
    //         $input['receiver_id']=$user->id;
    //         $message=auth()->user()->messages()->create($input);
    //     }

    //     broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

    //     return response(['status'=>'Message private sent successfully','message'=>$message]);

    // }

    // public function private()
    // {
    //     return view('admin.messages.private');
    // }


}


