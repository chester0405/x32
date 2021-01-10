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
        $connectionInfo=array("Database"=>"test");
        $conn=sqlsrv_connect($serverName,$connectionInfo); 

        $idea1=$_POST['idea1'];
        $idea2=$_POST['idea2'];          

         $sql = "SELECT * FROM member WHERE account = '$idea1'";
         $result=sqlsrv_query($conn, $sql);

         if($idea1 == "" || $idea2 == ""){
             $alert1 = "請輸入帳號或密碼";
             echo "<script type='text/javascript'>alert('$alert1'); location.href = 'index.html';</script>";
         }
         else{
             if($result === false){
                 echo "fail";
             }
             else{
                 $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                 if(strcmp($row['password'],$idea2) == 0)
                 {
                     $_SESSION['account'] = $idea1;
                     $alert = "登入成功";
                     echo "<script type='text/javascript'>alert('$alert'); location.href = 'show.php';</script>";
                     exit();
                 }
                 else
                 {
                     $alert = "帳號或密碼有誤";
                     echo "<script type='text/javascript'>alert('$alert'); location.href = 'index.html';</script>";
                 }
             }
         }
    ?>
 </body>
</html>