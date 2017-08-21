
<?php
if(isset($_SESSION['user'])) {
    echo $HTMLFormater->displayMain($_SESSION['user']);
} else {
    echo $HTMLFormater->displayMain();
}
?>