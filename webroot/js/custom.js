$(document).ready(function () {
    $.ajaxSetup({
        headers : {
            'X-CSRF_TOKEN' : token
        }
    });

    //List Student
    $('#tbl_students').DataTable();


    //Add Student Data
    $("#frm-add-student").validate({
        submitHandler: function () {
            // Submit add student form data using ajax
            var formData = new FormData($("#frm-add-student")[0]);

            $.ajax({
                url: "/submit-student-data",
                data: formData,
                method: "POST",
                cache: false,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    window.location.reload();
                }
            });
        }

    });

    //Update Student Data
    $("#frm-edit-student").validate({
        submitHandler: function () {
            // Submit Update student form data using ajax
            var formData = new FormData($("#frm-edit-student")[0]);
            $.ajax({
                url: "/update-student-data",
                data: formData,
                method: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    window.location.reload();
                }
            });
        }
    });


    // Delete Student row
    $(document).on('click', '.btn-student-delete', function () {
        var studentID = $(this).attr("data-id");

        var postdata = "student_id=" + studentID;

        var conf = confirm("Are you sure you want to delete this student?");
        if (conf) {
            $.ajax({
                url: "/delete-student-data",
                data: postdata,
                method: "POST",
                success: function (response) {
                    window.location.reload();
                }
            });
        }

    });


    // Validation check password field
    $('#password, #confirm_password').on('keyup', function () {
        if ($('#password').val() == $('#confirm_password').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else
            $('#message').html('Not Matching').css('color', 'red');
    });

    // Register User
    $("#frm-register-user").validate({
        submitHandler: function () {
            // Submit Register User from Data ajax
            var formData = new FormData($("#frm-register-user")[0]);
            $.ajax({
                url: "/submit-user-data",
                data: formData,
                method: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                   //console.log(response);
                   window.location.reload();
                }
            });
        }
    });

    //edit user data
    $("#frm-edit-user").validate({
        submitHandler: function () {
            // Update User from Data ajax
            var formData = new FormData($("#frm-edit-user")[0]);
            $.ajax({
                url: "/update-user-data",
                data: formData,
                method: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                   //console.log(response);
                   window.location.reload();
                }
            });
        }
    });

    //delete user data
    $(document).on('click', '.btn-user-delete', function () {
        var userID = $(this).attr("data-id");

        var postdata = "user_id=" + userID;

        var conf = confirm("Are you sure you want to delete this user?");
        if (conf) {
            $.ajax({
                url: "/delete-user-data",
                data: postdata,
                method: "POST",
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
});
