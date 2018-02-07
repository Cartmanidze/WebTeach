<?php

class CheckUsers
{
    public $users;
    public $password;
    public $button;
    function __construct()
    {
        $this->button = $_POST['button'];
        $this->users = $_POST['user'];
        $this->password = $_POST['pass'];

    }

    public function check()
    {

        if(isset($this->users) && isset($this->password))
        {
                echo 'Все данные заполнены';
        }
        else
        {
            echo 'Поле не заполнено';
        }

    }

}
$check = new CheckUsers();
$check->check();