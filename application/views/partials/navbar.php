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