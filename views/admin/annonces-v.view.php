<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col containerParent">
        <?php
            if(isset($_GET['etat'])) {
                switch($_GET['etat']) {
                    case "1":
                        echo '<div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'annonce à bien était accepter</div>';
                    break;
                }
            }
        ?>
            <h2>Liste des annonces à valider</h2>
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
                            if($annonce->getAccept() == "false") {
                                // echo '<a href="'.Config::getURL('admin/annonce/'.$annonce->getId()).'">'.$annonce->getTitre().' | '.$annonce->getDatePosted().'</a><br/>';
                                echo '
                                <tr>
                                    <th scope="row">'.$annonce->getId().'</th>
                                    <td>'.$annonce->getTitre().'</td>
                                    <td>'.$annonce->getIdUser().'</td>
                                    <td>'.$annonce->getPrice().'&euro; par nuit</td>
                                    <td>'.$annonce->getDatePosted().'</td>
                                    <td>
                                        <a href="'.Config::getURL('admin/annonces-v/valide/'.$annonce->getId()).'" class="btn btn-success">Valider</a>
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