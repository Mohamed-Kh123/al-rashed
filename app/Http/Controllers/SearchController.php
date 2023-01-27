<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SearchController extends Controller
{
    public function getResult(Request $request)
    {
        $client = new Client();

        $name = $request->search;

        if($name){
            $clients = $client->with('invoices')->where('name', 'like', '%'.$name.'%')->simplePaginate(10);

        }
        
        
        return view('admin.result', compact('clients'));
    }


    public function getNames()
    {
        $clients = Client::all('name');
        $data = [];
        foreach($clients as $client){
            $data[] = $client['name'];
        }

        return $data;
    }


}
