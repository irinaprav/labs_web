<?php

Class Database{
    const USER = "admin";
    const PASS = "";
    const HOST = "localhost";
    const DB = "usersdb";

    public static function connection()
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;
        $connect = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        return $connect;
    }
}

