<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/normalize.css">
    <link rel="stylesheet" href="/assets/css/product_info.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".images img", function() {
                $("#image-preview-dialog img").attr("src", $(this).attr("src"));
                $("#image-preview-dialog").dialog({
                    resizable: false,
                    height: "auto",
                    width: "auto"
                });
            });
        });
    </script>
    <title>(Products Page) ### | Core</title>
</head>

<body>
    <nav class="main-nav">
        <a href="/">Core</a>
        <span id="nav-login-cart">
            <a href="/login">Log In</a>
            <a id="cart" href="/cart">Shopping Cart (#)</a>
        </span>
    </nav>
    <div class="container">
        <a href="/">Go Back</a>
        <h1>######</h1>
        <article>
            <div class="images">
                <img class="dialog" src="https://picsum.photos/500/500" alt="">
                <div class="mini-images">
                    <img src="https://picsum.photos/500/500" alt="">
                    <img src="https://picsum.photos/500/500" alt="">
                    <img src="https://picsum.photos/500/500" alt="">
                    <img src="https://picsum.photos/500/500" alt="">
                    <img src="https://picsum.photos/500/500" alt="">
                </div>
            </div>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis excepturi eos nihil obcaecati? Quae cupiditate obcaecati atque ex placeat laboriosam iusto omnis vitae velit, nihil, perspiciatis voluptates neque ratione. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur natus quo sunt mollitia necessitatibus, cupiditate atque aspernatur ea voluptatibus aperiam fuga asperiores nobis distinctio, dolorum itaque vel explicabo totam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis excepturi eos nihil obcaecati? Quae cupiditate obcaecati atque ex placeat laboriosam iusto omnis vitae velit, nihil, perspiciatis voluptates neque ratione. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur natus quo sunt mollitia necessitatibus, cupiditate atque aspernatur ea voluptatibus aperiam fuga asperiores nobis distinctio, dolorum itaque vel explicabo totam?Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis excepturi eos nihil obcaecati? Quae cupiditate obcaecati atque ex placeat laboriosam iusto omnis vitae velit, nihil, perspiciatis voluptates neque ratione. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit tenetur natus quo sunt mollitia necessitatibus, cupiditate atque aspernatur ea voluptatibus aperiam fuga asperiores nobis distinctio, dolorum itaque vel explicabo totam?
            </p>
            <form action="#" method="post">
                <span>($##.##)</span>
                <label>
                    <input type="number" name="quantity" min="1">
                </label>
                <input type="submit" value="Buy">
            </form>
        </article>
        <h2>Similar Items</h2>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
        <div class="products-search">
            <a href="/products/product_info">
                <img src="https://picsum.photos/200/200" alt="players' image">
                <p>$$$$$</p>
                <h3>######</h3>
            </a>
        </div>
    </div>
    <div id="image-preview-dialog">
        <img src="" />
    </div>
</body>

</html>