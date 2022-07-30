<?php
class Professions extends Connect
{
    public function insert_profession($Profession)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO professions (State_ID,Date_Creation,Profession,Created_By) VALUES ('1',now(),?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $Profession);
        $sql->bindValue(2, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_professions()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT professions.Profession_ID, professions.Profession, 
                       states.State
                FROM professions professions
                INNER JOIN states states
                ON professions.State_ID = states.State_ID
                WHERE professions.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getProfessionsComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM professions WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
