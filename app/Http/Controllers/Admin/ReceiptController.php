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

class ReceiptController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('receipt_access'), 403);

        $receipts = Payment::all();

        return view('admin.receipts.index', compact('receipts'));
    }

    public function show(Payment $receipt)
        {
            // abort_unless(\Gate::allows('receipt_access'), 403);

            $numberToWords = new NumberToWords();
            $cT = $numberToWords->getCurrencyTransformer('en');

            $receipt->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');
            // dd($receipt);
            return view('admin.receipts.show', compact('receipt', 'cT'));
        }
    
    public function downloadPDF($id){
        $receipt->load('property', 'landlord', 'tenant', 'apartment', 'is_confirm_by', 'is_confirmed_gm_name', 'is_confirmed_ceo_name', 'cancelled_by', 'created_by', 'updated_by');
    
        $pdf = PDF::loadView('admin.receipts.show', compact('receipt'));
        return $pdf->download('receipt.pdf');    
        }
}
