<?php 
     include('db.php');
     if($GET['user']){
         $user  = $GET['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>chating through ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script type="text/javascript">
        var user = "<?php echo $user; ?>"
        var auto_refresh = setInterval(function(){
            var last_id = $("ol#update li:last").attr("id");
            $.getJSON("chat_json.php?q="+user,function(data){
                $.each(data.posts,function(i,data){
                    if(last_id != data.id){
                        var div_data = "<li id ='"+data.id+"'><br>"+data.user+"</b>: "+data.msg+"</li>";
                        $(div_data).appendTo("ol#update");
                    }
                });
            });
        },2000);

        $(document).ready(function(){
            $('.post').click(function(){
                var boxval = $("#content").val();
                var user = '<?php echo $user; ?>';
                var datastring = 'user='+user+'&msg='+boxval;
                if(boxval.lenght > 0){
                            $.ajax({
                                type : "POST",
                                url : "chatajax.php",
                                data : dataString,
                                cache : false,
                                success : function(html){
                                    $("ol#update").append(html);
                                    $("#content").val('');
                                    $('#content').focus();
                                }
                            });
                }
                return false;
            });
        });
    </script>
</head>
<body>
        <div>
        <form method="POST" name="form" action="">
        <input type="text" name="content" id="content"/>
        <input type="submit" value="Post" id="post" class="post"/> 
        </form>   
        </div>
</body>
</html>
    <?php } ?>