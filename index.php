<?php
include './layout/header.php';
?>
<div class="c-1200">
    <div id="page-title"><h3>BEST CARE & BETTER DOCTOR</h3>
    </div>
</div>


<div class="login-form">

    <div class="form-image">
        <img src="./asset/images/login2.jpg" alt="" style=" border-radius: 50%;">
    </div>

    <div id="message"></div>


    <form  id="form" action="./ws/users.php">
        <div class="form-group">
            <label for="name"> User Name </label>
            <input class="form-control" type="text" name="name" id="name" placeholder="User Name">
        </div>

        <div class="form-group">
            <label for="password"> Password </label>

            <input class="form-control" type="password" name="password" id="password" placeholder="Password">
        </div>


        <input class="form-control" type="hidden" name="type" id="type" value="login" >


        <div class="btn-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true">  </i>Login</button>
        </div>

        <a href="./create-account.php">I don't have an acount</a>

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
                        if (res["data"]["type"] == "1") {
                            window.location.href = "/admin";
                        }else if (res["data"]["type"] == "3") {
                            window.location.href = "/user";
                        }else if (res["data"]["type"] == "2") {
                            window.location.href = "/doctor";
                        }
                        
                        
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
