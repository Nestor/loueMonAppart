<div class="cadre cadre-100 center background-orange">
    <nav>
        <ul class="main background-green">
            <?php
                if(isset($_SESSION['user'])) {
                    echo $HTMLFormater->main($_SESSION['user']);
                } else {
                    echo $HTMLFormater->main();
                }
            ?>
        </ul>    
    </nav>
</div>