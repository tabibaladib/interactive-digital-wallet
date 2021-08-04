<?php 

    require 'dbconnect.php';

    function transection($trnc_type, $phone, $amount)
    {
      $conn = connect();
      $sql = $conn->prepare("INSERT INTO USERS (trnc_type, phone, amount) VALUES (?,?,?)");
      $sql->bind_param("sss", $trnc_type, $phone, $amount);
      return $sql->execute();
    }



?>