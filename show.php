<html>
    <head>
        <title>MSSQL新增資料</title>
        <meta http-equiv="content-type" content="text/html" charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
    <?php
            header("Content-Type:text/html; charset=utf-8");
            session_start();
            $serverName="localhost";
            $connectionInfo=array("Database"=>"test","CharacterSet"=>"UTF-8");
            $conn=sqlsrv_connect($serverName,$connectionInfo);

            $account = $_SESSION["account"];
            
            $sql = "SELECT name FROM member WHERE account = '$account'";
            $result=sqlsrv_query($conn, $sql);
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            $_SESSION['name'] = $row['name'];
    
            $sql2 = "SELECT * FROM nmsg order by date desc";
    ?>

    <div class="h_container butn">
        <button class="btn btn-outline-primary butn" onclick="window.location.href='index.html'">登出</button>
        <button class="btn btn-outline-primary butn" onclick="window.location.href='add_show.php'">新增留言</button>
    </div>

    <?php 
    $result2=sqlsrv_query($conn, $sql2);
    while($row2 = sqlsrv_fetch_array($result2, SQLSRV_FETCH_ASSOC)){
        $_SESSION['tname'] = $row2['tname'];
        $_SESSION['auto'] = $row2['auto'];
        $_SESSION["msg"] = $row2["text"];
        $_SESSION['date'] = date_format($row2['date'],"Y/m/d H:i:s");
    ?>

    <script language="Javascript"> 
    function CheckForm()
    {
        if(confirm("確認要刪除嗎？")==true)   
            return true;
        else  
            return false;
    }   
    </script>  

    <div class="h_container">
        <div class="card crd">
            <form method="POST" action="delete.php" onSubmit="return CheckForm();">
                <div class="card-header">
                    <div class="row">
                        <div class="col text-start">
                            <p><?php echo $_SESSION['auto']?></p>
                        </div>
                        <div class="col text-center">
                            <p>作者：<?php echo $_SESSION['tname']?></p>
                        </div>
                        <div class="col text-end">
                            <a class="btn btn-outline-primary" onclick="window.location.href='add_show.php'">新增</a>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-white">
                        <div class="row">
                            <div class="col">
                                <p><?php echo $_SESSION["msg"]?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 d-grid gap-2 mx-auto">
                                <a class="btn btn-primary btn-sm" href="<?php echo "update.php?id=".$_SESSION['auto']?>">修改</a>
                            </div>
                            <div class="col-6 d-grid gap-2 mx-auto">
                                <input type="submit" class="btn btn-danger btn-sm" value="刪除"></input>
                                <input type="hidden" class="btn btn-danger btn-sm" value="<?php echo $_SESSION['auto']?>" name="button"></input>
                            </div>
                        </div>
                </div>
                <div class="card-footer bg-light">
                    <div class="row">
                        <div class="col text-center">
                            <small><?php echo $_SESSION['date']?></small>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    }
    ?>
    
    <style>
        .crd{
            width: 30%;
            margin-top:20px;
            margin-bottom:30px;
        }
        .h_container {
            display: flex;
            justify-content: center;
            flex-direction: row;
        }
        .butn{
            margin:10px;
        }
    </style>
    </body>
</html>