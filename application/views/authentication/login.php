<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/authentication.css">
    <title>Login Page | Core</title>
</head>

<body>
    <nav class="main-nav">
        <a href="/products/category">Core</a>
        <span id="nav-login-cart">
            <a id="cart" href="/carts">Shopping Cart (#)</a>
        </span>
    </nav>
    <div class="container">
        <h1>Login</h1>
        <?= $this->session->flashdata("msg") ?>
        <form action="/users/process_login" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" />
            <label>
                Email address: <input type="text" name="email">
            </label>
            <label>
                Password: <input type="password" name="password">
            </label>
            <input type="submit" value="Login">
        </form>
        <a href="/register">Don't have an account? Register.</a>
    </div>
</body>

</html>