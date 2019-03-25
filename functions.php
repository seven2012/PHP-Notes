<?php
function dd($data){
    echo("<pre>");
    die(var_dump($data));
    echo("</pre>");
}

function connectToDb(){
    try {
        return new PDO('mysql:host=127.0.0.1;dbname=mytodos','root','qq262288693');//通过pdo登录数据库mysql(最后空字符是各自登入自己的数据库的password);
    } catch(PDOException $e) {
        die ('Error:'.$e->getMessage());//登录出错的反馈信息
    }
}

function getAllTasks($pdo){
    $statement = $pdo->prepare('select * from todos');//查看表信息的命令
    $statement->execute(); //执行上一条命令，获取数据
    return $tasks = $statement->fetchAll(PDO::FETCH_CLASS,'Task'); // 指定一个类，Task
}