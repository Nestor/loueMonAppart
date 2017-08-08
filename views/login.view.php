<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        
        <?= $main_content ?>

        <div class="cadre cadre-90 background-orange center">
        <?php
            if(!empty($errors)) {
                echo Flight::HTMLFormater()->displayError($errors);
            }
        ?>
        </div>
          <?php if(!isset($_SESSION['user'])) { ?>  
            <div class="cadre cadre-90 background-orange center">
                <form action="connect" method="post">

                    <input type="text" name="username" placeholder="Nom de compte" /><br/>
                    <input type="password" name="password" placeholder="Mot de passe" />

                    <input type="submit" value="Se connecter" />
                </form>
            </div>
         <?php } ?> 
        

    </div>
</div>
<?= $footer_content ?>