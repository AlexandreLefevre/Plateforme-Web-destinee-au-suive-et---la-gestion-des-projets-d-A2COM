<?php
    session_start();
    require_once 'config.php';

    if(isset($_POST['email']) && isset($_POST['Password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $bbd->prepare('SELECT pseudo, email, password FROM employee WHERE email = ?');
        $check->execute(aray($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password = hash('sha256', $password);

                if($data['password'] === $password)
                {
                   $_SESSION['user'] = $data['pseudo'];
                   header('Location:index.php');
                    
                }

            }else header('Location: FormConnexion.php?login_err=email');

        }else header('Location: FormConnexion.php?login_err=already');


    }else header('Location: FormConnexion.php');