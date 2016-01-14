<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
    </head>
    <body>

        <h1>
        <?php
        //連線資料設定
        $host = "";
        $user = "";
        $password = "";
        $db = "test";

        //建立連線
        $dbLink = new mysqli($host, $user, $password, $db);

        //檢查連線結果
        if($dbLink->connect_error)
        {
            die("連線錯誤... " . $dbLink->connect_error);
        }
        else
            echo "連線成功<br>";

        $sql = "SELECT * FROM students;";
        $result = $dbLink -> query($sql);

        if ($result -> num_rows > 0){
            //有資料的話，輸出每筆資料
            while($row = $result -> fetch_array()){
                echo "name: " . $row["name"] .
                     " - " . $row["sex"] .
                     " - " . $row["addressArea"] .
                     " - " . $row["addressDetail"];
            }
        } else {
            echo "0 筆資料";
        }

        $dbLink -> close();
        ?>
        </h1>

    </body>
</html>
