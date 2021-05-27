<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3><?php echo $_GET["name"]; ?> Information</h3>
    </div>
</div>


<div class="body">
    
    
    
    
    
    
    
    
</div>




<h3>Old Report</h3>
<table class="table table-striped table-bordered">
    <thead>
    <th>Doctor Name</th>
    <th>Department</th>
    <th>Date</th> 
    <th>Description</th>
</thead>

<tbody class = "tbody">
  


</tbody>
 
</table>






<script>



    $.ajax({
        type: "POST",
        url: "../ws/users.php",
        data: {
            "type": "get_user_info",
            "uid":"<?php echo $_GET["id"];?>"
        }, // serializes the form's elements.
        dataType: 'json',
        success: function (res) {

            console.log(res);
           
           var html = "";
           
           html+="<div class='profile-info'>Addresses : <span>"+res["addresses"]+"</span></div> ";
           html+="<div class='profile-info'>Birrth date : <span>"+res["birrth_date"]+"</span></div> ";
           html+="<div class='profile-info'>Blood type : <span>"+res["blood_type"]+"</span></div> ";
           html+="<div class='profile-info'>contact number : <span>"+res["contact_number"]+"</span></div> ";
           html+="<div class='profile-info'>emergency contact : <span>"+res["emergency_contact"]+"</span></div> ";
           html+="<div class='profile-info'>first name : <span>"+res["first_name"]+"</span></div> ";
           html+="<div class='profile-info'>last name : <span>"+res["last_name"]+"</span></div> ";
           html+="<div class='profile-info'>phone number : <span>"+res["phone_number"]+"</span></div> ";
           html+="<div class='profile-info'>gender : <span>"+res["gender"]+"</span></div> ";
           html+="<div class='profile-info'>Taking any Medication Currntly? : <span>"+res["q1"]+"</span></div> ";
           html+="<div class='profile-info'>Have Any Chronic Disease ? : <span>"+res["q2"]+"</span></div> ";
           html+="<div class='profile-info'>height : <span>"+res["height"]+"</span></div> ";
           html+="<div class='profile-info'>weight : <span>"+res["weight"]+"</span></div> ";
           html+="<div class='profile-info'>relationship : <span>"+res["relationship"]+"</span></div> ";
//           html+="<div class='profile-info'>title : <span>"+res[""]+"</span></div> ";
//           html+="<div class='profile-info'>title : <span>"+res[""]+"</span></div> ";
           
            $(".body").html(html);
           

           

        }, error: function (error) {
            console.log(error);
        }

    });





    function getDataByStatus(id) {
        $.ajax({
            type: "POST",
            url: "../ws/booking.php",
            data: {
                "type": "user_booking",
                "status": id,
                "uid": "<?php echo $_GET["id"]; ?>"
            }, // serializes the form's elements.
            dataType: 'json',
            success: function (res) {

                console.log(res);
                var result = res["result"];

                if (result["status"] == "0") {
                    $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                    $("#message").show(1000);
                    $(".tbody").html("");
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



                        html += "<tr class='row_id_" + obj["id"] + "'><td>" + obj["dr_name"] + "</td><td>" + obj["dept_name"] + "</td><td>" + obj["date"] + "</td><td>" + desc + "</td></tr>";
                    }


                    $(".tbody").html(html);


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