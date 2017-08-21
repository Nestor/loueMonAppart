<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: gray;">test
            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "ok":
                            echo '<p>Votre annonce à était poster veuillez patienter pendant qu\'un membre du staff valide votre annonce</p>';
                        break;
                    }
                }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Espace admin</h2>
            <hr/>
            <h3>Annonces</h3>
            <a href="<?= Config::getURL('admin/annonces') ?>" class="btn btn-primary">Liste des annonces</a>
            <a href="<?= Config::getURL('admin/annonces-v') ?>" class="btn btn-primary">Liste des annonces à valider (0)</a>
            <hr/>
            <h3>Utilisateurs</h3>
            <a href="<?= Config::getURL('admin/users') ?>" class="btn btn-primary">Liste des utilisateurs</a>
            <a href="<?= Config::getURL('admin/users-v') ?>" class="btn btn-primary">Liste des utilisateurs à valider (0)</a>
        </div>
    </div>
</div>
<?= $footer_content ?>