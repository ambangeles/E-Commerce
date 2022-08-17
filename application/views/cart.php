<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/cart.css">
    <title>(Carts Page) Shopping Cart | Core</title>
</head>

<body>
    <nav class="main-nav">
        <a href="/products/category">Core</a>
        <span id="nav-login-cart">
            <a href="/">Login</a>
            <a id="cart" href="/carts">Shopping Cart (#)</a>
        </span>
    </nav>
    <div class="container">
        <table>
            <thead>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </thead>
            <tbody>
                <tr>
                    <td>Test</td>
                    <td>$##.##</td>
                    <td># update H</td>
                    <td>$##.##</td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>$##.##</td>
                    <td># update H</td>
                    <td>$##.##</td>
                </tr>
                <tr>
                    <td>Test</td>
                    <td>$##.##</td>
                    <td># update H</td>
                    <td>$##.##</td>
                </tr>
            </tbody>
        </table>
        <div id="total">
            <p>Total: $##.##</p>
            <a href="/">Continue Shopping</a>
        </div>
        <?= $this->session->flashdata("msg") ?>
        <form action="/users/process_register" method="post">
            <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>">
            <h2>Shipping Information</h2>
            <label>
                <span>First Name:</span>
                <input type="text" name="first_name">
            </label>
            <label>
                <span>Last Name:</span>
                <input type="text" name="last_name">
            </label>
            <label>
                <span>Address:</span>
                <textarea name="address1"></textarea>
            </label>
            <label>
                <span>Address 2:</span>
                <textarea name="address2"></textarea>
            </label>  
            <label>
                <span>City:</span>
                <input type="text" name="city">
            </label>
            <label>
                <span>State:</span>
                <input type="text" name="state">
            </label>
            <label>
                <span>Zip Code:</span>
                <input type="text" name="zipcode">
            </label>

            <h2>Billing Information</h2>
            <label>
                <input type="checkbox" name="same_address" > Same as Shipping
            </label>
            <label>
                <span>First Name:</span>
                <input type="text" name="first_name">
            </label>
            <label>
                <span>Last Name:</span>
                <input type="text" name="last_name">
            </label>
            <label>
                <span>Address:</span>
                <textarea name="address1"></textarea>
            </label>
            <label>
                <span>Address 2:</span>
                <textarea name="address2"></textarea>
            </label>
            <label>
                <span>City:</span>
                <input type="text" name="city">
            </label>
            <label>
                <span>State:</span>
                <input type="text" name="state">
            </label>
            <label>
                <span>Zip Code:</span>
                <input type="text" name="zipcode">
            </label>
            <label>
                <span>Card:</span>
                <input type="text" name="card">
            </label>
            <label>
                <span>Security Code:</span>
                <input type="text" name="security_code">
            </label>
            <label>
                <span>Expiration:</span>
                <input type="month" name="expiration">
            </label>
            <input type="submit" id="pay_button" value="Pay">
        </form>
    </div>
</body>

</html>