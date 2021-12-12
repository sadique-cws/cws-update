<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>receipt</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            margin-top:20px;
            color: #2e323c;
            background: #f5f6fa;
            position: relative;
            height: 100%;
        }
        .invoice-container {
            padding: 1rem;
        }
        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #2e323c;
        }
        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }
        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #1c232e;
            margin: 0;
        }
        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #f5f6fa;
        }
        .invoice-container .invoice-details .invoice-num {
            /* text-align: right; */
            font-size: 0.8rem;
            /* margin-left: 20px; */
        }
        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }
        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #ffffff;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }
        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #9fa8b9;
        }
        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }
        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #f5f6fa;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }
        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }


        .custom-table {
            border: 1px solid #e0e3ec;
        }
        .custom-table thead {
            background: #007ae1;
        }
        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }
        .custom-table > tbody tr:hover {
            background: #fafafa;
        }
        .custom-table > tbody tr:nth-of-type(even) {
            background-color: #ffffff;
        }
        .custom-table > tbody td {
            border: 1px solid #e6e9f0;
        }


        .card {
            background: #ffffff;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .text-success {
            color: #00bb42 !important;
        }

        .text-muted {
            color: #9fa8b9 !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top: 100px">
        <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="invoice-container">
                                <div class="invoice-header">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        {{-- <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                                            <div class="invoice-details">
                                                <address>
                                                    {{ $data->student->name }}<br>
                                                    {{ $data->student->contact }}
                                                </address>
                                            </div>
                                        </div> --}}
                                        <div class="col-xl-12 d-flex col-lg-12 col-md-12 col-sm-12 col-12">
                                            {{-- <div class="div">

                                            </div> --}}
                                            <div class="invoice-details w-100 d-lg-flex">
                                                <div class="invoice-details w-50 p-0">
                                                    {{-- <address> --}}
                                                        <h4>{{ $data->student->name }}</h4>
                                                        <p>{{ $data->student->contact }}</p>
                                                    {{-- </address> --}}
                                                </div>
                                                <div class="invoice-num 0 ms-lg-0 ms-5 text-start">
                                                    @if ($data->paytm !== null)
                                                        <div><strong>TXNID</strong> - {{ $data->paytm->TXNID }}</div>
                                                    @endif
                                                    <div class="mt-3 h6"><strong>Payment Date :</strong>
                                                    @php
                                                        $date = new DateTime($data->payment_date);
                                                        echo $date->format('d M Y');
                                                    @endphp</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                                <div class="invoice-body">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-borderless custom-table m-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Due Month</th>
                                                            <th>Payment Type</th>
                                                            <th>Satus</th>
                                                            <th>Fee</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                @php
                                                                    $date = new DateTime($data->dues_month);
                                                                    echo $date->format('d M Y');
                                                                @endphp
                                                            </td>
                                                            <td>{{ $data->payment_mode }}</td>
                                                            <td>{{ $data->status }}</td>
                                                            <td>{{ $data->amount }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Row end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
