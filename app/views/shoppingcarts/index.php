    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>Your Orders</h2>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product ID</th>
      <th scope="col">Product name</th>
      <th scope="col">Product image</th>
      <th scope="col">Quantity</th>
      <th style="text-align:center;" scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data['orders'] as $order) :?>
    <tr>
      <th scope="row"><?php echo $order->orderId ?></th>
      <td><?php echo $order->userId ?></td>
      <td><?php echo $order->orderTime ?></td>
      <td>&euro; <?php   
      $details = $this->orderModel->getTotalPrice($order->orderId); 
      foreach($details as $row){
          $result = number_format($row->totalPaid, 2, ',', '');
      }
      echo $result;
      ?></td>
      <td><a class="btn btn-dark pull-right" href="<?php echo URLROOT; ?>/shoppingcarts/remove/<?php echo $order->orderId ?>"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove<a/></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>