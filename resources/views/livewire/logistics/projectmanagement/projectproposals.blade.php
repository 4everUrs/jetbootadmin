<div>
    <!DOCTYPE html>
    <html>
    
    <head>
        <meta charset="utf-8">
        <title>Project</title>
        <style type="text/css">
            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                }
            }
        </style>
    </head>
    
    <body style="margin: 10px 0;font-size: 16px;line-height: 1.5em;">
        <table style="margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
            <thead>
                <tr>
                    <th colspan="2"
                        style="font-size: 30px;line-height: 1.1em;padding: 10px 0; color: #FFFFFF; text-align: bottom; background-color: #3B4E87; print-color-adjust: exact;">
                        PROJECT PROPOSAL LETTER</th>
                    <th style="vertical-align: top;" rowspan="3"><img width="80"
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
    
        <div style="width: 650px;margin: 30px auto 0px auto;background: #ffffff; font-size: 16px; line-height: 1.5em;">
            <p style="margin: 0px; font-size: 20px;"><strong>Project Name: {{$proposal->title}}</strong></p>
            <p style="margin: 40px 0px 0px; font-size: 20px;"><strong>Date: {{Carbon\Carbon::parse(now())->toFormattedDateString()}}</strong></p>
            <p style="margin: 20px 0px 0px;">This project proposal has been written to include all of the necessary costs
                involved with the {{$proposal->title}} project, which we would like to begin pursuing due to [REASON OF PROJECT] .
                Cost Associated with the Project have been broken down and itemized in this project proposal below and
                justification has been provided with each cost element . Should you have any questions related to this
                budget proposal, please contact the undersigned.</p>
            <p style="margin: 30px 0px 0px;"><strong>1.PROJECT DESCRIPTION</strong></p>
            <p style="margin: 20px 0px 0px;">{{$proposal->description}}</p>
            <p style="margin: 30px 0px 0px;"><strong>2.PERIOD OF PERFORMANCE</strong></p>
            <p style="margin: 20px 0px 0px;">@date($proposal->start_date) - {{Carbon\Carbon::parse($proposal->start_date)->addMonths($proposal->dutation)->toFormattedDateString()}}</p>
            <p style="margin: 20px 0px 0px;">The budget set forth in this Project Proposal covers the period of performance
                for the project or {{$proposal->duration}} months of effort.</p>
            <p style="margin: 30px 0px 0px;"><strong>3.COST ELEMENT</strong></p>
            <p style="margin: 0px 0px 0px;">The following are necessary cost elements of the Project:</p>
        </div>
    
        <table
            style="width: 4px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 0px;">
            <thead>
                <tr>
                    <th
                        style="padding: 5px;border: 1px solid #3B4E87;width: 220px; font-size: 20px;color: #ffffff; text-align: center; background-color: #3B4E87; print-color-adjust: exact; ">
                        Expenses</th>
                    <th
                        style="padding: 5px;border: 1px solid #3B4E87;width: 100px;font-size: 20px;color: #ffffff;background-color: #3B4E87; text-align: center; print-color-adjust: exact; ">
                        Total</th>
                    <th
                        style="padding: 5px;border: 1px solid #3B4E87;width: 290px;font-size: 20px;color: #ffffff;background-color: #3B4E87; text-align: center; print-color-adjust: exact; ">
                        Remarks</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">PERSONNEL</td>
                    <td style="border: 1px solid; padding: 0 10px;">{{$details[0]->personnel}}</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">ITEM(s) </td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
                @foreach ($details as $detail)
                    <tr>
                        <td style="border: 1px solid; padding: 0 10px;">{{$detail->item_name}} x{{$detail->quantity}}</td>
                        <td style="border: 1px solid; padding: 0 10px;">{{$detail->unit_cost * $detail->quantity}}</td>
                        <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    </tr>
                @endforeach
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">MATERIALS,SUPPLIES & EQUIPMENT</td>
                    <td style="border: 1px solid; padding: 0 10px;">{{$details[0]->materials}}</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;"><strong>Subtotal</strong></td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">OTHER EXPENSES</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">GST (18%)</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;"><strong>TOTAL EXPENDITURES</strong></td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                    <td style="border: 1px solid; padding: 0 10px;">&nbsp;</td>
                </tr>
    
            </tbody>
        </table>
    
        <div style="width: 680px;margin: 30px auto 0px auto;background: #ffffff;">
            <p style="margin: 0px; font-size: 16px;">Sincelery,</p>
            <p style="margin: 10px 0px 0px; font-size: 16px;">[Your Name]</p>
        </div>
    
    
    </body>
    
    </html>
</div>
