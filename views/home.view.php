<?= $header_content ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mainmenu">
            <?= $main_content ?>
        </div>
    </div>
    <div class="row">
        <div class="col" style="height: auto;background-color: #fff;">
            <button class="btn btn-primary searchType" data-search="all">All</button>
            <button class="btn btn-primary searchType" data-search="house">Maison</button>
            <button class="btn btn-primary searchType" data-search="appart">Appartement</button>
            <button class="btn btn-primary searchType" data-search="cars">Roulotte, Caravane, Camping car</button>

            <form action="searchLieux" method="post">
                <input type="text" name="lieu" placeholder="Lieux"/>
                <input type="submit" value="Rechercher" />
            </form>
        </div>
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