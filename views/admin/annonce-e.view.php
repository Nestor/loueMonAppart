<?= $header_content ?>

<div class="container">
    <div class="row">
        <div class="col containerParent">
            <?php
                if(!empty($errors)) {
                    echo $errors;
                }
                
                if(!empty($annonce)) {
                    $annonce->setId($id);
                    $data=$annonce->load(Flight::Bddmanager());
                    echo '
                        <form action="'.Config::getURL().'annonceedit" method="post">
                        <input type="hidden" value="'.$data->getId().'" name="id"/>
                        <input type="hidden" value="'.$data->getAccept().'" name="accept"/>
                        <input type="hidden" value="'.$data->getIdUser().'" name="idUser"/>
                        <div class="form-group">
                            <input type="text" class="form-control" id="inputTitre" name="titre" value="'.$data->getTitre().'" placeholder="Enter title">
                        </div>

                        <div class="form-group">
                            <label for="inputDateDispo">Disponible à partir du: </label><input type="date" value="'.$data->getDateDispo().'" class="form-control" id="inputDateDispo" name="dateDispo"/>
                        </div>
                        <div class="form-group">
                            <label for="inputPlaceDispo">Nombre de place disponible: (min: 1 place, max: 14 places) </label><input type="number" value="'.$data->getPlaceDispo().'" class="form-control" id="inputPlaceDispo" name="numberPlace" value=1 min=1 max=14/>
                        </div>
                        <div class="form-group">
                            <label for="inputPrix">Prix par nuit: (min: 10&euro;, max: 300&euro;)</label><input type="number" class="form-control" id="inputPrix" name="price" value='.$data->getPrice().' min=10 max=300/>
                        </div>
                        <div class="form-group">
                            <label for="inputType">Type (house, appart, cars)</label>
                            <input type="text" class="form-control" id="inputType" name="type" value='.$data->getType().'>
                        </div>
                        <div class="form-group">
                            <label for="inputLieu">Lieu: </label><input type="text" class="form-control" id="inputLieu" name="lieu" value='.$data->getLieu().'>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Description">'.$data->getDescription().'</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                    ';
                }
                
            ?>
        </div>
    </div>
</div>
<?= $footer_content ?>