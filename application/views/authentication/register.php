<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/authentication.css">
    <title>Register Page | Core</title>
</head>

<body>
    <nav class="main-nav">
        <a href="/">Core</a>
        <span id="nav-login-cart">
            <a href="/login">Login</a>
            <a id="cart" href="/cart">Shopping Cart (#)</a>
        </span>
    </nav>
    <div class="container">
        <h1>Register</h1>
        <?= $this->session->flashdata("msg") ?>
        <form action="/users/process_register" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
            <label>
                First Name: <input type="text" name="first_name">
            </label>
            <label>
                Last Name: <input type="text" name="last_name">
            </label>
            <label>
                Email Address: <input type="text" name="email">
            </label>
            <label>
                Password: <input type="password" name="password">
            </label>
            <label>
                Confirm Password: <input type="password" name="confirm_password">
            </label>
            <input type="submit" value="Register">
        </form>
        <a href="/login">Don't have an account? Log In.</a>
    </div>
</body>

</html>