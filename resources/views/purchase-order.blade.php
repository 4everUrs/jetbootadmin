<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Purchase Order</title>
</head>

<body style="margin: 20px 0;font-size: 16px;line-height: 1.2em;">
    <table style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
        <thead>
            <tr>
                <th style="text-align: left;line-height: 1.2em;padding: 10px 0px;"><img width="250"
                        style="vertical-align:middle; display: block;" src="{{asset('dist/img/logo-full.png')}}"
                        alt="LOGO"></th>
                <th colspan="2"
                    style="text-align: right;font-size: 35px;line-height: 1.1em;padding: 10px 0; color: #3B4E87">
                    Purchase Order</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 0px;">Tech-Trendz Services</td>
                <td style="padding: 0px;"></td>
                <td style="padding: 0px;  text-align: right;">Date:<span
                        style="display: inline-block; padding: 0 10px; border: 1px solid #000000; width: 100px; margin-left: 7px;">@date($po->created_at)</span>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px;">Lot 762 cor. Topaz St. and Sapphire St.</td>
                <td style="padding: 0px;"></td>
                <td style="padding: 0px; text-align: right;">PO#<span
                        style="display: inline-block; padding: 0 10px; border: 1px solid #000000; border-top-width: 0px; width: 100px; margin-left: 7px;">{{$po->po_id}}</span>
                </td>
            </tr>
            <tr>
                <td colspan="3">Millionaire’s Village, Novaliches Quezon City,</td>
            </tr>
            <tr>
                <td colspan="3">Contact #: 463-8787, 799-6617</td>
            </tr>
            <tr>
                <td colspan="3">Websites: www.vendor.techtrendzph.com</td>
            </tr>

        </tbody>
    </table>

    <table
        style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 50px;">
        <thead>
            <tr>
                <th
                    style="padding: 5px;border: 1px solid #3B4E87;width: 280px;font-size: 20px;color: #ffffff;background-color: #3B4E87;">
                    Vendor</th>
                <th style="min-width: 100px;padding: 0;border: none;"></th>
                <th
                    style="padding: 5px;border: 1px solid #3B4E87;width: 280px;font-size: 20px;color: #ffffff;background-color: #3B4E87;">
                    Ship To</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: none; padding: 3px 10px;">{{$supplier->name}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;">Tech-Trendz Services</td>
            </tr>

            <tr>
                <td style="border: none; padding: 3px 10px;">{{$supplier->address}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;">Lot 762 cor. Topaz St. and Sapphire St.</td>
            </tr>

            <tr>
                <td style="border: none; padding: 3px 10px;">{{$supplier->email}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;">Millionaire’s Village, Novaliches Quezon City,</span></td>
            </tr>
            <tr>
                <td style="border: none; padding: 3px 10px;">{{$supplier->phone}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;">Contact #: 463-8787, 799-6617</td>
            </tr>
        </tbody>
    </table>

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
           
            @foreach ($items as $item)
                <tr>
                    <td style="border: 1px solid; padding: 0 10px;">{{$item->item}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->qty}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: right;">@print($item->cost)</td>
                    <td style="border: 1px solid; padding: 0 10px;  background-color: #F2F2F2; text-align: right;">@print($item->totalcost)</td>
                </tr>
            @endforeach


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
                <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">@print($subtotal)</td>
            </tr>

            <tr>
                <td style="background-color: #808080; padding: 3px 10px; color: #ffffff;" colspan="2"><strong>Comments
                        or Special Instructions</strong></td>
                <td style="border: none; padding: 0 10px;">TAX</td>
                <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">0</td>
            </tr>

            <tr>
                <td style="border: 1px solid #c6c6c6; padding: 3px 10px;     vertical-align: top;" colspan="2"
                    rowspan="4"><strong>Comments or Special Instructions</strong></td>
                <td style="border: none; padding: 0 10px;">SHIPPING</td>
                <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">0</td>
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
                <td style="border: none; padding: 0 10px; background-color: #F2F2F2; text-align: right;">@print($subtotal)</td>
            </tr>

        </tbody>
    </table>

</body>

</html>