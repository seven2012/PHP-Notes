- # PHP-Notes
- 格式 ```<?```(只有php代码不用关闭符号)；```<? ?>```(在其它代码中，比如html代码里必需要关闭符号)；
- 单、双引号都可以定义字符串，单引号里不能使用变量生成字符串，双引号里可以直接引用变量；
- php变量及变量中的单、双引号，eg:
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
- 在SQL语句中用单、双引号：
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
 
- php终端执行本地服务器：
    php -S localhost:8888 打开http://localhost:8888 或者 http://localhost:8888/index.php
    默认执行显示index.php，除非有指定的执行文件;
    php代码与HTML代码分离时，如果新建可视代码文件名是index.view.php，则在index.php里引用可视文件，例：
    ```
    require "index.view.php";
    ```
