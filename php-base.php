
<html>
    <body>
        <?php
        //於php中指定使用utf8編碼
        header("Content-Type:text/html; charset=utf-8");

        //單行

        #單行

        /*多行
        多行多行
        多行
        */

        //局部
        $x = 1 /* +2 */ + 3;                        //中間註解處會被略過
        echo $x . "<br>";

        //不分大小寫，包括所有關鍵字。
        //例如，if, else, while, echo...
        //class, function 以及使用者
        //自己定義的function
        ECHO "PHP!<br>";
        echo "PHP!<br>";
        EcHo "PHP!<br>";

        //變數大小寫有區別
        $lang = "中文";
        echo "我說" . $lang . "<br>";
        //echo "他說" . $LANG . "<br>";               // 與下兩行就會報錯
        //echo "你說" . $laNG . "<br>";

        define("GREEN", "The Color Is Green");      // 定義常數
        //GREEN = "test";                           // 常數不能改變，php會直接炸掉並報錯
        echo GREEN;

        echo "<br>";

        $y = 3;                     // 變數不分型別
        echo $y . "<br>";

        $intX = -1;                 // 整數的負數（帶號整數）
        echo $intX . "<br>";

        $intY = 0x8f;               // 16進位的8f = 十進位的143
        echo $intY . "<br>";

        $intZ = 011;                // 8進位的11 = 十進位的9
        echo $intZ . "<br>";

        $floatX = 0.1;              // 浮點數
        echo $floatX . "<br>";

        $floatY = 3e-2;             // 科學記號
        echo $floatY . "<br>";

        var_dump($intZ);            // 傾印intZ
        var_dump($floatX);          // 傾印floatX
        var_dump($imNotHere);       // 傾印不存在變數會丟null，且報錯

        $booleanVar = true;
        if($booleanVar)
            echo "True!<br>";
        else
            echo "Not True!<br>";

        $booleanVar = false;
        if($booleanVar)
            echo "True!<br>";
        else
            echo "Not True!<br>";

        var_dump($booleanVar);      // 傾印booleanVar

        //字串長度
        echo "<br>";
        echo "\"abcdefg\" 字串長度 = " . strlen("abcdefg") . "<br>";
        echo "\$lang 變數中字串長度 = " . strlen($lang) . "<br>";      //中文在UTF-8中長度為3bit

        echo strpos("今天早上", "早上") . "<br>";                     //在"今天早上"中，早上的起始位置（從0開始數）
        echo strpos("This morning.", "早上") . "<br>";                //找不到則為null，echo不會印出東西

        //function外的變數為global變數
        $g = 2;
        $h = 3;
        $z = 1;

        function test() {
            $l = 2; // local變數宣告
            $l = $l + 1;

            global $g; // 取得 global 變數 $g
            echo "global \$g = $g<br>";

            // 直接由全域變數表（陣列）中取得 global $z
            echo "global \$h = " . $GLOBALS['h'] . "<br>";

            echo "global \$z = $z<br>";   // 此行在php5會報錯，因取不到global變數
            echo "local \$l = $l<br>";

            // function結束時不會刪除static變數的值
            static $k = 4;              // 只有第一次呼叫本函數test()時，本變數不存在，才會執行本行宣告

            $k = $k + 1;
            echo "local static \$k = $k<br>";

            echo GREEN . "<br>";        // define出來的常數與global變數不同，函數內可直接使用
        }

        echo "<br>第一次呼叫 test <br>";
        test();

        echo "<br>第二次呼叫 test <br>";
        test();                                         // static變數內容不會被釋放，故會累加為6

        echo "<br>global 直接取變數結果<br>";
        echo "global \$z = $z<br>";
        echo "local \$l = $l<br>";                        // 此行在php5會報錯，因取不到test()內的local變數

        echo "PHP", " ", "PHP", " ", "PHP", "<br>";     // 直接echo多字串

        $notebook = array("ASUS", "ACER", "MAC");       // 陣列
        echo "我的筆電是 {$notebook[2]}";                // 注意是由0開始數

        var_dump($notebook);                            // 傾印notebook

        $loop = 0;
        $loop_doWhile = 0;

        while ($loop < 3){
            $loop++;                                    // ++是變數直接+1的意思，等於 $loop = $loop + 1
            echo rand(1,99) . "<br>";
        }

        echo "do while迴圈會先做一次才判斷條件是否成立<br>";

        do{
            $loop_doWhile++;
            echo rand(1,99) . "<br>";
        }while ($loop_doWhile < 3);

        // 直接計數用的for迴圈，直接宣告$i，然後做一次就+1，在i <= 3時才執行
        for($i = 1; $i <= 3; $i++)
        {
            echo $i . "<br>";
        }

        // foreach可以直接把陣列的內容逐個取出為變數
        foreach($notebook as $brand)
        {
            var_dump($brand);
        }

        $strLen = "test str length";
        echo strlen($strLen);
        echo "<br>";
        echo str_word_count($strLen);                       // 數字數（英文中以單字為單位）
        echo "<br>";
        echo str_word_count("中文字");                     // 中文就不能用，這樣會說0個字
        echo "<br>";
        echo strrev($strLen);                               // 字串倒序
        echo "<br>";
        echo str_replace("test", "be replaced", $strLen);   // 字串取代

        echo "<br>";

        $varPP = 1;
        echo $varPP++;              // varPP會先回傳給echo顯示，才+1
        echo "<br>";
        echo $varPP;                // 故這次直接echo才變成2
        echo "<br>";
        echo ++$varPP;              // 這樣會先+1才回傳給echo顯示，故而會顯示3
        echo "<br>";

        // 建立function
        function iCanEcho($arg)     // 有一個可傳入參數$arg
        {
            echo $arg;
        }

        iCanEcho(12);               // 把12作為參數傳入test()，內部處理後會echo 12
        //iCanEcho();               // 沒有傳入，$arg會為null，php5會報錯

        echo "<br>";

        // 以指定keyvalue作為陣列元素的名稱，而非 index (0, 1, 2, 3...)
        $notebook2 = array("ASUS" => "My notebook is ASUS's", "ACER" => 2, "MAC" => 3);
        echo $notebook2['ASUS'];    // 印出 $notebook2 內名為 "ASUS" 的元素
        echo "<br>";
        echo $notebook2['ACER'];

        echo "<br>";

        echo $notebook[0];          // 重新排序前的 $notebook 中，index為0（第一個）的元素
        echo "<br>";
        var_dump($notebook);
        echo "<br>";
        sort($notebook);            // 對 $notebook 內容進行自動重新排序
        echo "<br>";
        echo $notebook[0];          // 排序後的第 0 個元素被換掉了
        echo "<br>";
        var_dump($notebook);

        sort($notebook, 1);          // 加上參數 1 指定其反向排序
        var_dump($notebook);

        rsort($notebook);           // 使用單獨的反向排序函數
        var_dump($notebook);

        sort($notebook2);           // 若使用 sort() 排序有 keyvalue 的 array，則會拿掉 keyvalue 變為只有 index 的 array
        var_dump($notebook2);

        var_dump($_SERVER);         // 伺服器給的各種相關資料，其中如 HTTP_USER_AGENT 可以用來判斷使用者瀏覽器類型等。
                                    // 跟使用 $_GET[] 取得的資料同樣是超全域變數（super global variable），在函數內等區塊內也能用

        foreach($_SERVER as $key => $value)
        {
            echo "$key : $value";
            echo "<br>";
        }

        ?>

    </body>
</html>
