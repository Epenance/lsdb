<?php
  $id = $_GET['id'];
  $name = $_GET['name'];

  $conn = new mysqli("localhost", "dosh_dk", "h0b3rt123", "dosh_dk");
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }



  $sql = "INSERT INTO champions (champion_id, champion_name) VALUES ('$id', '$name')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

?>
