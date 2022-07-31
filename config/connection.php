<?php
session_start();

class Connect
{
    protected $dbh;

    protected function Connection()
    {
        try
        {
            $connect = $this -> dbh = new PDO("mysql:local=localhost;dbname=users_activitiesdb","root","");
            //$connect = $this -> dbh = new PDO("mysql:local=sql200.epizy.com;dbname=epiz_32281032_users_activitiesdb","epiz_32281032","4h6ZpsK0IBadQ5x");
            return $connect;
        }
        catch(Exception $ex)
        {
            print "Error DB!: " . $ex -> getMessage() . "<br/>";
            die();
        }
    }

    public function set_names()
    {
        return $this -> dbh -> query("SET NAMES 'utf8'");
    }

    public static function route()
    {
        return "http://localhost:80/Registrar_Actividades/";
    }
}
?>