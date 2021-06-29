<?php
 
class Database
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $dbname = "monitoring_apps";
 
    function getMySQL()
    {
        $konek = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        ) or die("Gagal konek ke MySQL ");
 
        if (mysqli_connect_errno()) {
            return "tidak dapat konek ke database MySQL";
        } else {
            return $konek;
        }
    }
}