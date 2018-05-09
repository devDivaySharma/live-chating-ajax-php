<?php 

    include('db.php');
    if($_GET['q']){
        $user = $_GET['q'];
        $sql = mysql_query("select * from tablename order by id desc limit 1");
        $row = mysql_fetch_array($sql);
        $users = $row['user'];
        $id = $row['id'];
        $msg = $row['msg'];
        if($userx!=$user){
            echo '{"posts: []';
             echo '{
                "id":"'.$id.'",  
                "userx":"'.$userx.'",
                "msg":"'.$msg.'"
             },';   
            echo ']}';
        }
    }

?>