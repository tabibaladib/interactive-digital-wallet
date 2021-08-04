<?php 

    require 'dbconnect.php';

    function transection($trnc_type, $phone, $amount)
    {
      $conn = connect();
      $sql = $conn->prepare("SELECT trnc_type, phone, amount FROM USERS");
      $sql->execute();
      $res = $sql->get_result();
      return $res->fetch_all(MYSQLI_ASSOC);

    }

        function getalltrans();
    {
      $conn = connect();
      $sql = $conn->prepare("SELECT trnc_type, phone, amount FROM USERS");
      $sql->execute();
      $res = $sql->get_result();
      return $res->fetch_all(MYSQLI_ASSOC);

    }

    function gettrans($showDate)
    {
      $conn = connect();
      $sql = $conn->prepare("SELECT showDate FROM USERS where showDate = ?");
      $sql->bind_param("s", $showDate);
      $sql->execute();
      $res = $sql->get_result();
      return $res->fetch_all(MYSQLI_ASSOC);

    }




?>