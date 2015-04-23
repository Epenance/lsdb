<?php
    $champ_id = $_GET['champ_id'];
    $script_id = $_GET['script_id'];
    $vote = $_GET['vote'];
    $ip = $_SERVER['REMOTE_ADDR'];

    $conn = new mysqli("localhost", "dosh_dk", "h0b3rt123", "dosh_dk");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sel = "SELECT * FROM votes WHERE vote_ident = '$ip' AND fk_script_id = '$script_id' AND fk_champion_id = '$champ_id'";
    $sel_result = $conn->query($sel);

    if(mysqli_num_rows($sel_result) > 0) {
        while($row = mysqli_fetch_array($sel_result)) {
            $vote_id = $row['vote_id'];
            $sql = "UPDATE votes SET vote_value = '$vote' WHERE vote_id = $vote_id";
            $result = $conn->query($sql);
        }
    }else {
        $sql = "INSERT INTO votes (vote_id, fk_champion_id, fk_script_id, vote_value, vote_ident) VALUES (NULL, '$champ_id', '$script_id', '$vote', '$ip')";
        $result = $conn->query($sql);
    }

    $votes = 0;
    $champion = $_GET['champ_id'];
    $script= $_GET['script_id'];
    $sql2 = "SELECT * FROM votes WHERE fk_champion_id = '$champion' AND fk_script_id = '$script'";
    $result2 =  $conn->query($sql2) or die(mysql_error());
    while($row2 = mysqli_fetch_array($result2)) {
        $votes = $votes + $row2["vote_value"];
    }

    echo '<i class="fa fa-arrow-up"></i> '.$votes;


?>