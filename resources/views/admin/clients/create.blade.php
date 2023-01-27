@extends('layouts.adm')

@section('title', 'اضافة مشترك جديد')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Clients</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

<form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('admin.clients._form', [
        'button' => 'اضافة',
    ])
</form>

@endsection