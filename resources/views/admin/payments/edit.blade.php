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

    <form action="{{ route('payments.update', $payment->id) }}" method="post" enctype="multipart/form-data">
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
            <label for="">يناير</label>
            <input type="date" class="form-control @error('january') is-invalid @enderror" name="january"
                value="{{ old('january', $payment->january) }}">
            @error('january')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">فبراير</label>
            <input type="date" class="form-control @error('february') is-invalid @enderror" name="february"
                value="{{ old('february', $payment->february) }}">
            @error('february')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">مارس</label>
            <input type="date" class="form-control @error('march') is-invalid @enderror" name="march"
                value="{{ old('march', $payment->march) }}">
            @error('march')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">ابريل</label>
            <input type="date" class="form-control @error('april') is-invalid @enderror" name="april"
                value="{{ old('april', $payment->april) }}">
            @error('april')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">مايو</label>
            <input type="date" class="form-control @error('may') is-invalid @enderror" name="may"
                value="{{ old('may', $payment->may) }}">
            @error('may')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">يونيو</label>
            <input type="date" class="form-control @error('june') is-invalid @enderror" name="june"
                value="{{ old('june', $payment->june) }}">
            @error('june')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">يوليو</label>
            <input type="date" class="form-control @error('july') is-invalid @enderror" name="july"
                value="{{ old('july', $payment->july) }}">
            @error('july')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">اغسطس</label>
            <input type="date" class="form-control @error('ougust') is-invalid @enderror" name="ougust"
                value="{{ old('ougust', $payment->ougust) }}">
            @error('ougust')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">سبتمبر</label>
            <input type="date" class="form-control @error('september') is-invalid @enderror" name="september"
                value="{{ old('september', $payment->september) }}">
            @error('september')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="">اكتوبر</label>
            <input type="date" class="form-control @error('october') is-invalid @enderror" name="october"
                value="{{ old('october', $payment->october) }}">
            @error('october')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">نوفمبر</label>
            <input type="date" class="form-control @error('november') is-invalid @enderror" name="november"
                value="{{ old('november', $payment->november) }}">
            @error('november')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">ديسمبر</label>
            <input type="date" class="form-control @error('december') is-invalid @enderror" name="december"
                value="{{ old('december', $payment->december) }}">
            @error('december')
                <p class="invalid-feedback">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>

    </form>

@endsection
