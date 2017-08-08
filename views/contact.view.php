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
            <form action="regist" method="post">

                <input type="text" name="titre" placeholder="Titre" />
                <textarea class="cadre cadre-90" name="description" placeholder="Description"></textarea>

                <input type="submit" value="Poster" />

            </form>
        </div>
    </div>
</div>
<?= $footer_content ?>