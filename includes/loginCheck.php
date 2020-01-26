<?php
if(isset($_POST['Login-submit'])){
    require 'DB.php'; // connecting to DataBase

    $user = $_POST['User'];
    $password = $_POST['Password'];

    if(empty($user) || empty($password)){ // if one of the inputs are empty
        header('Location: ../login.php?error=emptyfields');
        exit();
    }else{
        $sql = "SELECT * FROM momuser WHERE username =?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('Location: ../login.php?error=sqlerror');
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "s", $user);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password,$row['pwd']);
                if($pwdCheck == false){
                    header('Location: ../login.php?error=wrngpassword');
                    exit();
                }else if($pwdCheck == true){
                    session_start();
                    $_SESSION['Userid'] = $row['id'];
                    $_SESSION['Username'] = $row['username'];

                    header('Location: ../index.php?login=success');
                    exit();
                }else{
                    header('Location: ../login.php?error=wrongpassword');
                    exit();
                }
            }else{
                header('Location: ../login.php?error=nouser');
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
    header('Location: ../login.php');
    exit();
}


?>