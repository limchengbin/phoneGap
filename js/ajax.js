$(document).ready(function(){
    $("button").click(function(){
        $.ajax({
            url: "testing.php",
            type:"post",
            success: function(data){
                $("#output").html(data);
            },
            error:function(){
                $("#output").html("error with ajax");
            }
        });
    });
});