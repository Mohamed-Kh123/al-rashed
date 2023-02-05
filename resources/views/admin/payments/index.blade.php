@extends('layouts.adm')
@section('title')
<div class="d-flex justify-content-between">
    <h2>الدفعات</h2>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">Payments</li>
</ol>
@endsection

@section('content')
    
    <br><br>
    <x-alert />

    <table class="table">
        <thead>
            <tr>
                <th>اسم المشترك</th>
                <th>يناير</th>
                <th>فبراير</th>
                <th>مارس</th>
                <th>ابريل</th>
                <th>مايو</th>
                <th>يونيو</th>
                <th>يوليو</th>
                <th>اغسطس</th>
                <th>سبتمبر</th>
                <th>اكتوبر</th>
                <th>نوفمبر</th>
                <th>ديسمبر</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td><a href="{{route('clients.show', $payment->client_id)}}">{{$payment->client->name ?? null}}</a></td>
                <td>{{$payment->january}}</td>
                <td>{{$payment->february}}</td>
                <td>{{$payment->march}}</td>
                <td>{{$payment->april}}</td>
                <td>{{$payment->may}}</td>
                <td>{{$payment->june}}</td>
                <td>{{$payment->july}}</td>
                <td>{{$payment->ougust}}</td>
                <td>{{$payment->september}}</td>
                <td>{{$payment->october}}</td>
                <td>{{$payment->november}}</td>
                <td>{{$payment->december}}</td>
                <td>
                    <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-sm btn-dark">تعديل</a>
                </td>
            </tr>
            @endforeach
            <tr class="result-tr">
                <td>المجموع</td>
                <td>{{$data[0]}}</td>
                <td>{{$data[1]}}</td>
                <td>{{$data[2]}}</td>
                <td>{{$data[3]}}</td>
                <td>{{$data[4]}}</td>
                <td>{{$data[5]}}</td>
                <td>{{$data[6]}}</td>
                <td>{{$data[7]}}</td>
                <td>{{$data[8]}}</td>
                <td>{{$data[9]}}</td>
                <td>{{$data[10]}}</td>
                <td>{{$data[11]}}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    

@endsection

