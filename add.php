<html>
    <head>
        <title>MSSQL新增資料</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php
            session_start();
            header("Content-Type:text/html; charset=utf-8");
            $serverName="localhost";
            $connectionInfo=array("Database"=>"test","CharacterSet"=>"UTF-8");
            $conn=sqlsrv_connect($serverName,$connectionInfo);       
            
            $name=$_POST['name'];
            $text=$_POST['msg'];
            
            $sql="INSERT INTO nmsg(tname,text) VALUES('$name','$text')";
            $query=sqlsrv_query($conn,$sql)or die("sql error".sqlsrv_errors());

            header("Location:show.php");
        ?>
    </body>
</html>