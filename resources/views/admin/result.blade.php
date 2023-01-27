@extends('layouts.adm')

@section('title')
<div class="d-flex justify-content-between">
    <h2>المشتركين</h2>
</div>
@endsection

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active">clients</li>
</ol>
@endsection

@section('content')
    

    <table class="table">
        <thead>
            <tr>
                <th>اسم المشترك</th>
                <th>رقم الجوال</th>
                <th>قيمة الاشتراك</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
            <tr>
                <td>{{ $client->name }}</td>
                <td>{{ $client->phone_number }}</td>
                <td>{{ $client->deserved_amount }}</td>
                <td>
                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-dark">تعديل</a>
                </td>
                <td>
                <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-dark">عرض الدفع</a>
                </td>
                <td>
                <a href="{{ route('payments.create', $client->id) }}" class="btn btn-sm btn-dark">اضافة دفعة</a>
                </td>
                <td>
                    <form action="{{ route('clients.destroy', $client->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger">حدف</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    {{ $clients->links() }}
    

@endsection