<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>New Booking</h3>
    </div>
</div>




<div id="message"></div>
<table class="table table-striped table-bordered">
    <thead>
    <th>User Name</th>
    <th>Date</th> 
    <th>Status</th>
    <th>Action</th>
</thead>

<tbody class = "body">



</tbody>

</table>





<script>


    function changeStatus(id, status) {

        $.ajax({
            type: "POST",
            url: "../ws/booking.php",
            data: {
                "type": "change_status",
                "status": status,
                "id": id
            }, // serializes the form's elements.
            dataType: 'json',
            success: function (res) {

                console.log(res);
                var result = res["result"];

                if (result["status"] == "0") {
                    $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                    $("#message").show(1000);
//                    $(".body").html("");
                } else if (result["status"] == "1") {
                    $(".row_id_"+id).hide();
                    $("#message").html("<div class='alert alert-success'>" + result["message"] + "</div>");
                    $("#message").show(1000);

                }


            }, error: function (error) {
                console.log(error);
            }

        });


    }




    function getDataByStatus(id) {
        $.ajax({
            type: "POST",
            url: "../ws/booking.php",
            data: {
                "type": "doctor_booking",
                "status": id,
                "uid": "<?php echo $_SESSION["user"]["id"]; ?>"
            }, // serializes the form's elements.
            dataType: 'json',
            success: function (res) {

                console.log(res);
                var result = res["result"];

                if (result["status"] == "0") {
                    $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                    $("#message").show(1000);
                    $(".body").html("");
                } else if (result["status"] == "1") {
//                        $("#message").html("<div class='alert alert-success'>" + result["message"] + "</div>");
//                        $("#message").show(1000);

                    var data = res["data"];

                    var html = "";
                    for (var i = 0; i < data.length; i++) {
                        var obj = data[i];

                        var btn = "";
                        if (obj["status_id"] == "1") {
                            btn = "<button class='btn btn-success' onClick='changeStatus(" + obj["id"] + ",2)'>Approve</button>";
                        }

                        var desc = obj["description"];

                        if (desc == "null" || desc == "NULL" || desc == null) {
                            desc = "";
                        }



                        html += "<tr class='row_id_" + obj["id"] + "'><td>" + obj["user_name"] + "</td><td>" + obj["date"] + "</td><td>" + obj["status_name"] + "</td><td >" + btn + " <a class='btn btn-primary' href='/doctor/user_info.php?id="+obj["user_id"]+"&name="+obj["user_name"]+"'> View User Information</a> </td></tr>";
                    }


                    $(".body").html(html);


                }


            }, error: function (error) {
                console.log(error);
            }

        });
    }


    getDataByStatus(1);



</script>








<?php
include './layout/footer.php';
?>