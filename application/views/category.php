<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/category.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/assets/javascript/category.js"></script>
    <title></title>
</head>

<body>
    <nav class="main-nav">
        <a href="/products/category">Core</a>
        <span id="nav-login-cart">
<?php if($this->session->userdata("is_logged") === NULL) {?>
            <a href="/">Log In</a>
<?php } else { ?>
            <a href="/logout">Log Out</a>
<?php }?>
            <a id="cart" href="/carts">Shopping Cart (#)</a>
        </span>
    </nav>
    <div class="container">
        <aside>
            <form id="search-form" action="/products/get_products" method="GET">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" />
                <input type="search" name="name">
                <label id="sort">
                    Sort by:
                    <select name="order">
                        <option value="name ASC">A to Z</option>
                        <option value="name DESC">Z to A</option>
                        <option value="price ASC">Price: Low to High</option>
                        <option value="price DESC">Price: High to Low</option>
                    </select>
                </label>
            </form>
            <h2>Categories</h2>
            <ul>
<?php foreach ($categories as $category) { ?>
                <li><a class="category link" href="/products/get_products?id=<?= $category["id"] ?>&page=1"><?= $category["type"] ?></a></li>
<?php } ?>
                <li><a class="category link" href="/products/get_products?id=all&page=1">Show All</a></li>
            </ul>
        </aside>
        <main>
            <header>
                <h1></h1>
                <nav></nav>
            </header>
            <div id="categorized_products"></div>
            <footer></footer>
        </main>
    </div>
</body>

</html>