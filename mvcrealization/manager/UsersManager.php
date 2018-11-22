<?php
require_once("./dao/UsersDao.php");
require_once("./model/User.php");

class UsersManager
{

    private $users_dao;


    public function __construct()
    {
        $this->users_dao = new UsersDao();
    }

    public function createUser($request_data)
    {
        return $this->users_dao->insertUser($request_data);
    }

    public function authUser($login,$pass)
    {
        $user = $this->users_dao->getUserByLogin($login);

        if ($user == null) {
            return null;
        }
        return $user;
    }

    public function updateUser($request_data,$token)
    {

        return $this->users_dao->updateUser($token, $request_data->fname, $request_data->email, $request_data->phone);
    }
}


