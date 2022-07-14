<?php
class Users extends Connect
{
    public function Login()
    {
        $connect = parent::Connection();
        parent::set_names();

        if(isset($_POST["send"]))
        {
            $email = $_POST["email"];
            $password = $_POST["password"];

            if(empty($email) and empty($password))
            {
                header("Location:".Connect::route()."view/Login/index.php?m=2");
                exit();
            }
            else
            {
                $sql = "SELECT * FROM users WHERE Email=? AND Password=? AND State_ID =1";
                $stmt = $connect->prepare($sql);
                $stmt -> bindValue(1, $email);
                $stmt -> bindValue(2, $password);
                $stmt -> execute();
                $result = $stmt -> fetch();

                if(is_array($result) and count($result)>0)
                {
                    $_SESSION["User_ID"] = $result["User_ID"];
                    $_SESSION["Company_ID"] = $result["Company_ID"];
                    $_SESSION["Facility_ID"] = $result["Facility_ID"];
                    $_SESSION["Department_ID"] = $result["Department_ID"];
                    $_SESSION["Rol_ID"] = $result["Rol_ID"];
                    $_SESSION["Employee_ID"] = $result["Employee_ID"];
                    $_SESSION["User_Name"] = $result["User_Name"];

                    header("Location:".Connect::route()."view/Dashboard/");
                    exit();
                }
                else
                {
                    header("Location:".Connect::route()."view/Login/index.php?m=1");
                }
            }
        }
    }
}
