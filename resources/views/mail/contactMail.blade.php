<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h2>you have recieved a new message</h2>
<p>From: {{$data['name']}}, {{$data['email']}}</p>
<hr>
<p>content: {{$data['message']}}</p>


<p>Have a nice day!</p>
</body>
</html>