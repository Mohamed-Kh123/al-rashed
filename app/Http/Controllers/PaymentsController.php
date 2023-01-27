<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\Month;
use App\Models\MonthPayment;
use App\Models\Payment;
use Dompdf\Dompdf;
use Mccarlosen\LaravelMpdf\Facades\LaravelMpdf;
use PDF;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('client')->get();

        $data = collect([]);

        if(!$data->count()){
            $jan_total = Invoice::whereMonth('invoice_date', 1)->sum('amount');
            $feb_total = Invoice::whereMonth('invoice_date', 2)->sum('amount');
            $mar_total = Invoice::whereMonth('invoice_date', 3)->sum('amount');
            $apr_total = Invoice::whereMonth('invoice_date', 4)->sum('amount');
            $may_total = Invoice::whereMonth('invoice_date', 5)->sum('amount');
            $jun_total = Invoice::whereMonth('invoice_date', 6)->sum('amount');
            $jul_total = Invoice::whereMonth('invoice_date', 7)->sum('amount');
            $aug_total = Invoice::whereMonth('invoice_date', 8)->sum('amount');
            $sep_total = Invoice::whereMonth('invoice_date', 9)->sum('amount');
            $oct_total = Invoice::whereMonth('invoice_date', 10)->sum('amount');
            $nov_total = Invoice::whereMonth('invoice_date', 11)->sum('amount');
            $dec_total = Invoice::whereMonth('invoice_date', 12)->sum('amount');

            $data->push($jan_total);
            $data->push($feb_total);
            $data->push($mar_total);
            $data->push($apr_total);
            $data->push($may_total);
            $data->push($jun_total);
            $data->push($jul_total);
            $data->push($aug_total);
            $data->push($sep_total);
            $data->push($oct_total);
            $data->push($nov_total);
            $data->push($dec_total);

            // dd($data);
        }

        

        // dd($data);

        
        return view('admin.payments.index', [
            'payments' => $payments,
            'data' => $data,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client = Client::findOrFail($id);
        $payment = Payment::where('client_id', $client->id)->first();
        if(!$payment){
            $payment = new Payment();
        }
        return view('admin.payments.create', compact('payment', 'client'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id=null)
    {
    
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|max:255',
            'january' => 'nullable',
            'february' => 'nullable',
            'march' => 'nullable',
            'april' => 'nullable',
            'may' => 'nullable',
            'june' => 'nullable',
            'july' => 'nullable',
            'ougust' => 'nullable',
            'september' => 'nullable',
            'october' => 'nullable',
            'november' => 'nullable',
            'december' => 'nullable',
        ]);

        $payment = Payment::find($id);

        if($payment){
            $payment->january = $request->january;
            $payment->february = $request->february;
            $payment->march = $request->march;
            $payment->april = $request->april;
            $payment->may = $request->may;
            $payment->june = $request->june;
            $payment->july = $request->july;
            $payment->ougust = $request->ougust;
            $payment->september = $request->september;
            $payment->october = $request->october;
            $payment->november = $request->november;
            $payment->december = $request->december;
        }

        if(!$payment){
            $payment = new Payment();
            $payment->client_id = $request->client_id;
            $payment->january = $request->january;
            $payment->february = $request->february;
            $payment->march = $request->march;
            $payment->april = $request->april;
            $payment->may = $request->may;
            $payment->june = $request->june;
            $payment->july = $request->july;
            $payment->ougust = $request->ougust;
            $payment->september = $request->september;
            $payment->october = $request->october;
            $payment->november = $request->november;
            $payment->december = $request->december;
        }

        $payment->save();


        $invoice = Invoice::create([
            'client_id' => $request->client_id,
            'invoice_date' => now(),
            'amount' => $request->amount,
        ]);
        
        


        return redirect()->route('payments.bill', $invoice->id)->with('success', 'تم اضافة الدفعة بنجاح');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $clients = Client::all();
        return view('admin.payments.edit', compact('payment', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        $request->validate([
            'january' => 'nullable',
            'february' => 'nullable',
            'march' => 'nullable',
            'april' => 'nullable',
            'may' => 'nullable',
            'june' => 'nullable',
            'july' => 'nullable',
            'ougust' => 'nullable',
            'september' => 'nullable',
            'october' => 'nullable',
            'november' => 'nullable',
            'december' => 'nullable',
        ]);

        $payment = Payment::findOrFail($id);

        $payment->january = $request->january;
        $payment->february = $request->february;
        $payment->march = $request->march;
        $payment->april = $request->april;
        $payment->may = $request->may;
        $payment->june = $request->june;
        $payment->july = $request->july;
        $payment->ougust = $request->ougust;
        $payment->september = $request->september;
        $payment->october = $request->october;
        $payment->november = $request->november;
        $payment->december = $request->december;

        $payment->save();
        

        

        return redirect()->route('payments.index')->with('success', 'تم تحديث الدفعة بنجاح');
    }


    

    public function editInvoice($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        return view('admin.payments.editInvoice', [
            'invoice' => $invoice,
        ]);
    }

    public function updateInvoice(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $invoice->amount = $request->amount;
        $invoice->save();

        return redirect()->route('clients.show', $invoice->client_id)->with('success', 'تم تعديل الفاتورة بنجاح');
        
    }

    public function payment($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);

        return view('admin.payments.payment', [
            'invoice' => $invoice,
        ]);
    }

    public function pdfConvert($id)
    {
        $invoice = Invoice::with('client')->findOrFail($id);
        $data = [
            'invoice' => $invoice,
        ];

        $pdf = PDF::loadView('payment', $data,[], [
            'format' => 'A3',
            'default_font_size' => "20",
            'setAutoTopMargin' => 'stretch',
            'autoMarginPadding' => 5

        ]);

        return $pdf->download("Invoice-$invoice->id.pdf");
    }
}
