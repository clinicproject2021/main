<?php

session_start();

ini_set("display_errors", "on");
error_reporting(E_ALL);

include './config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con = $connection;

    $type = $_POST["type"];
    if ($type == "login") {

        $obj = [];
        $msg = [];
        (object) $data = null;
        (object) $data2 = null;

        $username = $_POST["name"];
        $password = $_POST["password"];

        $stmt = $con->prepare("SELECT * from users u where u.username = ? and u.`password` = ?");
        $stmt->bind_param("ss", $username, $password);
        $result = $stmt->execute();

        if ($result) {
            $res = $stmt->get_result();
            $num = $res->num_rows;

            if ($num > 0) {



                $data = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $_SESSION["user"] = $data;

                $info_id = $data["info_id"];

                $stmt = $con->prepare("SELECT * from user_info where id = ?");
                $stmt->bind_param("i", $info_id);
                $stmt->execute();
                $sqlresult = $stmt->get_result();
                $count = $sqlresult->num_rows;
                if ($count > 0) {
                    $data2 = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
                    $_SESSION["info"] = $data2;
                }

                $msg["status"] = "1";
                $msg["message"] = "Login Successfully";
            } else {

                $msg["status"] = "0";
                $msg["message"] = "Invalid Username Or Password";
            }



//            print_r($res);
        } else {

            $msg["status"] = "0";
            $msg["message"] = "Error...";
        }

        $obj["result"] = $msg;
        $obj["data"] = $data;
        $obj["info"] = $data2;

        header("Content-Type: application/json");

        echo json_encode($obj);
    } else if ($type == "get_user_info") {

        $uid = $_POST["uid"];
        $stmt = $con->prepare("SELECT * from user_info where id = ?");
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        $sqlresult = $stmt->get_result();
        $count = $sqlresult->num_rows;
        $user = $sqlresult->fetch_assoc();

        echo json_encode($user);
    } else if ($type == "add_new_docctor") {

        $name = $_POST["dname"];
        $stmt = $con->prepare("select * from users where username = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {
            $result["result"]["status"] = "0";
            $result["result"]["message"] = "User name Already Exist";
        } else {
            $name = $_POST["dname"];
            $dept = $_POST["dept"];
            $dpassword = $_POST["dpassword"];
            $t = "2";
            $status = "0";

//        $query = "";
            $stmt = $con->prepare("insert into users (username,password,type,dept_id,status) values (?,?,?,?,?)");
            $stmt->bind_param("ssiii", $name, $dpassword, $t, $dept, $status);

            if ($stmt->execute()) {
                $msg["result"]["status"] = "1";
                $msg["result"]["message"] = "Created New Account Successfully";
            } else {


                $msg["result"]["status"] = "0";
                $msg["result"]["message"] = "Cannot Create Your Account";
            }
        }





        echo json_encode($msg);
    } else if ($type == "send_message") {

        $message = $_POST["message"];
        $uid = $_POST["uid"];
        $drid = $_POST["drid"];
        $from_id = $_SESSION["user"]["id"];

//        $query = "";
        $stmt = $con->prepare("insert into chat (uid,drid,fromid,message) values(?,?,?,?)");
        $stmt->bind_param("ssss", $uid, $drid, $from_id, $message);

        if ($stmt->execute()) {
            $msg["result"]["status"] = "1";
            $msg["result"]["message"] = "Send Successfully";
        } else {


            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "Cannot Send Message";
        }





        echo json_encode($msg);
    } else if ($type == "create_user_account") {


        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $password = $_POST["password"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $bdate = $_POST["bdate"];
        $addresses = $_POST["addresses"];
        $phone = $_POST["phone"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $blood = $_POST["blood"];
        $medication = $_POST["medication"]; //yes -> no
        $disease = $_POST["disease"]; // yes -> no
        $emergency_contact = $_POST["emergency_contact"];
        $relationship = $_POST["relationship"];
        $contact_number = $_POST["emergency_contact_number"];

        $t = "3";
        $status = "1";

        $stmt = $con->prepare("select * from users where username = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {
            $result["result"]["status"] = "0";
            $result["result"]["message"] = "User name Already Exist";
        } else {
//        $query = "";
            $stmt = $con->prepare("insert into user_info (first_name,last_name,gender,birrth_date,addresses,phone_number,weight,height,blood_type,q1,q2,emergency_contact,contact_number,relationship) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("ssssssssssssss", $fname, $lname, $gender, $bdate, $addresses, $phone, $weight, $height, $blood, $medication, $disease, $emergency_contact, $contact_number, $relationship);

            if ($stmt->execute()) {

                $insertID = $stmt->insert_id;

                $stmt = $con->prepare("insert into users (username,password,type,info_id,status,mobile) values (?,?,?,?,?,?)");
                $stmt->bind_param("ssiiis", $email, $password, $t, $insertID, $status, $mobile);

                if ($stmt->execute()) {
                    $msg["result"]["status"] = "1";
                    $msg["result"]["message"] = "Created New Account Successfully";
                } else {


                    $msg["result"]["status"] = "0";
                    $msg["result"]["message"] = "Cannot Create Your Account";
                }
            } else {


                $msg["result"]["status"] = "0";
                $msg["result"]["message"] = "Cannot Create Your Account";
            }
        }





        echo json_encode($msg);
    } else if ($type == "update_user_account") {

        $uid = $_POST["uid"];
        $iid = $_POST["iid"];
        $email = $_POST["email"];
        $mobile = $_POST["mobile"];
        $password = $_POST["password"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $gender = $_POST["gender"];
        $bdate = $_POST["bdate"];
        $addresses = $_POST["addresses"];
        $phone = $_POST["phone"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];
        $blood = $_POST["blood"];
        $medication = $_POST["medication"]; //yes -> no
        $disease = $_POST["disease"]; // yes -> no
        $emergency_contact = $_POST["emergency_contact"];
        $relationship = $_POST["relationship"];
        $contact_number = $_POST["emergency_contact_number"];

        $t = "3";
        $status = "1";

        $stmt = $con->prepare("update user_info set first_name = ?,last_name = ?,gender = ?,birrth_date = ?,addresses = ?,phone_number = ?,weight = ?,height = ?,blood_type = ?,q1 = ?,q2 = ?,emergency_contact = ?,contact_number = ?,relationship = ? where id=?");
        $stmt->bind_param("sssssssssssssss", $fname, $lname, $gender, $bdate, $addresses, $phone, $weight, $height, $blood, $medication, $disease, $emergency_contact, $contact_number, $relationship, $iid);

        if ($stmt->execute()) {


            $_SESSION["info"]["relationship"] = $relationship;
            $_SESSION["info"]["contact_number"] = $contact_number;
            $_SESSION["info"]["emergency_contact"] = $emergency_contact;
            $_SESSION["info"]["q2"] = $disease;
            $_SESSION["info"]["q1"] = $medication;
            $_SESSION["info"]["blood_type"] = $blood;
            $_SESSION["info"]["height"] = $height;
            $_SESSION["info"]["weight"] = $weight;
            $_SESSION["info"]["phone_number"] = $phone;
            $_SESSION["info"]["addresses"] = $addresses;
            $_SESSION["info"]["birrth_date"] = $bdate;
            $_SESSION["info"]["gender"] = $lname;
            $_SESSION["info"]["first_name"] = $fname;
            $_SESSION["info"]["last_name"] = $lname;

            $stmt = $con->prepare("update users set username = ?,password = ?,mobile = ? where id = ?");
            $stmt->bind_param("ssss", $email, $password, $mobile, $uid);

            $_SESSION["user"]["username"] = $email;
            $_SESSION["user"]["mobile"] = $mobile;
            $_SESSION["user"]["password"] = $password;

            if ($stmt->execute()) {
                $msg["result"]["status"] = "1";
                $msg["result"]["message"] = "Updated Account Successfully";
                ////////////////
//
//                $stmt = $con->prepare("SELECT * from users u where id = ?");
//                $stmt->bind_param("s", $uid);
//                $result = $stmt->execute();
//
//                if ($result) {
//                    $res = $stmt->get_result();
//                    $num = $res->num_rows;
//
//                    if ($num > 0) {
//
//
//
//                        $data = mysqli_fetch_array($res, MYSQLI_ASSOC);
//                        $_SESSION["user"] = $data;
//
//                        $info_id = $data["info_id"];
//
//                        $stmt = $con->prepare("SELECT * from user_info where id = ?");
//                        $stmt->bind_param("i", $info_id);
//                        $stmt->execute();
//                        $sqlresult = $stmt->get_result();
//                        $count = $sqlresult->num_rows;
//                        if ($count > 0) {
//                            $data2 = mysqli_fetch_array($sqlresult, MYSQLI_ASSOC);
//                            $_SESSION["info"] = $data2;
//                        }
//
//                       
//                    } else {
//
//                        
//                    }
//
//
//
                ////////////////
            } else {


                $msg["result"]["status"] = "0";
                $msg["result"]["message"] = "Cannot Update Your Account";
            }
        } else {


            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "Cannot Update Your Account";
        }






        echo json_encode($msg);
    } else if ($type == "get_all_doctor") {




        $msg = [];
        $data = [];

        $stmt = $con->prepare("SELECT users.id , users.username as 'name',users.`status`,users.dept_id,dept.`name` as 'dept_name' from users JOIN dept on dept.id = users.dept_id WHERE users.type = '2'");
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
    } else if ($type == "get_chat") {




        $msg = [];
        $data = [];

        $uid = $_POST["uid"];
        $drid = $_POST["drid"];

        $stmt = $con->prepare("select * from chat where uid = '{$uid}' and drid='{$drid}' order by id DESC");
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
    } else if ($type == "get_users_chat") {




        $msg = [];
        $data = [];

        $stmt = $con->prepare("select DISTINCT user_id as id from user_booking where user_booking.dr_id = '{$_SESSION["user"]["id"]}' ");
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {

//              $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

            for ($i = 0; $i < $num; $i++) {
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                $data[] = $row["id"];
            }

            $arr = "";

            for ($i = 0; $i < count($data); $i++) {
                if ($i == count($data) - 1) {
                    $arr = $arr . "'" . $data[$i] . "'";
                } else {
                    $arr = $arr . "'" . $data[$i] . "',";
                }
            }

            $data = [];

            $stmt = $con->prepare("select * from users where id IN ({$arr}) ");
            $stmt->execute();
            $res = $stmt->get_result();
            $num = $res->num_rows;

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
    } else if ($type == "get_users_chat_user") {




        $msg = [];
        $data = [];

        $stmt = $con->prepare("select DISTINCT dr_id as id from user_booking where user_booking.user_id = '{$_SESSION["user"]["id"]}' ");
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {

//              $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

            for ($i = 0; $i < $num; $i++) {
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                $data[] = $row["id"];
            }

            $arr = "";

            for ($i = 0; $i < count($data); $i++) {
                if ($i == count($data) - 1) {
                    $arr = $arr . "'" . $data[$i] . "'";
                } else {
                    $arr = $arr . "'" . $data[$i] . "',";
                }
            }

            $data = [];

            $stmt = $con->prepare("select * from users where id IN ({$arr}) ");
            $stmt->execute();
            $res = $stmt->get_result();
            $num = $res->num_rows;

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
    } else if ($type == "get_all_doctor_deept") {
        header("Content-Type: application/json");

        $msg = [];
        $data = [];

//   

        $stmt = $con->prepare("select id,name from dept");
        $stmt->execute();
        $res = $stmt->get_result();
        $num = $res->num_rows;

        if ($num > 0) {

//              $row = mysqli_fetch_array($res, MYSQLI_ASSOC);


            $dept = [];
            for ($i = 0; $i < $num; $i++) {
                $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
                $x = $row;
                $x["data"] = [];

                $dept[] = $x;
            }



            for ($i = 0; $i < count($dept); $i++) {
//                echo "SELECT users.id , users.username as 'name',users.`status`,users.dept_id from users  WHERE dept_id = '{$dept[$i]["id"]}' and users.type = '2'";
//                die;
                $stmt = $con->prepare("SELECT users.id , users.username as 'name',users.`status`,users.dept_id from users  WHERE dept_id = '{$dept[$i]["id"]}' and users.type = '2'");
                $stmt->execute();
                $res = $stmt->get_result();
                $num = $res->num_rows;

                for ($j = 0; $j < $num; $j++) {
                    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);

                    $dept[$i]["data"][] = $row;
                }
            }





            $msg["status"] = "1";
            $msg["message"] = "Retrived Successfully";
        } else {
            $msg["status"] = "0";
            $msg["message"] = "No Record Found";
        }



        $obj = [];

        $obj["result"] = $msg;
        $obj["data"] = $dept;

        echo json_encode($obj);
    } else if ($type == "change_status") {
        $id = $_POST["id"];
        $status_id = $_POST["status_id"];
//        $query = "";
        $stmt = $con->prepare("update users set status=? where id=?");
        $stmt->bind_param("ii", $status_id, $id);

        if ($stmt->execute()) {
            $msg["result"]["status"] = "1";
            $msg["result"]["message"] = "Updated Successfully";
        } else {


            $msg["result"]["status"] = "0";
            $msg["result"]["message"] = "Cannot Update this User";
        }





        echo json_encode($msg);
    }
} else {

    echo "Cannot Be Request GET";
}    