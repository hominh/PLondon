<?php foreach ($products as $product): ?>

    <h2><?php echo $product->Name ?></h2>
    <p><a href="http://localhost/newsbyci/products/detail/<?php echo $product->slug; ?>">View article1</a></p>

<?php endforeach ?>
