<?php
include './layout/header.php';
?>

<div class="c-1200">
    <div id="page-title"><h3>Chat</h3>
    </div>
</div>


<div class="col-xs-12 col-md-4 users-chat">
    <h3>Users</h3>
    <ul class="user-list">

    </ul>


</div>

<div class="col-xs-12 col-md-8 chat-body">
    <h3 class="chat-body-title">
        <form class="form">

            <div class="form-group">
                <input type="text" class="from-control" placeholder="Write message" id="message" name="messsage" >
                <button type="submit" class="btn btn-primary"> Send</button>
            </div>


        </form>
    </h3>
    <ul class="user-list-chat">


    </ul>

</div>



<script>

    var uid = 0;
    var drid = <?php echo $_SESSION["user"]["id"]; ?>;


    $(".form").submit(function (e) {
        e.preventDefault();

        var message = $("#message").val();

        if (message == "") {
            alert("Message cannot be empty");
        } else if (uid == 0) {
            alert("Please select user first");
        } else {
            $.ajax({
                type: "POST",
                url: "../ws/users.php",
                data: {
                    "type": "send_message",
                    "uid": uid,
                    "drid": drid,
                    "message": message,

                }, // serializes the form's elements.
                dataType: 'json',
                success: function (res) {

                    console.log(res);
                    alert(res["result"]["message"]);
                    $("#message").val("");

                }, error: function (error) {
                    console.log(error);
                }

            });
        }



    });



    setInterval(function () {
        getChat();
    }, 1000);

    function getChat() {

        $.ajax({
            type: "POST",
            url: "../ws/users.php",
            data: {
                "type": "get_chat",
                "uid": uid,
                "drid": drid,

            }, // serializes the form's elements.
            dataType: 'json',
            success: function (res) {

                console.log(res);

                var data = res["data"];
                var html = "";


                for (var i = 0; i < data.length; i++) {
                    var obj = data[i];

                    var cls = "";
                    if (obj["fromid"] == drid) {
                        cls = "from";
                    }

                    html += "<li class='row-chat " + cls + "' id='" + obj["id"] + "'>" + obj["message"] + "</li>";
                }

                $(".user-list-chat").html(html);

            }, error: function (error) {
                console.log(error);
            }

        });


    }




    $(".user-list").on("click", ".row-chat", function (event) {
        uid = $(this).attr("id");
        getChat();
    });
    $.ajax({
        type: "POST",
        url: "../ws/users.php",
        data: {
            "type": "get_users_chat",

        }, // serializes the form's elements.
        dataType: 'json',
        success: function (res) {

            console.log(res);

            var data = res["data"];
            var html = "";


            for (var i = 0; i < data.length; i++) {
                var obj = data[i];
                if (i == 0) {
                    uid = obj["id"];
                }
                html += "<li class='row-chat' id='" + obj["id"] + "'>" + obj["username"] + " ( " + obj["mobile"] + " )" + "</li>";
            }

            $(".user-list").html(html);

        }, error: function (error) {
            console.log(error);
        }

    });

</script>



<?php
include './layout/footer.php';
?>