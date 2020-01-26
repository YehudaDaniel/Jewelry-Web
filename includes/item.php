<?php

function ItemDisplay($query){
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $query)){
        echo 'fail';
    }else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
            echo    '<div class="item">
                        <div class="jewelType">
                            <h3>'.$row["itemtype"].'</h3>
                        </div>
                        <div class="jewelDisplay">
                            <img src="./Photos/'.$row['imgfoldername'].'/'.$row['imgname'].'" alt="Display">
                        </div>
                        <div class="Description">
                            <div class="price">
                                <span>'.$row["price"].'</span>
                                <span>מחיר</span>
                            </div>
                        </div>
                    </div>';
        }
    }
}
?>