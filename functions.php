<?php

//function long_chaine($chaine){
    //if(isset($chaine)){
        //$i=0;
        //la condition on peut y mettre n'importe koi c prkoi on a mis
        //isset($chaine[$i]) ki veux dire tant la position $i de la chaine existe
        //En resumer sa boucle se les i et tant k la position i existe dan la chaine alor on compt et on avanvce
    //for($j=0; isset($chaine[$i]); $j++){
//$i++;
    //}
    //return$i;
    //}
//}


//cette fonction permet de renvoyer la longueur d'une chaine ou (tableau) passée en parametre
function long_chaine($chaine){
    $i=0;
        while(!empty($chaine[$i])){
            $i++;
        }
    
    return $i;
}

//fonction ki teste si le caractere passé en parametre est un chiffre
//NB: on teste une seule caractere(1 juska9 vrai) pas 2caracteres par exple le cas 12 ou 13 etc false!
function is_car_numeric($n){
    if($n>'0' && $n<='9'){ //les guillemets''fo les mettre
        return true;
    }
        return false;
}

//fonction ki permet de tester si un caractere est alphabetique
function is_car_alpha($car){
    if(long_chaine($car)==1 && ($car>='a' && $car<='z') || ($car>='A' && $car<='Z')){
        return true;
    }
    return false;
  }

  //fonction ki permet de tester si tous les caracteres d'une chaine sont alphabétiques
  //elle retourne true si la chaine est alphabetique sinon false
  function is_chaine_alpha($chaine){
      for($i=0; $i<long_chaine($chaine); $i++){
        if(!is_car_alpha($chaine[$i])){ //si la chaine de caractere est different d1 seul caractére par exple a en mettant 1 dan la chaine de caract c'est automatiquement false (tyhh1ggh)
            return false;
        }
      }
      return true;
  }

  //fonction ki permet de tester si tous les caracteres d'une chaine sont numeriques
  //elle retourne true si la chaine est numeric sino false
  function is_chaine_numeric($chaine){
    for ($i=0;$i<long_chaine($chaine);$i++){
        if (is_car_alpha($chaine[$i])){
            return false;
        }
    }
    return true;
}
// fonction ki permet de rechercher si  1 caractere("a") est présent dans une chaine(exple:12a) retourne true
//sino la fonction retourne false si le caractere n'apparait pas dans la chaine
function is_car_present_in_chaine($car, $chaine){
    for ($i=0;$i<long_chaine($chaine);$i++){
        if ($chaine[$i]== $car){
            return true;
        }
    }
    return false;
}


//convertition majuscule en minuscule
function est_majuscule($car){
    return($car>='A' && $car<='Z');
}
function est_minuscule($car){
    return($car>='a' && $car<='z');
}

//fonction ki permet d'inverser la case d'une lettre et si on lui passe 1caractere
//no alphabetique;la fonction retourne le mm caractere(si on lui passe 7 elle retourne 7) 
function converti_minus_mas($car){
//verifier si le caractere est une lettre alphabet
if(is_car_alpha($car)){
    $minuscule='abcdefghijklmnopqrstuvwxyz';
    $majuscule='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //verifier si le caractere est majuscule
    if(est_majuscule($car)){
        //definition de l'alphabet
    //verification et correspondance
    for($i=0; $i<26; $i++){
        if($majuscule[$i]==$car){
            return$minuscule[$i];
        }
    }
    }else{
        for($i=0; $i<26; $i++){
            if($minuscule[$i]==$car){
                return$majuscule[$i];
            }
        }
    }
}elseif(is_car_numeric($car)){
    return $car;
}
return false;
} 

//fonction ki permet de tester si une chaine est vide ou pas: elle retourne true
//si la chaine est vide sino elle retourne false
 
 function is_empty($chaine){
    if(long_chaine($chaine)==0){
        return true;
    }
    return false;
}

//fonction ki permet de supprimer les espaces de devants ou de derriere d'une chaine et retourne
//la chaine aprés avw supprimer les espaces.les espaces internes ne sont pas supprimées

//function delet_sp_befor_after($chaine){ // A revoir
 //$chai="";
 //for($i=0; $i<long_chaine($chaine); $i++){
     //($chai=="" && $chaine[$i]==""){
         //$chai .="";
     //}else{
         //$chai .=$chaine[$i];
 //}
//}
//$b=0;
//$c=long_chaine($chai);
//while($c>0){
    //$c--;
    //if($chai[$c] == ""){
        //$b++;
    //}else{
    //break;
    //}
//}
//$mot="";
//for($i=0; $i<long_chaine($chai)-$b;$i++){
    //$mot.=$chai[$i];
//}
//return $mot;
//}

//fonction ki permet d'inverser la case d'une lettre et si on lui passe 1caractere
//no alphabetique;la fonction retourne le mm caractere(si on lui passe 7 elle retourne 7) 

function invers_car_case($car){
    $min = 'a';
    $max = 'A';
    if(long_chain($car)==1){
       for ($i=0; $i < 26; $i++) { 
           if ($car==$min) {
               return $max;
           }elseif ($car==$max) {
               return $min;
           }
           $min++;
           $max++;
       }
    }
    return $car;
}

//fonction ki permet de supprimer les espaces de devants ou de derriere d'une chaine et retourne
//la chaine aprés avw supprimer les espaces.les espaces internes ne sont pas supprimées
// omar 4caractere mais l'indice c 3 c'est prkoi on a mis long_chaine-1
function delete_spc_before_after($chaine){
    $debut=0;//permet d'avoir la position du premier caractere  ki n'est po espace
    $fin=long_chaine($chaine)-1; //permet d'avoir la position du dernier caractere  ki n'est po espace
    $newChaine = ''; // va contenir la nouvel chaine sans espace
    while ($chaine[$debut]==' '){ //' 'espace
        $debut++; 
        if(!isset($chaine[$debut])){ //si on donne 2espace il peut tester le 3e espace alors ce dernier n'existe op c prkoi il est utile de verifier a chak fois si la chaine existe ou po
            return ''; // ''vide
        } 
    }
    
    while ($chaine[$fin]==' '){ 
        $fin--; //decrémenter cad soustraire un de le valeur fin
    }
    for ($i=$debut; $i <=$fin ; $i++) { 
        $newChaine.=$chaine[$i];
    }
    
    return $newChaine;
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

//decoupe_texte_phrases et return les phrases validées
function decoupe_texte_phrases($phrases){
    if(isset($phrases)){
        $text=preg_split('#([.?!]){1}#',$phrases, -1, PREG_SPLIT_DELIM_CAPTURE);
        $clause=[];
        $ponctuation=[];
     for($i=0; isset($text[$i]); $i++){
        if(!is_empty($text[$i])){
            if($text[$i] != '.' && $text[$i] != '?' && $text[$i] != '!'){
                if(isset($text[$i+1])){
                    $ponctuation[]=$text[$i].$text[$i+1];// tableau ki permet de recuperer les phrases avk ponctuation
                }
                
            }
        }
   
     }
     for($k=0; isset($ponctuation[$k]); $k++){
         if(is_chaine_phrase($ponctuation[$k])){
              $clause[]=$ponctuation[$k]; //il permet de parcourir le $ponctuation et si c une majuscule et se terminent par un point
         }
     }
   }
   return $clause;
}

    
//Fonction qui permet d'enlever les spaces inutiles d'une phrase
//preg_replace() analyse subject pr trouver l'expression rationnelle pattern et remplace les resultats pr remplacement!

function remove_space_inutiles_phrase($sentences){
    $pattern='%\s+%'; 
    $replacement=' '; 
    $chaine=preg_replace($pattern,$replacement,$sentences);
     return $chaine;
}

?>
