<?php
class File {
    public static function build_path($path_array) {
        // $ROOT_FOLDER (sans slash à la fin) vaut
        // "/home/ann2/votre_login/public_html/TD5
        $ROOT_FOLDER = "C:/laragon/www/TD-MVC5/code";
        return $ROOT_FOLDER. '/' . join('/', $path_array);
       }
}