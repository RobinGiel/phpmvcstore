<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>/pages/index"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/index">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
         <?php 
         if(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'medewerker' ) : ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa fa-user-o" aria-hidden="true"></i> Welcome <?php $id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($id); echo $user->name; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/orders"><i class="fa fa-clipboard" aria-hidden="true"></i> Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/accounts"><i class="fa fa-cog" aria-hidden="true"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </li>
         <?php  elseif(isset($_SESSION['user_id']) && $_SESSION['user_role'] === 'klant' ) : ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Welcome <?php $id = $_SESSION['user_id'];
            $user = $this->userModel->getUserById($id); echo $user->name; ?> <i class="fa fa-user-o" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/carts/index">Shopping Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/accounts">Account <i class="fa fa-cog" aria-hidden="true"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
</nav>
</header>
