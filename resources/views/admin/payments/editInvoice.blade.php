@extends('layouts.adm')

@section('title', 'تعديل دفعة')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">payments</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')

    <form action="{{ route('invoices.update', $invoice->id) }}" method="post">
        @csrf
        @method('put')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="">قيمة الدفعة</label>
            <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount"
                value="{{ old('amount', $invoice->amount) }}">
            @error('amount')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>

    </form>

@endsection