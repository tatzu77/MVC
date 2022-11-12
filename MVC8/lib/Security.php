
<?php
    class Security{
        private static $seed = 'mgu77tghjhgu867';
        static public function getSeed() {
            return self::$seed;
        }
        function chiffrer($texte_en_clair) {
            $texte_chiffre = hash('sha256', $texte_en_clair);
            return self::$seed.$texte_chiffre;
        }
        function generateRandomHex(){
            $numbytes = 16;
            $bytes = openssl_random_pseudo_bytes($numbytes);
            $hex = bin2hex($bytes);
            return $hex;
        }
        
           
    }
?>