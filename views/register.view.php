<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Inscription</h2>
            <?php
            if(!empty($errors)) {
                echo Flight::HTMLFormater()->displayError($errors);

            }
            
            if(isset($_GET['etat'])) {
                switch($_GET['etat']) {
                    case "ok":
                        echo 'Vous pouvez maintenant vous <a href="'.Config::getURL('login').'">connecter</a><br/>';
                    break;
                }
            }
            ?>
            
            <form action="regist" method="post" class="col-md-5">

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
    </div>
</div>
<?= $footer_content ?>