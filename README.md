- # PHP-Notes
- ## 格式 ```<?```(只有php代码不用关闭符号)；```<? ?>```(在其它代码中，比如html代码里必需要关闭符号)；
- ## 单、双引号都可以定义字符串，单引号里不能使用变量生成字符串，双引号里可以直接引用变量；
- ## php变量及变量中的单、双引号，eg:
            ```
            
            PHP允许我们在双引号串中直接包含字串变量
            $string1 = "hello";
            $string2 = "world";
            $foo = 2；
            echo "foo is $foo\n";
            echo "$string1,$string2\n"; 打印结果hello,world,然后换行  (包裹在双引号里打印出字符串，输入的空格可以呈现效果)
            echo $string2.",".$string1; 打印结果world,hello（直接用变量打印，中间加点连接两个字符串，变量后加空格无效，需要用双引号来打印空格）
            echo '$string1,$stsring2\n';  打印结果$string1,$stsring2\n
            
            $name = $_GET['name']；
            echo $name;
            对应地址栏？后的键值对，http://localhost:8888/?name=seven2012 与 页面渲染出来的name对应;
            
            ```
- 补充： 这就要从双引号和单引号的作用讲起： 双引号里面的字段会经过编译器解释然后再当作HTML代码输出，但是单引号里面的不需要解释，直接输出。
- ### 在SQL语句中用单、双引号：
            eg:
              如果要将一个含有单引号的字符串插入数据库，这个SQL语句就会出错。 
              如：$sql="insert into userinfo (username,password) Values('O'Kefee','123456')" 　　 
              此时，处理的方法之一是在SQL语句中加入转义符反斜线， 
              即：……Values('O\'Kefee',…… 　　 
              当然也可以使用函数 addslashes()，该函数的功能就是加入转义符， 
              即：$s = addslashes("O'Kefee") ……Values('".$s."',…… 　　 
              还有一种方法是设置php.ini中的magic-quotes选项，打开该选项，则通过表单提交的信息中如果有单引号是，将会自动加上如转义符。因此不用使用其他函数了。
              所以在对数据库里面的SQL语句赋值的时候也要用在双引号里面SQL="select a,b,c from ..." 但是SQL语句中会有单引号把字段名引出来 
              例如:select * from table where user='abc'; 
              这里的SQL语句可以直接写成SQL="select * from table where user='abc'" 
              但是如果象下面： 
              复制代码 代码如下:

              $user='abc'; 
              SQL1="select * from table where user=' ".$user." ' ";对比一下 
              SQL2="select * from table where user=' abc ' " 

              我把单引号和双引号之间多加了点空格，希望你能看的清楚一点。 
              也就是把'abc' 替换为 '".$user."'都是在一个单引号里面的。只是把整个SQL字符串分割了。 SQL1可以分解为以下3个部分 
              1："select * from table where user=' " 
              2：$user 
              3：" ' " 
              字符串之间用 . 来连接，这样能明白了吧。
 
- ## php终端执行本地服务器：
    ```
    
    ### 在终端显示： php index.php(例)
    ### 在浏览器端显示：
    php -S localhost:8888 
    打开http://localhost:8888 或者 http://localhost:8888/index.php
    默认执行显示index.php，除非有指定的执行文件;
    php代码与HTML代码分离时，如果新建可视代码文件名是index.view.php，则在index.php里引用可视文件，例：
    
    $name = $_GET['name'];
    $greeting = "Hello $name";
    require "index.view.php";  
    ```
    
- ## php数组：
```
 index.php:
    $names = [
        'jerry',
        'tom',
        'marry'
    ];
    $names[]="july";(添加一個數組元素)
    操作一个数组各元素，可用var_dump();
    例：var_dump($names);
    显示：array(4) { [0]=> string(5) "jerry" [1]=> string(3) "tom" [2]=> string(5) "marry" [3]=> string(4) "july" }；
    unset($names[1]);（删，删第二个数组元素）;
    die();//终止执行下面的代码，比如require "index.view.php"在最后，就不再执行另一个文件；
    或者 die(var_dump($names));（多用于调试的技巧）
```
```
 第一种：php里面的带码比较多，适用复杂的页面
   <ul style="color:red;">
        <?php foreach($names as $name): ?>

            <li><?= $name ?></li>

        <?php endforeach ?>
    </ul>

 第二种：php里面代码比较少，类型单一时用
  <ul style="color:blue">
       <?php 

         foreach($names as $name){
             echo "<li>$name</li>";
         }
         
       ?>
   </ul>

```
- ### php关联数组：(键值对，即key=>value)
```
在index.php给数据库：
            $person = [
                    'age ' => 25,
                    'hair ' => 'black',
                    'skin ' => 'yellow'
            ];
            添加一个key:
            $person['name'] = 'jerry';(增)
            unset($person['hair']);（删）

index.view.php代码：
    <ul>
        <?php foreach($person as $key => $feature): ?>
            <li><strong><?= $key ?></strong><?= $feature ?></li>
        <?php endforeach?>
    </ul>

```
- ### 布尔值：
```
index.php:
例：
$task = [
        'title' => "shopping",
        'completed1' => 'yes',
        'completed2' => false, //能够使用布尔值，就使用布尔值判断
        'user' => "Dan"

    ]
index.view.php:
例：
    <ul>
        <li><strong>Title:</strong> <?= $task['title']?></li>
        <li>
            <strong>completed:</strong>
            <?= $task['completed2'] ? 'Completed' : 'Uncompleted' ?> //类似为if...else...语句
            <strong>completed:</strong>
            <?= $task['completed1'] == 'yes' ? 'Completed' : 'Uncompleted' ?> 
        </li>
        <li><strong>User:</strong> <?= $task['user']?></li>
    </ul>
```
- ### if语句：
 ```
 第一种写法：
      <li>
            <strong>Status:</strong>
            <?php 
                if ($task['completed']) {
                    echo('Completed');
                } else {
                    echo('Uncompleted');
                };
                
            ?>
        </li>
 第二种写法：
        <li>
            <strong>Status:</strong>
            <?php if ($task['completed']) :?>
                <span>&#9989</span>
            <?php else : ?>
                <span>Incomplete</span>
            <?php endif;?>
        </li>
 第三种：取反，结果也相反
        <li>
            <strong>Status:</strong>
            <?php if (! $task['completed']) :?>
                <span>&#9989</span>
            <?php else : ?>
                <span>Incomplete</span>
            <?php endif;?>
        </li>
 ```
- ### PHP函数:
```
 第一种方式：
            function dumper($one,$two,$three){
                    var_dump($one,$two,$three);
            }

            dumper('Good','morning','July');
            结果：string(4) "Good" string(7) "morning" string(4) "July"
            
第二种方式：
$task = [
        'title' => "shopping",
        'completed' => false,
        'user' => "Dan"
       ];
    function dd($data){
        echo("<pre>");
        die(var_dump($data));
        echo("</pre>");
    }
    dd($task);
    结果显示：
            array(3) {
              ["title"]=>
              string(8) "shopping"
              ["completed"]=>
              bool(false)
              ["user"]=>
              string(3) "Dan"
            }
 注：函数做到两点重要原则，好的命名规范：
     1、函数命名；
     2、参数命名；
通常有function的时候，我们需要另建一个命名为functions.php的文件，然后把所有的function()都放在这个文件里;
在函数被执行前，需要先请求functions.php,所以require "functions.php"需要放在index.php执行函数的前面；
```
- ### Mysql 数据库必知必会:
```
 - 首先安装mysql,https://dev.mysql.com/downloads/file/?id=484914;
 - 安装完成后,在终端登录mysql,命令：mysql -u root -p;
 - 进入后，如果需要清屏，按command + k;
 - show databases;展示本机所有的数据库；
 - create database ...我创建数据库mytodo;(命令行末尾都要加分号)
 - use mytodo;（进入我创建 的这个数据库）
 - show tables;(展示这个表的内容，暂时为空)

 - create table ...我新创建的表的名字todos （对表的描述，如create table todos (id integer PRIMARY KEY AUTO_INCREMENT, description text NOT NULL, completed boolean NOT NULL);）(在这个数据库里 创建一个表,表的描述放在括号里，关键是对类的定义，这里分三个类，id,description,completed);
      如：create table todos (id integer PRIMARY KEY AUTO_INCREMENT, description text NOT NULL, completed boolean NOT NULL);
 - describe todos;(显示表结构和内容)
 - drop table todos;(删除这个表)
 - nsert into todos (description, completed) values ('Go to shop', false);插入内容到表里；
        例：insert into todos (description, completed) values ('Learn PHP', false);
 - select * from todos;(展示表todos所有的内容)；
 
 在弄熟悉数据库命令行各含义后，可以借助数据库的图形化管理软件来进行数据库操作，如mac可以用 Sequel Pro, https://www.sequelpro.com/;windows可以借助 Navicat Premium https://www.navicat.com.cn/
 ```
 
 - ## php类的基础认识：
 ```
  1、类的命名通常以名词居多，作为查找的关键字；
  例：class Person{};或者 class Task{};
     类似Person与Task都是名词；
  2、类的属性或者说类的特征；
     如id,description,completed等；
  3、访问类型（public, protected,private）:
            public      (同一个类中,类的子类中,所有的外部成员);
            protected   (同一个类中,类的子类中);
            provate     (同一个类中);
            

 <?php 
//属性访问控制，示例 MyClass1，MyClass2：
/*
    Define MyClass1
*/
    class MyClass1{
        public $public = "Public1...";
        protected $protected = "Protected1...";
        private $private = "Private1...";

        function printHello(){
            echo $this->public." fun1<br>";  //Public1... fun1
            echo $this->protected." fun2<br>";  //Protected1... fun2
            echo $this->private." fun3<br>"; //Private1... fun3
        }
    }

    $obj = new MyClass1();
    echo $obj->public." 1<br>";  //Public1... 1
    // echo $obj->protected."2<br>"; // 发生错误
    // echo $obj->private."3<br>";   // 发生错误
    echo $obj->printHello()."<br>";  //打印printHello();

/*
    Define MyClass2
*/
    class MyClass2 extends MyClass1{
        protected $protected = "protected2...";
        

        function printHello(){

            echo $this->public." fun2.1<br>";  //Public1... fun2.1
            echo $this->protected." fun2.2<br>";  //Protected1... fun2.2
            echo $this->private." fun2.3<br>";  //undefined fun2.3
        }
    }

    $obj2 = new MyClass2();
    echo $obj2->public." class2.1<br>";  // Public1... class2.1
    echo $obj2->private." class2.3<br>"; // Undefined class2.3
    //echo $obj2->protected." class2.4<br>";  //Fatal Error 发生错误
    $obj2->printHello();  //打印printHello();

// 方法访问控制，示例 MyClass3，MyClass4：
    
    /*
        Define MyClass3
    */
    class MyClass3{
        public function __construct(){echo "<br>construct...1<br>";}
        public function MyPublic(){echo "public...2<br>";}
        protected function MyProtected(){echo "protected...3<br>";}
        private function MyPrivate(){echo "private...4<br>";}
        
        function Foo(){
            $this -> MyPublic(); //public...2
            $this -> MyProtected();  //protected...3
            $this -> MyPrivate(); //private...4
        }
    }

    $myclass3 = new MyClass3(); //construct...1 自动调用构造函数__construct()；
    $myclass3 -> MyPublic();  //public...2 任何地方都可调用的public类型；
    //$myclass3 -> MyProtected();  //发生错误，外部成员不可调用的protected类型；
    //$myclass3 -> MyPrivate();    //发生错误，所有外部成员与类的子类中都不能调用private类型；
    $myclass3 -> Foo();   //调用Foo()函数；

    /*
        Define MyClass4
    */
    class MyClass4 extends MyClass3{
        //this is pubic
        function Foo2(){
            $this->MyPublic();
            $this->MyProtected();
            //$this->MyPrivate()."...class4.3"; //不可在后接字符串
        }
    }

    $myclass4 = new MyClass4(); //construct...1
    $myclass4 -> MyPublic();  //public...2
    $myclass4 -> Foo2();  //public...2
                          //protected...3

    /*
        构造函数和析构涵数：
    */
    class BaseClass {
        function __construct() {
            print "<br>In BaseClass constructor<br>";
        }
     }
     
     class SubClass extends BaseClass {
        function __construct() {
            parent::__construct();
            print "In SubClass constructor<br>";
        }
     }
     
     class OtherSubClass extends BaseClass {
         // inherits BaseClass's constructor
     }
     
     $obj = new BaseClass(); //In BaseClass constructor
     
     
     $obj = new SubClass(); //In BaseClass constructor
                            //In SubClass constructor
     
   
     $obj = new OtherSubClass(); //In BaseClass constructor
?>
 
 ```
