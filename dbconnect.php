<?php

    function connect()
    {



       $conn = new mysqli("localhost","digital-wallet", "1234", "wtk" );

       if($conn->connect_errno)
        {
            die("Database connection failed...".$conn->connect_err);
        }
            return $conn;
    }   

?>