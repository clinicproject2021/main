<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>Completed Report</h3>
    </div>
</div>

<div id="message"></div>
<table class="table table-striped table-bordered">
    <thead>
    <th>Doctor Name</th>
    <th>Department</th>
    <th>Date</th> 
    <th>Description</th>
    <th>Status</th>
</thead>

<tbody class = "body">



</tbody>

</table>
   
<script>

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

                       
                        var desc = obj["description"];

                        if (desc == "null" || desc == "NULL" || desc == null) {
                            desc = "";
                        }



                        html += "<tr class='row_id_" + obj["id"] + "'><td>" + obj["dr_name"] + "</td><td>" + obj["dept_name"] + "</td><td>" + obj["date"] + "</td><td>" + desc + "</td><td>" + obj["status_name"] + "</td></tr>";
                    }


                    $(".body").html(html);


                }


            }, error: function (error) {
                console.log(error);
            }

        });
    }


    getDataByStatus(5);
   


</script>








<?php
include './layout/footer.php';
?>