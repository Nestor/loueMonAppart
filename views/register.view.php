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
            <h2>Inscription</h2>
            <?php
            if(!empty($errors)) {
                echo $errors.'<br/>';
            }
            if(isset($_GET['etat'])) {
                switch($_GET['etat']) {
                    case "ok":
                        echo 'Vous pouvez maintenant vous <a href="'.Config::getURL('login').'">connecter</a><br/>';
                    break;
                }
            }
            ?>
            
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
    </div>
</div>
<?= $footer_content ?>