<?php

namespace App\Http\Controllers;

use App\User;
use App\Users;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{

    public function show()
    {
        return view('admin.tpl.main')->with("title", "Authorization")->with("content", view('admin.auth.auth_form'));
    }

       public function listPage()
    {
        return view('admin.tpl.main')->with("title", "Admin-panel")->with("content", view('admin.users.list'));
    }

    public function createPage()
    {
        if( isset( $_GET["username"] ) )
        {
            return $this->createUser();
        }
        return view('admin.tpl.main')->with("title", "Admin-panel")->with("content", view('admin.users.create'));
    }

    public function editPage()
    {
        $user_id = isset($_GET["user_id"]) ? intval($_GET["user_id"]) : 0;
        $result = "Error";

        // добавить проверку на существование такого пользователя
        if( $user_id > 0 && Users::whereRaw("`user_id`= " . $user_id)->get()->count() )
        {

            if( isset( $_GET["new_password"] ) )
            {
                $current_password = md5($_GET["current_password"]);
                $new_password = md5($_GET["new_password"]);
                $new_re_password = md5($_GET["new_re_password"]);

                if( $new_password == $new_re_password &&
                Users::whereRaw("`user_id` = ". $user_id  . " AND `password` = '" . $current_password . "'" )->get()->count())
                {
                    //редактирование пользователя

                    Users::where('user_id', $user_id)
                        ->update(['password' => $new_password]);

                    $result = "Succes";

                }
            }
            else {
                return view('admin.tpl.main')
                    ->with("title", "Admin-panel")
                    ->with("content", view('admin.users.edit')
                        ->with("user_id", $user_id));
            }
        }
        return view('admin.tpl.main')->with("title", "Error")->with("content", $result);
    }

    public function auth()
    {
        return view('admin.tpl.main')->with("title", "Authorization")->with("content", view('admin.auth.auth_form'));
    }

    protected function createUser()
    {
        $result = "";

        $username = $_GET["username"];
        $password = $_GET["password"];
        $re_password = $_GET["re_password"];

        if( strlen($username) > 3 && strlen($password) > 5 && $password == $re_password )
        {
            $new_user = new User();

            $new_user->login = $username;
            $new_user->password = md5( $password );

            $new_user->save();

            $result = "Success! <a href='/admin/users'>Back</a>";
        }
        else
        {
            $result = "Error form valid! <a href='/admin/users/create'>Back</a>";
        }
        return view('admin.tpl.main')->with("title", "Error")->with("content", $result);
    }
}
