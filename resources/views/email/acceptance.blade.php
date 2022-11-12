@component('mail::message')
Interview Invitation for the position of {{$job['position']}} at {{$job['company']}}
 
Hello {{$job['name']}}, <br>
Thank you for applying for the position of {{$job['position']}} with us. 
We are glad to inform you that your interview has been scheduled for {{$job['time']}} on {{$job['date']}}.
    
Kindly note the interview details:
    
Venue Address {{$job['venue']}} (in case of face-to-face interview) <br>
Communication Link {{$job['venue']}} (in case of remote/virtual interview) <br>
Interviewing Person {{$job['person']}} (name and designation) <br>
    
Please reply to this email if you have any questions or need to reschedule. We look forward to speaking with you.
    
Sincerely, <br>
<b>Tech-Trendz</b>
    
@endcomponent