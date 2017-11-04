<?php
  // db connection_aborted

  try{

    $host = "localhost";
    $dbname = "Sistering_inventories";
    $user = "root";
    $pass = "123";

    $conn = new PDO('mysql:host=localhost;port=3306;dbname=Sistering_inventories', $user, $pass);
    echo "db connected";
  }catch(PDOException $e){
    echo $e->getMessage();
    die("{'status': '500', 'msg': 'Error connecting to DB', 'data': ".json_encode($e->getMessage())." }");
  }


?>
