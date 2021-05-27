<?php

header("Content-Type: application/json");

ini_set("display_errors", "on");
error_reporting(E_ALL);



include './config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = $connection;
    $type = $_POST["type"];
    $msg = [];



    if ($type == "add_new_dept") {

        $name = $_POST["name"];
        $description = $_POST["description"];


        $stmt = $con->prepare("select * from dept where name =?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $count = $result->num_rows;


        if ($count > 0) {
            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "Departement Already Exist";
        } else {
            $stmt = $con->prepare("insert into dept (name,description) values (?,?)");
            $stmt->bind_param("ss", $name,$description);
            if ($stmt->execute()) {
                $msg["result"]["status"] = "1";
                $msg["result"]["message"] = "Added New Departement Successfully";
            } else {
                $msg["result"]["status"] = "0";
                $msg["result"]["message"] = "Cannot Add Departement";
            }
        }
        echo json_encode($msg);
        die;
    }if ($type == "delete_dept") {
        $id = $_POST["id"];
//        $query = "";
        $stmt = $con->prepare("delete from dept where id = ?");
        $stmt->bind_param("i", $id);


        if ($stmt->execute()) {
            $msg["result"]["status"] = "1";
            $msg["result"]["message"] = "Deleted Departement Successfully";
        } else {


            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "Cannot Delete Departement";
        }





        echo json_encode($msg);
    } else if ($type == "get_all_dept") {



        $msg = [];
        $data = [];



        $stmt = $con->prepare("select * from dept");
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {

//              $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

            for ($i = 0; $i < $num; $i++) {
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                $data[] = $row;
            }

            $msg["status"] = "1";
            $msg["message"] = "Retrived Successfully";
        } else {
            $msg["status"] = "0";
            $msg["message"] = "No Record Found";
        }



        $obj = [];

        $obj["result"] = $msg;
        $obj["data"] = $data;


        echo json_encode($obj);
    } else {

        echo "not implemented";
    }
} else {

    echo "Canot use get method.";
}
    