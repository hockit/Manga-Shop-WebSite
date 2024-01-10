<?php
    require_once "connect.php";

    $connection = @new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0)
    {
        echo "Error: ".$connection->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        
        $sql = "SELECT * FROM clients WHERE first_name = '$login' AND password = '$password'";

        if($result = @$connection->query($sql))
        {
            $nr_of_users = $result->num_rows;
            if($nr_of_users > 0)
            {
                $row = $result->fetch_assoc();
                $user = $row['user'];

                $result->free_result();
                echo $user;

            }
            else
            {
                echo "Nie ma takiego uzytkownika";
            }
        }

        $connection->close();
    }
    

?>