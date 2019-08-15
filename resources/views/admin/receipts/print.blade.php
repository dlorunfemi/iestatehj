<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('global.site_title') }}</title>
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

</head>

<body onload="window.print();">
    <div class="wrapper">
        <section class="content invoice">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                    <h4>
                        <img src="{{ asset('images/logo.png') }}" class="img-responsive" width="33%" alt="Logo">
                        <small class="float-right">Date: {{ now() }}</small>
                    </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>Remi Olofa & Co</strong><br>
                        29, Lebanon Street, Old Gbagi,<br>
                        Ibadan, Oyo State.<br>
                        Phone: +234 (0) 805 624 2985<br>
                        Email: info@remiolofa.com
                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $receipt->tenant->name }}</strong><br>
                        <br>
                        <br>
                        Phone: {{ $receipt->tenant->phone }}<br>
                        Email: {{ $receipt->tenant->email }}
                    </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <br>
                    <b>Receipt No: </b><span class="text-muted">{{ $receipt->id }}</span><br>
                    <b>Payment Date: </b><span class="text-muted">{{ $receipt->payment_date }}</span><br>
                    <b>Payment Type: </b><span class="text-muted">{{ $receipt->payment_type }}</span>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <th>Qty</th>
                        <th>Description</th>
                        <th>Tenancy Period: </th>
                        <th>Serial #</th>
                        <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                        <td>Being full/part/balance payment for : <br>{{ ucwords($receipt->apartment->description) }} of <br> {{ ucwords($receipt->property->name) }}</td>
                        <td><span class="text-center text-muted">{{ $receipt->rent_from }}</span></td>
                        <td><span class="text-center text-muted"> {{ $receipt->rent_to }}</span></td>
                        <td>NGN{{ $receipt->amount_paid }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-6">
                    <p class="lead mt-4">Total Amount in words:
                    <span class="text-muted well well-sm no-shadow">
                        {{ ucwords($wc) }} Only
                    </span></p>
                    <p class="pt-2 mb-0 sub-text">Officer's Name: <span class="text-center text-muted">{{ $receipt->is_confirm_by->name }}</span></p>
                    <p class="pt-2 mb-0 sub-text">Accountant in Charge: <span class="text-center text-muted">{{ $receipt->is_confirm_by->name }}</span></p>
                    </div>

                    <!-- /.col -->
                    <div class="col-3 offset-3">

                    <div class="table-responsive mt-4">
                        <table class="table">
                            <tr>
                                <th>Total:</th>
                                <td>NGN{{ $receipt->amount_paid }}</td>
                            </tr>
                        </table>
                        <hr>
                    </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        </div>
                </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
