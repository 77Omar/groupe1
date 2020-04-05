<?php
//cette fonction permet de renvoyer la longueur d'une chaine ou (tableau) passée en parametre
function long_chaine($chaine){
    $i=0;
        while(!empty($chaine[$i])){
            $i++;
        }
    
    return $i;
}

//fonction ki permet de tester si une chaine est vide ou pas: elle retourne true
//si la chaine est vide sino elle retourne false
function is_empty($chaine){
    if(long_chaine($chaine)==0){
        return true;
    }
    return false;
}

// fonction commençant par une lettre majuscule et se terminent par un point(.!?)
function is_chaine_phrase($phrase){
    if(isset($phrase)){
        $regex='#^[A-Z](.)+[\.\!\?]$#'; 
        if(preg_match($regex,$phrase)){
            return true;
        }
        return false;
    }
}

// Fonction de decomposition de texte en phrase!
function decoupe_texte_phrases($phrases){
    if(isset($phrases)){
        $text=preg_split('#([.?!]){1}#',$phrases, -1, PREG_SPLIT_DELIM_CAPTURE);
        $sentencesrecup=[]; //Tableau ki permettra de recuperer les phrases avk ponctuation!
        $clause=[]; // Tableau ki permettra de parcourir le $ponctuation et si c une majuscule et se terminent par un point
        for($i=0; isset($text[$i]); $i++){
        if(!is_empty($text[$i])){
            if($text[$i] != '.' && $text[$i] != '?' && $text[$i] != '!'){
                if(isset($text[$i+1])){ //permet de chercher si le ponctuation suivant existe ou pas
                    $sentencesrecup[]=$text[$i].$text[$i+1];
                }else{
                    $sentencesrecup[]=$text[$i];
                }
                
            }
        }
   
     }
     for($k=0; isset( $sentencesrecup[$k]); $k++){
         if(is_chaine_phrase( $sentencesrecup[$k])){
              $clause[]= $sentencesrecup[$k]; 
         }
     }
   }
   return $sentencesrecup;

}

//Fonction qui permet d'enlever les spaces inutiles d'une phrase
//preg_replace() analyse subject pr trouver l'expression rationnelle pattern et remplace les resultats pr remplacement!

function remove_space_inutiles_phrase($sentences){
    $pattern='%\s+%'; 
    $replacement=' '; 
    $sentences=preg_replace($pattern,$replacement,$sentences);
     return  $sentences;
}

//Fonction ki permet d'inverser la case d'une lettre min en maj apres ponctuation!
function invers_car_cases($car){
    $min = 'a';
    $max = 'A';
   for($k=0; $k<26; $k++){
       for ($i=0;$i<long_chaine($car); $i++) { 
           if ($car[0]==$min) {
               ($car[0]=$max);
            }
            if($car[long_chaine($car)-1]=='.'){
               
            }else{
                $car=$car.'.';
            }

        }
               $min++;
               $max++;
      
       
        }
       return $car;
}
?>
