<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        <?= $main_content ?>
        <?php
            if(!empty($errors)) {
                echo $errors;
            }
        ?>
        <div class="cadre cadre-90 background-orange center">
            <form action="regist" method="post">

                <input type="text" name="username" placeholder="Nom de compte" />
                <input type="password" name="password" placeholder="Mot de passe" />
                <input type="password" name="cpassword" placeholder="Confirmer votre mot de passe" />
                <input type="email" name="email" placeholder="Adresse mail" />
                <input type="radio" name="type" value="locataire" id="locataire"><label for="locataire"> Locataire</label>
                <input type="radio" name="type" value="proprietaire" id="proprietaire"> <label for="proprietaire"> Propriétaire</label>
                <input type="submit" value="S'inscrire" />

            </form>
        </div>
    </div>
</div>
<?= $footer_content ?>