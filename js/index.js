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
                window.location = "/Hackathon/index.html";
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
                window.location = "/Hackathon/index.html";
            } else {
                $("#loginmessage").html(data);
            }
        },
        error: function () {
            $("#loginmessage").html("<div class='alert alert-danger'>There was an Error in Ajax Call. Please Try Again later</div>");

        }
    });
});
