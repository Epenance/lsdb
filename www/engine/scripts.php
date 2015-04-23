<?php
  $id = $_GET['id'];

  $conn = new mysqli("localhost", "dosh_dk", "h0b3rt123", "dosh_dk");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT *
          FROM link
          INNER JOIN scripts ON link.fk_script_id = scripts.script_id
          WHERE fk_champion_id = '$id'";

  $result = $conn->query($sql);

function forum_btn($forum) {
    if(!empty($forum)) {
        return '<a class="btn-sm btn-primary" href="'.$forum.'">Forum</a>';
    }else {
        return '';
    }
}

  while($row = mysqli_fetch_array($result)) {

      //Votes
      $votes = 0;
      $champion = $row['fk_champion_id'];
      $script = $row['script_id'];
      $sql2 = "SELECT * FROM votes WHERE fk_champion_id = '$champion' AND fk_script_id = '$script'";
      $result2 =  $conn->query($sql2) or die(mysql_error());
      while($row2 = mysqli_fetch_array($result2)) {
          $votes = $votes + $row2["vote_value"];
      }
      //Votes

      echo '<div class="scriptWrapper col-sm-12 alert-success">
                <div class="row">
                  <div class="col-sm-10">
                    <h4 class="scriptName">'.$row["script_name"].'</h4>
                  </div>
                  <div class="scriptUpvotes col-sm-2">
                    <h4>
                      <span class="badge" id="vote-'.$row["script_id"].'"><i class="fa fa-arrow-up"></i> '.$votes.'</span>
                    </h4>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p class="scriptAuthor">
                      '.$row["script_author"].'
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="scriptControls col-sm-6">
                    <a class="btn-sm btn-primary" href="http://github.com/'.$row["script_git"].'">Github</a><a class="btn-sm btn-primary" href="ls://project/'.$row["script_git"].'"">Install</a>'.forum_btn($row["script_forum"]).'
                  </div>
                  <div class="scriptVoting col-sm-6">
                    <span class="btn-sm btn-danger downvote" data-champion="'.$row["fk_champion_id"].'" data-script="'.$row["script_id"].'"><i class="fa fa-arrow-down"></i></span><span class="btn-sm btn-success upvote" data-champion="'.$row["fk_champion_id"].'" data-script="'.$row["script_id"].'"><i class="fa fa-arrow-up"></i></span>
                  </div>
                </div>
              </div>';
  }

  mysqli_close($conn);

?>
