<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>
<style>
    body{
        background: #efefef;
    }
    form label {
        display: block;
        margin-top: 8px;
        font-family: 'Open Sans', sans-serif;
    }
    .container{
        margin: 0 auto;
        text-align: center;
        background-color: white;
        width: 500px;
        padding: 20px;
        margin: 10px auto;
        border: 4px solid #ddd;
        background: #fff;
    }
    h1{
        font-family: 'Playfair Display', serif;
    }
    label{
        text-align: left;
    }
</style>
<body>
    <div class="container">
        <h1>Login to Administrator Account</h1>
        <form class="ui form" method="post" action="login.php">
            <div class="field">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter username">
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password">
            </div>
            <input class="ui secondary button" type="submit" value="Admin Login">
        </form>
    </div>
</body>
</html>