<?php

function dd($content){
    var_dump($content);
    exit();
}

function convertBackslashToSlashForStorage($path) {
    // Utiliser str_replace pour remplacer les antislashs par des slashs
    return "/storage/".str_replace('\\', '/', $path);
}

function printval($content){
    echo $content;
}

function rendreDateLisible($dateTime) {
    setlocale(LC_TIME, 'fr_FR');
    // Convertir la chaîne en objet DateTime
    $date = new DateTime($dateTime);

    // Retourner la date formatée
    return $date->format('d F Y à H\hi');
}

?>