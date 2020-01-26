<?php

if(isset($_POST['submit'])){
    $itemtype = $_POST['ItemType'];
    $price = $_POST['price'];
    $file = $_FILES['fileUpload'];
    $radio = $_POST['radiofile'];
    $fileName = $_FILES['fileUpload']['name'];
    $fileTmpName = $_FILES['fileUpload']['tmp_name'];
    $fileSize = $_FILES['fileUpload']['size'];
    $fileError = $_FILES['fileUpload']['error'];
    $fileType = $_FILES['fileUpload']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = ['jpg', 'jpeg', 'png'];

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $folder;
                if(empty($_POST['radiofile'])){
                    header('Location: ../Upload.php?error=radiofailed');
                    exit();
                }else{
                    if($_POST['radiofile'] == 'rings'){
                        $folder = 'rings/';
                    }else if($_POST['radiofile'] == 'necklaces'){
                        $folder = 'necklaces/';
                    }else if($_POST['radiofile'] == 'bracelets'){
                        $folder = 'bracelets/';
                    }
                    $fileNameNew = uniqid('',true).'.'.$fileActualExt;
                    $fileDes = '../Photos/'.$folder.$fileNameNew;

                    require 'DB.php';

                    if(empty($_POST['ItemType']) || empty($_POST['price'])){
                        header('Location: ../Upload.php?error=emptyfields');
                        exit();
                    }else if(!preg_match('/^[אבגדהוזחטיכךלמםנןסעפףצץקרשתA-Za-z]*$/', $ItemType)){ // if ItemType isnt valid
                        header('Location: ../Upload.php?error=invalidItemType');
                        exit();
                    }else if(!preg_match('/^[0-9]\d*(\.[0-9]+)?$/', $price)){ // if price isnt valid ~ int or float
                        header('Location: ../Upload.php?error=invalidprice');
                        exit();
                    }else{
                        $sql = 'SELECT * FROM items;';
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            header('Location: ../Upload.php?error=sqlerror');
                            exit();
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);
                            $rows = mysqli_num_rows($result);
                            // $imgOrder = $rows + 1;

                            $sql = 'INSERT INTO items(itemtype, price, imgname, imgfoldername) VALUES(?, ?, ?, ?);';
                            if(!mysqli_stmt_prepare($stmt, $sql)){
                                header('Location: ../Upload.php?error=sqlerror');
                                exit();
                            }else{
                                mysqli_stmt_bind_param($stmt, "sdss",$itemtype, $price, $fileNameNew, $radio);
                                mysqli_stmt_execute($stmt);

                                move_uploaded_file($fileTmpName, $fileDes);
                                header('Location: ../index.php?successfulupload');
                                exit();
                            }
                        }
                    }
                }

            }else{
                header('Location: ../Upload.php?error=filesize');
                exit();
            }
        }else{
            header('Location: ../Upload.php?error=failed');
            exit();
        }
    }else{
        header('Location: ../Upload.php?error=matchfailed');
        exit();
    }


}
?>