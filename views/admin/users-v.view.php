<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col containerParent">
            <h2>Liste des utilisateurs</h2>
            <?php
            if(isset($_GET['etat'])) {
                switch($_GET['etat']) {
                    case "1":
                        echo '<div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>L\'utilisateur à était accepter</div>';
                    break;
                }
            }
            ?>
            <table class="table table-inverse">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Grade</th>
                        <th>Date inscription</th>
                        <th>Propriétaire</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($users)) {
                    foreach($users as $user) {
                        if($user->getDemandeProprietaire() == "true") {
                        echo '
                        <tr>
                            <th scope="row">'.$user->getId().'</th>
                            <td>'.$user->getUsername().'</td>
                            <td>'.$user->getEmail().'</td>
                            <td>'.$user->getGrade().'</td>
                            <td>'.$user->getDateInscription().'</td>
                            <td>'.$user->getProprietaire().'</td>
                            <td><a href="'.Config::getURL('admin/users-v/valide/'.$user->getId()).'" class="btn btn-success">Valider</a></td>
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