<?php
    session_start();
    require "lib/File.php";
    require File::build_path([
        "Controller",
        "routeur.php"
    ]);
    