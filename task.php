<?php
    require "includes/chack_users.php";
    //chack today===============
    $last_submit = new DateTime($user['last_task_submit']);
    $interval = $last_submit->diff($today);
    if($interval->days >= 1){
        $sql = "UPDATE users SET today_complete_task = '0' WHERE id = '".$user['id']."'";
        mysqli_query($conn,$sql);
        $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));
    }
    
    $total_task -= $user['today_complete_task'];//minus today complete task
    $sql = "SELECT COUNT(*) as count FROM task";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    if($row['count'] < $total_task){
        $total_task = $row['count'];//have total task
    }
    
    $query = mysqli_query($conn,"SELECT * FROM task");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>Work</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" href="style.css"/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            img {
                height: 60px;
                aspect-ratio: auto 60 / 60;
                width: 60px;
            }
            .stat-box {
                background: white;
                border-radius: 6px;
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                border: 1px solid red;
                padding: 20px 24px;
            }
            .box {
                text-align: center;
                padding: 20px;
                max-width: auto;
            }
            h2 {
                font-size: 20px;
                font-weight: 700;
            }
            .ad-item {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                background-image: linear-gradient(#f8bbbc, #d5b2b35c);
                display: flex;
                flex-direction: row;
                gap: 10px;
                justify-content: space-around;
                border-radius: 10px;
                border: 1px solid rgb(247, 142, 142);
            }
            .left-box {
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
            }
            .right-box {
                width: 30%;
                display: flex;
                flex-direction: column;
            }
            h6 {
                font-size: 11px;
                font-weight: 500;
            }
            p {
                display: block;
                margin-block-start: 1em;
                margin-block-end: 1em;
                margin-inline-start: 0px;
                margin-inline-end: 0px;
                unicode-bidi: isolate;
            }
            .text-danger, a.text-danger {
                color: #FF396F !important;
            }
            .text-dark, a.text-dark {
                color: #27173E !important;
            }
            .btn-danger {
                background: #FF396F !important;
                border-color: #FF396F !important;
                color: #FFFFFF !important;
            }

            .btn {
                height: 36px;
                padding: 3px 18px;
                font-size: 13px;
                line-height: 1.2em;
                font-weight: 500;
                box-shadow: none !important;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                transition: 0.2s all;
                text-decoration: none !important;
                border-radius: 10px;
                border-width: 2px;
            }
            a {
                color: #6f1254;
                text-decoration: none;
                background-color: transparent;
                text-decoration: none;
                color: #0d6efd;
                outline: 0 !important;
                text-decoration: none;
            }
            user agent stylesheet
            a:-webkit-any-link {
                color: -webkit-link;
                cursor: pointer;
                text-decoration: underline;
            }
            .ptc-card {
                border: 1px solid #6f125480;
                background: linear-gradient(to bottom, #6f125440, #fff) !important;
            }
        </style>
    </head>
    <body>
    <?php
        if(isset($_REQUEST['error'])){
            $error = $_REQUEST['error'];
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '$error'
                    });
            </script>
            ";
        }
        if(isset($_REQUEST['success'])){
            $success = $_REQUEST['success'];
            echo "
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'WOW...',
                    text: '$success'
                    });
            </script>
            ";
        }
        ?>
        <div id="__next">
            <div class="min-h-screen bg-[#ebebeb] pb-10">
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
                    <a href="index.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">My Work<!-- --> </h2>
                </div>
                <div class="row justify-content-center">
                    <div class="stat-box">
                        <div class="box">
                            <img src="https://i.ibb.co/J31bqRX/ads-campaign-5388308.png" height="60px" width="60px" class="d-block m-auto"><br>
                            <h2>বিজ্ঞাপন দেখে ইনকাম করুন</h2>
                            <?php
                                if($total_task > 0){
                                    $x = 0;
                                    while( $row = mysqli_fetch_array($query)){
                                        if($x == $total_task){//task limit complete
                                            break;
                                        }else{
                                            $task_id = $row['id'];
                                            $time = $row['time_s'];
                                            $amount = $row['amount'];
                                            
                                            $sql = "SELECT COUNT(*) as count FROM comp_task WHERE user_id = '".$sessionId."' AND task_id = '$task_id'";
                                            $query_x = mysqli_fetch_assoc(mysqli_query($conn,$sql));
                                            
                                            if($query_x['count'] == 0){
                                                //================================?>
                                                <div class="ad-item">
                                                    <div class="left-box">
                                                        <h6 class="text-black">Ads</h6>
                                                        <p class="text-dark">সময় : <?= $time ?> সেকেন্ড</p>
                                                    </div>
                                                    <div class="right-box">
                                                        <p class="text-danger text-end text-sm"><b>tk <?= $amount ?></b></p>
                                                        <a href="<?= 'complet_task.php?bsdvbif=dvdfvdbvdfuv&id='.$task_id.'&sbhcvudfucv'?>" class="btn btn-danger">দেখুন</a>
                                                    </div>
                                                </div>
                                                <?php //==========================
                                                $x++;
                                            }
                                        }
                                    }
                                }else{ ?>
                                    <div class="col-12">
                                    <div class="card custom--card ptc-card">
                                        <div class="card-body">
                                            <h2 class="text-center text--base">Data not found</h2>
                                        </div>
                                    </div>
                                </div> <?php
                                }
                            ?>
                            
                            
                        </div>
                    </div>
                </div>
            <div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
        </div>
    </body>
</html>