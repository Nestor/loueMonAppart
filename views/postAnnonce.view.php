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

            <form action="upload.php" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>
            
        </div>
    </div>
</div>
<?= $footer_content ?>