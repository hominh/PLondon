<?php foreach ($products as $product): ?>

    <h2><?php echo $product->name ?></h2>
    <p><a href="<?php echo site_url('products/detail/'.$product->slug); ?>">View article</a></p>

<?php endforeach ?>
