<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        <div class="cadre cadre-100 center background-orange">
            <h2>Se connecter</h2>
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