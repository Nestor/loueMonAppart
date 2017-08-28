<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <?php
                $countAnnoncesNotValidated = Flight::Annonce()->countAnnoncesNotValidated(Flight::Bddmanager());
                $countAnnoncesValidated = Flight::Annonce()->countAnnoncesValidated(Flight::Bddmanager());
                $countUsers = Flight::User()->countUsers(Flight::Bddmanager());
                $countUsersNotValidated = Flight::User()->countUsersNotValidated(Flight::Bddmanager());
            ?>
            <div id="accordion" role="tablist">
                <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseAnnonces" aria-expanded="true" aria-controls="collapseAnnonces">
                            Gestion des annonces
                            </a>
                        </h5>
                    </div>

                    <div id="collapseAnnonces" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <a href="<?= Config::getURL('admin/annonces') ?>" class="btn btn-primary">Liste des annonces <span class="badge badge-dark"><?= $countAnnoncesValidated ?></span></a>
                            <a href="<?= Config::getURL('admin/annonces-v') ?>" class="btn btn-primary">Liste des annonces à valider <span class="badge badge-dark"><?= $countAnnoncesNotValidated ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseUtilisateurs" aria-expanded="true" aria-controls="collapseUtilisateurs">
                            Gestion des utilisateurs
                            </a>
                        </h5>
                    </div>

                    <div id="collapseUtilisateurs" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <a href="<?= Config::getURL('admin/users') ?>" class="btn btn-primary">Liste des utilisateurs <span class="badge badge-dark"><?= $countUsers ?></span></a>
                            <a href="<?= Config::getURL('admin/users-v') ?>" class="btn btn-primary">Liste des utilisateurs à valider <span class="badge badge-dark"><?= $countUsersNotValidated ?></span></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" role="tab" id="headingTree">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapseSupport" aria-expanded="true" aria-controls="collapseSupport">
                            Gestion du support
                            </a>
                        </h5>
                    </div>

                    <div id="collapseSupport" class="collapse show" role="tabpanel" aria-labelledby="headingTree" data-parent="#accordion">
                        <div class="card-body">
                            <a href="<?= Config::getURL('admin/message') ?>" class="btn btn-primary disabled">Liste des messages <span class="badge badge-dark">0</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $footer_content ?>