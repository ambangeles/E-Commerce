<a class="link" href="/products/get_products?id=<?= $id ?>&page=1">first</a>
<a class="link" href="/products/get_products?id=<?= $id ?>&page=<?= ($page <= 1) ? "1" : $page - 1 ?>">prev</a>
<span><?= $page ?></span>
<a class="link" id="next" href="/products/get_products?id=<?= $id ?>&page=<?= ($page >= $number_of_page) ? $number_of_page : $page + 1 ?>">next</a>