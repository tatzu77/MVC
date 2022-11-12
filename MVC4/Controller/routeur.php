<?php
    require_once 'ControllerVoiture.php';
    require_once 'File.php';
    // On recupère l'action passée dans l'URL
    $action = $_GET['action'];
    $immat = isset($_GET['immat'])?$_GET['immat'] : "";
    // Appel de la méthode statique $action de ControllerVoiture
    ControllerVoiture::$action($immat);
?>
