<?php

    // Informations permettant d'établir une connexion à la base de données intitulée mesLivres.
    $env = "localhost";
    $dbName = "mesLivres";
    $dbUser = "root";
    $dbPwd = "";

    // Stockage de l'état de la connexion à la base de données dans la variable $pdoConn.
    $pdoConn = new PDO('mysql:host='.$env.';dbname='.$dbName.';charset=utf8',$dbUser,$dbPwd);
?>