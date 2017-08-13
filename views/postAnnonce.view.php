<?= $header_content ?>
<div class="container-parent">
    <div class="container">
        <?= $main_content ?>
        <?php
            if(!empty($errors)) {
                echo $errors;
            }
        ?>
        <div class="cadre cadre-90 background-orange center">
        
            <form action="annoncepost" method="post">
                <input type="text" name="titre" placeholder="Titre" />
                <textarea class="cadre cadre-90" name="description" placeholder="Description"></textarea>
                Date dispo: <input type="date" name="dateDispo"/>
                Place: <input type="number" name="numberPlace" min=1 max=14>
                Prix par nuit: <input type="number" name="price" value=30 min=1 max=300>
                <input type="submit" value="Poster" />
            </form>

        </div>
    </div>
</div>
<?= $footer_content ?>