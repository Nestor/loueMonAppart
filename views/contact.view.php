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
            <h2>Nous contacter</h2>
            <?php
            if(!empty($errors)) {
                echo Flight::HTMLFormater()->displayError($errors);
            }
            ?>

            <form action="contact" method="post">

            <div class="form-group">
              <input type="text" class="form-control" id="inputTitre" name="titre" placeholder="Enter title">
            </div>

            <div class="form-group">
              <textarea class="form-control" id="inputDescription" name="description" placeholder="Description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>

            
        </div>
    </div>
</div>
<?= $footer_content ?>