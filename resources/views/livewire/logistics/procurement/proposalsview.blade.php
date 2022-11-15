<div>
    <!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="utf-8">
        <title>Budget</title>
        <style type="text/css">
            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                    
                }
            }
            .page-break {
            page-break-after: always;
            }
        </style>
    </head>
    
    <body style="margin: 10px 0;font-size: 10px;line-height: 1.2em;">
        <table style="width: 400px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
            <thead>
                <tr>
                    <th colspan="2"
                        style="font-size: 25px;line-height: 1.1em;padding: 10px 0; color: #FFFFFF; text-align: middle; background-color: #3B4E87; print-color-adjust: exact;">
                        BUDGET PROPOSAL LETTER</th>
                    <th style="vertical-align: top;" rowspan="3"><img width="120"
                            style="vertical-align:50%; display: block; margin-left: auto;"
                            src="{{asset('dist/img/AdminLTELogo.png')}}" alt="LOGO"></th>
                </tr>
                <tr>
                    <td style="padding: 0px;">&nbsp;</td>
                    <td style="padding: 0px;"></td>
                    <td
                        style="text-align: center;line-height: 1.2em;padding: 10px 0px; text-transform: uppercase; font-size: 30px;line-height: 1.1em; color: #3B4E87;">
                        &nbsp;</td>
                </tr>
            </thead>
        </table>
    
        <div style="width: 680px;margin: 30px auto 0px auto;background: #ffffff; font-size: 16px; line-height: 1.5em;">
            <p style="margin: 0px; font-size: 20px;"><strong>Project Name: {{$details->proposalname}}</strong></p>
            <p style="margin: 40px 0px 0px; font-size: 20px;"><strong>Date: {{Carbon\Carbon::parse(now())->toFormattedDateString()}}</strong></p>
            <p style="margin: 20px 0px 0px;">This budget proposal has been written to include all of the necessary costs
                involved with the {{$details->proposalname}} project, which we would like to begin pursuing due to Acquisition of new item .
                Cost Associated with the Project have been broken down and itemized in this project proposal below and
                justification has been provided with each cost element . Should you have any questions related to this
                budget proposal, please contact the undersigned.</p>
            <p style="margin: 30px 0px 0px;"><strong>1.PROJECT DESCRIPTION</strong></p>
            <p style="margin: 20px 0px 0px;">{{$details->description}}</p>
            <p style="margin: 30px 0px 0px;"><strong>2.PERIOD OF PERFORMANCE</strong></p>
            <p style="margin: 20px 0px 0px;">{{Carbon\Carbon::parse(now())->toFormattedDateString()}} - {{Carbon\Carbon::parse(now())->addMonths(1)->toFormattedDateString()}}</p>
            <p style="margin: 20px 0px 0px;">The budget set forth in this Budget Proposal covers the period of performance
                for the project or 1 months of effort.</p>
                <div class="page-break"></div>
            <p style="margin: 30px 0px 0px;"><strong>3.COST ELEMENT</strong></p>
            <p style="margin: 0px 0px 0px;">The following are necessary cost elements of the Project:</p>
        </div>
    
        <table
            style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
            <thead>
                <tr>
                    <th
                        style="padding: 3px 10px;border: 1px solid #3B4E87;width: 155x;font-size: 15x;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        Item Name</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 155x;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        QTY</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 155x;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        UNIT PRICE</th>
                    <th
                        style="padding: 3px  10px;;border: 1px solid #3B4E87;width: 155x;font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                        TOTAL</th>
                </tr>
            </thead>
            <tbody>
        
              
            
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">{{$details->item_name}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$details->quantity}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: right;">@print($details->unit_cost)</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2; text-align: right;">
                        @print($details->subtotal)</td>
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
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2;">&nbsp;</td>
                </tr>
        
                <tr>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 0 10px;">&nbsp;</td>
                    <td style="border: none; padding: 0 10px;">SUBTOTAL</td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">
                        @print($details->subtotal)</td>
                </tr>
        
                <tr>
                    <td style="background-color: #808080; padding: 3px 10px; color: #ffffff;" colspan="2"></td>
                    <td style="border: none; padding: 0 10px;">TAX</td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">@print($details->tax)</td>
                </tr>
        
                <tr>
                    <td style="border: 1px solid #c6c6c6; padding: 3px 10px;     vertical-align: top;" colspan="2" rowspan="4">
                        </td>
                    <td style="border: none; padding: 0 10px;">SHIPPING</td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">@print($details->shipping_fee)</td>
                </tr>
        
                <tr>
                    <td style="border: none; padding: 0 10px;">OTHER</td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">0</td>
                </tr>
        
                <tr>
                    <td style="border: none; padding: 0 10px;"></td>
                    <td style="border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 0 10px; height: 3px;"
                        colspan="2"></td>
                </tr>
        
                <tr>
                    <td style="border: none; padding: 0 10px;"><strong>TOTAL</strong></td>
                    <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">
                       @print($details->proposedamount) </td>
                </tr>
        
            </tbody>
        </table>
    
        <div style="width: 680px;margin: 30px auto 0px auto;background: #ffffff;">
            <p style="margin: 0px; font-size: 16px;">Sincelery,</p>
            <p style="margin: 10px 0px 0px; font-size: 16px;">{{Auth::user()->name}}</p>
        </div>
    
    
    </body>
    
    </html>
</div>
