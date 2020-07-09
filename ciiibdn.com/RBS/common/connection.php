<?php      
    $db_host = 'localhost';  
    $db_user = 'root';  
    $db_password = '';  
    $db_name = 'ibdn';  
      
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);  
    if($conn->connect_errno) {  
        die('Failed to connect with MySQL: ' . $conn->connect_errno);  
    }  
?>  