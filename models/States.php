<?php
class States extends Connect
{
    public function insert_state($State)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO states (Date_Creation,State,Created_By) 
                VALUES (now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $State);
        $sql->bindValue(2, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_states()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT states.State_ID, states.State 
        FROM states states;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getStatesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM states;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
