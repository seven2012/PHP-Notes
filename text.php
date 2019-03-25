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