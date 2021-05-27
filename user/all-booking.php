<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>All Booking</h3>
    </div>
</div>



<div class="filter">
    <label>Filter by Status</label>
    <select name="status" id="status-change" class="form-control">
        <option value="1">Waiting</option>
        <option value="2">Approve From Doctor</option>
        <option value="3">Need Permissions</option>
        <option value="4">Approved</option>
        <option value="5">Completed</option>
    </select>
</div>
<div id="message"></div>
<table class="table table-striped table-bordered">
    <thead>
    <th>Doctor Name</th>
    <th>Department</th>
    <th>Date</th> 
    <th>Description</th>
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
                "type": "user_booking",
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
                        if (obj["status_id"] == "3") {
                            btn = "<button class='btn btn-success' onClick='changeStatus(" + obj["id"] + ",4)'>Approve</button>";
                        }

                        var desc = obj["description"];

                        if (desc == "null" || desc == "NULL" || desc == null) {
                            desc = "";
                        }



                        html += "<tr class='row_id_" + obj["id"] + "'><td>" + obj["dr_name"] + "</td><td>" + obj["dept_name"] + "</td><td>" + obj["date"] + "</td><td>" + desc + "</td><td>" + obj["status_name"] + "</td><td >" + btn + "</td></tr>";
                    }


                    $(".body").html(html);


                }


            }, error: function (error) {
                console.log(error);
            }

        });
    }


    getDataByStatus(1);
    $("#status-change").change(function () {
        var id = $("#status-change").val();
        getDataByStatus(id);
    });


</script>








<?php
include './layout/footer.php';
?>