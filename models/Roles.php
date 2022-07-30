<?php
class Roles extends Connect
{
    public function insert_rol($Rol)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO roles (State_ID,Date_Creation,Rol,Created_By) 
                VALUES ('1',now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Rol);
        $sql->bindValue(2, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_roles()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT roles.Rol_ID,roles.Rol,
                        states.State
                  FROM roles roles
                  INNER JOIN states states
                  ON roles.State_ID = states.State_ID
                  WHERE roles.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getRolesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM roles WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
