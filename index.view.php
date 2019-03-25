<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
header{
    background:#ccc;
    text-align:center;
    color:red;
    padding:20px;
}
</style>
<body>
    <ul>
        <?php foreach($tasks as $task) : ?>
            <?php if($task->isCompleted()) : ?>
                <li>
                    <del><?= $task->description ?></del>
                </li>
            <? else: ?>
                <li>
                    <?= $task->description ?>
                </li>
            <? endif; ?>
        <?php endforeach; ?>
        
    </ul>

</body>
</html>
