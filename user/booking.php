<?php
include './layout/header.php';
?>
<div class="c-1200">
    <div id="page-title"><h3>Book a visit at Dr. <?php echo $_GET["dr_name"];?></h3>
    </div>
</div>


<div class="login-form">

    <div id="message"></div>


    <form  id="form" action="../ws/booking.php">
        <div class="form-group">
            <label for="dr_name"> Doctor </label>
            <input class="form-control" type="text" name="dr_name" id="dr_name" value="<?php echo $_GET["dr_name"];?>" disabled placeholder="">
            <input class="form-control" type="hidden" name="dr_id" id="type" value="<?php echo $_GET["dr_id"];?>" >
        </div>

        
         <div class="form-group">
            <label for="dr_name"> Your Account </label>
            <input class="form-control" type="text" name="uname" id="dr_name" value="<?php echo $_SESSION["user"]["username"];?>" disabled placeholder="">
            <input class="form-control" type="hidden" name="uid" id="type" value="<?php echo $_SESSION["user"]["id"];?>" >
        </div>
        
        
        <div class="form-group">
            <label for="dept"> Department </label>
            <input class="form-control" type="text" name="dept_name" id="dept_name" value="<?php echo $_GET["dept_name"];?>" disabled placeholder="">
            <input class="form-control" type="hidden" name="dept_id" id="dept_id" value="<?php echo $_GET["dept_id"];?>" >
        </div>
        
        
        <div class="form-group">
            <label for="dr_name"> Booking Date </label>
            <input class="form-control" type="date" name="date" id="dr_name"  placeholder="Booking Date">
        </div>
        
        
        <div class="form-group">
            <label for="dr_name"> Booking Time </label>
            <input class="form-control" type="time" name="time" id="time"  placeholder="Booking Time">
        </div>
        
        
        <input class="form-control" type="hidden" name="status" id="status" value="1" >
        
        <input class="form-control" type="hidden" name="type" id="type" value="book_now" >


        <div class="btn-center">
            <button type="submit" id="btn-submit" class="btn btn-primary">Book Now</button>
        </div>


    </form>





</div>






<script>
    
    $(document).ready(function () {
        
        
        
        $("#form").submit(function (e) {
            e.preventDefault();
            $("#message").hide();
            
//            alert(123);
            var form = $(this);
            var url = form.attr('action');
            
            
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                dataType: 'json',
                success: function (res) {
                    
                    console.log(res);
                    var result = res["result"];
                    
                    if (result["status"] == "0") {
                        $("#message").html("<div class='alert alert-danger'>" + result["message"] + "</div>");
                        $("#message").show(1000);
                    } else if (result["status"] == "1") {
                         $("#message").html("<div class='alert alert-success'>" + result["message"] + "</div>");
                        $("#message").show(1000);
                        $("#btn-submit").hide();
                        
                    }

                }, error: function (error) {
                    console.log(error);
                }
                
            });
            
            
            
            
            
            
            
            
        });
        
        
        
        
        
        
        
        
        
    });
    
    
    
    
    
    
    
</script>




<?php
include './layout/footer.php';
?>
