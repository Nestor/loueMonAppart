<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
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
                                        
                                        <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Options
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Lire</a>
                                        <a class="dropdown-item" href="#">Editer</a>
                                        <a class="dropdown-item" href="#">Valider</a>
                                        <a class="dropdown-item" href="#">Supprimer</a>
                                        </div>
                                    </div>
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