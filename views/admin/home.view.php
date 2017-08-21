<?= $header_content ?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: gray;"></div>
    </div>
    <div class="row">
        <div class="col" style="height: auto;min-height: 300px;padding:5px;background-color: silver;">
            <h2>Espace admin</h2>
            <hr/>
            <h3>Annonces</h3>
            <a href="<?= Config::getURL('admin/annonces') ?>" class="btn btn-primary">Annonces</a>
            <a href="<?= Config::getURL('admin/annonces-v') ?>" class="btn btn-primary">Annonces à valider</a>
            <hr/>
            <h3>Utilisateurs</h3>
            <a href="<?= Config::getURL('admin/users') ?>" class="btn btn-primary">Utilisateurs</a>
            <a href="<?= Config::getURL('admin/users-v') ?>" class="btn btn-primary">Utilisateurs à valider</a>
        </div>
    </div>
</div>
<?= $footer_content ?>