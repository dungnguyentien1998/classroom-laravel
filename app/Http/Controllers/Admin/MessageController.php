<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::all();

//        $messagesSent = DB::table('users')
//                    ->join('messages', 'users.id', '=', 'messages.receiver_id')
//                    ->where('messages.sender_id', '=', Auth::user()->id)
//                    ->select('messages.id as idm', 'users.username', 'messages.message_content')
//                    ->get();
//
//
//        $messagesReceived = DB::table('users')
//                    ->join('messages', 'users.id', '=', 'messages.sender_id')
//                    ->where('messages.receiver_id', '=', Auth::user()->id)
//                    ->select('users.username as username', 'messages.message_content as message_content', 'messages.sender_id as sender_id')
//                    ->get();


//        $messages = array();
//        $messages[0] = $messagesSent;
//        $messages[1] = $messagesReceived;


        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $id)
    {
        $request->validate(['message_content'=>'required',]);

        Message::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $id,
            'message_content' => $request['message_content'],
        ]);
        return redirect('/admin/dashboard/messages')->with('success', 'Message saved!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $message = Message::find($id);
        if ($message == null) {
//            return redirect()->intended('/messages');
            return redirect()->intended('/admin/dashboard/messages');
        }
        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $constraints = [
            'message_content'=>'required'
        ];
        $input = [
            'message_content' => $request['message_content'],
        ];

        $this->validate($request, $constraints);

        Message::where('id', $id)->update($input);
//        return redirect()->intended('messages');
        return redirect()->intended('/admin/dashboard/messages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::where('id', $id)->delete();
//        return redirect()->intended('messages');
        return redirect()->intended('/admin/dashboard/messages');
    }
}
