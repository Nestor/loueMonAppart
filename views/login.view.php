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
            <h2>Connexion</h2>
            <?php
            if(!empty($errors)) {
                echo Flight::HTMLFormater()->displayError($errors);
            }
            ?>
            <?php if(!isset($_SESSION['user'])) { ?> 
            <form action="connect" method="post">
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
            <?php } ?>

            
        </div>
    </div>
</div>
<?= $footer_content ?>