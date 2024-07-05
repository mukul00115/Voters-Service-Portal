<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="image">
        <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="votes.php"><i class="glyphicon glyphicon-lock"></i> <span>Votes</span></a></li>
      <li><a href="new_requests.php"><i class="fa fa-envelope"></i> <span>New Requests</span></a></li>
      
      <li class="header">MANAGE</li>
      <li><a href="voters.php"><i class="fa fa-users"></i> <span>Voters</span></a></li>
      <li><a href="positions.php"><i class="fa fa-tasks"></i> <span>Positions</span></a></li>
      <li><a href="candidates.php"><i class="fa fa-black-tie"></i> <span>Candidates</span></a></li>
      
      <li class="header">SETTINGS</li>
      <li><a href="ballot.php"><i class="fa fa-file-text"></i> <span>Ballot Position</span></a></li>
      <li><a href="#config" data-toggle="modal"><i class="fa fa-cogs"></i> <span>Election Title</span></a></li>
    </ul>
  </section>
</aside>

<?php include 'config_modal.php'; ?>

<style>
  /* Sidebar Styles */
  .main-sidebar {
    background-color: #343A40;
    color: #D3D3D3;
  }
  .sidebar {
    background-color: #343A40;
  }
  .user-panel {
    height: 60px;
    display: flex;
    align-items: center;
    padding: 10px;
    background-color: #3E4349;
  }
  .user-panel .image img {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    object-fit: cover;
  }
  .user-panel .info {
    color: #D3D3D3;
    font-size: 15px;
    font-family: 'Arial', sans-serif;
    margin-left: 10px;
  }
  .user-panel .info p {
    margin: 0;
    font-weight: bold;
  }
  .user-panel .info a {
    color: #28A745;
    font-size: 12px;
  }

  /* Sidebar Menu */
  .sidebar-menu {
    margin: 0;
    padding: 0;
    list-style: none;
  }
  .sidebar-menu .header {
    padding: 10px;
    background-color: #4A4F55;
    color: #D3D3D3;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;
  }
  .sidebar-menu li a {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    color: #D3D3D3;
    text-decoration: none;
    font-size: 14px;
    transition: background-color 0.3s;
  }
  .sidebar-menu li a:hover {
    background-color: #495057;
    color: #ffffff;
  }
  .sidebar-menu li a i {
    margin-right: 10px;
  }

  /* Icon Colors */
  .sidebar-menu li a i.fa,
  .sidebar-menu li a i.glyphicon {
    color: #D3D3D3;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .user-panel {
      flex-direction: column;
      align-items: flex-start;
    }
    .user-panel .info {
      margin-left: 0;
      margin-top: 5px;
    }
    .sidebar-menu li a {
      font-size: 12px;
    }
  }
</style>
