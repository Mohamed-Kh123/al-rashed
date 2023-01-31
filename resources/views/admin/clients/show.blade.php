@extends('layouts.adm')
@section('title')
<div class="d-flex justify-content-between">
    <h2>Clients</h2>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">clients</li>
</ol>
@endsection

@section('content')
    
    <x-alert />

    <table class="table">
        <thead>
            <tr>
                <th>رقم الدفعة</th>
                <th>قيمة الدفعة</th>
                <th>تاريخ الدفعة</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($client->invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ date('d-m-Y', strtotime($invoice->invoice_date)) }}</td>
                <td>
                    <a href="{{route('payments.bill', $invoice->id)}}" class="btn btn-sm btn-primary">عرض الفاتورة</a>
                </td>
                <td>
                    <a href="{{route('invoices.edit', $invoice->id)}}" class="btn btn-sm btn-dark">تعديل الفاتورة</a>
                </td>
                <td>
                <form action="{{route('invoices.delete', $invoice->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">حدف الفاتورة</button>
                </td>
            </form>
            </tr>
            @endforeach
        </tbody>
    </table>


    

@endsection
