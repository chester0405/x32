<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <?php
         session_start();
         $f = $_SESSION['name'];
         ?>
        <div class="card crd">
            <div class="card-header">
               新增內容
            </div>
            <div class="card-body">
                <form method="POST" action="add.php">
                    <div class="mb-3">
                        <label for="name" class="form-label">作者:</label>
                        <input id="name" class="form-control" name="name" type="text" readonly value="<?php echo $f?>"></input>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">內容:</label>
                        <textarea id="msg" class="form-control" name="msg" type="text" rows="5"></textarea>
                    </div>
                    
                    <input type="submit"  value="新增">
                    <input type="reset"  value="清除">
                    <input type ="button"  onclick="history.back()" value="回到上一頁"></input>
                </form>
            </div>
        </div>
    
        <style>
            .crd{
                width: 20%;
                position:absolute;
                top: 20%;
                left: 40%;
            }
        </style>
    </body>
</html>
