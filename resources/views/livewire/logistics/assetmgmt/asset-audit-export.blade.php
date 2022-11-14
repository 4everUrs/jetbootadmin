<div>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    Date: @date($date)
    Building Asset
    <table
        style="width: 1280px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
        <thead class="bg-info">
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Building Name</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Building Location</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Building Cost</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Status</th>
        </thead>
        <tbody>
            @foreach ($buildings as $building)
            <tr>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->name}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->location}}</td>

                <td style="border: 1px solid; padding: 0 10px; text-align: center;">@print($building->cost)</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page-break"></div>
    Date: @date($date)
    Vehicle Asset
    <table
        style="width: 1280px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
        <thead class="bg-info">
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                No</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Vehicle Type</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Vehicle Brand</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Vehicle Model</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Vehicle Condition</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Purchase Cost</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Status</th>
        </thead>
        <tbody>
            @foreach ($vehicles as $building)
            <tr>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->id}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->type}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->brand}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->model}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->condition}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">@print($building->cost)</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="page-break"></div>
    Date: @date($date)
    Equipment Asset
    <table
        style="width: 1280px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 40px;">
        <thead class="bg-info">
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                No</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                 Type</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                 Name</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Description</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Quantity</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Purchase Cost</th>
            <th
                style="padding: 3px  10px;;border: 1px solid #3B4E87; font-size: 15px;color: #ffffff; text-align: center; background-color: #3B4E87;">
                Purchase Date</th>
        </thead>
        <tbody>
            @foreach ($equipments as $building)
            <tr>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->id}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->type}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->name}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->description}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">{{$building->quantity}}</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">@print($building->cost)</td>
                <td style="border: 1px solid; padding: 0 10px; text-align: center;">@date($building->created_at)</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>