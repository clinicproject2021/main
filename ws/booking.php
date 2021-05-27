<?php

session_start();


ini_set("display_errors", "on");
error_reporting(E_ALL);



include './config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = $connection;



    $type = $_POST["type"];
    if ($type == "book_now") {

        $dr_id = $_POST["dr_id"];
        $uid = $_POST["uid"];
        $dept_id = $_POST["dept_id"];
        $date = $_POST["date"] . " " . $_POST["time"];
//        print_r($date);
//        die;

        $status = $_POST["status"];

        $stmt = $con->prepare("select * from user_booking where user_id ='{$uid}' and dr_id = '{$dr_id}' and status NOT IN ('5')");
      
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {
            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "You already have a file when this doctor has not completed";
        } else {
            $stmt = $con->prepare("insert into user_booking (dr_id,dept_id,date,user_id,status) values (?,?,?,?,?)");
            $stmt->bind_param("iisii", $dr_id, $dept_id, $date, $uid, $status);


            if ($stmt->execute()) {
                $msg["result"]["status"] = "1";
                $msg["result"]["message"] = "Added new Booking successfully";
            } else {


                $msg["result"]["status"] = "0";
                $msg["result"]["message"] = "Cannot add new booking";
            }
        }





        echo json_encode($msg);
    } else if ($type == "user_booking") {




        $msg = [];
        $data = [];


        $uid = $_POST["uid"];
        $status = $_POST["status"];

        $stmt = $con->prepare("select ub.id,ub.note as description, ub.date as date,ud.username as dr_name,ubs.`name` as status_name,ubs.id as status_id,dept.`name` as dept_name from user_booking as ub join users as ud on ud.id = ub.dr_id JOIN user_booking_status as ubs on ubs.id = ub.`status` join dept on dept.id = ub.dept_id where ub.`status` = '{$status}' and ub.user_id = '{$uid}'");
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
    } else if ($type == "doctor_booking") {




        $msg = [];
        $data = [];


        $uid = $_POST["uid"];
        $status = $_POST["status"];

        $stmt = $con->prepare("select ub.id,ub.note as description,ud.id as user_id, ub.date as date,ud.username as user_name,ubs.`name` as status_name,ubs.id as status_id,dept.`name` as dept_name from user_booking as ub join users as ud on ud.id = ub.user_id JOIN user_booking_status as ubs on ubs.id = ub.`status` join dept on dept.id = ub.dept_id where ub.`status` = '{$status}' and ub.dr_id = '{$uid}'");
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
    } else if ($type == "change_status") {

        $msg = [];



        $id = $_POST["id"];
        $status = $_POST["status"];

        $stmt = $con->prepare("update user_booking set status='{$status}' where id ='{$id}'");


        if ($stmt->execute()) {
            $msg["status"] = "1";
            $msg["message"] = "Updated Successfully";
        } else {
            $msg["status"] = "0";
            $msg["message"] = "Cannot update";
        }



        $obj = [];

        $obj["result"] = $msg;


        echo json_encode($obj);
    }else if ($type == "change_status_desc") {

        $msg = [];



        $id = $_POST["id"];
        $status = $_POST["status"];
        $desc = $_POST["desc"];

        $stmt = $con->prepare("update user_booking set note='{$desc}', status='{$status}' where id ='{$id}'");


        if ($stmt->execute()) {
            $msg["status"] = "1";
            $msg["message"] = "Updated Successfully";
        } else {
            $msg["status"] = "0";
            $msg["message"] = "Cannot update";
        }



        $obj = [];

        $obj["result"] = $msg;


        echo json_encode($obj);
    }
} else {

    echo "Cannot Be Request GET";
}