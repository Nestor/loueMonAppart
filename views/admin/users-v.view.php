<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Liste des utilisateurs</h2>
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