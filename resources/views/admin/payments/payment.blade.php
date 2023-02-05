<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/payment/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/payment/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/payment/css/bootstrap.min.css.map')}}">
    <link rel="stylesheet" href="{{asset('assets/payment/css/style.css')}}">
    <title>Document</title>
</head>

<body>
    <div class="receipt-template d-flex flex-column gap-4">
        <header class="receipt-header d-flex justify-content-center align-items-center flex-column gap-3">
            <span>شبكة الرشيد لخدمات الإنترنت</span>
            <div class="d-flex justify-content-between w-100">
                <div class="market-info">
                    <table>
                        <tr>
                            <td>العنــــــــوان</td>
                            <td>:</td>
                            <td>سوبر ماركت الرشيد</td>
                        </tr>
                        <tr>
                            <td>رقم الجوال</td>
                            <td>:</td>
                            <td dir="ltr">059-828-8836</td>
                        </tr>
                    </table>
                </div>
                <div class="receipt-info">
                    <table>
                        <tr>
                            <td>رقم الوصل</td>
                            <td>:</td>
                            <td>{{$invoice->id}}</td>
                        </tr>
                        <tr>
                            <td>التـــــــــــاريخ</td>
                            <td>:</td>
                            <td dir="ltr">{{date('d-m-Y', strtotime($invoice->invoice_date))}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </header>
        <main class="receipt-content d-flex flex-column gap-3">
            <span>وصل اشتراك شهري</span>
            <div class="receipt-text d-flex flex-column pe-5 gap-2">
                <div class="d-flex">
                    <span>ستلمت من السيد :</span><p>{{$invoice->client->name}}</p><span>مبلغًا وقدره:</span><p>{{ $invoice->amount}}شيكل </p>
                </div>
                <div>
                    <span>لإشتراكـــــــــــــــــــــــــــــــــــــــــــــــــــــــه لمدة شهر من تاريخ الوصل.</span>
                </div>
            </div>
        </main>
        <footer class="receipt-footer">
            <span class="fw-bolder">059-828-8836</span>
        </footer>
    </div>
    
    <a href="{{route('pdf', $invoice->id)}}" class="btn btn-sm btn-primary">طباعة</a>
    <a href="{{route('payments.index', $invoice->id)}}" class="btn btn-sm btn-primary">صفحة الدفعات</a>
    {{-- <script src="{{asset('assets/payments/js/all.min.js')}}"></script>
    <script src="{{asset('assets/payments/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/payments/js/bootstrap.bundle.min.js.map')}}"></script> --}}
</body>

</html>