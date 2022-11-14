<div>
    Date: @date($date)
    <table style="width: 1280px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
        <thead class="bg-info">
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Item No</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Name</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Supplier</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Description</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Cost per item</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Stock<br>Quantity</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Inventory<br>Value</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Reorder<br>Level</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Reorder<br>Quantity</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Days per<br>Reorder</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Status</th>
            <th style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">Discontinued?</th>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">IN{{$item->id}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->name}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->supplier->name}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->description}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">@print($item->cost_per_item)</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->stock_quantity}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">@print($item->stock_value)</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->reorder_level}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->reorder_quantity}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->reorder_days}} Days</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->status}}</td>
                    <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$item->remarks}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
