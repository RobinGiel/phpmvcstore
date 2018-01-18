    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/orders" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>Order Details</h2>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Price</th>
      <th scope="col">Item Quantity</th>
      <th scope="col" class="text-right">Total</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  foreach($data['orders'] as $order): ?>
    <tr>
     <td><?php echo $order->productName; ?></td>
     <td>&euro; <?php echo number_format($order->productPrice, 2, ',', ''); ?></td>
     <td><?php echo $order->productQuantity; ?></td>
     <td class="text-right">&euro;<?php
      $TotalproductPrice = $order->productPrice * $order->productQuantity;
     echo number_format($TotalproductPrice, 2, ',', '');?></td>
    </tr>
  <?php endforeach; ?>

  </tbody>
</table>
    <div class="card card-body bg-light mt-5">
    <p class="text-right"> Total ex BTW &euro; <?php
        $sum = 0;
          foreach($data['orders'] as $order){
            $value = $order->productPrice * $order->productQuantity;
            $sum +=  $value;
          }

          echo number_format($sum, 2, ',', '');
        ?>
      </p>
      <p class="text-right">Total BTW &euro; <?php
       $tax = $sum / 100 * 21;
       echo number_format($tax, 2, ',', '');
      ?></p>
      <p class="text-right">Total inc BTW &euro; <?php
       $totalBtw = $sum + $tax;
       echo number_format($totalBtw, 2, ',', '');
      ?></p>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>