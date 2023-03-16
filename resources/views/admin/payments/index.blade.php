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
                <th><a href="{{route('client.without-payment', 1)}}">يناير</a></th>
                <th><a href="{{route('client.without-payment', 2)}}">فبراير</a></th>
                <th><a href="{{route('client.without-payment', 3)}}">مارس</a></th>
                <th><a href="{{route('client.without-payment', 4)}}">ابريل</a></th>
                <th><a href="{{route('client.without-payment', 5)}}">مايو</a></th>
                <th><a href="{{route('client.without-payment', 6)}}">يونيو</a></th>
                <th><a href="{{route('client.without-payment', 7)}}">يوليو</a></th>
                <th><a href="{{route('client.without-payment', 8)}}">اغسطس</a></th>
                <th><a href="{{route('client.without-payment', 9)}}">سبتمبر</a></th>
                <th><a href="{{route('client.without-payment', 10)}}">اكتوبر</a></th>
                <th><a href="{{route('client.without-payment', 11)}}">نوفمبر</a></th>
                <th><a href="{{route('client.without-payment', 12)}}">ديسمبر</a></th>
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

