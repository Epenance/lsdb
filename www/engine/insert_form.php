<?php
$conn = new mysqli("localhost", "dosh_dk", "h0b3rt123", "dosh_dk");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit_script'])) {
    $name = $_POST['name'];
    $author = $_POST['author'];
    $git = $_POST['git'];
    $forum = $_POST['forum'];
    $champions = $_POST[check_list];

    $sql = "INSERT INTO scripts (script_id, script_name, script_author, script_git, script_forum) VALUES (NULL, '$name', '$author', '$git', '$forum')";
    $result = $conn->query($sql);

    $sql2 = "SELECT * FROM scripts WHERE script_name = '$name' AND script_author = '$author' AND script_git = '$git' AND script_forum = '$forum'";
    $result2 = $conn->query($sql2);
    $row = mysqli_fetch_array($result2);

    if(!empty($_POST['check_list'])) {
        foreach($_POST['check_list'] as $check) {
            $script_id = $row['script_id'];

            $sql3 = "INSERT INTO link (link_id, fk_champion_id, fk_script_id) values (null, '$check', '$script_id')";
            $result3 = $conn->query($sql3);
        }
    }
    echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Better check yourself, in case Martin fucked up.
</div>';
}

function champions() {
    $conn = new mysqli("localhost", "dosh_dk", "h0b3rt123", "dosh_dk");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM champions";

    $result = $conn->query($sql);

    while($row = mysqli_fetch_array($result)) {
        echo '<label class="checkbox-inline">
                  <input type="checkbox" name="check_list[]" value="'.$row['champion_id'].'"> '.$row['champion_name'].'
              </label>';
    }
}

    echo '<form method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Script Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter script name">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Script Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Enter script author">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Script Git</label>
                <input type="text" class="form-control" id="git" name="git" placeholder="Enter script github">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Script Forum post</label>
                <input type="text" class="form-control" id="forum" name="forum" placeholder="Enter forum post">
              </div><div class="form-group">
              ';
                champions();

              echo '
              </div><div class="form-group"><button type="submit" name="submit_script" class="btn btn-default">Submit</button></div>
            </form>';

?>