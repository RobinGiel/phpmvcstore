    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>View Orders</h2>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Order_ID</th>
      <th scope="col">User_ID</th>
      <th scope="col">Ordered_at</th>
      <th scope="col">Total paid</th>
      <th scope="col"></th>
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
          $result = $row->totalPaid;
      }
      echo $result;
      ?></td>
      <td><a class="btn btn-dark pull-right" href="<?php echo URLROOT; ?>/orders/details/<?php echo $order->orderId ?>">View details<a/></td>
    </tr>
<?php endforeach; ?>
  </tbody>
</table>
<?php require APPROOT . '/views/inc/footer.php'; ?>