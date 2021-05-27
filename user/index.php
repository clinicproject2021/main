<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>USER INFORMATION </h3>
    </div>
</div>


<div class="body">
    
    
    
    
    
    
    
    
</div>
<div class="update-center">
    <a href="./update-account.php" class="btn btn-primary">Update Profile</a>
</div>








<script>



    $.ajax({
        type: "POST",
        url: "../ws/users.php",
        data: {
            "type": "get_user_info",
            "uid":"<?php echo $_SESSION["user"]["info_id"];?>"
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

</script>








<?php
include './layout/footer.php';
?>