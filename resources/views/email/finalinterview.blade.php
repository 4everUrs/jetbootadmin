@component('mail::message')
Email subject line: <br>
{{$job['company']}} Job Offer / Job Offer from <b>Tech-Trendz</b>

Dear {{$job['name']}},

We were all very excited to meet and get to know you over the past few days.
We have been impressed with your background and {{$job['company']}} would like to 
formally offer you a final interview on {{$job['date']}} at {{$job['time']}} with regards on the position of {{$job['position']}}. 


{{--Your expected starting date is [date.] You will be asked to sign a contract of [contract_duration,
if applicable] and [mention agreements, like confidentiality, nondisclosure and noncompete] at the beginning of your employment.--}}

We would like to have your response until 24 hours. In the meantime, please feel free to contact the 
Tech-Trendz Human Resource via email on <link>admin@techtrendzph.com or phone (02)896-2911 , if you have any questions.

We are all looking forward to having you on our team.

Sincerely, <br>
<b>Tech-Trendz</b>
@endcomponent