<?php

class User
{

    private $id;
    private $name;
    private $login;
    private $pass;
    private $lastname;
    private $photo;
    private $role;

    /**
     * User constructor.
     * @param $id
     * @param $fname
     * @param $login
     * @param $pass
     * @param $name
     * @param $photo
     * @param $role
     */
    public function __construct($id, $fname, $login, $pass, $name, $photo, $role)
    {
        $this->id = $id;
        $this->fname = $fname;
        $this->login = $login;
        $this->pass = $pass;
        $this->name = $name;
        $this->photo = $photo;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

     /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }
}