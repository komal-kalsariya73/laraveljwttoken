<!DOCTYPE html>
<html>
<head>
    <title>Welcome Aboard!</title>
</head>
<body>
    <h2>Dear {{ $employee->fname }},</h2>
    <p>Welcome to our company! We are excited to have you on board.</p>

    <p><strong>Email:</strong> {{ $employee->email }}</p>
    <p><strong>City:</strong> {{ $employee->city }}</p>

    <p>We look forward to a successful journey together!</p>

    <br>
    <p>Regards,<br>HR Team</p>
</body>
</html>
