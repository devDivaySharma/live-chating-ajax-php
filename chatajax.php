<?php
    include('db.php');
    if($_POST){
        $user = htmlentities($_POST['user']);
        $msg = htmlentities($_POST['$msg']);
        $user = mysql_escape_string($user);
        $msg = mysql_escape_string($msg);
        mysql_query("insert into table_name(user,msg)values('$user','$msg'");
        $sql = mysql_query("select id from table_name where user='$user' order by id desc limit 1");
        $row = mysql_fetch_array($sql);
        $id = $row['id'];
        ?>
        <li id="<?php echo $id;?>"<b><?php echo $user; ?>:</b><? echo $msg; ?></li>
        <?php
    }

?>