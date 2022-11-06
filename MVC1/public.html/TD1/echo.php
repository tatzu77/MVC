<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>
   
    <body>
        Voici le résultat du script PHP : 
        <?php 
          $marque= "renault"; 
          $couleur= "rouge"; 
          $immatriculation="AH-204-BJ"; 
          $voiture= array(
            
          );
          if(empty($voiture))
                echo("Il n'y a pas de voiture");
          echo "<ul>";
          for ($i = 1; $i < count($voiture); $i++) {
            
            echo "<li>$voiture[$i]</li>";
            
        }
        echo "</ul>"; 
        
        
          //echo"<p> Voiture $immatriculation de marque $marque (couleur $couleur) </p>"
            //1 => "Renault rouge", 
           // 2 => "clio Rouge", 
            //3 => "jokaire"
        ?>
    </body>
</html> 
