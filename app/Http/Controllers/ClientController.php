<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{

    private function save(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'phone_number' => 'required|max:13|string',
            'deserved_amount' => 'required|max:255',
        ]);

        $client->name = $request->name;
        $client->phone_number = $request->phone_number;
        $client->deserved_amount = $request->deserved_amount;
        $client->save();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::select('name', 'phone_number', 'deserved_amount', 'id')->get();
        
        // $total = Invoice::sum('amount');

        return view('admin.clients.ind', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();

        return view('admin.clients.create', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = new Client();

        $this->save($request, $client);

        return redirect()->route('clients.index')->with('success', 'تم اضافة المشترك بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::with('invoices')->findOrFail($id);
        
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $this->save($request, $client);

        return redirect()->route('clients.index')->with('success', "تم تعديل المشترك $client->name بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);

        return redirect()->back()->with('success', 'تم حدف المشترك بنجاح');
    }


    public function getClientsWithoutPayments($month)
    {
        $clients = DB::table('clients')->leftJoin('invoices', function($join) use($month){
            $join->on('clients.id', '=', 'invoices.client_id')
            ->whereMonth('invoice_date', $month);
        })
        ->whereNull('invoices.id')
        ->get();
        
        return view('admin.clients.withoutpayment', compact('clients'));
    }
}
