<?php
session_start();
if(!isset($_SESSION['Userid'])){
    header('Location: ./index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>העלאת פריט חדש</title>
    <link rel="stylesheet" type="text/css" href="css/Upload.css" />
</head>
<body>
        <form action="includes/UploadCheck.php" method="post" enctype="multipart/form-data">
                <p style="text-align:right;color:red;padding:5px 15px;">
                <?php
                if(isset($_GET['error'])){
                    switch($_GET['error']){
                        case 'emptyfields':
                            echo 'נא למלא את כל השדות';
                        break;
                        case 'invalidItemType':
                            echo 'שם המוצר חייב להיות אותיות עבריות או לועזיות בלבד';
                        break;
                        case 'invalidprice':
                            echo 'יש להקליד מחיר עם מספרים בלבד, בשביל אגורות יש להקליד אחרי נקודה';
                        break;
                        case 'filesize':
                            echo 'הקובץ גדול מדי, אנא בחר קובץ אחר';
                        break;
                        case 'failed':
                            echo 'אנא נסה שוב';
                        break;
                        case 'radiofailed':
                            echo 'אנא בחר סוג מוצר';
                        break;
                        case 'sqlerror':
                            echo 'חלה תקלה, אנא נסה שוב';
                        break;
                        case 'matchfailed':
                            echo 'סוג הקובץ אינו מתאים, אנא נסה קובץ אחר';
                        break;
                    }
                }elseif(isset($_GET['success'])){
                    switch($_GET['success']){
                        case 'passwordreset':
                            echo 'Password reset successful';
                        break;
                    }
                }
                ?>
                </p>

            <div class="ItemType-section">
                <input type="text" name="ItemType" autocomplete="off" required />
                <label for="ItemType" class="ItemType-label label">
                    <span class="label-content">סוג הפריט</span>
                </label>
            </div>

            <div class="price-section">
                <input type="text" name="price" autocomplete="off" inputmode="numeric" required />
                <label for="price" class="price-label label">
                    <span class="label-content">מחיר</span>
                </label>
            </div>

            <div class="file-section">
                <input type="file" name="fileUpload" required />
                <label for="fileUpload" class="file-label label">בחר תמונה</label>
            </div>
                
            <div class="radiofile-section">
                <p>סוג המוצר</p>
                <input type="radio" name="radiofile" id="label1" value="rings">
                <label class="radio" for="label1">טבעת</label>

                <input type="radio" name="radiofile" id="label2" value="necklaces">
                <label class="radio" for="label2">שרשרת</label>

                <input type="radio" name="radiofile" id="label3" value="bracelets">
                <label class="radio" for="label3">צמיד</label>
            </div>

            <div class="file-submit">
                <button type="submit" name="submit">פרסם</button>
            </div>
        
        </form>
</body>
</html>