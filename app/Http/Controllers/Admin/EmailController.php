<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EmailController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('email_access'), 403);

        return view('admin.emails.index');
    }
}
