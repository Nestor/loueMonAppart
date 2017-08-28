<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">

            <h2>Location</h2>
            vous souhaiter louer l'annonce <?= $id ?>
            <div id="test"></div>
            <div id="testIndep"></div>
            <?php 
            setcookie("commandAnnonce", $id, time() + 3600, "/");
            // Flight::redirect(Config::getURL('location/login'));
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>