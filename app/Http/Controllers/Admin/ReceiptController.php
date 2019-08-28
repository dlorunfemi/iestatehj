<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Landlord;
use App\Payment;
use App\Property;
use App\PropertyTag;
use App\Tenant;
use App\User;
use App\Vacancy;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NumberToWords\NumberToWords;
use Notoword;
// use App\Http\Controllers\Admin\ReceiptController;

class ReceiptController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('receipt_access'), 403);

        $receipts = Payment::latest()->get();

        return view('admin.receipts.index', compact('receipts'));
    }

    public function show(Payment $receipt)
    {
        // abort_unless(\Gate::allows('receipt_access'), 403);


        $receipt->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');
        $wc = Notoword::make($receipt->amount_paid, " naira");
        // dd($receipt);
        return view('admin.receipts.beb', compact('receipt', 'wc'));
    }

    public function print($id)
    {
        // abort_unless(\Gate::allows('receipt_access'), 403);

        $receipt = Payment::findOrFail($id);
        $receipt->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');
        $wc = Notoword::make($receipt->amount_paid, " naira");
        return view('admin.receipts.print', compact('receipt', 'wc'));
    }

    public function download($id)
    {
        // abort_unless(\Gate::allows('receipt_access'), 403);

        $receipt = Payment::findOrFail($id);
        $receipt->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');
        $wc = Notoword::make($receipt->amount_paid, " naira");
        return view('admin.receipts.print', compact('receipt', 'wc'));
    }
}
