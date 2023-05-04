<!DOCTYPE html>
<html>
<head>
    <title>Activate Your Account</title>
</head>
<body>
    <h1>Activate Your Account</h1>

    <p>Please click the following link to activate your account:</p>

    <a href="{{ url('register/activate/'.$activation_code) }}">Activate Your Account</a>
</body>
</html>