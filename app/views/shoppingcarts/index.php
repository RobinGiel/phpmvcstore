    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>Your Shopping Cart</h2>
    </div>
    <?php if(!isset($_SESSION['cart'])) : ?>
    <div class="card card-body bg-light mt-5">
        <h3><?php echo $data['description']; ?></h3>
    </div>
    <?php else : ?>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product name</th>
      <th scope="col">Product image</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($_SESSION['cart'] as $row) :
    
    $products = $this->productModel->getProductById($row['order_productId']);
    ?>
  
    <tr>
      <td><?php echo $products->name; ?></td>
      <td><img style="width:50px;" src="<?php  echo URLROOT . '/img/' . $products->img; ?>"/></td>
      <td><?php echo $row['order_quantity']; ?></td>
      <td>&euro; <?php $totalprice = $row['order_quantity'] * $products->price;
       echo number_format($totalprice, 2, ',', ''); ?></td>
      <td>
        <form class="pull-right" action="<?php echo URLROOT ?>/shoppingcarts/remove/" method="post">
          <input  name="id" type="hidden" value="<?php echo $row['order_productId']; ?>"></br>
          <input style="color:white;" type="submit" value="Remove" class="btn btn-dark">
        </form>
      </td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<div class="container"><p style="float: right;">
<?php 
$total = 0;
foreach($_SESSION['cart'] as $row){
  $products = $this->productModel->getProductById($row['order_productId']);
  $totalprice = $row['order_quantity'] * $products->price;
  $total = $total + $totalprice;
}

echo  'Total: &euro; ' . number_format($total, 2, ',', '');

?>
</p>
</div>
  <?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>
