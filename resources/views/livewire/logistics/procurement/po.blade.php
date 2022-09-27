<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="{{asset('dist/css/pdf.css')}}">
</head>

<body>
    
            <div class="document active">
                <div class="spreadSheetGroup">
                    <table class="shipToFrom mt-4">
                       <tr>
                        <th>
                            <img src={{asset('dist/img/logo-full.png')}} alt="AdminLTE Logo" width="220">
                        </th>
                        <th>
                            <h1>Purchase Order</h1>
                            <h4>P.O No.:{{$po->po_id}}</h4>
                        </th>
                       </tr>
                    </table>
                    
    
                    <table class="shipToFrom mt-4">
                        <thead style="font-weight:bold">
                            <tr>
                                <th>TO</th>
                                <th>SHIP TO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="width:50%">
                                    Name:{{$supplier->name}}<br />
                                    Location:{{$supplier->address}}<br />
                                    Email:{{$supplier->email}}<br />
                                    Contact:{{$supplier->phone}}<br />
                                </td>
                                <td style="width:50%">
                                    Tech-Trendz Services<br />
                                    Lot 762 cor. Topaz St. and Sapphire St.<br />
                                    Millionaire’s Village, Novaliches Quezon City,<br />
                                    Contact #: 463-8787, 799-6617
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style="visibility:hidden" />
    
                    <table class="proposedWork" width="90%" style="margin-top:20px">
                        <thead>
                            <th>QTY</th>
                            <th>DESCRIPTION</th>
                            <th>COST</th>
                            <th class="amountColumn">TOTAL</th>
    
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->item}}</td>
                                <td>{{$item->cost}}</td>
                                <td>{{$item->totalcost}}</td>
                            </tr>
                            @empty
    
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none;text-align:right">SUBTOTAL:</td>
                                <td class="amount subtotal">0.00</td>
                                <td class="docEdit"></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none;text-align:right">SALES TAX:</td>
                                <td class="amount">0.00</td>
                                <td class="docEdit"></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none;text-align:right;white-space:nowrap">SHIPPING & HANDLING:</td>
                                <td class="amount">0.00</td>
                                <td class="docEdit"></td>
                            </tr>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none;text-align:right">TOTAL:</td>
                                <td class="total amount">0.00</td>
                                <td class=" docEdit"></td>
                            </tr>
                        </tfoot>
                    </table>
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td style="50%" style="vertical-align:top">
                                    <table style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:left">
                                                    <p>1. Please send two copies of your invoice.</p>
                                                    <p>2. Enter this order in accordance with the prices, terms, delivery
                                                        method,
                                                        and specifications listed above.</p>
                                                    <p>3. Please notify us immediately if you are unable to ship as
                                                        specified.
                                                    </p>
                                                    <p>4. Send all correspondence to:</p>
                                                    <p style="padding-left:20px">Tech-Trendz Services<br />
                                                        Lot 762 cor. Topaz St. and Sapphire St.<br />
                                                        Millionaire’s Village, Novaliches Quezon City,<br />
                                                        Contact #: 463-8787, 799-6617
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td style="padding-left:40px; width:50%; vertical-align:top">
                                    <table style="width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:left">
                                                    <strong>COMMENTS:</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:left;border: 1px solid #000">Please
                                                    ship all goods to our office</td>
                                            </tr>
                                            <tr>
                                                <td style="padding-top:60px">
                                                    Authorized by: __________________ Date: __________
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        
</body>
</html>
