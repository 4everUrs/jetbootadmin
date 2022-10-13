<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Proposal</title>
</head>
<body>
    To,<br>
    The Administrative Department,<br>
    <br>Date: {{Carbon\Carbon::parse($proposalDetail->created_at)->toFormattedDateString()}}<br>
    
    Subject: Seeking permission for the project<br><br>
    
    Respected Sir/Madam,<br><br>
    
    With due respesct, I would like to state that I am working in <u> Project Management Department </u> of your company.
    <u>Tech-Trendz Services</u>.<br><br>
    
    Respected, I am writing this letter to you in order to seek permission for project <u>{{$proposalDetail->title}}</u>. I
    have
    been working for a long time. The estimated budget for this project is <u>@money($proposalDetail->budget)</u> and
    duration of <u>{{$proposalDetail->duration}}</u> and this could help our
    institution/ company gain better profits. I expect your kind approval for the above-said project.<br><br>
    
    Therefore, I request your positive response. I shall be highly obliged.<br><br>
    
    Yours Sincerely/Faithfully,<br>
</body>
</html>