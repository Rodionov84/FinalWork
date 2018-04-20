<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function listPage()
    {
         return view('admin.users.list');
    }

    public function createPage(Request $request)
    {
        if( $request->input("username" ) !== null )
        {
            return $this->createUser($request);
        }
        //return view('admin.tpl.main')->with("title", "Admin-panel")->with("content", view('admin.users.create'));
        return view('admin.users.create');
    }

    public function editPage(Request $request)
    {
        $user_id = $request->has('user_id') ? intval($request->input('user_id')) : 0;

        $message = "";
        $backLink = "";

        $user = User::where("id", $user_id);

        // добавить проверку на существование такого пользователя
        if( $user->count() )
        {
            if( $request->has('new_password'))
            {
                if( $request->input('new_password') == $request->input('new_re_password'))
                {
                    $edit_user = User::find($user_id)->first();

                    if(Hash::check($request->input('current_password'), $edit_user->password))
                    {
                        //редактирование пользователя
                        $new_password = Hash::make($request->input('new_password'));

                        User::find($user_id)->update(['password' => $new_password]);

                        $message = "Пароль успешно изменён!";
                        $backLink = "/admin/users";
                    }
                    else
                    {
                        $message = "Неправильный старый пароль!";
                        $backLink = "/admin/users/edit?user_id=" . $user_id;
                    }
                }
                else
                {
                    $message = "Новые пароли не совпадают!";
                    $backLink = "/admin/users/edit?user_id=" . $user_id;
                }
            }
            else {
                $user = $user->first();

                return view('admin.users.edit')->with("user_id", $user_id)->with("login", $user->login);
            }
        }
        else
        {
            $message = "Пользователь не существует!";
            $backLink = "/admin/users";
        }
        return view('admin.message')->with("text", $message)->with("backLink", $backLink);
    }

    /**
     * @return $this
     */
    public function deletePage(Request $request)
   {
       $user_id = $request->has('user_id') ? intval($request->input('user_id')) : 0;

       $message = "";
       $backLink = "";

       // добавить проверку на существование такого пользователя
       if( $user_id > 0 && User::find($user_id)->get()->count() )
       {
           if( $request->has('confirm') )
           {
               User::find($user_id)->delete();

               return view('admin.message')->with("text", "Пользователь удалён")->with("backLink", "/admin/users");
           }
           else
           {
               return view('admin.users.delete')->with("user_id", $user_id);
           }
       }
       else {
           return "404";
       }
       //return view('admin.message')->with("text", $message)->with("backLink", $backLink);
    }

    protected function createUser(Request $request)
    {
        $message = "";
        $backLink = "";

        $username = $request->input("username");
        $password = $request->input("password");
        $re_password = $request->input("re_password");

        if( strlen($username) > 3 && strlen($password) > 5 && $password == $re_password )
        {
            $new_user = new User();

            $new_user->login = $username;
            $new_user->password = Hash::make( $password );

            $new_user->save();

            $message = "Модератор зарегистроирован!";
            $backLink = "/admin/users";
        }
        else
        {
            $message = "Error form valid!";
            $backLink = "/admin/users/create";
        }
        return view('admin.message')->with("text", $message)->with("backLink", $backLink);
    }
}
