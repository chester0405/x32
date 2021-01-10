<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php
            session_start();
            header("Content-Type:text/html; charset=utf-8");
            $serverName="localhost";
            $connectionInfo=array("Database"=>"test","CharacterSet"=>"UTF-8");
            $conn=sqlsrv_connect($serverName,$connectionInfo); 
            
            $auto = $_POST['button'];
           
            $sql="DELETE FROM nmsg WHERE auto='$auto'";
            $query=sqlsrv_query($conn,$sql)or die("sql error".sqlsrv_errors());

            header("Location:show.php");
        ?>
    </body>
</html>
