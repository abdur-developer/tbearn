<?php
    require "includes/chack_users.php";
    if(isset($_REQUEST['bsdvbif'])){
        $id = $_REQUEST['id'];
        $task = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM task WHERE id = $id"));
        $amount = $task['amount'];
        $link = $task['link']; ?>
                    
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Completed Task</title>
                <link rel="stylesheet" href="bootstrap.min.css">
                <style>
                    body{
                        background-color: #d879bbda;
                    }
                    .main-task h1{
                        background-color: #009b22;
                        border-bottom: 3px solid green;
                        font-weight: bold;
                    }
                    .desc{
                        font-size: 18px;
                        font-weight: 500;
                    }
                    .card{
                        margin: 10px 20px;
                        padding: 10px;
                    }
                </style>
            </head>
            <body>
                <div class="main-task h-100 text-white">
                    <h1 class="text-center py-3">Complete Task</h1>
                    <div class="card">
                        <p class="desc px-3">
                            <?= $task['describtion'] ?>
                        </p>
                        <button onclick="goTask()" id="first" class="btn btn-warning">Open Link</button>
                        <a href="complet_task.php?submit=<?= $id ?>" id="second" class="btn btn-success d-none">Submit</a>
                        <h3 class="d-none text-center" id="count"></h3>
                    </div>
                </div>
                <script>
                    const countElement = document.getElementById('count');
                    function goTask(){
                        const firstView = document.getElementById('first');
                        
                        window.open('<?= $link ?>', '_blank');
                
                        firstView.classList.add('d-none');
                        countElement.classList.remove('d-none');
                        startCount();
                    }
                    let time = 15;
                    function startCount(){
                        const countdownInterval = setInterval(() => {
                            time--;
                            countElement.textContent = 'Count down - '+time+'s';
                            if(time <= 0){
                                clearInterval(countdownInterval);
                                performTask();
                            }
                        }, 1000);
                    }
                    
                    function performTask(){
                        const secondView = document.getElementById('second');
                        countElement.classList.add('d-none');
                        secondView.classList.remove('d-none');
                    }
                </script>
            </body>
        </html>

    <?php
    }

    if(isset($_REQUEST['submit'])){
        $id = $_REQUEST['submit'];
        $task = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM task WHERE id = $id"));
        $amount = $task['amount'];
        $link = $task['link'];

        $balance = $user['balance'] + $amount;
        $today_complete_task = $user['today_complete_task'] + 1;
        $sql = "UPDATE users SET balance = '$balance', today_complete_task = '$today_complete_task', last_task_submit = NOW()  WHERE id = '$sessionId'";
        
        if(mysqli_query($conn, $sql)){
            $sql = "INSERT INTO comp_task (user_id, amount, task_id)
            VALUES ('$sessionId', '$amount', '$id')";
            
            if(mysqli_query($conn, $sql)){
                $sql = "INSERT INTO transaction (user_id, amount, massage, trx_id, is_add)
                VALUES ('$sessionId', '$amount', 'task Complete', '".generateRandomText()."', 1)";

                if(mysqli_query($conn, $sql)){ 
                    header("location: task.php?success=task complete");
                 }
            }
        } 
    }
?>
