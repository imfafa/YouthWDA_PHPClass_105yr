<?php
    // 引入設定 utf8 編碼的檔頭
    // 內容: header("Content-Type:text/html; charset=utf-8");
    // 可以直接換掉，就不用 include 了
    include "include.php";

    // 使用記名常數建立色表
    define("BLACK", "#000000");
    define("YELLOW", "#FFFF00");
    define("GREEN", "#00FF00");
    define("BLUE", "#0000FF");
    define("ORANGE", "#FF8C00");
    define("WHITE", "#FFFFFF");
    define("BROWN", "#8B4513");
    define("INDIGO", "#4B0082");

    // 候選人物件類別
    class candidateMan
    {
        // 候選人物件屬性，使用一個陣列
        public $manData = array('no', 'name', 'sex', 'party', 'view');

        // 當物件建構時，接收傳入的陣列並指定到這個物件的屬性上
        function __construct($manArgv)
        {
            $this -> manData = $manArgv;
        }

        // 讓外界取得物件內資料的方法
        function getData()
        {
            return $this -> manData;
        }

    }

    // 跑馬燈物件類別
    class scrollingText
    {
        public $textArg = array('text', 'speed', 'color', 'bgcolor');

        // 用以取得候選人資料並對跑馬燈物件本身的各屬性做設定
        function __construct($manData)
        {
            // 把候選人資料合併為一個字串，作為跑馬燈文字
            $this -> textArg['text'] =  $manData['no'] . " - " .
                                        $manData['name'] . " - " .
                                        $manData['sex'] . " - " .
                                        $manData['party'] . " - " .
                                        $manData['view'];

            // 檢查輸入資料中的政黨，以設定不同文字與背景顏色
            switch ($manData['party'])
            {
                case "白日黨":
                    $this -> textArg['color'] = BLUE;
                    $this -> textArg['bgcolor'] = WHITE;
                    break;
                case "番薯黨":
                    $this -> textArg['color'] = GREEN;
                    $this -> textArg['bgcolor'] = INDIGO;
                    break;
                case "橘子黨":
                    $this -> textArg['color'] = ORANGE;
                    $this -> textArg['bgcolor'] = BLACK;
                    break;
                default:
                    $this -> textArg['color'] = YELLOW;
                    $this -> textArg['bgcolor'] = BROWN;
                    break;
            }

            // 跑馬燈速度用亂數控制
            $this -> textArg['speed'] = rand(6, 15);
        }

        // 用以輸出跑馬燈的 html tag
        function echoMarquee()
        {
            // 變數用 {} 包夾可以直接放在字串裡面
            // " 內用 ' 或 ' 內用 " 可以不用跳脫字元
            echo    "<marquee " .
                    "scrollamount = '{$this -> textArg['speed']}' " .
                    "bgcolor='{$this -> textArg['bgcolor']}' " .
                    "width='300'>".
                    "<font color='{$this -> textArg['color']}'>" .
                    $this -> textArg['text'] .
                    "</font></marquee><br>";
        }
    }

    // 連線資料設定
    // 需要在mySQL資料庫內建立 candidateman 資料庫及 candidateman 資料表
    // 內有 'no', 'name', 'sex', 'party', 'view' 五個欄位
    // 且須先行建立數筆資料做程式執行之用
    $host = "";
    $user = "";
    $password = "";
    $db = "candidateman";

    //建立連線
    $dbLink = new mysqli($host, $user, $password, $db);

    //檢查連線結果
    if($dbLink->connect_error)
        die("連線錯誤... " . $dbLink->connect_error);

    $sql = "SELECT * FROM candidateman;";
    $result = $dbLink -> query($sql);

    //有資料的話，輸出每筆資料
    if ($result -> num_rows > 0){
        // 放一個 counter 紀錄總共輸出了幾行
        $rowCount = 0;
        while($row = $result -> fetch_array()){
            $manArray[$rowCount] = new candidateMan($row);
            $rowCount++;
        }
    } else {
        echo "<h1>0 筆資料</h1>";
    }

    // 資料庫資料已經讀完，所以可以先關閉
    $dbLink -> close();

    // 把跑馬燈物件的建立與操作集中於下，以避免混淆
    $sclObj = array();

    // 由 0 開始點，遞增一個個數（$i++），當點到已經不 < $rowCount 紀錄的數量時停住
    // 因編號由 0 起，故最後一個的編號實際為數量 -1，因此判斷式使用 < 使其點編號時最後停在數量 -1
    for($i = 0; $i < $rowCount; $i++)
    {
        // 建立跑馬燈文字物件，並輸入候選人資料，讓他的建構子自行設定
        $sclObj[$i] = new scrollingText($manArray[$i] -> getData());

        // 呼叫 $sclObj 內的 echoMarquee 方法做跑馬燈輸出
        $sclObj[$i] -> echoMarquee();

    }
?>
