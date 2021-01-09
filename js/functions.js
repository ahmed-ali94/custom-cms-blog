    $(document).ready(function() 
    {
        $("form").submit(function(event)
        {
            event.preventDefault();
            var title = $("#Post_title").val();
            var headline = $("#Post_headline").val();
            var content = $("#Post_content").val();
            var submit = $("#submit").val();

            $("#form-message").load("post_process.php", {
                Post_title: title,
                Post_headline: headline,
                Post_content: content,
                submit: submit
            });


        });

        $("#signup-form").submit(function(event)
        {
            event.preventDefault();
            var name = $("#sign_name").val();
            var pwd = $("#sign_pwd").val();
            var c_pwd = $("#c_pwd").val();
            var dob = $("#dob").val();
            var email = $("#email").val();
            var submit = $("#register").val();

            $("#signup_message").load("signup_process.php", {
                sign_name: name,
                sign_pwd: pwd,
                c_pwd: c_pwd,
                dob: dob,
                email: email,
                register: submit
            });
        });

        $("#login-form").submit(function(event)
        {
            event.preventDefault();
            var email = $("#login_email").val();
            var pwd = $("#login_password").val();
            var submit = $("#login_submit").val();

            $("#login_message").load("login_process.php", {
                login_email: email,
                login_password: pwd,
                login_submit: submit
            });
        });

        $("#logout").click(function()
        {
            $.ajax("logout.php").done(function()
            {
                location.reload();
            });
        });

        $('.delete-post').click(function() 
        { // https://stackoverflow.com/questions/14507213/embedding-database-id-of-element-in-html-for-ajax-request
            var confirmation = confirm("Are you sure you want to delete?");

            if (confirmation == true)
            {
                var parent = $(this).parents("tr");
                var postId = $(this).data("post-id");
                var userId = $(this).data("user-id");

                $.ajax({
                    type: 'POST',
                    url: 'delete_post.php',
                    data: {'post_id': postId, 'user_id':userId},
                    complete: function(xhr){

                       if (xhr.responseText == "1")
                       {
                        parent.remove();
                        $("#server-response").html("Post deleted!").addClass("text-success").fadeOut(4000);
                        
                       }
                       else
                       {
                           $("#server-response").html("Post cannot be deleted!").addClass("text-danger").fadeOut(4000);

                       }
                       
                    }
                 });
            }

        });


         $(".reply-popup").click(function(){
              $(".reply-box").toggle();
            });

            $("#spinner").hide();

            $("#add_comment").click(function(e) {

                e.preventDefault();

                $("#spinner").show();






            });
          
            
            
            

        

        
    });
