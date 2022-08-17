<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // $.get(window.location.href, function (res) {
            //     console.log(res);
            //     // $("body").html(res.html);
            //     // $("h1").html(`${res.category_name} (page ${res.page})`);
            // }, "json");

            // $(document).on("click", ".category", function () {

            //     let page_url = $(this).attr("href");
            //     console.log($(this).text());
            //     history.pushState(null, '', page_url)
            //     $.get(page_url, function (res) {
            //         $("body").html(res);
            //         $("h1").html($(this).text());
            //     });
            //     return false;
            // });

            $("footer a").click(function () { 
                let page_url = $(this).attr("href");
                history.pushState(null, '', page_url)
                $.get(page_url, function (res) {
                    $("body").html(res);
                });
                return false;
            });
        });
    </script>
    <title>(Products Page) # (page #) | Core</title>
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
            <form action="#" method="POST">
                <input type="search" name="search">
            </form>
            <h2>Categories</h2>
            <ul>
<?php foreach ($categories as $category) { ?>
                <li><a class="category" href="/products/category/<?= $category["id"] ?>/1"><?= $category["type"] ?></a></li>
<?php } ?>
                <li><a class="category" href="/products/category/all/1">Show All</a></li>
            </ul>
        </aside>
        <main>
            <header>
                <h1>#######</h1>
                <nav>
                    <a href="#">first</a>
                    <a href="#">prev</a>
                    <span>#</span>
                    <a href="#" id="last-child">next</a>
                    <form action="#">
                        <label>
                            Sort by:
                            <select name="sort">
                                <option value="price">Price</option>
                                <option value="price">Most Popular</option>
                            </select>
                        </label>
                    </form>
                </nav>
            </header>
            <div id="categorized_products">
<?php foreach ($products as $key => $product) { ?>
                <div class="products-search">
                    <a href="/products/product_info">
                        <img src="https://picsum.photos/200/200" alt="players' image">
                        <p><?= $product["price"] ?></p>
                        <h3>$<?= $product["name"] ?></h3>
                    </a>
                </div>
<?php } ?>
            </div>
            <footer>
<?php for($page = 1; $page<= $number_of_page; $page++) {  ?>
                <a href="<?= $page ?>"> <?= $page ?> </a>
<?php } ?>                
            </footer>
        </main>
    </div>
</body>

</html>