$('.like').click(function(e) {
    var blog_blog_id=$('#blog_id').val();
    var user_id=$('#user_id').val();
    if(user_id=='')
    {
        alert('You must have to login first to like the blog!!');
    }
    else
    {
        e.preventDefault(); 
        var like_status=1;
        $.ajax({
            url: "/like-dislike",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                blog_blog_id: blog_blog_id,
                user_id: user_id,
                like_status:like_status,
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                window.location = "/blog_detail/"+blog_blog_id;
                }
                else if(dataResult.statusCode==201){
                alert("Error occured !");
                }

            }
        });
    }
});
$('.dislike').click(function(e) {
    var blog_blog_id=$('#blog_id').val();
    var user_id=$('#user_id').val();
    if(user_id=='')
    {
        alert('You must have to login first to like the blog!!');
    }
    else
    {
        e.preventDefault();
        var blog_blog_id=$('#blog_id').val();
        var like_status=0;
        $.ajax({
            url: "/like-dislike",
            type: "POST",
            data: {
                _token: $("#csrf").val(),
                blog_blog_id: blog_blog_id,
                user_id: user_id,
                like_status:like_status,
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                window.location = "/blog_detail/"+blog_blog_id;
                }
                else if(dataResult.statusCode==201){
                alert("Error occured !");
                }

            }
        });
    }
 });
