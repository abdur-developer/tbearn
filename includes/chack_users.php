<?php
    session_start();
    require "includes/dbcon.php";
    if(!isset($_SESSION["id"])){
        header("location: login.php");
        die("login failed");
    }
    $sessionId = $_SESSION["id"] - 155;

    $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE id = $sessionId"));

    function generateRandomText($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
    
        // Generate random string
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }
    function getDefferenceTime($mysql_timestamp){
        // $mysql_timestamp = '2024-06-27 15:30:00';

        $current_time = time();
        $timestamp = strtotime($mysql_timestamp);

        $difference = $current_time - $timestamp;

        if ($difference < 60) {
            return "1 minute ago";
        } elseif ($difference < 3600) {
            $minutes = floor($difference / 60);
            return "$minutes minute ago";
        } elseif ($difference < 86400) {
            $hours = floor($difference / 3600);
            return "$hours hours ago";
        } elseif ($difference < 604800) {
            $days = floor($difference / 86400);
            return "$days days ago";
        } else {
            $months = floor($difference / 2628000);
            return "$months mounth ago";
        }
    }
    function is_add_trx($isAdd){
        if($isAdd == 0){
            return "style='color:#B9315E;'><span>-</span";
        }else{
            return "style='color:#16A34A;'><span>+</span";
        }
    }
    //=============================================================================
    $total_task = 0;
    $today = new DateTime();
    $my_plans = mysqli_query($conn, "SELECT * FROM buy_plans WHERE user_id = $sessionId");
    $package_name = "";
    while($my_plan = mysqli_fetch_array($my_plans)){
        $buy_time = new DateTime($my_plan['create_at']);
        $interval = $buy_time->diff($today);
        $plan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans WHERE id = ".$my_plan['plan_id']));
        $package_name .= " + ".$plan['name'];
        if($interval->days <= $plan['validity']){
            $total_task += $plan['daily_limit'];//add from package
        }
    }
    // ===============================================================================
    $system = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM system_set WHERE id = 1"));
    
    $ref_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as count FROM users WHERE ref_by = '".$user['ref_code']."'"));
    $total_refer = $ref_row['count'];

?>