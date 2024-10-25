<header class="main-header">
  <nav class="navbar navbar-static-top" style="background-color: #2C3E50;">
    <div class="container-fluid" style="background-color: #2C3E50;">
      <div class="navbar-header" style="background-color: #2C3E50;">
        <a href="#" class="navbar-brand" style="color: #ECF0F1; font-size: 24px; font-family: 'Arial Black', sans-serif;">
          <b>Voter's Service Portal</b>
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars" style="color: #ECF0F1;"></i>
        </button>
      </div>

      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if (isset($_SESSION['voter'])) {
              echo "
                <li><a href='index.php' style='color: #ECF0F1; font-size: 18px;'>HOME</a></li>
              ";
            }
          ?>
        </ul>
      </div>

      <div class="navbar-custom-menu" style="position: absolute; right: 0;">
        <ul class="nav navbar-nav">
          <li class="user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo (!empty($voter['photo'])) ? ''.$voter['photo'] : 'images/profile.jpg'; ?>" class="user-image" alt="User Image" style="border-radius: 50%;">
              <span class="hidden-xs" style="color: #ECF0F1; font-size: 20px;"><?php echo $voter['firstname'].' '.$voter['lastname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background-color: #2C3E50;">
                <img src="<?php echo (!empty($voter['photo'])) ? ''.$voter['photo'] : 'images/profile.jpg'; ?>" class="img-circle" alt="User Image">
                <p style="color: #ECF0F1;">
                  <?php echo $voter['firstname'].' '.$voter['lastname']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
