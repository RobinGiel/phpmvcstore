<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<h1><?php echo $data['product']->name;  ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    <img src="<?php echo URLROOT;?>/img/<?php echo $data['product']->img?>" style="width: 15%;"><br>Product added by: <?php echo $data['user']->name; ?> <br>Product category: <?php echo $data['category']->name; ?>
</div>
<p><?php echo $data['product']->description; ?></p>
<p> &euro;<?php echo $data['product']->price; ?></p>

<?php if($data['product']->user_id == $_SESSION['user_id']) : ?>
 <hr>
 <a href="<?php echo URLROOT; ?>/products/edit/<?php echo $data['product']->id; ?>" class="btn btn-dark">Edit</a>

 <form class="pull-right" action="<?php echo URLROOT ?>/products/delete/<?php echo $data['product']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger">
 </form>
<?php endif; ?>

<?php if(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'klant') : ?>
 <form class="pull-left" action="<?php echo URLROOT ?>/cart/add/<?php echo $data['product']->id; ?>" method="post">
    <input type="number">
    <input type="submit" value="Buy" class="btn btn-success">
 </form>
<?php endif; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>