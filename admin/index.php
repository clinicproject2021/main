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
    <th>Department Name</th>
    <th>Description</th>
    <th>Action</th>
</thead>

<tbody class = "body">
    <tr><td>1</td><td>2</td> </tr>



</tbody>

</table>





<script>



    function deleteDept(id) {



        let x = confirm("Atr you sure to delete this departement ?");

        if (x == true) {


            $.ajax({
                type: "POST",
                url: "../ws/dept.php",
                data: {
                    "type": "delete_dept",
                    "id": id,
                }, // serializes the form's elements.
                dataType: 'json',
                success: function (res) {

                    console.log(res);
                    var result = res["result"];

                    if (result["status"] == "0") {
                        $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                        $("#message").show(1000);
                    } else if (result["status"] == "1") {

                        $(".row-" + id).hide(1000);
                    }


                }, error: function (error) {
                    console.log(error);
                }

            });















//            alert("ok");
        } else {
//            alert("no");
        }

//        alert(id);

    }


    $.ajax({
        type: "POST",
        url: "../ws/dept.php",
        data: {
            "type": "get_all_dept"
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
                    var txt = "";
                    if (obj["description"] != null) {
                     txt = obj["description"];
                    }
                    html += "<tr class='row-" + obj["id"] + "'><td>" + obj["id"] + "</td><td>" + obj["name"] + "</td><td>" +txt +"</td><td><button class='btn btn-danger' onClick='deleteDept(" + obj["id"] + ")'>Delete</button></td></tr>";
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