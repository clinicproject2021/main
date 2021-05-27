<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>All Department</h3>
    </div>
</div>

<div id="message"></div>
<table class="table table-striped table-bordered">
    <thead>
    <th>id</th>
    <th>Doctor Name</th>
    <th>Department ID</th> 
    <th>Department Name</th> 
    <th>Action</th>
</thead>

<tbody class = "body">



</tbody>

</table>





<script>



    function changeStatus(id, newStatus) {



        let x = confirm("Are you sure to Change Status ?");

        if (x == true) {


            $.ajax({
                type: "POST",
                url: "../ws/users.php",
                data: {
                    "type": "change_status",
                    "id": id,
                    "status_id": newStatus,
                }, // serializes the form's elements.
                dataType: 'json',
                success: function (res) {

                    console.log(res);
                    var result = res["result"];

                    if (result["status"] == "0") {
                        $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                        $("#message").show(1000);
                    } else if (result["status"] == "1") {

                        var btn = "";
                        if (newStatus == 0) {
                            btn = "<button class='btn btn-success' onClick='changeStatus(" + id + ",1)'>Active</button>";
                        } else {
                            btn = "<button class='btn btn-danger' onClick='changeStatus(" + id + " ,0)'>Block</button>";
                        }
                        
                        $(".btn_row_"+id).html(btn);
                        


                    }


                }, error: function (error) {
                    console.log(error);
                }

            });


        } else {
//            alert("no");
        }

//        alert(id);

    }


    $.ajax({
        type: "POST",
        url: "../ws/users.php",
        data: {
            "type": "get_all_doctor"
        }, // serializes the form's elements.
        dataType: 'json',
        success: function (res) {

            console.log(res);
            var result = res["result"];

            if (result["status"] == "0") {
                $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                $("#message").show(1000);
            } else if (result["status"] == "1") {
//                        $("#message").html("<div class='alert alert-success'>" + result["message"] + "</div>");
//                        $("#message").show(1000);

                var data = res["data"];

                var html = "";
                for (var i = 0; i < data.length; i++) {
                    var obj = data[i];
                    var btn = "";
                    if (obj["status"] == 0) {
                        btn = "<button class='btn btn-success' onClick='changeStatus(" + obj["id"] + ",1)'>Active</button>";
                    } else {
                        btn = "<button class='btn btn-danger' onClick='changeStatus(" + obj["id"] + " ,0)'>Block</button>";
                    }

                    html += "<tr class='row-" + obj["id"] + "'><td>" + obj["id"] + "</td><td>" + obj["name"] + "</td><td>" + obj["dept_id"] + "</td><td>" + obj["dept_name"] + "</td><td  class='btn_row_" + obj["id"] + "'>" + btn + "</td></tr>";
                }


                $(".body").html(html);


            }


        }, error: function (error) {
            console.log(error);
        }

    });

</script>








<?php
include './layout/footer.php';
?>