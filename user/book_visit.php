<?php
include './layout/header.php';
?>
<div class="c-1200">
    <div id="page-title"><h3>Book a visit</h3>
    </div>
</div>



<div class="body">
   
    
    
</div>





<script>

    $.ajax({
        type: "POST",
        url: "../ws/users.php",
        data: {
            "type": "get_all_doctor_deept"
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
                    
                    var drs = "";
                    
                    var d = obj["data"];
                    
                    
                    for (var x = 0; x < d.length; x++) {
                        var ob = d[x];
                    drs+="<div class='doctor-page-doctor'>"+ob["name"]+"<div><a class='btn btn-primary' href='/user/booking.php?dr_name="+ob["name"]+"&dr_id="+ob["id"]+"&dept_name="+obj["name"]+"&dept_id="+obj["id"]+"' >Book Now</a></div></div>";
                    
                    }
                    
                    
                    
                    html += " <fieldset><legend>"+obj["name"]+"</legend>"+drs+"</fieldset>";
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
