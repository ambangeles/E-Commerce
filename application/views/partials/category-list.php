<?php foreach ($categories as $category) { ?>
            <li><a class="category" href="/products/category/<?= $category["id"] ?>"><?= $category["type"] ?></a></li>
<?php } ?>
            <li><a class="category" href="/products/category">Show All</a></li>