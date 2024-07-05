<?php
include 'includes/session.php';
include 'includes/slugify.php';

$output = array('error' => false, 'list' => '', 'message' => array());

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
                    $sql = "SELECT * FROM candidates WHERE id = '$candidate'";
                    $cquery = $conn->query($sql);
                    $crow = $cquery->fetch_assoc();
                    $output['list'] .= '
                        <li>'.$crow['firstname'].' '.$crow['lastname'].' - '.$row['description'].'</li>
                    ';
                }
            }
        } else {
            $sql = "SELECT * FROM candidates WHERE id = '".$_POST[$position]."'";
            $cquery = $conn->query($sql);
            $crow = $cquery->fetch_assoc();
            $output['list'] .= '
                <li>'.$crow['firstname'].' '.$crow['lastname'].' - '.$row['description'].'</li>
            ';
        }
    }
}

echo json_encode($output);
?>
