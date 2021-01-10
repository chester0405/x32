<html>
    <head>
        <title>MSSQL更新資料</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    </head>
    <body>
        <?php
            session_start();
            header("Content-Type:text/html; charset=utf-8");
            $serverName="localhost";
            $connectionInfo=array("Database"=>"test","CharacterSet"=>"UTF-8");
            $conn=sqlsrv_connect($serverName,$connectionInfo);
            
            $text = $_POST['text'];
            $today = $_SESSION['today'];
            $id = $_SESSION['auto'];
           
            $sql="UPDATE nmsg SET text='$text',date='$today' WHERE auto='$id'";
            $query=sqlsrv_query($conn,$sql)or die("錯誤".sqlsrv_errors());

            header("Location:show.php");
        ?>
    </body>
</html>
