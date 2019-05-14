<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReceiptController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('receipt_access'), 403);

        return view('admin.receipts.index');
    }
}
