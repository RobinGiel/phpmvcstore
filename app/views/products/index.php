<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
 <div class="row mb-3">
    <div class="col-md-6">
        <h1>Products</h1>
    </div>
    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'medewerker') : ?>
    <div class="col-md-6">
            <a href="<?php echo URLROOT; ?>/products/add" class="btn btn-primary pull-right">
                <i class="fa fa-pencil"></i> Add Product
            </a>
    </div>
<?php endif; ?>
 </div>
 <?php foreach($data['products'] as $product) : ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $product->productName; ?></h4>
        <div class="bg-light p-2 mb-3">
            <img src="<?php echo URLROOT;?>/img/<?php echo $product->productImg;?>" style="width: 15%;"><br>Product added by: <?php echo $product->userName; ?> <br>Product category: <?php echo $product->name; ?>
        </div>
        <p class="card-text"><?php echo $product->description; ?></p>
        <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->productId; ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>