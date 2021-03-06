<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col containerParent">
            <h2>Location</h2>
            <?php
            if(isset($_SESSION['user'])){
                if(isset($_COOKIE['commandAnnonce']) && isset($_COOKIE['dateReserved'])) {
                    Flight::Annonce()->setId($_COOKIE['commandAnnonce']);
                    $annonceLoadPrice = Flight::Annonce()->load(Flight::Bddmanager());
                    $dataPrice = $annonceLoadPrice->getPrice();
                    $reserved = rtrim($_COOKIE['dateReserved'], ',');
                    $daysReserverd = explode(",", $reserved);
                    $price = 0;

                    echo 'Id: '.$_COOKIE['commandAnnonce'].'<br/>';
                    echo 'Prix: '.$dataPrice.'&euro;<br/>';
                    echo 'Jours réserver:<br/>';
                    
                    foreach($daysReserverd as $day) {
                        echo $day.'<br/>';
                        $price += $dataPrice;
                    }
                    echo 'Prix total: '.$price.'&euro;<br/>';
                    echo '<a class="btn btn-primary" href="'.Config::getURL('paiement').'">Payer (valider)</a>';
                }
            } else {
                echo 'Veuillez vous connecter pour finaliser la commande';
            }
            ?>
            <div class="d-flex flex-wrap align-content-center justify-content-center">
            <div class="row col-md-12">
                <?php if(!isset($_SESSION['user'])) { ?>
                <div class="col-md-6" style="border-right: 1px solid gray;">
                <h2>Se connecter</h2>
                    <form action="<?= Config::getURL('') ?>connect" method="post">
                        <div class="form-group">
                        <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Enter username">
                        </div>

                        <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        </div>

                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                            Se souvenir de moi ?
                        </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="col-md-6" style="border-left: 1px solid gray;">
                <h2>S'inscrire</h2>
                    <form action="regist" method="post">

                        <div class="form-group">
                        <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" id="inputConfirmPassword" name="cpassword" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Adress mail">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <?php } ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?= $footer_content ?>