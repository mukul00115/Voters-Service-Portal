<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color:#F1E9D2;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><b>
        Ballot Position
      </b></h1>
      <ol class="breadcrumb" style="color:black; font-size: 17px; font-family:Times">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active" style="color:black; font-size: 17px; font-family:Times">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-body">
          <?php
            if(isset($_SESSION['error'])){
              echo "
                <div class='alert alert-danger alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-warning'></i> Error!</h4>
                  ".$_SESSION['error']."
                </div>
              ";
              unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
              echo "
                <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4><i class='icon fa fa-check'></i> Success!</h4>
                  ".$_SESSION['success']."
                </div>
              ";
              unset($_SESSION['success']);
            }
          ?>

          <div class="row">
            <div class="col-xs-10 col-xs-offset-1" id="content">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>

<style>
/* CSS Enhancements */
body {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

.content-wrapper {
    padding: 20px;
}

.content-header h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

.breadcrumb {
    background: none;
    padding: 0;
}

.box {
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    margin-top: 20px;
}

.alert {
    margin-top: 20px;
}

#content {
    margin-top: 30px;
}

@media (max-width: 767px) {
    .breadcrumb {
        font-size: 14px;
    }

    .content-header h1 {
        font-size: 20px;
    }
}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/icheck@1.0.2/icheck.min.js"></script>
<script>
$(document).ready(function(){
  fetch();

  $(document).on('click', '.reset', function(e){
    e.preventDefault();
    var desc = $(this).data('desc');
    $('.' + desc).iCheck('uncheck');
  });

  $(document).on('click', '.moveup', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $('#' + id).animate({
      'marginTop': "-300px"
    });
    $.ajax({
      type: 'POST',
      url: 'ballot_up.php',
      data: {id: id},
      dataType: 'json',
      success: function(response){
        if(!response.error){
          fetch();
        }
      }
    });
  });

  $(document).on('click', '.movedown', function(e){
    e.preventDefault();
    var id = $(this).data('id');
    $('#' + id).animate({
      'marginTop': "+300px"
    });
    $.ajax({
      type: 'POST',
      url: 'ballot_down.php',
      data: {id: id},
      dataType: 'json',
      success: function(response){
        if(!response.error){
          fetch();
        }
      }
    });
  });

  $(document).on('click', '.platform-btn', function(e){
    e.preventDefault();
    var candidateId = $(this).data('id');
    $.ajax({
      type: 'POST',
      url: 'fetch_platform.php',
      data: {id: candidateId},
      dataType: 'json',
      success: function(response){
        // Assuming response contains the platform information
        alert('Platform: ' + response.platform);
      }
    });
  });

  function fetch(){
    $.ajax({
      type: 'POST',
      url: 'ballot_fetch.php',
      dataType: 'json',
      success: function(response){
        $('#content').html(response).iCheck({checkboxClass: 'icheckbox_flat-green', radioClass: 'iradio_flat-green'});
      }
    });
  }
});


</script>
</body>
</html>
