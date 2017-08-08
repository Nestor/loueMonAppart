<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        
        <?= $main_content ?>

        <div class="cadre cadre-90 background-orange center">
        <?php
            
            if(!empty($errors)) {
                var_dump($errors);
            }
            if(isset($_SESSION['user'])) {
                echo 'Bonjour '.$_SESSION['user']['username'];
                var_dump($_SESSION['user']);
            }
            
        ?>
        </div>
        <div class="cadre cadre-90 background-orange center">
            <form action="connect" method="post">

                <input type="text" name="username" placeholder="Nom de compte" /><br/>
                <input type="password" name="password" placeholder="Mot de passe" />

                <input type="submit" value="Se connecter" />
            </form>
        </div>

    </div>
</div>
<?= $footer_content ?>