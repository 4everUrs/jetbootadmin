<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Balance Sheets') }}
        </h2>
    </x-slot>
<div class="card">
    <div class="card-body">
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <style>
                td,
        th {
             border: 1px solid rgb(190, 190, 190);
             padding: 10px;
            }

        td {
              text-align: center;
            }

        tr:nth-child(even) {
              background-color: #eee;
            }

        th[scope="col"] {
            background-color: #696969;
            color: #fff;
            }

        th[scope="row"] {
            background-color: #d7d9f2;
            }

        h2 {
             text-align: center:
            }

        table {
        width: 100%;
        border-collapse: collapse;
         border: 2px solid rgb(200, 200, 200);
         letter-spacing: 1px;
        font-family: sans-serif;
        font-size: .8rem;
}


            </style>
        </head>
        <body>
            <h2>Balance Sheet</h2>
            <table>
               
                <tr>
                    <th scope="col">Liabilities</th>
                    <th scope="col">2022</th>
                    <th scope="col">2021</th>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Khiresh Odo</th>
                    <td>7</td>
                    <td>7,223</td>
                </tr>
                <tr>
                    <th scope="row">Mia Oolong</th>
                    <td>9</td>
                    <td>6,219</td>
                </tr>
            </table>
            <label></label>
            <br><br>
            
            <table>
               
                <tr>
                    <th scope="col">Assets</th>
                    <th scope="col">2022</th>
                    <th scope="col">2021</th>
                </tr>
                <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <th scope="row">Khiresh Odo</th>
                    <td>7</td>
                    <td>7,223</td>
                </tr>
                <tr>
                    <th scope="row">Mia Oolong</th>
                    <td>9</td>
                    <td>6,219</td>
                </tr>
            </table>
            
        </body>
        </html>
    </div>
</div>


</div>
