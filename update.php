<html>
    <head>
        <title>MSSQL更新資料</title>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <?php
            session_start();
            date_default_timezone_set('Asia/Taipei');
            header("Content-Type:text/html; charset=utf-8");
            $serverName="localhost";
            $connectionInfo=array("Database"=>"test","CharacterSet"=>"UTF-8");
            $conn=sqlsrv_connect($serverName,$connectionInfo);
            

            $auto = $_GET['id'];
            $_SESSION['auto'] = $auto;
            $_SESSION['today'] = date('Y/m/d H:i:s');

            $sql = "SELECT text FROM nmsg Where auto = '$auto'";
            $result=sqlsrv_query($conn, $sql);
            while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)){
                $msg = $row["text"];
            }
        ?>

        <div class="h_container">
            <div class="card crd">
                <form method="POST" action="updatesql.php">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-start">
                                <p><?php echo $auto;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                            <div class="row">
                                <div class="col">
                                    <textarea id="text" class="form-control" name="text" type="text" rows="5"><?php echo $msg;?></textarea>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="submit"  value="修改"></input>
                                    <input type ="button"  onclick="history.back()" value="回到上一頁"></input>
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
        </style>

    </body>
</html>
