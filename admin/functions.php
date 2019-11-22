<?php


  
function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

function filterEmail($field){
    // Sanitize e-mail address
    $field = filter_var($field, FILTER_SANITIZE_EMAIL);

    // Validate e-mail address
    if(filter_var($field, FILTER_VALIDATE_EMAIL)){
        return $field;
    } else{
        return FALSE;
    }
}

  function confirmQuery($result) {
    global $conn;
    if(!$result) {
      die('QUERY FAILED' . mysqli_error($conn));
    }
  }


 ?>
