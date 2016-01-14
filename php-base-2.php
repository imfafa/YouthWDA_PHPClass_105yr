
<html>
    <body>
        <?php
        include "included.php";                     // 引用檔案，檔案找不到，後面依然會繼續執行（雖然會報錯）
        require "included.php";                     // 必須引用，檔案找不到，後面就不會繼續執行
        // 可以使用相對路徑
        // 如假設位置於 /www/test/ ，想指定 /www/included.php，可用 "../include.php"
        // 注意要用反斜線 / 而不是正斜線 \

        $notebook[0] = "ASUS";
        $notebook[1] = "ACER";
        $notebook[2] = "MAC";
        $notebook[3] = "XIAOMI";
        var_dump($notebook);
        echo "<br>";                                // <br> 為 html 中的斷行標籤

        $arrayLen = count($notebook);
        echo $arrayLen . "<br><br>";

        // 0, 1, 2, 3, 4...
        for($x = 0; $x < $arrayLen; $x++)           // 直接用 for 迴圈指定 index 取陣列元素
        {
            echo $notebook[$x];
            echo "<br>";
        }

        echo "<br>";

        // 0, 2, 4, 6...
        for($x = 0; $x < $arrayLen; $x = $x + 2)    // x +2 遞增
        {
            echo $notebook[$x];
            echo "<br>";
        }

        echo "<br>";

        foreach($notebook as $brand)                // 只能用來處理陣列，直接從陣列中取得元素與 index
            echo $brand . "<br>";                   // 單行可以不用大括號包，當然也可以照加

        echo "<br>";

        // a, b, c...
        $notebook1 = array("a" => "ASUS", "b" => "ACER", "c" => "MAC", "d" => "XIAOMI");

        var_dump($notebook1);
        $arrayLen1 = count($notebook1);             // key-value 的 array 也能用 count() 數
        echo $arrayLen1 . "<br><br>";

        foreach($notebook1 as $value)               // 只取 value
            echo $value . "<br>";

        echo "<br>";

        foreach($notebook1 as $key => $value)       // 取 key-value
            echo $key . " => " . $value . "<br>";

        echo "<br>";
        // y 的 n 次方 運算: $y ** n
        $y = 3;
        echo pow($y, 3) . "<br><br>";               // 使用 pow() 函數做 $y 的 3 次方
        // echo $y ** 3;                            // php5 沒有 ** 這個次方運算子，php7 就可以用

        // switch

        $z = 1;
        switch($z)                                  // 以 $z 做多條件判斷
        {
            case 1:                                 // 當 $z 為1
                echo "x = 1 <br>";
                break;                              // 離開判斷，必須要有，沒有他會亂執行下面的東西，註解掉看結果便懂
            case 2:                                 // 當 $z 為2
                echo "x = 2 <br>";
                break;
            default:                                // 當 $z 都不符合前面條件
                echo "x = 其他 <br>";
                break;
        }

        // 同數值不同型別的比較
        $m = 1;
        $n = "1";

        // 單純數值比較二者，自動判斷型別之後才比較內容
        var_dump($m == $n);                         // 判斷是否 1 等於 "1" => 單純比數值 => 等於 => true

        // 數值包括型別的比較
        var_dump($m === $n);                        // 判斷是否 1 等於 "1" => 比較數值與型別 => 型別不同 => false

        // 單純數值比較二者
        var_dump($m != $n);                         // 判斷是否 1 "不"等於 "1" => 單純比數值 => 等於 => false

        // 數值包括型別的比較
        var_dump($m !== $n);                        // 判斷是否 1 "不"等於 "1" => 比較數值與型別 => 型別不同 => true

        // 單純數值比較二者
        var_dump($m <> $n);                         // 比較有無大於或小於，得否定結果（認定二者等於）

        var_dump($m > $n);                          // 判斷是否 $x > $y => 等於 => false
        var_dump($m < $n);                          // 判斷是否 $x < $y => 等於 => false
        var_dump($m >= $n);                         // 判斷是否 $x > 或 = $y => 等於 => true
        var_dump($m <= $n);                         // 判斷是否 $x < 或 = $y => 等於 => true

        $o = true;                                  // boolean (布林)，又稱真假值
        $p = false;

        var_dump($o and $p);                        // and => 是否二者都是 true => 否定 => 傳回 false
        var_dump($o && $p);                         // 同上 (&& == and)
        var_dump($o or $p);                         // or => 二者是否有一為 true ($o 或 $p 是否為 true) => 傳回 true
        var_dump($o || $p);                         // 同上
        var_dump($o xor $p);                        // 是否二者一對一錯 => 傳回true
        var_dump(!$x);                              // 加 ! 表示變為原本的否定（與原本的相反）

        $q = array("ASUS" => 1, "ACER" => 2);
        $r = array("MAC" => 3, "XIAOMI" => 4, "ASUS" => 5);

        // 陣列相加(聯集) => 沒有的元素會湊進去，多的後者會被丟掉
        $s = $q + $r;
        var_dump($s);

        // 順序不同，元素順序也會不同，$q + $r != $r + $q，被丟掉的元素也會不同
        $t = $r + $q;
        var_dump($t);

        // 陣列比對
        var_dump($q == $r);

        // 順序不同但元素一樣，則認知為相等 => true
        $u = array("ACER" => 2, "ASUS" => 1);
        var_dump($q == $u);

        // 用 === 比對的話，順序不同則認知為不相等 => false
        var_dump($q === $u);

        // > 跟 < 也能用，比較元素實際內容
        $v = array("ASUS" => 2, "ACER" => 2);
        var_dump($q > $v);
        var_dump($q < $v);

        function test()                             // 建立函式
        {
            echo "test function~ <br>";
        }
        test();
        test();
        test();

        class testClass                             // 建立 class（類別）
        {
            public $publicVar;                      // 以 public 宣告者，外界可存取

            public function testFunction()
            {
                echo "class test function";
            }
        }

        $objVar = new testClass;                    // 以 testClass 類別建立 $objVar 物件
        var_dump($objVar);                          // 傾印 $objVar

        $objVar -> testFunction();                  // 調用呼叫 $objVar 裡面的 testFunction() 方法（物件內的函式）

        var_dump($objVar -> publicVar);             // 傾印出 $objVar 內的 publicVar 屬性（物件內的變數）
                                                    // 但內無內容，故為 null


        class testClass2
        {
            public $testVar;                        // 以 public 宣告者，外界可存取
            protected $protectedVar;                // 以 protected 宣告，自己與繼承物件（還沒教呢）可存取，其他不得存取
            private $privateVar;                    // 以 private 宣告者，僅內部可存取，連繼承者都不得存取

            // 建構子，在此做初始化，建立為物件時會執行一次
            function __construct()                  // 固有名，不能亂取
            {
                echo "class constructor";
                // "$this" 的使用，指「這個」物件本身
                // 建構子會在建立時執行，此時可以給 testVar 等屬性一個初始值
                $this -> testVar = "init... 初始化";
                $this -> protectedVar = "init... 初始化 protectedVar";
                $this -> privateVar = "init... 初始化 privateVar";
            }

            public function testFunction()
            {
                echo "class test function";
            }

            public function add($x, $y)             // 有 $x, $y 兩個可傳入參數的方法（物件內的函式）
            {
                return $x + $y;                     // 方法（函式）的傳回，呼叫時會傳回給呼叫者
            }
        }

        $objVar2 = new testClass2;

        var_dump($objVar2 -> testVar);              // 調用 $objVar2 內的 testVar 屬性，內已被建構子放內容

        $objVar2 -> testVar = "change string";      // 物件內的屬性可以用此種方式存取、修改
        var_dump($objVar2 -> testVar);
        // var_dump($objVar2 -> protectedVar);      // 外部無法存取非 public 的屬性，會報錯
        // var_dump($objVar2 -> privateVar);        // 外部無法存取非 public 的屬性，會報錯

        $objVar3 = new testClass2;                  // 用 testClass2 再建立一個新物件
        var_dump($objVar3 -> testVar);              // $objVar3 內的 testVar 跟 $objVar2 的不相關，不受上面改過的影響

        echo $objVar2 -> add(1, 3);                 // 呼叫 $objVar2 內的 add() 方法，傳入兩個參數，傳回上面寫的相加結果

        class animal                                // 建立 animal 類別
        {
            public $eyeNum;
            public static $legNum = 4;              // 也能使用 static 宣告，外部也能取得此值

            public function __construct()
            {
                $this -> eyeNum = 2;
            }

            public static function eat($foodName)   // 使用 static 宣告，外部也能調用此方法
            {
                echo $foodName . "真好吃<br>";
            }

            public function bark($what)
            {
                echo "bark: " . $what . "<br>";
            }
        }

        var_dump(animal::$legNum);                  // static 宣告的型別內屬性可以直接取用
        animal::eat("便當");                         // 也可直接調用方法

        $oneAnimal = new animal;
        $oneAnimal -> eyeNum = 1;                   // 該動物比較特別只剩一個眼睛
        var_dump($oneAnimal);                       // 該動物物件 oneAnimal 眼睛就剩下一個，但不影響原本的 animal class

        $oneAnimal -> eat("薯條");

        class dog extends animal                    // 建立 dog 類別，並繼承 animal 類別
        {
            protected $lang = "中文";                // 新增自己的屬性
            public $eyeNum = 3;                     // 設定自己的屬性，即使原本父類別已有
            public function bark($what)             // 設定自己的方法，即使原本父類別已有
            {
                echo "小狗叫聲: " . $what . "<br>";
            }

            public function markSomeWhere()         // 設定自己的新方法
            {
                echo "markSomeWhere~~~ <br>";
            }
        }

        $oneDog = new dog;
        var_dump($oneDog);

        $oneDog -> eat("包子");                      // 原本 animal 有的東西沒做變動， dog 會依樣繼承
        $oneDog -> bark("汪汪！");                   // 自己有的就不繼承原本的父類別的了
        $oneDog -> markSomeWhere();                 // 父類別沒有的自己的新方法

        class animal2
        {
            protected $eyeNum = 2;
            protected $legNum = 4;                  // 建議不要直接存取物件內資料，另外用 getter 或 setter 方法處理

            public function getEyeNum()
            {
                return $this -> eyeNum;
            }

            public function setEyeNum($argv)
            {
                $this -> eyeNum = $argv;
            }

        }

        $animal2Obj = new animal2;
        echo $animal2Obj -> getEyeNum() . "<br>";   // 使用 getter 取得物件內屬性
        $animal2Obj -> setEyeNum(3);                // 使用 setter 設定物件內屬性
        echo $animal2Obj -> getEyeNum() . "<br>";


        ?>
    </body>
</html>
