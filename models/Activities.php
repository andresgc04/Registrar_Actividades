<?php
class Activities extends Connect
{
    public function insert_activities(
        $Start_Date,
        $End_Date,
        $Activity_Name,
        $Number_Hours,
        $Start_Time,
        $End_Time,
        $Purpose,
        $Responsible,
        $Cost,
        $Location_Activity
    ) {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "INSERT INTO activities (Company_ID,Facility_ID,Department_ID,State_ID,Date_Creation,Start_Date,End_Date,Activity_Name,Number_Hours,
                                          Start_Time,End_Time,Purpose,Responsible,Cost,Location_Activity,Created_By) 
                VALUES (?,?,?,'1',now(),?,?,?,?,?,?,?,?,?,?,?);";
        $sql = $connect->prepare($sql);
        $sql->bindValue(1, $_SESSION["Company_ID"]);
        $sql->bindValue(2, $_SESSION["Facility_ID"]);
        $sql->bindValue(3, $_SESSION["Department_ID"]);
        $sql->bindValue(4, $Start_Date);
        $sql->bindValue(5, $End_Date);
        $sql->bindValue(6, $Activity_Name);
        $sql->bindValue(7, $Number_Hours);
        $sql->bindValue(8, $Start_Time);
        $sql->bindValue(9, $End_Time);
        $sql->bindValue(10, $Purpose);
        $sql->bindValue(11, $Responsible);
        $sql->bindValue(12, $Cost);
        $sql->bindValue(13, $Location_Activity);
        $sql->bindValue(14, $_SESSION["User_ID"]);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function list_activities()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT activities.Activity_ID, companies.Company_Name, facilities.Facility_Name, departments.Department_Name,
                       activities.Start_Date, activities.End_Date, activities.Activity_Name, states.State
                FROM activities activities
                INNER JOIN companies companies
                ON activities.Company_ID = companies.Company_ID
                INNER JOIN facilities facilities
                ON activities.Facility_ID = facilities.Facility_ID
                INNER JOIN departments departments
                ON activities.Department_ID = departments.Department_ID
                INNER JOIn states states
                ON activities.State_ID = states.State_ID
                WHERE activities.State_ID = 1;";

        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getActivitiesComboBox()
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT * FROM activities WHERE State_ID = 1;";
        $sql = $connect->prepare($sql);
        $sql->execute();

        return $result = $sql->fetchAll();
    }

    public function getActivityById($ActivityID)
    {
        $connect = parent::Connection();
        parent::set_names();

        $sql = "SELECT activities.Date_Creation,activities.Activity_Name, activities.Start_Date, activities.End_Date, activities.Number_Hours, activities.Start_Time, activities.End_Time, activities.Purpose, activities.Responsible, activities.Cost, activities.Location_Activity, employees.First_Name, employees.Second_Name, employees.First_Surname, employees.Second_Surname
                 FROM activities activities
                 INNER JOIN companies companies
                 ON activities.Company_ID = companies.Company_ID
                 INNER JOIN facilities facilities
                 ON activities.Facility_ID = facilities.Facility_ID
                 INNER JOIN departments departments
                 ON activities.Department_ID = departments.Department_ID
                 INNER JOIN states states
                 ON activities.State_ID = states.State_ID
                 INNER JOIN users users
                 ON activities.Created_By = users.User_ID
                 INNER JOIN employees employees
                 ON users.Employee_ID = employees.Employee_ID
                 WHERE activities.State_ID = 1
                 AND activities.Activity_ID = ?;";

        $sql = $connect->prepare($sql);
        $sql -> bindValue(1, $ActivityID);
        $sql->execute();

        return $result = $sql->fetchAll();
    }
}
