<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbo-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1><p><?php echo date('Y'); ?></h1>
    </div>

</div>

    <div class="album py-5 bg-light">
        <div class="container">
    <div class="row">
<?php foreach ($data['products'] as $products) :?>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" style="height:50%;width: 175px;" src="<?php echo URLROOT .'/img/'. $products->productImg;?>" alt="Card image cap">
                <div class="card-body">
                  <p class="card-text"><?php echo $products->productName; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" onclick="location.href='<?php echo  URLROOT .'/products/show/'. $products->productId; ?>';" class="btn btn-sm btn-outline-secondary">View Product</button>
                        </div>
                    </div>
                </div>
           </div>     
        </div>
<?php endforeach;  ?>
    </div> 
    </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
