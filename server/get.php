<?php
  // print_r($_POST);

  include "connect.php";

  if($_SERVER['REQUEST_METHOD'] == 'POST' ){

    $cat = $_POST['category'];
    //
    // SELECT gc.id_item_category AS cat_id, gc.name AS item_cat, g.id_item, g.name, g.priority  FROM  gtc_items g, gtc_item_categories gc
    //       WHERE g.id_item = gc.id_item_category
    //       AND gc.id_item_category = '1'
    $sql_item = "SELECT g.id_item, g.name AS item_name, g.priority, gc.id_item_category, gc.name AS cat_name, img AS cat_img 
FROM  gtc_items g, gtc_item_categories gc
 WHERE g.id_item_category = gc.id_item_category
   AND g.id_item_category = '$cat' ";

    // $sql_items = "SELECT * FROM gtc_items WHERE id_item_category = '1' ";

    try{

      $exe_item = $conn->prepare($sql_item);
      $exe_item -> execute();

      $get_item = $exe_item->fetchAll(PDO::FETCH_ASSOC);

      die('{"status": "200", "msg": "Data found; category = '.$cat.' ", "data" :  ' .json_encode($get_item). '  }');

    }catch(PDOException $e){
      echo $e-> getMessage();
      die("{'status': '500', 'msg': 'Failed to retrieve data from DB', 'data': ' ".json_encode("no data")." ' }");
      die('{"status": "200", "msg": "Data found", "data" :  ' .json_encode($get_item). '  }');
    }

  }
?>
