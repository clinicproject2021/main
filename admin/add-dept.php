<?php
include './layout/header.php';
?>
<div class="c-1200">
    <div id="page-title"><h3>Add New Department</h3>
    </div>
</div>


<div class="login-form">

    <div id="message"></div>


    <form  id="form" action="../ws/dept.php">
        <div class="form-group">
            <label for="name"> Department Name </label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Department Name">
        </div><!-- comment -->
        
        
        <div class="form-group">
            <textarea rows="5" name="description" class="form-control" id="description"    placeholder="Write Description"></textarea>
        </div>

       


        <input class="form-control" type="hidden" name="type" id="type" value="add_new_dept" >


        <div class="btn-center">
            <button type="submit" class="btn btn-primary">   <i class="fa fa-plus" aria-hidden="true">  </i>Add New</button>
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
