@extends('layouts.adm')

@section('title', 'المشتركين الغير مسددين لهذا الشهر')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
</ol>
@endsection

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>$loop</th>
                <th>اسم المشترك</th>
            </tr>
        </thead>

        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection