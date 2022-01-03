<?php

namespace App\Http\Controllers;

use DB;
use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceStoreRequest;

class InvoiceController extends Controller
{
    /**
     * @var $invoice
    */
    public $invoice;

    /**
     * Inject model(s) into the constructor
     * @param Invoice $invoice
    */
    public function __construct(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceStoreRequest $request)
    {

        DB::table('invoices')->insert(
            [
                'company_name' => $request->company_name,
                'address' => $request->address,
                'city' => $request->city,
                'zip' => $request->zip,
                'st' => $request->st,
                'phone_number' => $request->phone_number,
                'fax' => $request->fax,
                'website'=>$request->website,
                'name' => $request->name,
                'labour' =>$request->labour,
                'parts' => $request->parts,
                'service_fee' => $request->service_fee,
                'due_date' => $request->due_date,
            ]
        );

        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Invoice captured'
        ]);
    }

    /**
     * show resource in storage
     * @return \Illuminate\Http\Response
    */
    public function show()
    {
        return view('thank-you');
    }
}