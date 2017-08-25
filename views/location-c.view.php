<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Location</h2>
            <?php
            if(isset($_COOKIE['commandAnnonce'])) {
                var_dump($_COOKIE['commandAnnonce']);
                var_dump($_COOKIE['dateReserved']);
            }
            ?>
            <div class="d-flex flex-wrap align-content-center justify-content-center">
            <div class="row col-md-12">
                <?php if(!isset($_SESSION['user'])) { ?>
                <div class="col-md-6" style="border-right: 1px solid gray;">
                <h2>Se connecter</h2>
                    <form action="<?= Config::getURL('POST connect') ?>" method="post">
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