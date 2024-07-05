<?php
include 'includes/session.php';
include 'includes/header.php';
?>

<!-- Custom CSS -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #F9F9F9;
        color: #333;
    }

    .content-wrapper {
        background-color: #FFFFFF;
        margin: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 50px;
    }

    .page-header {
        color: #4682B4;
        font-family: 'Georgia', serif;
        font-size: 32px;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .btn {
        border-radius: 25px;
        font-size: 16px;
        padding: 10px 20px;
        transition: background-color 0.3s;
    }

    .btn-primary {
        background-color: #4682B4;
        color: white;
        border: none;
    }

    .btn-primary:hover {
        background-color: #4169E1;
    }

    .btn-success {
        background-color: #9CD095;
        color: white;
        border: none;
    }

    .btn-success:hover {
        background-color: #82C07A;
    }

    .btn-curve {
        border-radius: 25px;
        padding: 10px 20px;
    }

    .box {
        background-color: #f8f8f8;
        border-radius: 15px;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .box-header {
        background-color: #e9e9e9;
        border-bottom: 1px solid #dcdcdc;
        padding: 10px 20px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }

    .box-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .box-body {
        padding: 20px;
    }

    .cname {
        font-size: 18px;
        font-weight: bold;
        margin-left: 15px;
    }

    .clist img {
        border-radius: 50%;
        margin-right: 15px;
    }

    .alert {
        border-radius: 5px;
    }

    .text-center {
        text-align: center;
        margin-bottom: 30px;
    }

    .modal-content {
        border-radius: 15px;
    }

    .votelist {
        margin-bottom: 10px;
    }

    .votelist-title {
        font-weight: bold;
    }

    .votelist-name {
        margin-left: 10px;
    }

    .view-ballot {
        margin-bottom: 20px;
    }

    .content-wrapper {
        margin-bottom: 20px;
    }
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <div class="content-wrapper">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <?php
                    $parse = parse_ini_file('admin/config.ini', FALSE, INI_SCANNER_RAW);
                    $title = $parse['election_title'];
                ?>
                <h1 class="page-header text-center"><i class="fas fa-vote-yea"></i> <b><?php echo strtoupper($title); ?></b></h1>
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <?php
                            if (isset($_SESSION['error'])) {
                                echo '<div class="alert alert-danger alert-dismissible">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo '<ul>';
                                foreach ($_SESSION['error'] as $error) {
                                    echo '<li>' . $error . '</li>';
                                }
                                echo '</ul></div>';
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) {
                                echo '<div class="alert alert-success alert-dismissible">';
                                echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
                                echo '<h4><i class="icon fa fa-check"></i> Success!</h4>';
                                echo $_SESSION['success'] . '</div>';
                                unset($_SESSION['success']);
                            }
                        ?>
                        <div class="alert alert-danger alert-dismissible" id="alert" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <span class="message"></span>
                        </div>

                        <form method="POST" id="ballotForm" action="submit_ballot.php">
                            <?php
                                include 'includes/slugify.php';

                                $sql = "SELECT * FROM positions ORDER BY priority ASC";
                                $query = $conn->query($sql);
                                while ($row = $query->fetch_assoc()) {
                                    $sql = "SELECT * FROM votes WHERE voters_id = '".$voter['id']."' AND position_id = '".$row['id']."'";
                                    $vquery = $conn->query($sql);
                                    if ($vquery->num_rows > 0) {
                                        echo '<div class="text-center">';
                                        echo '<h3>You have already voted for '.$row['description'].'.</h3>';
                                        echo '<a href="#view" data-toggle="modal" class="btn btn-primary btn-lg btn-curve"><i class="fa fa-eye"></i> View Ballot</a>';
                                        echo '</div>';
                                    } else {
                                        $candidate = '';
                                        $sql = "SELECT * FROM candidates WHERE position_id='".$row['id']."'";
                                        $cquery = $conn->query($sql);
                                        while ($crow = $cquery->fetch_assoc()) {
                                            $slug = slugify($row['description']);
                                            $checked = '';
                                            if (isset($_SESSION['post'][$slug])) {
                                                $value = $_SESSION['post'][$slug];
                                                if (is_array($value)) {
                                                    foreach ($value as $val) {
                                                        if ($val == $crow['id']) {
                                                            $checked = 'checked';
                                                        }
                                                    }
                                                } else {
                                                    if ($value == $crow['id']) {
                                                        $checked = 'checked';
                                                    }
                                                }
                                            }
                                            $input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red '.$slug.'" name="'.$slug."[]".'" value="'.$crow['id'].'" '.$checked.'>' : '<input type="radio" class="flat-red '.$slug.'" name="'.slugify($row['description']).'" value="'.$crow['id'].'" '.$checked.'>';
                                            $image = (!empty($crow['photo'])) ? 'images/'.$crow['photo'] : 'images/profile.jpg';
                                            $candidate .= '
                                                <li>
                                                    '.$input.'<button type="button" class="btn btn-primary btn-sm btn-curve clist platform" data-platform="'.$crow['platform'].'" data-fullname="'.$crow['firstname'].' '.$crow['lastname'].'"><i class="fa fa-search"></i> Platform</button><img src="'.$image.'" height="100px" width="100px" class="clist"><span class="cname clist">'.$crow['firstname'].' '.$crow['lastname'].'</span>
                                                </li>';
                                        }

                                        $instruct = ($row['max_vote'] > 1) ? 'You may select up to '.$row['max_vote'].' candidates' : 'Select only one candidate';

                                        echo '<div class="row">';
                                        echo '<div class="col-xs-12">';
                                        echo '<div class="box box-solid">';
                                        echo '<div class="box-header with-border">';
                                        echo '<h3 class="box-title"><i class="fa fa-users"></i> <b>'.$row['description'].'</b></h3>';
                                        echo '</div>';
                                        echo '<div class="box-body">';
                                        echo '<p>'.$instruct.'<span class="pull-right">';
                                        echo '<button type="button" class="btn btn-success btn-sm btn-curve reset" data-desc="'.slugify($row['description']).'"><i class="fa fa-refresh"></i> Reset</button>';
                                        echo '</span></p>';
                                        echo '<div id="candidate_list">';
                                        echo '<ul>'.$candidate.'</ul>';
                                        echo '</div></div></div></div></div>';

                                        echo '<div class="text-center">';
                                        echo '<button type="button" class="btn btn-success btn-curve preview" data-position="'.slugify($row['description']).'"><i class="fa fa-file-text"></i> Preview</button>';
                                        echo '<button type="submit" class="btn btn-primary btn-curve submit" data-position="'.slugify($row['description']).'" name="vote"><i class="fa fa-check-square-o"></i> Submit</button>';
                                        echo '</div>';
                                    }
                                }
                            ?>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php include 'includes/ballot_modal.php'; ?>
<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
    // Initialize iCheck plugin for checkbox and radio inputs
    $('.content').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });

    // Reset button functionality
    $(document).on('click', '.reset', function(e){
        e.preventDefault();
        var desc = $(this).data('desc');
        $('.'+desc).iCheck('uncheck');
    });

    // Platform button functionality
    $(document).on('click', '.platform', function(e){
        e.preventDefault();
        $('#platform').modal('show');
        var platform = $(this).data('platform');
        var fullname = $(this).data('fullname');
        $('.candidate').html(fullname);
        $('#plat_view').html(platform);
    });

    // Preview button functionality
    $(document).on('click', '.preview', function(e){
        e.preventDefault();
        var position = $(this).data('position');
        var form = $('#ballotForm').serializeArray().filter(function(item) {
            return item.name.indexOf(position) !== -1;
        });

        if(form.length === 0){
            $('.message').html('You must vote at least one candidate');
            $('#alert').show();
        }
        else{
            $.ajax({
                type: 'POST',
                url: 'preview.php',
                data: $.param(form),
                dataType: 'json',
                success: function(response){
                    if(response.error){
                        var errmsg = '';
                        var messages = response.message;
                        for (var i in messages) {
                            errmsg += messages[i];
                        }
                        $('.message').html(errmsg);
                        $('#alert').show();
                    }
                    else{
                        $('#preview_modal').modal('show');
                        $('#preview_body').html(response.list);
                    }
                }
            });
        }
    });

    // Submit button functionality
    $(document).on('click', '.submit', function(e){
        e.preventDefault();
        var position = $(this).data('position');
        var form = $('#ballotForm').serializeArray().filter(function(item) {
            return item.name.indexOf(position) !== -1;
        });

        if(form.length === 0){
            $('.message').html('You must vote at least one candidate');
            $('#alert').show();
        }
        else{
            $.ajax({
                type: 'POST',
                url: 'submit_ballot.php',
                data: $.param(form),
                dataType: 'json',
                success: function(response){
                    if(response.error){
                        var errmsg = '';
                        var messages = response.message;
                        for (var i in messages) {
                            errmsg += messages[i];
                        }
                        $('.message').html(errmsg);
                        $('#alert').show();
                    }
                    else{
                        $('.submit[data-position="' + position + '"]').replaceWith('<a href="#" class="btn btn-primary btn-curve view-ballot"><i class="fa fa-eye"></i> View Ballot</a>');
                    }
                }
            });
        }
    });

    // View Ballot button functionality
    $(document).on('click', '.view-ballot', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'view_ballot.php',
            dataType: 'json',
            success: function(response){
                if(response.error){
                    $('.message').html(response.list);
                    $('#alert').show();
                }
                else{
                    $('#preview_modal').modal('show');
                    $('#preview_body').html(response.list);
                }
            }
        });
    });
});
</script>
</body>
</html>
