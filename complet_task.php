<?php
    require "includes/chack_users.php";
    if(isset($_REQUEST['bsdvbif'])){
        $id = $_REQUEST['id'];
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
                $sql = "INSERT INTO transaction (user_id, amount, massage, trx_id)
                VALUES ('$sessionId', '$amount', 'task Complete', '".generateRandomText()."')";

                if(mysqli_query($conn, $sql)){ ?>
                    
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>Completed Task</title>
                        <script type="text/javascript">
                            function redirectBlanck(){
                                window.open('<?= $link ?>', '_blank');
                                window.location.href = 'task.php';
                            }
                        </script>
                    </head>
                    <body onLoad="redirectBlanck();">
                    </body>
                    </html>

             <?php }
            }
        } 
    }
?>