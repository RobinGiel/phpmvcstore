    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>Your Shopping Cart</h2>
    </div>
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
    <tr>
      <td><?php echo $data['order_name']; ?></td>
      <td><img style="width:50px;" src="<?php  echo URLROOT . '/img/' . $data['order_img']; ?>"/></td>
      <td><?php echo $data['order_quantity']; ?></td>
      <td>&euro; <?php echo $data['order_price']; ?></td>
      <td><a class="btn btn-dark pull-right" href="<?php echo URLROOT; ?>/shoppingcarts/remove/<?php echo $order->orderId ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove<a/></td>
    </tr>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>