<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0 !important;
            padding: 0;
            box-sizing: border-box;
            font-weight: 600;
            font-family: 'XBRiyaz', sans-serif;
        }


        body {
            min-height: 100vh;
        }

        .receipt-template {
            border-left-width: 1px;
            border-top-width: 1px;
            border-right-width: 3px;
            border-bottom-width: 3px;
            border-color: #ccc;
            border-style: solid;
            padding: 0.5rem 5rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .receipt-header>span,
        .receipt-content>span {
            width: 80%;
            border: 0.3px solid #707070;
            box-shadow: 2px 2px 1px #707070;
            vertical-align: middle;
            text-align: center;
            padding: 0.5rem;
            font-size: 27px;
        }

        table tr td {
            font-size: 18px;
            text-align: center;
            vertical-align: middle;
        }

        table tr td:nth-child(3) {
            padding-right: 1rem;
        }

        .receipt-content>span {
            width: 35%;
            align-self: center;
        }

        .receipt-content>div>p {
            border-bottom: 0.3px solid #707070;
            width: 250px;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
        }

        .receipt-text {
            font-size: 18px;
            width: 90%;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            padding-inline-end: 2rem;
        }

        .receipt-text p {
            display: inline-block;
            border-bottom: 0.3px solid #707070;
            vertical-align: middle;
            text-align: center;
            flex: 1;
        }

        .receipt-header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 1rem;
        }

        .receipt-content {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
    </style>
    <title>{{"Invoice-$invoice->id"}}</title>
</head>

<body>
    
    <div class="receipt-template">
        <header class="receipt-header">
            <span >شبكة الرشيد لخدمات الإنترنت</span>
            <div style="display: flex; justify-content: space-between; width: 100%;">
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
        <main class="receipt-content">
            <span>وصل اشتراك شهري</span>
            <div class="receipt-text">
                <div style="display: flex;">
                    <span>استلمت من السيد:</span>
                    <p>{{$invoice->client->name}}</p><span>مبلغًا وقدره:</span>
                    <p>{{$invoice->amount}}</p>
                </div>
                <div>
                    <span>لإشتراكـــــــــــــــــــــــــــــــــــــــــــــــــــــــه لمدة شهر من تاريخ
                        الوصل.</span>
                </div>
            </div>
        </main>
        <footer class="receipt-footer">
            <span style="font-weight: 700;">059-828-8836</span>
        </footer>
    </div>
</body>

</html>