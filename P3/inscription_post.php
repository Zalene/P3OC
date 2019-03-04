<?php
    include 'includes/functionsSQL.php';

    if(isset($_POST['inscription_button']))
    {
        $pseudo = htmlspecialchars($_POST('pseudo'));
        $email = htmlspecialchars($_POST('email'));
        $password = password_hash($_POST('password'));
        $password2 = password_hash($_POST('password2'));

        if(!empty($_POST['peudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password2']))
        {
            

            $pseudolength = strlen($pseudo);
            if($pseudolength <= 255)
            {
                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                { 
                    if($password == $password2)
                    {

                    }
                    else
                    {

                    }
                }
                else
                {
                    $erreur = "Votre adresse email n'est pas valide !";
                }
            }
            else
            {
                $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés !";
        }
    }

?>