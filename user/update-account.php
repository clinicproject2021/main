<?php
include './layout/header.php';
?>


<div class="c-1200">
    <div id="page-title">
        <h3>Update Profile</h3>
    </div>
</div>





<div class="login-form  create-account-form">

    <div id="message"></div>
  

    <form id="user-account" action="../ws/users.php">


        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Account Information:</legend>
                <div class="form-group">
                    <label for="email"> Email </label>
                    <input class="form-control" type="email" name="email" id="email" value="<?php echo $_SESSION["user"]["username"]; ?>" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="mobile"> Mobile </label>
                    <input class="form-control" type="text" name="mobile" id="mobile" value="<?php echo $_SESSION["user"]["mobile"]; ?>" placeholder="Mobile">
                </div>


                <div class="form-group">
                    <label for="password"> Password </label>
                    <input class="form-control" type="password" name="password" id="password" value="<?php echo $_SESSION["user"]["password"]; ?>" placeholder="Password">
                </div>


                <div class="form-group">
                    <label for="cpassword">Confirm Password </label>
                    <input class="form-control" type="cpassword" name="cpassword" id="cpassword"  placeholder="Confirm Password">
                </div>

            </fieldset>

        </div>



        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Patient Information:</legend>
                <div class="form-group">
                    <label for="fname"> First Name </label>
                    <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $_SESSION["info"]["first_name"]; ?>" placeholder="First Name">
                </div>


                <div class="form-group">
                    <label for="lname"> Last Name </label>
                    <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $_SESSION["info"]["last_name"]; ?>" placeholder="Last Name">
                </div>


                <div class="form-group">
                    <label> Gender  </label>
                    <br>
                    <label> Male </label>
                    <input type="radio" checked  name="gender" id="male" value="male">

                    <label> Female </label>
                    <input type="radio" name="gender" id="female" value="female">
                </div>



                <div class="form-group">
                    <label for="bdate"> Birth Date </label>
                    <input class="form-control" type="date" name="bdate" id="bdate" value="<?php echo $_SESSION["info"]["birrth_date"]; ?>" placeholder="Birth Date">
                </div>


                <div class="form-group">
                    <label for="addresses"> Address </label>
                    <input class="form-control" type="text" name="addresses" id="addresses" value="<?php echo $_SESSION["info"]["addresses"]; ?>" placeholder="Addresses">
                </div>


                <div class="form-group">
                    <label for="phone"> Phone Number </label>
                    <input class="form-control" type="text" name="phone" id="phone" placeholder=" Phone Number " value="<?php echo $_SESSION["info"]["phone_number"]; ?>">
                </div>

            </fieldset>

        </div>




        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Medical Information:</legend>


                <div class="form-group">
                    <label for="weight"> Weight </label>
                    <input class="form-control" type="text" name="weight" id="weight" placeholder="Weight" value="<?php echo $_SESSION["info"]["weight"]; ?>">
                </div>

                <div class="form-group">
                    <label for="height"> Height </label>
                    <input class="form-control" type="text" name="height" id="height" placeholder="Height" value="<?php echo $_SESSION["info"]["height"]; ?>">
                </div>

                <div class="form-group">
                    <label for="blood">Blood Type</label>
                    <select name="blood" id="blood" class="form-control">
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="AB+">AB+</option>
                        <option value="v-">AB-</option>
                    </select>

                </div>



                <div class="form-group">
                    <label> Taking any Medication Currntly?  </label>
                    <br>
                    <label> YES </label>
                    <input type="radio"  name="medication" id="medication-y" value="yes">

                    <label> NO </label>
                    <input type="radio" name="medication" id="medication-n" checked value="no">
                </div>


                <div class="form-group" id="medication_description_main" style="display: none;">
                    <label for="medication_description"> Medical Description </label>
                    <textarea class="form-control" name="medication_description" id="medication_description" cols="30" rows="5" placeholder="Medical Description">
                    </textarea>
                </div>




                <div class="form-group">
                    <label> Have Any Chronic Disease ?  </label>
                    <br>
                    <label> YES </label>
                    <input type="radio"  name="disease" id="disease-y" value="yes">

                    <label> NO </label>
                    <input type="radio" name="disease" id="disease-n" checked value="no">
                </div>


                <div class="form-group" id="disease_description_main" style="display: none;">
                    <label for="disease_description"> Disease Description </label>
                    <textarea class="form-control" name="disease_description" id="disease_description" cols="30" rows="5" placeholder="Disease Description">
                    </textarea>
                </div>






            </fieldset>

        </div>


        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>IN Case of Emargancy:</legend>

                <div class="form-group">
                    <label for="emergency_contact"> Emergency Contact </label>
                    <input class="form-control" type="text" name="emergency_contact" id="emergency_contact" placeholder="Emergency Contact" value="<?php echo $_SESSION["info"]["emergency_contact"]; ?>">
                </div>


                <div class="form-group">
                    <label for="relationship">Relationship</label>
                    <select name="relationship" id="relationship" class="form-control">
                        <option value="relatives">Relatives</option>
                        <option value="friends">friends</option>
                        <option value="others">Others</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="emergency_contact_number"> Contact  Number</label>
                    <input class="form-control" type="text" name="emergency_contact_number" id="emergency_contact_number" value="<?php echo $_SESSION["info"]["contact_number"]; ?>" placeholder="Contac Number ">
                </div>




            </fieldset>
        </div>


        <input type="hidden" name="iid" value="<?php echo $_SESSION["info"]["id"]; ?>" >
        <input type="hidden" name="uid" value="<?php echo $_SESSION["user"]["id"]; ?>" >



        
        
        
        <input type="hidden" name="type"  value="update_user_account">



        <div class="btn-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true">  </i>Update Profile</button>
        </div>

    </form>





</div>







<script>


    var selected_type = "";

    $(document).ready(
            function () {


                $("#user-account").submit(function (e) {
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











                $("#doctor-acount").submit(function (e) {
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








                $.ajax({
                    type: "POST",
                    url: "./ws/dept.php",
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
                            html += " <option value='0'> - Select- </option>";
                            for (var i = 0; i < data.length; i++) {
                                var obj = data[i];
                                html += " <option value='" + obj["id"] + "'> " + obj["name"] + "</option>";
                            }


                            $("#dept").html(html);


                        }


                    }, error: function (error) {
                        console.log(error);
                    }

                });









                $("#medication-y").click(function () {
                    $("#medication_description_main").show();
                });

                $("#medication-n").click(function () {
                    $("#medication_description_main").hide();
                });

                $("#disease-y").click(function () {
                    $("#disease_description_main").show();
                });

                $("#disease-n").click(function () {
                    $("#disease_description_main").hide();
                });





                $("#create-doc").click(function () {
                    $("#doctor-acount").show();
                    $("#user-account").hide();
                    $("#form-image").attr("src", "./asset/images/doc_logo.png");
                    $(".login-form").slideDown();
                    selected_type = "1";

                });


                $("#creat-pat").click(function () {
                    $("#doctor-acount").hide();
                    $("#user-account").show();
                    $("#form-image").attr("src", "./asset/images/pat_logo.png");
                    $(".login-form").slideDown();
                    selected_type = "2";
                });







            }


    );


</script>






<?php
include './layout/footer.php';
?>