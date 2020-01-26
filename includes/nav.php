<nav class="ElcolorTo">
    <input type="checkbox" id="checkbox">
    <label for="checkbox" class="checkbtn"><a class="box-shadow-menu"></a></label>
        <div class="Logo">
            <a href="http://localhost/momsweb/index.php">
                <h2 class="ElcolorFrom">Suppl</h2>
            </a>
        </div>
        <ul class="ElcolorFrom">
            <li><a href="http://localhost/momsweb/pages/rings.php" class="ElcolorFrom">Rings</a></li>
            <li><a href="http://localhost/momsweb/pages/bracelets.php" class="ElcolorFrom">Bracelets</a></li>
            <li><a href="http://localhost/momsweb/pages/necklaces.php" class="ElcolorFrom">Necklaces</a></li>
            <li><a href="http://localhost/momsweb/pages/top.php" class="ElcolorFrom">TOP</a></li>
            <?php
                if(isset($_SESSION['Userid'])){ ?>
                    <li>
                        <form action="http://localhost/momsweb/includes/logoutCheck" method="post">
                            <button type="submit" class="logout-submit">Logout</button>
                        </form>
                    </li>
            <?php } ?>
            <?php
                if(isset($_SESSION['Userid'])){ ?>
                    <li>
                        <a href="http://localhost/momsweb/Upload.php" class="ElcolorFrom">העלאה</a>
                    </li>
            <?php } ?>
        </ul>
    </nav>