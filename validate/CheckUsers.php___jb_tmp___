<?php

class CheckUsers
{
    public $users;
    public $password;
    function __construct()
    {
        $this->users = $_POST['user'];
        $this->password = $_POST['pass'];

    }

    public function check()
    {

        if((!empty($this->users)) && (!empty($this->password)))
        {
                echo 'Все данные заполнены';
                echo $this->users;
                echo $this->password;
        }
        else
        {
            echo 'Поле не заполнено';
        }

    }

}
$check = new CheckUsers();
$check->check();