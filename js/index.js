$("#signupForm").submit(function (event) {
    $("#signupmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    //    console.log(datatopost);
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data != "success") {
                $("#signupmessage").html(data);

            } else {
                window.location = "/Hackathon/menu.php";
            }
        },
        error: function () {
            $("#signupmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
$("#loginForm").submit(function (event) {
    $("#loginmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data == "success") {
                window.location = "/Hackathon/menu.php";
            } else {
                $("#loginmessage").html(data);
            }
        },
        error: function () {
            $("#loginmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});

$("#userinfoform").submit(function (event) {
    $("#userinfoformmessage").empty();
    event.preventDefault();
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    var count = 0;
    datatopost.forEach(function (item) {
        if (item.value.length == 0) {
            if (item.name != "email2" && item.name != "phone2" && item.name != "illness" && item.name != "medication") {
                $(`#userinfoformmessage`).html("<div class='alert alert-danger'>All Fields Required.</div>");
                count = 1;
                return false;
            }
        }
    });
    if (count == 1) {
        return;
    }
    console.log("hello");
    $.ajax({
        url: "adduserinfo.php",
        type: "POST",
        data: datatopost,
        success: function (data) {
            if (data == "success") {
                window.location = "/Hackathon/index.php";
            } else {
                $("#userinfoformmessage").html(data);
            }
        },
        error: function () {
            $("#userinfoformmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
