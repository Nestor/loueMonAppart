<?= $header_content ?>
<div class="container-parent">
    <div class="container rgb(236, 240, 241)">

        <?= $main_content ?>
        <div class="cadre cadre-100 center background-white">
            <form action="#" method="post" id="search-location">
            <table>
                <tr>
                    <td>
                        <input type="text" name="Destination" placeholder="Destination"/></td>
                    <td>
                        <input type="date" name="Date" placeholder="Date"/>
                    </td>
                    <td>
                        <input type="text" name="NbrPerson" placeholder="Nombre de personnes"/>
                    </td>
                    <td><input type="submit" value="Rechercher" /></td>
                </tr>
            </table>
            </form>
        </div>
        <div class="cadre cadre-100 background-orange center">
            <h2>Logements</h2>
            <div class="flex-annonce">
                <?php
                    $AnnonceManager = $BddManager->getAnnonceManager();
                    $annonces = $AnnonceManager->getAnnonces();

                    foreach($annonces as $annonce) {
                        echo $HTMLFormater->HTMLAnnonce($annonce->getId(), $annonce->getTitre(), 'https://a0.muscache.com/im/pictures/1a79afd1-0595-4d66-a323-7998aa16fb9e.jpg', $annonce->getPrice(), $annonce->getDescription(), $annonce->getAccept());
                    }
                ?>
            </div>
        </div>

    </div>
</div>
<?= $footer_content ?>