<?php
require_once("./config/db.php");

class  UsersDao
{
    var $pool;
    public function __construct()
    {
        $this->pool = Database::connection();
    }

    public function insertUser(User $user)
    {

        $sql = "INSERT INTO `users` (`lastname`,`login`,`password`,`name`,`photo`,`role`) VALUES (?,?,?,?,?,?)";
        $stmt = $this->pool->prepare($sql);
        return $stmt->execute([$user->getFname(), $user->getLogin(), $user->getPass(), $user->getName(), $user->getPhoto(), 'user']);

    }

    public function updateUser($token, $fname, $email, $phone)
    {

        $sql = "UPDATE Users  SET fname=?, email=?, phone=? WHERE token=?";
        $stmt = $this->pool->prepare($sql);
        return $stmt->execute([$fname, $email, $phone, $token]);
    }

    public function getUserByLogin($login)
    {
        echo $login;
        return UsersDao::getUser("SELECT * FROM `users` WHERE login = '?' LIMIT 1",$login);
    }

    public function updateToken($token, $login)
    {

        $sql = "UPDATE Users SET token=? WHERE login=? ";
        $stmt = $this->pool->prepare($sql);
        return $stmt->execute([$token, $login]);
    }

    public function getUserByToken($token)
    {
        return UsersDao::getUser("SELECT * FROM Users WHERE token =? LIMIT 1", $token);

    }

    private function getUser($sql, $param)
    {

         $stmt = $this->pool->query("SELECT * FROM `users` WHERE login = '$param' LIMIT 1");
         $row=$stmt->fetch();
        if ($row['id'] == null) {
            echo $row['id'];
            return null;
        }
        return new User($row['id'], $row['lastname'], $row['login'], $row['password'], $row['name'], $row['photo'], $row['role']);

    }

}
