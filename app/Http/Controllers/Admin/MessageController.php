<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('message_access'), 403);

        return view('admin.messages.index');
    }
}
