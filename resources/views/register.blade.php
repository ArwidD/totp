<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        label {
            display: block;
            margin: 1em;
        }
        </style>
</head>
<body>
    <h1>Register user</h1>
    <form method="post">
        <label>Namn: <input type="text" name="name" placeholder="enter your name"></label>
        <label>Email: <input type="email" name="email" placeholder="enter your email"></label>
        <input type="submit" value="Register">
</form>
</body>
</html>