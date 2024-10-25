<?php
include 'includes/session.php';
include 'includes/slugify.php';

$output = array('error' => false, 'message' => array());

$sql = "SELECT * FROM positions";
$query = $conn->query($sql);

while ($row = $query->fetch_assoc()) {
    $position = slugify($row['description']);
    if (isset($_POST[$position])) {
        if (is_array($_POST[$position])) {
            if (count($_POST[$position]) > $row['max_vote']) {
                $output['error'] = true;
                $output['message'][] = '<li>You can only choose '.$row['max_vote'].' candidates for '.$row['description'].'</li>';
            } else {
                foreach ($_POST[$position] as $candidate) {
                    $sql = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['voters_id']."', '$candidate', '".$row['id']."')";
                    if(!$conn->query($sql)){
                        $output['error'] = true;
                        $output['message'][] = $conn->error;
                    }
                }
            }
        } else {
            $sql = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['voters_id']."', '".$_POST[$position]."', '".$row['id']."')";
            if(!$conn->query($sql)){
                $output['error'] = true;
                $output['message'][] = $conn->error;
            }
        }
    }
}

echo json_encode($output);
?>
