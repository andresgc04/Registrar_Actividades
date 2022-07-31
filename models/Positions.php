<?php
class Positions extends Connect
{
    public function insert_position($Position)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO positions (State_ID,Date_Creation,Position,Created_By) 
                VALUES ('1',now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Position);
        $sql->bindValue(2, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_positions()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT positions.Position_ID, positions.Position,
                       states.State
                FROM positions positions
                INNER JOIN states states
                ON positions.State_ID = states.State_ID
                WHERE positions.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getPositionsComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM positions WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
