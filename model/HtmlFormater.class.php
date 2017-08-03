<?php

class HTMLFormater {
    public function HTMLAnnonce($id, $titre, $images, $price, $description) {
        return '
            <a href="annonce/'.$id.'">
            <div class="annonce">
                <header>
                    <img src="'.$images.'" alt="appart_img" draggable="false" />
                </header>
                <main class="background-white">
                    <p>
                        <span class="price"><span class="euro">'.$price.'</span> par nuit</span>, '.substr($description, 0, 100).' ...<br/>
                        <a href="#">10 Avis et 44 Commentaires</a>
                    </p>
                </main>
            </div>
            </a>
        ';
    }

    
    
}

?>