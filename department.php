<?php
include './layout/header.php';
?>
<div class="c-1200">
    <div id="page-title"><h3>DEPARTMENTS</h3>
    </div>
</div>



<div class="body">
   
    
    
</div>





<script>

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
                    html += " <fieldset><legend>"+obj["name"]+"</legend>"+txt+"</fieldset>";
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
