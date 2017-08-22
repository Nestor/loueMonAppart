<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: 50px;background-color: gray;"></div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Liste des annonces</h2>
            <?php
                if(isset($_GET['etat'])) {
                    switch($_GET['etat']) {
                        case "annonceDelete":
                            echo 'L\'annonce à bien était supprimer';
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
                <?php
                    if(!empty($annonces)) {
                        foreach($annonces as $annonce) {
                            if($annonce->getAccept() == "true") {
                                echo '
                                <tr>
                                    <th scope="row">'.$annonce->getId().'</th>
                                    <td><a href="'.Config::getURL('admin/annonce/'.$annonce->getId()).'">'.$annonce->getTitre().'</a></td>
                                    <td>'.$annonce->getIdUser().'</td>
                                    <td>'.$annonce->getPrice().'&euro; par nuit</td>
                                    <td>'.$annonce->getDatePosted().'</td>
                                    <td>
                                        <a href="'.Config::getURL('admin/annonce/'.$annonce->getId()).'" class="btn btn-primary">Lire</a>
                                        <a href="'.Config::getURL('admin/annonce/edit/'.$annonce->getId()).'" class="btn btn-primary">Editer</a>
                                        <a href="'.Config::getURL('admin/annonce/delete/'.$annonce->getId()).'" class="btn btn-danger">Supprimer</a>
                                    </td>
                                </tr>
                                ';
                            }
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $footer_content ?>