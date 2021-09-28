<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
</head>
<body>
    <div>
        <h3>{{ $user->name }}</h3>
        <p>
            Please Copy and paste this token into input field.
        </p>
        <p>Password Reset Code : {{ $code }}</p>
        <p>Thank You.</p>
    </div>
</body>
</html>