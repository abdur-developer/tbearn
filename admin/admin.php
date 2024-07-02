<?php 
    require '../includes/dbcon.php';
    session_start();
    if(!isset($_SESSION["admin"])){
        header("location: login.php");
        die("login failed");
    }
    $adminId = $_SESSION["admin"] - 155;
    $admin = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM admin WHERE id = $adminId"));
    $total_withdraw = 0;
    $total_diposite = 0;

    $total_trx = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM transaction"));
    
    $user_query = mysqli_query($conn, "SELECT * FROM users");
    $total_user = mysqli_num_rows($user_query);
    if($user_query){ 
        while($row = mysqli_fetch_assoc($user_query)){
        $total_withdraw += $row['withdraw'];
        $total_diposite += $row['deposit'];
        }
    }

    function generateRandomText($length = 10) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
    
        // Generate random string
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
    
        return $randomString;
    }

    // ==============================================================user details
    if(isset($_REQUEST['d_name'])){
        $user_id = $_REQUEST['id'];
        $name = $_REQUEST['d_name'];
        $number = $_REQUEST['d_number'];
        $password = $_REQUEST['d_password'];
        if(strlen($password) < 25){
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
        $sql = "UPDATE users SET name = '$name', number = '$number', password = '$password' WHERE id = '$user_id'";
        if(mysqli_query($conn, $sql)){
            header("location: ?success=Successfully updated name and number&q=user_details&id=$user_id");
        }
    }
    //=========action
    // d_action
    if(isset($_REQUEST['d_action'])){
        $action = $_REQUEST['d_action'];
        $user_id = $_REQUEST['id'];
        if($action == 'ban'){
            $sql = "UPDATE users SET status = '0' WHERE id = '$user_id'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully banned this user&q=user_details&id=$user_id");
            }
        }elseif($action == 'active'){
            $sql = "UPDATE users SET status = '1' WHERE id = '$user_id'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully banned this user&q=user_details&id=$user_id");
            }
        }else{
            $old_balance = $_REQUEST['old_bl'];
            $balance_tk = $_REQUEST['balance_tk'];
            $sql = "";
            if($action == 'add'){
                $sql = "UPDATE users SET balance = '".$old_balance + $balance_tk."' WHERE id = '$user_id'";
            }else{
                $sql = "UPDATE users SET balance = '".$old_balance - $balance_tk."' WHERE id = '$user_id'";                
            }
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully updated balance&q=user_details&id=$user_id");
            }
        }
    }
    // ==============================================================user details


    // ============================================================admin details
    if(isset($_REQUEST['name'])){
        $name = $_REQUEST['name'];
        $pass = $_REQUEST['password'];
        if(password_verify($pass, $admin['password'])){
            $sql = "UPDATE admin SET username = '$name' WHERE id = '$adminId'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully updated name and number&q=profile");
            }
        }else{
            header("location: ?error=invalid password&q=profile");
        }
    }
    //password
    if(isset($_REQUEST['confirm'])){
        $password = $_REQUEST['password'];
        $new = $_REQUEST['new'];
        $confirm = $_REQUEST['confirm'];
        if(password_verify($password, $admin['password'])){
            if($new === $confirm){
                if(strlen($new) >= 6){
                    $has_pass = password_hash($new, PASSWORD_DEFAULT);
                    $sql = "UPDATE admin SET password = '$has_pass' WHERE id = '$adminId'";
                    if(mysqli_query($conn, $sql)){
                        header("location: ?success=Successfully updated password&q=profile");
                    }
                }else{
                    header("location: ?error=New password must be minimum 6 characters long&q=profile");
                }
            }else{
                header("location: ?error=not match confirm password&q=profile");
            }
        }else{
            header("location: ?error=invalid password&q=profile");
        }
    }
    // ============================================================ admin details
    // ============================================================ withdraw details
    // w_action
    if(isset($_REQUEST['w_action'])){
        $action = $_REQUEST['w_action'];
        $withdraw_id = $_REQUEST['id'];
        if($action == 'app'){
            $sql = "UPDATE withdraw SET status = '1' WHERE id = '$withdraw_id'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully approved this withdraw&q=withdraw");
            }
        }elseif($action == 'rej'){
            $sql = "UPDATE withdraw SET status = '2' WHERE id = '$withdraw_id'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully reject this withdraw&q=withdraw");
            }
        }else{ //del
            $sql = "DELETE FROM withdraw WHERE id = '$withdraw_id'";                
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully deleted&q=withdraw");
            }
        }
    }
    // ============================================================ withdraw details
    // ============================================================ diposit details
    // w_action
    if(isset($_REQUEST['dip_action'])){
        $action = $_REQUEST['dip_action'];
        $diposit_id = $_REQUEST['id'];
        if($action == 'app'){
            $sql = "UPDATE deposit SET status = '1' WHERE id = '$diposit_id'";
            if(mysqli_query($conn, $sql)){
                $sql = "SELECT user_id, amount FROM deposit WHERE id = '$diposit_id'";
                $deposit_data = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                $user_id = $deposit_data['user_id'];
                $amount = $deposit_data['amount'];

                $sql = "SELECT balance, deposit FROM users WHERE id = $user_id";
                $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                // ==========================================================update users
                $balance = $user['balance'] + $amount;
                $deposit = $user['deposit'] + $amount;
                $sql = "UPDATE users SET balance = '$balance', deposit = '$deposit' WHERE id = '$user_id'";
                
                if(mysqli_query($conn, $sql)){
                    $sql = "INSERT INTO transaction (user_id, amount, massage, trx_id, is_add)
                    VALUES ('$user_id', '$amount', 'deposite', '".generateRandomText()."', 1)";

                    if(mysqli_query($conn, $sql)){
                        header("location: ?success=Successfully approved this deposit&q=deposit");
                    }
                }  
                // ==========================================================update users
            }
        }elseif($action == 'rej'){
            $sql = "UPDATE deposit SET status = '2' WHERE id = '$diposit_id'";
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully reject this deposit&q=deposit");
            }
        }else{ //del
            $sql = "DELETE FROM deposit WHERE id = '$diposit_id'";                
            if(mysqli_query($conn, $sql)){
                header("location: ?success=Successfully deleted&q=deposit");
            }
        }
    }
    // ============================================================ deposit details

    // ============================================================ package details
    if(isset($_REQUEST['p_validity'])){
        $action = $_REQUEST['p_action'];
        $p_name = $_REQUEST['p_name'];
        $p_price = $_REQUEST['p_price'];
        $p_income = $_REQUEST['p_income'];
        $p_ads = $_REQUEST['p_ads'];
        $p_validity = $_REQUEST['p_validity'];
        $sql = "";
        if($action == "add"){
            $sql = "INSERT INTO plans (name, price, daily_income, daily_limit, validity)
                    VALUES ('$p_name', '$p_price', '$p_income', '$p_ads', '$p_validity')";
        }else{
            $p_id = $_REQUEST['p_id'];
            $sql = "UPDATE plans SET name = '$p_name', price = '$p_price', daily_income = '$p_income', daily_limit = '$p_ads', validity = '$p_validity' WHERE id = '$p_id'";
        }
        if(mysqli_query($conn, $sql)){
            header("location: ?success=Successfull action&q=package");
        }
    }
    // ============================================================ package details

    // ============================================================ Setting details
    // ?=&sys-=&sys-=&sys-=&sys-=&sys-=
    if(isset($_REQUEST['sys-name'])){
        $sys_name = $_REQUEST['sys-name'];
        $sys_link = $_REQUEST['sys-link'];
        $sys_channel = $_REQUEST['sys-channel'];
        $sys_group = $_REQUEST['sys-group'];
        $sys_support = $_REQUEST['sys-support'];
        $sys_ceo = $_REQUEST['sys-seo'];

        $sql = "UPDATE system_set SET name = '$sys_name', base_link = '$sys_link', tg_channel = '$sys_channel', tg_group = '$sys_group', tg_support = '$sys_support', tg_ceo = '$sys_ceo' WHERE id = '1'";
        
        if(mysqli_query($conn, $sql)){
            header("location: ?success=Successfull updated&q=setting");
        }

    }
    // ============================================================ Setting details

    // ============================================================ Search details
    // search
    if(isset($_REQUEST['search'])){
        $number = $_REQUEST['search'];
        $sql = "SELECT COUNT(*) as count FROM users WHERE number = '$number'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $count = $row['count'];
        if ($count > 0) {
            $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id FROM users WHERE number = $number"));
            $id = $user['id'];
            header("location: ?q=user_details&id=$id");
        }else{
            header("location: ?success=user not found on database. number : '$number'");
        }
    }
    // ============================================================ Search details

    // ============================================================ Logo Upload
    // logo-upolad
    if(isset($_FILES['logo-upolad'])){
        $terget_dir = "../img/upload/";
        $terget_file = $terget_dir . basename($_FILES['logo-upolad']['name']);
        $upload_ok = true;
        $imgFileType = strtolower(pathinfo($terget_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['logo-upolad']['tmp_name']);
        $massage = "";
        if($check !== false){
            $massage = "File is an image - ". $check['mine'] . ". ";
            $upload_ok = true;
        }else{
            $massage = "File is not an image. ";
            $upload_ok = false;
        }
        if(file_exists($terget_file)){
            $massage = "File is already exists. ";
            $upload_ok = false;
        }
        if($_FILES['logo-upolad']['size'] > 5000000){
            $massage = "File is too large. ";
            $upload_ok = false;
        }
        if($imgFileType != 'jpg' && $imgFileType != 'png' && $imgFileType != 'jpeg' && $imgFileType != 'gif' && $imgFileType != 'svg'){
            $massage = "Only JPG, JPEG, SVG PNG and GIF files are allowd.";
            $upload_ok = false;
        }
        if($upload_ok){
            if(move_uploaded_file($_FILES['logo-upolad']['tmp_name'], $terget_file)){
                $massage = "The file ". htmlspecialchars(basename($_FILES['logo-upolad']['name']))." has been uploaded.";
            }else{
                $massage = "there was an error uploading your image.";
                $upload_ok = false;
            }
        }
        // $terget_file
        $sql = "UPDATE system_set SET logo = '$terget_file' WHERE id = '1'";

        if($upload_ok){
            mysqli_query($conn, $sql);
            header("location: ?q=setting&success=$massage");
        }else{
            header("location: ?q=setting&error=$massage");
        }
        

    }
    // ============================================================ Logo Upload
    // ============================================================ Slider Upload
    //slider , slider-upolad

    if(isset($_FILES['slider-upolad'])){
        $terget_dir = "../img/upload/";
        $terget_file = $terget_dir . basename($_FILES['slider-upolad']['name']);
        $upload_ok = true;
        $imgFileType = strtolower(pathinfo($terget_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES['slider-upolad']['tmp_name']);
        $massage = "";
        if($check !== false){
            $massage = "File is an image - ". $check['mine'] . ". ";
            $upload_ok = true;
        }else{
            $massage = "File is not an image. ";
            $upload_ok = false;
        }
        if(file_exists($terget_file)){
            $massage = "File is already exists. ";
            $upload_ok = false;
        }
        if($_FILES['slider-upolad']['size'] > 5000000){
            $massage = "File is too large. ";
            $upload_ok = false;
        }
        if($imgFileType != 'jpg' && $imgFileType != 'png' && $imgFileType != 'jpeg' && $imgFileType != 'gif' && $imgFileType != 'svg'){
            $massage = "Only JPG, JPEG, SVG PNG and GIF files are allowd.";
            $upload_ok = false;
        }
        if($upload_ok){
            if(move_uploaded_file($_FILES['slider-upolad']['tmp_name'], $terget_file)){
                $massage = "The file ". htmlspecialchars(basename($_FILES['slider-upolad']['name']))." has been uploaded.";
            }else{
                $massage = "there was an error uploading your image.";
                $upload_ok = false;
            }
        }
        // $terget_file
        $id = $_REQUEST['slider'];
        $slider_link = substr($terget_file, 3);
        $sql = "UPDATE slider SET link = '$slider_link' WHERE id = '$id'";

        if($upload_ok){
            mysqli_query($conn, $sql);
            header("location: ?q=slider&success=$massage");
        }else{
            header("location: ?q=slider&error=$massage");
        }
        

    }
    // ============================================================ Slider Upload

?>