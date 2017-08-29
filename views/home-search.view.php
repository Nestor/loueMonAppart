<?= $header_content ?>
<div class="container">
    <div class="row">
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">Lieu: <?= ucfirst($search) ?></a>
        <button class="btn btn-primary searchType" data-search="all">All</button>&nbsp;
        <button class="btn btn-primary searchType" data-search="house">Maison</button>&nbsp;
        <button class="btn btn-primary searchType" data-search="appart">Appartement</button>&nbsp;
        <button class="btn btn-primary searchType" data-search="cars">Roulotte, Caravane, Camping car</button>&nbsp;&nbsp;
    </nav>
    </div>
    <div class="row containerParent">
        
        <div class="col">
            <h2>Logements</h2>
            <div class="d-flex flex-wrap align-content-center justify-content-center">
            <?=
                $annonces;
            ?>
            </div>
        </div>
    </div>
</div>
<?= $footer_content ?>