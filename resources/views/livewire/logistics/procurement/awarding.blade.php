<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Award</title>
</head>

<body style="margin: 50px 0;font-size: 16px;line-height: 1.5em;">
    <table style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
        <thead>
            <tr>
                <th colspan="2"
                    style="font-size: 30px;line-height: 1.1em;padding: 10px 0; color: #FFFFFF; text-align: middle; background-color: #3B4E87;">
                    CONTRACT AWARD LETTER</th>
                <th style="vertical-align: top;" rowspan="3"><img width="200"
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
            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2"><strong>Date: {{$data['date']}}</strong></td>
            </tr>

        </thead>
    </table>

    <table
        style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 50px;">

        <tbody>
            <tr>
                <td style="border: none; padding: 3px 10px; font-size: 20px;">{{$data['name']}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">Tech-Trendz Services</td>
            </tr>

            <tr>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">{{$data['address']}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">Millionaire’s Village, Novaliches Quezon City,</td>
            </tr>

            <tr>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">{{$data['email']}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">admin@techtrendzph.com</td>
            </tr>

            <tr>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">{{$data['phone']}}</td>
                <td></td>
                <td style="border: none; padding: 3px 10px;">76759-88298</td>
            </tr>
        </tbody>
    </table>

    <table style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
        <tbody>

            <tr>
                <td style="padding: 0px;">&nbsp;</td>
                <td style="padding: 0px;"></td>
                <td
                    style="text-align: center;line-height: 1.2em;padding: 10px 0px; text-transform: uppercase; font-size: 30px;line-height: 1.1em; color: #3B4E87;">
                    &nbsp;</td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;">Dear:{{$data['name']}}</td>
                <td style="padding: 0px;"></td>
                <td
                    style="text-align: center;line-height: 1.2em;padding: 10px 0px; text-transform: uppercase; font-size: 30px;line-height: 1.1em; color: #3B4E87;">
                    &nbsp;</td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>You are invited to attend the contract award ceremony for the Procurement of {{$data['post']}}. The
                        time and venue for the ceremony are mentioned below:</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">Date: {{$data['date_awarding']}}</td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2"><br>Venue: {{$data['venue']}}</br></td>
            </tr>


            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2"><br>Time: {{$data['time']}}</br></td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>The signing authority and a witness should attend the meeting for the signing of contracts. If
                        Signing Authority Authorizes any other person to sign the contract, Authorization letter will be
                        required.</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2"><br>Sincerely,</br></td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2"><br>{{$data['author']}}</br></td>
            </tr>
        </tbody>


    </table>
    </table>

</body>

</html>