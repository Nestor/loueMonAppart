<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="padding: 0;">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col containerParent">
            <h2>Paiement</h2>
                <?php
                    var_dump($_COOKIE['dateReserved']);
                    var_dump($_COOKIE['commandAnnonce']);
                ?>
        </div>
    </div>
</div>
<?= $footer_content ?>