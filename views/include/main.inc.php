<div class="cadre cadre-100 center background-orange">
    <nav>
        <ul class="main background-green">
            <?php
                if(isset($_SESSION['user'])) {
                    echo $HTMLFormater->displayMain($_SESSION['user']);
                } else {
                    echo $HTMLFormater->displayMain();
                }
            ?>
        </ul>    
    </nav>
</div>