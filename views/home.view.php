<?= $header_content ?>


<div class="container-parent">
    <div class="container">
        <div class="cadre cadre-100 center background-orange background-orange-h">
            <h2>Accueil</h2>
        </div>
        
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
        <div class="cadre cadre-90 background-orange center">
            <h2>Logements</h2>
            <div class="flex-annonce">
                <!-- <div class="annonce">
                    <header>
                        <img src="https://a0.muscache.com/im/pictures/1a79afd1-0595-4d66-a323-7998aa16fb9e.jpg" alt="appart_img" draggable="false" />
                    </header>
                    <main class="background-white">
                        <p>
                            <span class="price"><span class="euro">10</span> par nuit</span>, Un briève description en plus fera l'affaire
                            <a href="">10 Avis et 44 Commentaires</a>
                        </p>
                    </main>
                </div> -->
                <?php
                $AnnonceManager = $BddManager->getAnnonceManager();
                $annonces = $AnnonceManager->getAnnonces();

                foreach($annonces as $annonce) {
                    echo $HTMLFormater->HTMLAnnonce($annonce->getId(), $annonce->getTitre(), 'https://a0.muscache.com/im/pictures/1a79afd1-0595-4d66-a323-7998aa16fb9e.jpg', $annonce->getPrice(), $annonce->getDescription());
                }

                // var_dump($annonces);
                // $annonce = $HTMLFormater->HTMLAnnonce('Perpi centre', 'https://a0.muscache.com/im/pictures/1a79afd1-0595-4d66-a323-7998aa16fb9e.jpg', '100', 'Un briève description en plus fera l\'affaire.');
                // echo $annonce;
                ?>
                <!-- <div class="annonce">
                    <header>
                        <img src="https://a0.muscache.com/im/pictures/a1838af8-07e4-42dd-b782-02f764e781c3.jpg" alt="appart_img" draggable="false" />
                    </header>
                    <main class="background-white">
                        <p>
                            <span class="price"><span class="euro">10</span> par nuit</span>, Un briève description en plus fera l'affaire
                            <a href="">10 Avis et 44 Commentaires</a>
                        </p>
                    </main>
                </div>
                <div class="annonce">
                    <header>
                        <img src="https://a0.muscache.com/im/pictures/9398971d-24f4-4634-ab7f-046f6799cd47.jpg" alt="appart_img" draggable="false" />
                    </header>
                    <main class="background-white">
                        <p>
                            <span class="price"><span class="euro">10</span> par nuit</span>, Un briève description en plus fera l'affaire
                            <a href="">10 Avis et 44 Commentaires</a>
                        </p>
                    </main>
                </div> -->
            </div>
        </div>
    </div>
</div>
<?= $footer_content ?>