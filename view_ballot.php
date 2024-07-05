<?php
include 'includes/session.php';

$output = array('error'=>false);

$voter = $voter['id'];

$sql = "SELECT *, candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE voters_id='$voter'";
$query = $conn->query($sql);
$votes = '';
while($row = $query->fetch_assoc()){
    $votes .= '
        <div class="votelist">
            <span class="votelist-title">'.$row['description'].': </span>
            <span class="votelist-name">'.$row['canfirst'].' '.$row['canlast'].'</span>
        </div>
    ';
}

if($votes == ''){
    $output['error'] = true;
    $output['list'] = 'You have not voted yet.';
}
else{
    $output['list'] = $votes;
}

echo json_encode($output);
?>
