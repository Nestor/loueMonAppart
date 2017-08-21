<?php
    Config::$SITE_NAME = "Mon site";
    Config::$SITE_URL = "http://127.0.0.1/";
    Config::$SITE_FILE = "airbnb/";

    Config::$SECURE_SALT = "353d196605b2bb5890bfb1b3aa0c3cccfdddd30b";

    Config::$NOT_LOGGED_REDIRECT = Config::getURL('not-logged');
    Config::$NOT_ADMIN_REDIRECT = Config::getURL('not-admin');
    Config::$NOT_PROPRIO_REDIRECT = Config::getURL('not-proprio');
?>