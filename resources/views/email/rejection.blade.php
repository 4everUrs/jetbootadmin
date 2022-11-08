@component('mail::message')
{{$data['date']}} <br>
{{$data['name']}} <br>
 
{{$data['address']}} <br>
 
Dear {{$data['name']}}, <br>
    Thank you for your Job application to {{$data['position']}}, 
{{$data['company']}}. We are unable to offer you 
a member position at this time. We review all our 
applicants with the same process: screening, reference check, and interview. Based on our findings, we 
do not find you to be a good match for our program. 
I hope that you are able to find another avenue in 
which to satisfy your desire to serve the community 
and environment. You can see other service opportunities at the Tech-Trendz Web site at 
www. techtrendzph.com. For local options, you can 
contact (02)898-4578. Good luck to you. <br>


Sincerely, <br>
Tech-Trendz 

@endcomponent