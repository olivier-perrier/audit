<?php

$target = __DIR__ . '/../storage/app/public';
$link = __DIR__ . '/storage';

if (is_link($link)) {
    unlink($link);
}

if (file_exists($link)) {
    throw new RuntimeException("Le chemin existe déjà : {$link}");
}

if (symlink($target, $link)) {
    echo "Lien symbolique créé : {$link} -> {$target}";
} else {
    echo "Impossible de créer le lien symbolique.";
}