@extends('layouts.adm')

@section('title', 'اضافة دفعة جديدة')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Payments</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection

@section('content')

<form action="{{ route('payments.store', $payment->id ?? null) }}" method="post" enctype="multipart/form-data">
    @csrf
    
    @include('admin.payments._form', [
        'button' => 'اضافة',
    ])
</form>

@endsection