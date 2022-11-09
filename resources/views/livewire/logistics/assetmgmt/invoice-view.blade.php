<div>
    <!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="utf-8">
        <title>Invoice</title>
    </head>
    
    <body style="margin: 50px 0;font-size: 16px;line-height: 1.5em;">
        <table style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
            <thead>
                <tr>
                    <th colspan="2"
                        style="font-size: 35px;line-height: 1.1em;padding: 10px 0; color: #3B4E87; text-align: left;">
                        Tech-Trendz Services</th>
                    <th
                        style="text-align: center;line-height: 1.2em;padding: 10px 0px; text-transform: uppercase; font-size: 30px;line-height: 1.1em; color: #3B4E87;">
                        Invoice</th>
                </tr>
                <tr>
                    <td style="padding: 0px;">Lot 762 cor. Topaz St. and Sapphire St</td>
                    <td style="padding: 0px;"></td>
                    <th style="vertical-align: top;" rowspan="3"><img width="100"
                            style="vertical-align:middle; display: block;"
                            src="{{asset('dist/img/AdminLTELogo.png')}}" alt="LOGO"></th>
    
                </tr>
                <tr>
                    <td style="padding: 0px;" colspan="2">www.techtrendzph.com</td>
                </tr>
    
                <tr>
                    <td colspan="2">Phone: 463-8787, 799-6617</td>
                </tr>
            </thead>
        </table>
    
        <table
            style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 50px;">
            <thead>
                <tr>
                    <th style="padding: 5px;font-size: 20px;color: #000000; text-align: left;border-bottom: 1px solid;">SHIP
                        TO</th>
                    <th style="min-width: 100px;padding: 0;border: none;"></th>
    
                </tr>
            </thead>
            @if (!empty($invoice))
                @if (!empty($orderDetails))
            <tbody>
                <tr>
                    <td style="border: none; padding: 3px 10px;">{{$orderDetails->recipient}}</td>
                    <td></td>
                    
                        <td style="border: none; padding: 3px 10px;font-weight: 700;text-align: right;">Invoice No: #INV{{$invoice->id}}
                        </td>
                    
                    
                </tr>
    
                <tr>
                    <td style="border: none; padding: 3px 10px;">{{$orderDetails->address}}</td>
                    <td></td>
                    <td style="border: none; padding: 3px 10px;font-weight: 700;text-align: right;">Invoice Date: @date($invoice->created_at)
                    </td>
                </tr>
    
                <tr>
                    <td style="border: none; padding: 3px 10px;">{{$orderDetails->email}}</td>
                    <td></td>
                    <td style="border: none; padding: 3px 10px;font-weight: 700;text-align: right;">Due Date:
                        {{Carbon\Carbon::parse($invoice->created_at)->addMonths(3)->toFormattedDateString()}}</span></td>
                </tr>
                
                <tr>
                    <td style="border: none; padding: 3px 10px;">{{$orderDetails->phone}}</td>
                    <td></td>
                    <td style="border: none; padding: 3px 10px;"></td>
                </tr>
    
    
            </tbody>
            @endif
        @endif
        </table>
    
        <table
            style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
            <thead>
                <tr>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        DESCRIPTION</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 50px;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        QTY</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 110px;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        UNIT PRICE</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 90px;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        TOTAL</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($orderItems))
                    @foreach ($orderItems as $item)
                    <tr>
                        
                        <td style="border: 1px solid; padding: 0 10px;">{{$item->item_name}}</td>
                        <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->qty}}</td>
                        <td style="border: 1px solid; padding: 0 10px;">@print($item->amount)</td>
                        <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2;">@print($item->amount*$item->qty)</td>
                    </tr>
                    @endforeach
                @endif  
           
    
                <tr>
    
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2;">&nbsp;</td>
                </tr>
    
                <tr>
    
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2;">&nbsp;</td>
                </tr>
    
                <tr>
    
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2;">&nbsp;</td>
                </tr>
    
                <tr>
    
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 5px 10px;">SUBTOTAL</td>
                    <td
                        style="border: none; padding: 5px 10px; background-color: #F2F2F2; text-align: right; border-bottom: 1px solid #000;">
                        @print($subtotal)</td>
                </tr>
    
                <tr>
                    <td style="padding: 3px 10px; vertical-align: top;" rowspan="6"><strong>Thank you for your
                            purchase!</strong></td>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 5px 10px;">DISCOUNT</td>
                    <td
                        style="border: none; padding: 5px 10px; background-color: #F2F2F2; text-align: right; border-bottom: 1px solid #000;">
                        @print(0)</td>
                </tr>
    
    
                <tr>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 5px 10px;">TAX RATE</td>
                    <td
                        style="border: none; padding: 5px 10px; background-color: #F2F2F2; text-align: right; border-bottom: 1px solid #000;">
                        12%</td>
                </tr>
    
                <tr>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 5px 10px;">TOTAL TAX</td>
                    <td style="border: none; padding: 5px 10px; background-color: #F2F2F2; text-align: right;">@print($tax)</td>
                </tr>
    
                <tr>
                    <td style="border: none; padding: 0 10px;"></td>
                    <td style="border-bottom: 3px solid #000;" colspan="2"></td>
                </tr>
    
                <tr>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 0 10px;"><strong>Grand Total</strong></td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">@print($grandtotal)</td>
                </tr>
    
            </tbody>
    
    
            <table
                style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 50px;">
                <thead>
                    <tr>
                        <th style="padding: 5px;font-size: 20px;color: #000000; text-align: left;border-bottom: 1px solid;">
                            Terms & Instruction</th>
                        <th style="min-width: 100px;padding: 0;border: none;"></th>
    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="border: none; padding: 3px 10px;">Please pay before due date</td>
                        <td></td>
                        <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    </tr>
    
                    
    
                </tbody>
            </table>
        </table>
    
    </body>
    
    </html>
</div>
