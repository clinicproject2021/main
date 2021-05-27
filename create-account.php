<?php
include './layout/header.php';
?>


<div class="c-1200">
    <div id="page-title">
        <h3>Create New Account</h3>
    </div>
</div>


<div class="account-type">
    <div class="account-type-title">Select Account Type</div>
    <img src="./asset/images/doc_logo.png" id="create-doc" alt="">
    <img src="./asset/images/pat_logo.png" id="creat-pat" alt="">
</div>



<div class="login-form  create-account-form" style="display: none;">

    <div id="message"></div>
    <div class="form-image">
        <img src="" alt="" id="form-image">
    </div>


    <form id="user-account" style="display: none;" action="./ws/users.php">


        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Account Information:</legend>
                <div class="form-group">
                    <label for="email"> Email </label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="mobile"> Mobile </label>
                    <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Mobile">
                </div>


                <div class="form-group">
                    <label for="password"> Password </label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                </div>


                <div class="form-group">
                    <label for="cpassword">Confirm Password </label>
                    <input class="form-control" type="cpassword" name="cpassword" id="cpassword" placeholder="Confirm Password">
                </div>

            </fieldset>

        </div>



        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Patient Information:</legend>
                <div class="form-group">
                    <label for="fname"> First Name </label>
                    <input class="form-control" type="text" name="fname" id="fname" placeholder="First Name">
                </div>


                <div class="form-group">
                    <label for="lname"> Last Name </label>
                    <input class="form-control" type="text" name="lname" id="lname" placeholder="Last Name">
                </div>


                <div class="form-group">
                    <label> Gender  </label>
                    <br>
                    <label> Male </label>
                    <input type="radio"  name="gender" id="male" value="male">

                    <label> Fmale </label>
                    <input type="radio" name="gender" id="female" value="female">
                </div>



                <div class="form-group">
                    <label for="bdate"> Birth Date </label>
                    <input class="form-control" type="date" name="bdate" id="bdate" placeholder="Birth Date">
                </div>


                <div class="form-group">
                    <label for="addresses"> Address </label>
                    <input class="form-control" type="text" name="addresses" id="addresses" placeholder="Addresses">
                </div>


                <div class="form-group">
                    <label for="phone"> Phone Number </label>
                    <input class="form-control" type="text" name="phone" id="phone" placeholder=" Phone Number ">
                </div>

            </fieldset>

        </div>




        <div class="col-xs-12 col-md-3">

            <fieldset>
                <legend>Medical Information:</legend>


                <div class="form-group">
                    <label for="weight"> Weight </label>
                    <input class="form-control" type="text" name="weight" id="weight" placeholder="Weight">
                </div>

                <div class="form-group">
                    <label for="height"> Height </label>
                    <input class="form-control" type="text" name="height" id="height" placeholder="Height">
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
                    <input class="form-control" type="text" name="emergency_contact" id="emergency_contact" placeholder="Emergency Contact">
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
                    <input class="form-control" type="text" name="emergency_contact_number" id="emergency_contact_number" placeholder="Contac Number ">
                </div>




            </fieldset>
        </div>






        
        
        
        <input type="hidden" name="type"  value="create_user_account">



        <div class="btn-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true">  </i>Create Account</button>
        </div>

    </form>



    <form id="doctor-acount" action="./ws/users.php" style="display: none;">
        <div class="form-group">
            <label for="dname"> Doctor Name </label>
            <input class="form-control" type="text" name="dname" id="dname" placeholder="User Name">
        </div>


        <div class="form-group">
            <label for="dept"> Doctor Department </label>
            <select name="dept" id="dept" class="form-control">
                <option value="0">- Select -</option>
                <option value="1">  1</option>
            </select>


        </div>

        <div class="form-group">
            <label for="dpassword"> Password </label>
            <input class="form-control" type="password" name="dpassword" id="dpassword" placeholder="Password">
        </div>


        <div class="form-group">
            <label for="dcpassword">Confirm Password </label>
            <input class="form-control" type="password" name="dcpassword" id="dcpassword" placeholder="Confirm Password">
        </div>

        <input type="hidden" name="type" value="add_new_docctor">

        <div class="btn-center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true">  </i>Create Account</button>
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


<div class="wrap">
   <div class="container">
    <div class="box box1"></div>
    <div class="box box2"></div>
    <div class="box box3"></div>
    <div class="box box4"></div>
    <div class="box box5"></div>
    <div class="box box6"></div> 
    <div class="box box7"></div>
    <div class="box box8"></div>
  </div>
</div>



<?php
include './layout/footer.php';
?>