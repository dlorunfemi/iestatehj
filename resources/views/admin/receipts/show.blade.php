    <script>
        function myPrint(az, za) {
            var restorePage = document.body.innerHTML;
            var printContent = document.getElementById(az).innerHTML;
            document.body.innerHTML = printContent;
            var printIcon = document.getElementById(za).innerHTML;
            printIcon.style.display = 'none';
            window.print();
            document.body.innerHTML = restorePage;
        }
    </script>


    <section class="container" id="pr" >
        <div id="rp">
            <style type="text/css">
                #rp i {
                    position: absolute;
                    top: 50%;
                    left: 78%;
                }
                #rp table{
                    border: 2px solid rgba(0,0,0,1);
                    border-radius: 20px;
                    border-collapse: unset;
                    padding: 20px;
                    margin: auto;
                    width: 700px;
                    
                }
                #rp .no {
                    border: 0 !important;
                    border-radius: 0 !important;
                    padding: 0 !important;
                    margin: 0 !important;
                    width: auto !important;
                }
                #rp td{
                    padding: 5px 0;
                }
                #rp .receipt-title {
                    color: rgba(255,255,255,1);
                    background-color: rgba(0,0,0,1);
                    border-radius: 10px;
                    height: 40px;
                    margin: 10px;
                    padding-top: 10px;
                    padding-right: 30px;
                    padding-bottom: 10px;
                    padding-left: 30px;
                    font-family: Michroma;
                    font-size: 24px;
                    font-weight: bold;
                    text-transform: uppercase;
                }
                #rp .border {
                    padding: 10px;
                    border: 2px solid rgba(0,0,0,1) !important;
                    border-radius: 2px;
                }
                #rp .content-border {
                    margin: 5px;
                    padding: 5px;
                    height: 30px;
                    font-family: "Times New Roman", Times, serif;
                    font-size: 18px;
                    font-weight: bold;
                    color: rgba(0,0,0,1);
                    font-style: italic;
                    border-top-width: 1px;
                    border-bottom-width: 1px;
                    border-top-style: solid;
                    border-right-style: solid;
                    border-bottom-style: solid;
                    border-left-style: solid;
                    border-top-color: rgba(51,51,51,1);
                    border-bottom-color: rgba(51,51,51,1);
                    border-left-width: 1px;
                    border-left-color: #000;
                    border-right-width: 1px;
                    border-right-color: #000;
                }
                #rp .sub-text {
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 13px;
                    font-weight: bold;
                    color: rgba(0,0,0,1);
                }
                .border-bottom {
                    border-bottom: 1px solid #000 !important;
                }
            </style>
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('images/logo.jpeg') }}" alt="logo" class="img img-responsive">
                    </div>
                    <div class="d-flex justify-content-end" id="pi">
                    <button onclick="myPrint('pr', 'pi')"><span class="fas fa-print fa-1x text-dark"></span></button>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class=""><span class="receipt-title">Receipt</span></p>
                </div>
                <table >
                    <tbody>
                        <tr>
                            <td align="left" class="sub-text">Receipt No. : <span class="text-muted">{{ $receipt->id }}</span></td>
                            <td align="right" class="sub-text">Date : <span class="text-muted">{{ $receipt->payment_date }}</span></td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td class="content-border">Received from</td>
                            <td align="center" class="content-border">{{ $receipt->tenant->name }}</td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td class="content-border">the sum of</td>
                            <td align="center" class="content-border">{{ ucwords($cT->toWords($receipt->amount_paid, 'NGN')) }} Only</td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td colspan="2" class="content-border" style="line-height:26px;">Being full/part/balance payment for : {{ ucwords($receipt->apartment->description) }} of {{ ucwords($receipt->property->name) }}</td>
                        </tr>
                        <tr><td></td></tr>
                        <tr>
                            <td colspan="2" class="sub-text border-bottom">Tenancy Period: <span class="text-center text-muted">{{ $receipt->rent_from }} - {{ $receipt->rent_to }}</span></td>
                        </tr>
                        <!-- <tr><td></td></tr> -->
                        <tr>
                            <td class="p-0 sub-text"><span class="border">{{ $receipt->amount_paid }}</span></td>
                            <td class="" align="right">
                                <p class="pt-2 mb-0 sub-text">Officer's Name: <span class="text-center text-muted">{{ $receipt->created_by->name }}</span></p>
                                <p class="pt-2 mb-0 sub-text">Accountant in Charge: <span class="text-center text-muted">{{ $receipt->created_by->name }}</span></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

