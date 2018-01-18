<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbo-fluid text-center">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p class="lead"><?php echo $data['session']; ?></p>
    </div>

</div>
<h1><?php echo $data['title']; ?></h1><p><?php echo date('Y'); ?><p/>

<?php require APPROOT . '/views/inc/footer.php'; ?>
