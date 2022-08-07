<?php
session_start();

class Connect
{
    protected $dbh;

    protected function Connection()
    {
        try
        {
            $hostname = "sql200.epizy.com";
            $username = "epiz_32281032";
            $password = "4h6ZpsK0IBadQ5x";
            $database = "epiz_32281032_users_activitiesdb";
            $port = 3306;
            //$connect = $this -> dbh = new PDO("mysql:local=localhost;dbname=users_activitiesdb","root","");
            //$connect = $this -> dbh = new PDO('mysql:host=sql200.epizy.com;dbname=epiz_32281032_users_activitiesdb;port=3306','epiz_32281032','4h6ZpsK0IBadQ5x');
            $connect = $this -> dbh = mysqli_connect($hostname,$username,$password,$database,$port);
            return $connect;
        }
        catch(Exception $ex)
        {
            print "Error DB!: " . $ex -> getMessage() . "<br/>";
            die();
        }
    }

   /* public function set_names()
    {
        return $this -> dbh -> query("SET NAMES 'utf8'");
    }
    */

    public static function route()
    {
        return "http://localhost:80/Registrar_Actividades/";
    }
}
?>