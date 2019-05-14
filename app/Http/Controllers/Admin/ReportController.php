<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('report_access'), 403);

        return view('admin.reports.index');
    }
}
