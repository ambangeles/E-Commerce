<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/authentication.css">
    <title>Admin Login Page | Core</title>
</head>

<body>
    <div class="container">
        <h1>Admin Login</h1>
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
    </div>
</body>

</html>