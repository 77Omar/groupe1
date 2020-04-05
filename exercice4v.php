<?php
require_once('function_is_chaine.php');

//Valider si une chaine est une phrase ou pas!
$messageinput=""; 
$sentenceinput="";
if(isset($_POST['valider'])){
    $sentenceinput=$_POST['phraseinput'];
    if(is_chaine_phrase($sentenceinput)){
        $messageinput= "la phrase est correcte"; 
    }else{
        $messageinput="Veuillez entrer une phrase commençant par une lettre majuscule et se terminent par un point(.,!,?)";
    }
    if(is_empty($sentenceinput)){  
        $messageinput="Veuillez entrer une phrase";
    }
}



// Decomposition de texte en phrase!
$messagestexterea=""; 
$sentencestexterea="";
$correction=""; //permet d'afficher la phrase si le sms est correct!
$valide=[];
$allText=[];
if(isset($_POST['envoie'])){
    $sentencestexterea=$_POST['phrasestextarea'];
    if(decoupe_texte_phrases($sentencestexterea)){
     $messagestexterea= "les phrases correctes"; 
        $allText[]= decoupe_texte_phrases($sentencestexterea); //Enregistrement des phrases decoupés
        var_dump($allText);
        foreach( $allText as $element){ //Parcourt enregistrement des phrases decoupés
            foreach($element as $el){ //Parcourir des phrases enregistrées
                if(is_chaine_phrase($el)){
                $valide[]= $el;
                }
            }
        }
        foreach( $allText as $element){
            foreach($element as $el){
               $correction.=remove_space_inutiles_phrase(invers_car_cases($el));
               
            }
        }
        
        }else{
        $messagestexterea="La phrase n'est pas correcte!";
    }
    if(is_empty($sentencestexterea)){
            
        $messagestexterea="Veuillez entrer une phrase";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="exercice3v.css">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <p style="color:red"><?=$messageinput?></p>
    <label for="">Veuillez entrer une phrase</label><br>
    <input type="text" name="phraseinput" value="<?=$sentenceinput?>"><br>
    <div>
    <input type="submit" value="Valider" name="valider" class="btnA"> 
    <input type="reset" value="Annuler" class="btnB"><br><br>
    </div>
    <br><br><br><br><br>
    <?php if (!is_empty($valide)){?>
    <p style="color:blue"><?=$messagestexterea?></p>
    <p style="color:blue"><?php var_dump($valide)?></p> <br><br>
    <?php
    }
    ?>
    <label for="">Veuillez entrer une serie de phrases</label><br>
    <textarea name="phrasestextarea" id="" cols="50" rows="5" value="valider"><?=$sentencestexterea?></textarea>
    <div>
    <input type="submit" value="Envoyer" name="envoie" class="btnA"> 
    <input type="reset" value="Annuler" class="btnB"><br><br>
    </div>
    <br><br><br><br>
    <label for="">Corriger des espaces inutiles</label><br>
    <textarea name="" id="" cols="50" rows="5" value="valider" disabled><?php print_r($correction); ?></textarea>
    </form>
</body>
</html>