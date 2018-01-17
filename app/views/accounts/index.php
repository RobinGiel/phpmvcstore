    <?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="mt-5"><?php flash('post_message'); ?></div>
    <div class="card card-body bg-light mt-5">
        <h2>Edit User Account</h2>
        <p>Edit your credentials using this from below </p>
        <form enctype="multipart/form-data" action="<?php echo URLROOT; ?>/accounts/index/ <?php echo $_SESSION['user_id']; ?>" method="post">
        <div class="form-group">
            <label for="name">User name: <sup>*</sup></label>
            <input type="text" name="name" class="form-control form-control-lg
            <?php echo(!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>
        <div class="form-group">
            <label for="email">User e-mail: <sup>*</sup></label>
            <input type="email" name="email" class="form-control form-control-lg
            <?php echo(!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
    <?php require APPROOT . '/views/inc/footer.php'; ?>