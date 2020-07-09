<?php    

if (isset($_POST['submit'])){

    //Session start
    session_start();

    // connection to mySQL DB
    require'connection.php'; 
    

    // Define variables and initialize with empty values
    $username = $password = $cmn = $name = $email = $text =  $token = "";
    $errors = array();
    
    // validate company member number
    $tempCmn = $_POST ["cmn"];  
    if (!preg_match ("/^[0-9]*$/", $tempCmn) ){ 
        header("location: ../signup/index.php?msg=invalidcmn"); 
        exit(); 
    } else {  
        $cmn = trim($_POST["cmn"]);
    }     

    // validate name
    $tempName = $_POST ["name"];  
    if (!preg_match ("/^[a-zA-Z ]*$/", $tempName) ){  
        header("location: ../signup/index.php?msg=invalidname"); 
        exit();  
    } else {  
        $name = trim($_POST["name"]); 

    }  

    // validate email
    $tempEmail = $_POST ["email"];  
    $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
    if (!preg_match ($pattern, $tempEmail) ){  
        header("location: ../signup/index.php?msg=invalidemail"); 
        exit(); 
    } else {  
        $emailQuery = "SELECT email FROM login_table WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($emailQuery);
        $stmt->bind_param('s', $_POST["email"]);
        $stmt->execute();
        $stmt->store_result();
            if ($stmt->num_rows > 0) {
                header("location: ../signup/index.php?msg=emailexists");
                exit();
            }else{
                $email = trim($_POST["email"]);
            }   
        $stmt->close();
        
    }  

    // validate username
    $tempUserName = $_POST ["username"];  
    if (!preg_match ("/^[a-zA-Z0-9]*$/", $tempUserName) ){  
        header("location: ../signup/index.php?msg=invaliduname");  
        exit();
    } else {  
        $userQuery = "SELECT username FROM login_table WHERE username=? LIMIT 1";
        $stmt = $conn->prepare($userQuery);
        $stmt->bind_param('s', $_POST["username"]);
        $stmt->execute();
        $stmt->store_result();
            if ($stmt->num_rows > 0) {
                header("location: ../signup/index.php?msg=invaliduexists");
                exit();
            }else{
                $username = trim($_POST["username"]);
            }   
        $stmt->close();
        
    }  

    // validate password
    $password = $_POST["password"];

    // validate text
    $text = trim($_POST["text"]);

    // Store the user 
    $password = password_hash($password, PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO login_table (`company-mem-no`, `name`, `email`, `username`, `password`, `text`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ssssss', $cmn, $name, $email, $username, $password, $text);
        
    if($stmt->execute()){
        $user_id = $conn->insert_id;
        $_SESSION['id'] = $user_id;
        $_SESSION['username'] = $username;
        $_SESSION['message'] = "you are now logged in";
        $_SESSION['alert-class'] = "alert-success";
        header('location: ../login/index.php?msg=success');
        exit();
    }else{
        header("location: ../signup/index.php?msg=dberror");
        exit();
    }
    $stmt->close();
    $conn->close(); 

}else{
    header("location: ../signup/index.php"); 
    exit();  
}

?>  