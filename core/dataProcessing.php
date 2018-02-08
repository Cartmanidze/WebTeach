<?php

class dataProcessing
{
    public $userName;
    public $password;
    function __construct()
    {
        $this->userName = trim($_POST['user']);
        $this->password = (trim($_POST['pass']));

    }
    function user()
    {
        echo $this->password ;
    }
    function pass()
    {
        echo $this->userName;
    }

}
$data = new dataProcessing();
$data->user();
$data->pass();