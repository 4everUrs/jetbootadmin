<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invite</title>
</head>

<body style="margin: 50px 0;font-size: 16px;line-height: 1.5em;">
    <table style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border: none; border-spacing: 0px;">
        <thead>
            <tr>
                <th colspan="2"
                    style="font-size: 30px;line-height: 1.1em;padding: 10px 0; color: #FFFFFF; text-align: middle; background-color: #3B4E87;">
                    INVITATION LETTER</th>
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
                <td style="padding: 0px; font-size: 20px;" colspan="2"><strong>Date: {{$data['date_created']}}</strong></td>
            </tr>

        </thead>
    </table>

    <table
        style="width: 680px;margin: 0px auto 0px auto;background: #ffffff;border-spacing: 0px;border-collapse: collapse;border: none; margin-top: 50px;">

        <tbody>
            <tr>
                <td style="border: none; padding: 3px 10px;font-size: 20px;">{{$data['name']}}</td>
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
                    <p>This Letter of Award, is in reference to our Invitation for the acquisition of [Item Name]</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>Dated on {{$data['date']}}, {{$data['time']}} at
                        {{$data['venue']}} and/or the subsequent meetings and/or related correspondence between us. TECH-TRENDZ
                        does hereby award to {{$data['name']}} the Contract for the {{$data['subject']}} subject
                        to the following:</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>1. Finalisation and execution of the agreement, having been reached between Company and
                        Contractor based on tender documents and all contractual qualifications and agreed exceptions,
                        within 14 days from the date of this Letter.</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>2. This Letter constitutes a commitment for Company to reimburse Contractor for any arrangements
                        necessary to commence the work (e.g., permitting, equipment movements etc.) until such time that
                        the contract is executed. Upon such execution, the terms of the executed contract will prevail.
                        Should the Contract not be executed between Company and Contractor, Company commits to reimburse
                        Contractor for any arrangements made under the same conditions as detailed above and during the
                        whole foreseen period stated in item 1 above.</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>3. We acknowledge that the vessel /or/ processing centre is not confirmed until the execution of
                        the final Contract.</p>
                </td>
            </tr>

            <tr>
                <td style="padding: 0px; font-size: 20px;" colspan="2">
                    <p>Thank you so much for your time and consideration.</p>
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