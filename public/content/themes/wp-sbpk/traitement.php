<?php

/* Récupération des informations du formulaire*/
if (get_magic_quotes_gpc())
{
 $name = stripslashes(trim($_POST['cname']));
 $mail = stripslashes(trim($_POST['cmail']));
 $message = stripslashes(trim($_POST['cmessage']));    
}     
else      
{
 $name = trim($_POST['cname']);
 $mail = trim($_POST['cmail']);
 $message = trim($_POST['cmessage']);
}
/*Vérifie si l'adresse mail est au bon format */
 $regex_mail = '/^[-+.w]{1,64}@[-.w]{1,64}.[-.w]{2,6}$/i'; 
 /*Verifie qu il n y est pas d en tête dans les données*/
$regex_head = '/[nr]/';   
/*Vérifie qu il n y est pas d erreur dans adresse mail*/
 if (!preg_match($regex_mail, $mail))
 {
 $alert = 'email not valid';      
 }
 else
{ 
 $email = 1;
}   
/* On affiche l'erreur s'il y en a une */ 
if (!empty($alert))
{
 $email = 0;
}     
/* On vérifie qu'il n'y a aucun header dans les champs */ 
if (preg_match($regex_head, $name)
 || preg_match($regex_head, $mail)
 || preg_match($regex_head, $message))
{  
 $alert = 'Header forbidden in the form fields'; 
}
else
{ 
 $header = 1;
}   
/* On affiche l'erreur s'il y en a une */ 
if (!empty($alert))
{
 $header = 0;
}
if (empty($name) 
 || empty($mail) 
 || empty($message))
{  
 $alert = 'Everything must be fill';
} 
else
{  
 $fill = 1;
}   
/* On affiche l'erreur s'il y en a une */ 
if (!empty($alert))
{
 $fill = 0;
}
/* Si les variables sont bonne */
if ($fill == 1 AND $header == 1 AND $email == 1)
{
/*Envoi du mail*/

/*Le destinataire*/
$to="sbpk.pro@gmail.com";

/*Le sujet du message qui apparaitra*/
$subjet="Message from Mysite";
$msg = '';
/*Le message en lui même*/
/*$msg = 'Mail envoye depuis le site' "rnrn";*/
$msg .= 'Name : '.$name."rnrn";
$msg .= 'Mail : '.$mail."rnrn";
$msg .= 'Message : '.$message."rnrn";
/*Les en-têtes du mail*/
$headers = 'From: MESSAGE FROM MYSITE<sbpk.pro@gmail>'."rn";
$headers .= "rn";
/*L'envoi du mail - Et page de redirection*/
mail($to, $subjet, $msg, $headers);
header('Location:http://localhost/Perso/wp-mysite/public/');
}
else
{
header('Location:http://localhost/Perso/wp-mysite/public/');
}
?>