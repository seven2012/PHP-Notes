<?  
    // $name = $_GET['name'];
    // $greeting = "Hello $name";
    // require "index.view.php";

    // $names = [
    //     'jerry',
    //     'tom',
    //     'marry'
    // ];
    // $names[]="july";
    //var_dump($names);
    // unset($names[1]);
    // var_dump($names);
    // echo("hello world");
    // die(var_dump($names));

    // $person = [
    //     'age' => 25,
    //     'hair' => 'black',
    //     'skin' => 'yellow'
    // ];

    // unset($person['hair']);
    // $person['name'] = 'jerry';
    
    // $task = [
    //     'title' => "shopping",
    //     'completed' => false,
    //     'user' => "Dan"
    // ];
    // dd($task);
    require "functions.php";
        // class Task {
        //     public $description;
        //     public $completed = false;
        //     public function __construct($description) { //在类里面的function我们称作方法，不叫函数；
        //         $this -> description = $description;
        //     }
        //     public function __complete() {
        //         $this->completed = true;
        //     }
        // }

        // $tasks = [
        //     new Task('Go to shop'),
        //     new Task('Learn PHP'),
        //     new Task('录制视频'),
        // ];

        

        // $tasks[1]->__complete();

        
        require 'task.php';
        $pdo = connectToDb();
        $tasks = getAllTasks($pdo);
        
    
        require "index.view.php";
?>