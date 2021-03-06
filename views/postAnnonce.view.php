<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col containerParent">
            <h2>Annonce</h2>
            <?php
            if(!empty($errors)) {
                echo Flight::HTMLFormater()->displayError($errors);
            }
            ?>

            <form action="annoncepost" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" id="inputTitre" name="titre" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="inputDateDispo">Disponible à partir du: </label><input type="date" class="form-control" id="inputDateDispo" name="dateDispo"/>
            </div>
            <div class="form-group">
                <label for="inputPlaceDispo">Nombre de place disponible: (min: 1 place, max: 14 places) </label><input type="number" class="form-control" id="inputPlaceDispo" name="numberPlace" value=1 min=1 max=14/>
            </div>
            <div class="form-group">
                <label for="inputPrix">Prix par nuit: (min: 10&euro;, max: 300&euro;)</label><input type="number" class="form-control" id="inputPrix" name="price" value=30 min=10 max=300/>
            </div>

            <div class="form-group">
                <label for="inputType">Type</label>
                <select name="type" id="inputType" class="form-control">
                    <option value="house">Maison</option>
                    <option value="appart">Appartement</option>
                    <option value="cars">Roulotte, Caravane, Camping car</option>
                </select>
            </div>
            <div class="form-group">
                <label for="inputLieu">Ville: </label><input type="text" id="inputLieu" class="form-control" name="lieu" />
            </div>

            <div class="form-group">
                <label for="inputAddr">Adresse: (ex: 10 rue de la Capital)</label><input type="text" class="form-control" id="inputAddr" name="addresse"/>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="description" placeholder="Description"></textarea>
            </div>
            
            <div class="form-group">
                <label>Images: (min: 1 image, max: 3 images)</label>
                <input type="file" class="form-control" name="monfichier1"/>
                <input type="file" class="form-control" name="monfichier2"/>
                <input type="file" class="form-control" name="monfichier3"/>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
          </form>
            
        </div>
    </div>
</div>
<?= $footer_content ?>