<?php

namespace App\Http\Controllers;

use App\Questions;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question;

class AuthController extends Controller
{
    public function authorization ()
    {

    if( !isset( $msg ) )
    {
        $msg = "";
    }
    $login = "";

    if( isset( $_POST["login"] ) )
    {
        $login = dataCheck($_POST["login"]);
        $password = $_POST["password"];

        if( strlen( $login ) < 3 )
        {
            $msg .= "Некорректная длина логина. ";
        }
        if( strlen( $password ) < 5 )
        {
            $msg .= "Некорректная длина пароля. ";
        }

        if( $msg == "" )
        {
            $password = md5($password . "aks2&*@#R" . $login);

            if( isset( $_POST["auth"] ) )
            {
                $auth = $db->query("SELECT `id` FROM `users` WHERE `login` = '$login' AND `password` = '$password'");

                //print_r($db->errorInfo());

                if( $auth->rowCount() )
                {
                    $auth = $auth->fetch();
                    $_SESSION["auth"] = $auth["id"];

                    header("Location: " . $_SERVER["SCRIPT_NAME"]);
                    exit();
                }
                else
                {
                    $msg .= "Неправильный логин или пароль. ";
                }
            }
            else if( isset( $_POST["reg"] ) )
            {
                if($db->query("INSERT INTO `users`(`login`, `password`) VALUES ('$login', '$password')"))
                {
                    $msg .= "Регистрация прошла успешно. Войдите под своим логином и паролем. ";
                }
                else
                {
                    $msg .= "Ошибка при регистрации. Возможно такой логин уже существует. ";
                }
            }
        }
    }
    }
}