<?php for($page = 1; $page<= $number_of_page; $page++) {  ?>
                <a class="link" href="/products/get_products?id=<?= $id ?>&page=<?= $page ?>"> <?= $page ?> </a>
<?php } ?>     