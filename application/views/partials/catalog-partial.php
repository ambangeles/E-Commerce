<?php foreach ($products as $key => $product) { ?>
                <div class="products-search">
                    <a href="/products/product_info">
                        <img src="https://picsum.photos/200/200" alt="players' image">
                        <p><?= $product["price"] ?></p>
                        <h3>$<?= $product["name"] ?></h3>
                    </a>
                </div>
<?php } ?>