<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Liste des annonces</h2>

            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "annonceDelete":
                            echo '<div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'annonce à bien était supprimer</div>';
                        break;
                        case "1":
                            echo '<div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'annonce à bien était modifier</div>';
                        break;
                    }
                }
            ?>
            
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titre</th>
                        <th>Poster par</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                <?= $annonces ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $footer_content ?>