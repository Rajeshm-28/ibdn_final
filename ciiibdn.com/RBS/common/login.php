<?php    

if (isset($_POST['login-submit'])){

    //Session start
    session_start();

    // connection to mySQL DB
    require'connection.php'; 
    
    $inputusr = $_POST['username'];
    $inputpwd = $_POST['password'];
    $id = 0;
    
    // Prepare SQL 
    if ($stmt = $conn->prepare('SELECT id, username, password FROM login_table WHERE username = ?')){
	        $stmt->bind_param('s', $inputusr);
	        $stmt->execute();
	        // Store the result to check if the account exists in the database.
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $username, $password);
                $stmt->fetch();
                // Account exists, verify the password.
                
                if (password_verify($inputpwd, $password)) {
                    session_start();
                    $_SESSION['userId'] = $id;
                    $_SESSION['userName'] = $username;

                    header('location: post.php');
                } else {
                    header("location: ../login/index.php?msg=invalidlpass");
                    exit();
                }
            } else {
                header("location: ../login/index.php?msg=invalidlname"); 
                exit();
            }

            $stmt->close();
        }
}else{
    header("location:../../index.php"); 
    exit();
}

?>  