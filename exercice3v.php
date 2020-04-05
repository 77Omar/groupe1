<?php
require_once('functions.php');

//LES VARIABLES INITIALISEES
    $tabMots = []; // PERMET DE SAUVEGARDER TOUS LES MOTS QU'ON VA SAISIR
    $errors = []; // POUR SAUVEGARDER LES ERREURS DE CHAQUE CHAMP
    $motsAvecM = []; //AvecM BI MOM YMGX
    $cmpt=0; //permet de compter le nombre de mot avk m ou M kon a!
    $result=""; //Affichage du resultat

$message=""; //va afficher les messages d'erreurs 
$nbrChamps=0; //pour savoir le nombre de champ à afficher

// LE IF QUI GERE LE PREMIER BOUTON
if(isset($_POST['valider'])){
    $nbrChamps=$_POST['nbre'];
    //var_dump($_POST['nbre']);
        if(!is_chaine_numeric($nbrChamps)){
            $message= "Veuillez saisir un entier!";
            $nbrChamps=0; //le fait de mettre cet var ici sa nous permettra d'effacé automatiquement kan on mettra du n'importe koi!

        }elseif(is_empty($nbrChamps)){
            
                $message="Champ obligatoire";
            }
}
//LE DEUXIEME IF QUI GERE LE BOUTON RESULTAT,
if (isset($_POST['resultat'])){
    $nbrChamps =$_POST['nbre']; //permet de recuperer ce kon avez dans le champs nombre parsk'on veut pas k sa s'efface(cad la dernier valeur saisi doit rester dan le champ)
     
    for($i=0;$i<$nbrChamps;$i++){ //ON a mis UNE BOUCLE FOR POUR RECUPERER LES VALEURS DES CHAMPS GENERES
        
        $mot = $_POST['mot_'.$i];  //permet de recuperer les champs ki sont en haut cad ce sont des mots underscord 1 ou 2 etc
        if(long_chaine( $mot)>20){
            $errors[$i]="veuillez entrer moins de 20caracteres svp!";
           
        }elseif(!is_chaine_alpha($mot)){
            $errors[$i]="Veuillez entrer des lettres uniquement!";
        }elseif(is_empty($mot)){
            $errors[$i]="Le champ ne doit pas etre vide";
        }else{
            $tabMots[$i] =$mot;
            if(is_car_present_in_chaine("m", $tabMots[$i]) || is_car_present_in_chaine("M", $tabMots[$i])){
                $motsAvecM[$i]=$tabMots[$i];
                $cmpt++;
            }
        }

    }
    if($errors==[]){
        $result="Vous avez saisi" .$nbrChamps. "mot(s) dont".$cmpt. "avec la lettre M";
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
    <label for="">Entrer le nombre de champ</label><br>
    <input type="text" name="nbre"  value="<?=$nbrChamps?>"> <!--cette value(interess) permet de stocké le nbrchamps--> 
    <p style="color:red"><?=$message?></p> <!-- ?= ? affichage -->
    <div>

    <input type="submit" value="Valider" name="valider" class="btnA"> 
    <input type="reset" value="Annuler" class="btnB"><br><br>
    </div>
    <?php for ($i=0;$i<$nbrChamps;$i++){ ?> 


    <label for="">Mot <?=$i+1 ?></label><br> <!--EQUIVAUT A <//?php echo $i+1 ?>-->
    <?php 
     if(isset($errors[$i])){ ?>
        <p style="color:red"><?=$errors[$i]?></p>

        <?php
           }
    ?>
    <input type="text" autocomplete="off" name="mot_<?=$i?>" class="mot"> <!--CA PERMET D'AVOIR DES NOM DE CHAMPS DIFERENT SINON TOUS NOS AURONT LE MEME NOM-->
    <br><br>
    <?php } ?> <!--Son role c juste de fermer la boucle for-->

    <?php if ($nbrChamps>0){ ?>
        <button type="submit" name="resultat" value="$_POST['mot_'.$i]" class="result">Résultats</button><br><br>
    
    <?php }?> <!--DONC CETTE BALISE SONT ROLE C'EST JUSTE DE FERMER LA BOUCLE-->

  <!--Affichage apres resultat-->
    <?php
    if(!is_empty($result)){?>
        <p style="color:blue"><?=$result?></p>
        <?php
    }
    ?>
    </form>



</body>
</html>