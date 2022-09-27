<div>
    <style>
        .body {
        font-family: Arial, Helvetica, sans-serif;
        
        }
        
        @page {
        
        margin: 0;
        }
        
        .col {
        -ms-flex-preferred-size: 0;
        flex-basis: 0;
        -ms-flex-positive: 1;
        flex-grow: 1;
        max-width: 100%;
        }
        
        .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -7.5px;
        margin-left: -7.5px;
        }
        
        .card-body {
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1.25rem;
        }
        
        .card {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
        }
        
        .spreadSheetGroup {
        font:0.75em/1.5 sans-serif;
        font-size:14px;
        
        color: #333;
        background-color: #fff;
        padding: 1em;
        }
        
        /* Tables */
        .spreadSheetGroup table {
        width: 100%;
        margin-bottom: 1em;
        border-collapse: collapse;
        }
        
        .spreadSheetGroup .proposedWork th {
        background-color: #eee;
        }
        
        .tableBorder th {
        background-color: #eee;
        }
        
        .spreadSheetGroup th,
        .spreadSheetGroup tbody td {
        padding: 0.5em;
        
        }
        
        .spreadSheetGroup tfoot td {
        padding: 0.5em;
        
        }
        
        .spreadSheetGroup td:focus {
        border: 1px solid #fff;
        -webkit-box-shadow: inset 0px 0px 0px 2px #5292F7;
        -moz-box-shadow: inset 0px 0px 0px 2px #5292F7;
        box-shadow: inset 0px 0px 0px 2px #5292F7;
        outline: none;
        }
        
        .spreadSheetGroup .spreadSheetTitle {
        font-weight: bold;
        }
        
        .spreadSheetGroup tr td {
        text-align: center;
        }
        
        /*
        .spreadSheetGroup tr td:nth-child(2){
        text-align:left;
        width:100%;
        }
        */
        
        /*
        .documentArea.active tr td.calculation{
        background-color:#fafafa;
        text-align:right;
        cursor: not-allowed;
        }
        */
        .spreadSheetGroup .calculation::before,
        .spreadSheetGroup .groupTotal::before {
        /*content: "$";*/
        }
        
        .spreadSheetGroup .trAdd {
        background-color: #007bff !important;
        color: #fff;
        font-weight: 800;
        cursor: pointer;
        }
        
        .spreadSheetGroup .tdDelete {
        background-color: #eee;
        color: #888;
        font-weight: 800;
        cursor: pointer;
        }
        
        .spreadSheetGroup .tdDelete:hover {
        background-color: #df5640;
        color: #fff;
        border-color: #ce3118;
        }
        
        .documentControls {
        text-align: right;
        }
        
        .spreadSheetTitle span {
        padding-right: 10px;
        }
        
        .spreadSheetTitle a {
        /* font-weight: normal; */
        padding: 0 12px;
        }
        
        .spreadSheetTitle a:hover,
        .spreadSheetTitle a:focus,
        .spreadSheetTitle a:active {
        text-decoration: none;
        }
        
        .spreadSheetGroup .groupTotal {
        text-align: right;
        }
        
        
        
        table.style1 tr td:first-child {
        font-weight: bold;
        white-space: nowrap;
        text-align: right;
        }
        
        table.style1 tr td:last-child {
        border-bottom: 1px solid #000;
        }
        
        
        
        table.proposedWork td,
        table.proposedWork th,
        table.exclusions td,
        table.exclusions th {
        border: 1px solid #000;
        }
        
        table.proposedWork thead th,
        table.exclusions thead th {
        /* font-weight: bold; */
        }
        
        table.proposedWork td,
        table.proposedWork th:first-child,
        table.exclusions th,
        table.exclusions td {
        text-align: left;
        vertical-align: top;
        }
        
        table.proposedWork td.description {
        width: 80%;
        }
        
        table.proposedWork td.amountColumn,
        table.proposedWork th.amountColumn,
        table.proposedWork td:last-child,
        table.proposedWork th:last-child {
        text-align: center;
        vertical-align: top;
        white-space: nowrap;
        }
        
        .amount:before,
        .total:before {
        content: "₱";
        }
        
        table.proposedWork tfoot td:first-child {
        border: none;
        text-align: right;
        }
        
        table.proposedWork tfoot tr:last-child td {
        font-size: 12px;
        font-weight: bold;
        }
        
        table.style1 tr td:last-child {
        width: 100%;
        }
        
        table.style1 td:last-child {
        text-align: left;
        }
        
        td.tdDelete {
        width: 1%;
        }
        
        table.coResponse td {
        text-align: left
        }
        
        table.shipToFrom td,
        table.shipToFrom th {
        text-align: left
        }
        
        .docEdit {
        border: 0 !important
        }
        
        .tableBorder td,
        .tableBorder th {
        border: 1px solid #000;
        }
        
        .tableBorder th,
        .tableBorder td {
        text-align: center
        }
        
        table.proposedWork td,
        table.proposedWork th {
        text-align: center
        }
        
        table.proposedWork td.description {
        text-align: left
        }
    </style>
    <div class="document active">
        <div class="spreadSheetGroup">
            <table class="shipToFrom mt-4">
                <tr>
                    <th>
                        <img src={{asset('dist/img/logo-full.png')}} alt="AdminLTE Logo" width="220">
                    </th>
                    <th>
                        <h1>Purchase Order</h1>
                        
                        {{-- <h4>P.O No.:{{$po->po_id}}</h4> --}}
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
                            {{-- Name:{{$supplier->name}}<br />
                            Location:{{$supplier->address}}<br />
                            Email:{{$supplier->email}}<br />
                            Contact:{{$supplier->phone}}<br /> --}}
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
</div>
