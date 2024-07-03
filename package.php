<?php require "includes/chack_users.php";
  if(isset($_REQUEST['buying'])){
      $plan_id = $_REQUEST['buying'];
      $amount = $_REQUEST['amount'];
      if($user['balance'] >= $amount){
        $sql = "UPDATE users SET balance = '".$user['balance'] - $amount."' WHERE id = '$sessionId'";
        if(mysqli_query($conn, $sql)){
          $sql = "INSERT INTO buy_plans (user_id, amount, plan_id)
          VALUES ('$sessionId', '$amount', '$plan_id')";
          
          if(mysqli_query($conn, $sql)){
              $sql = "INSERT INTO transaction (user_id, amount, massage, trx_id)
              VALUES ('$sessionId', '$amount', 'buy package', '".generateRandomText()."')";

              if(mysqli_query($conn, $sql)){
                  // ================================================================================
                  // ================================================================================
                  $ot_ref_code = $user['ref_by'];//1st gen ref code
                  $my_ref_code = $user['ref_code'];//my ref code

                  
                  $sql = "SELECT * FROM refer WHERE id = 1";
                  $sr = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                  $bonus_list = array($sr['one'], $sr['two'], $sr['three'], $sr['four'], $sr['five']);                
                  $x = 0;
                  function refBonus($other_ref_code){
                      global $conn, $bonus_list, $x, $my_ref_code, $amount;
                      if($x == 5) return;
                      
                      if($other_ref_code !== "0"){
                        $new_sql = "SELECT id, balance, ref_by FROM users WHERE ref_code = $other_ref_code";
                        $new_query = mysqli_query($conn, $new_sql);// get 1st ger user details and 2nd gen ref code
            
                          if(mysqli_num_rows($new_query) != 0){
                            //new_ot_user_for_bonus = noufb
                            $noufb = mysqli_fetch_assoc($new_query);

                            $new_ot_ref_code = $noufb['ref_by'];//2nd gen ref code

                            $bonus = ($amount * $bonus_list[$x]) / 100;
                            $new_balance = $noufb['balance'] + $bonus;
                            $new_user_id = $noufb['id'];
                            
            
                            $new_sql = "UPDATE users SET balance = '$new_balance' WHERE id = $new_user_id";
                            
                            if(mysqli_query($conn, $new_sql)){ //update 1 genaretion data
                                $new_sql = "INSERT INTO transaction (user_id, amount, massage, trx_id, is_add)
                                VALUES ('$new_user_id', '$bonus', 'refer bonus', '".generateRandomText()."', 1)";
                                mysqli_query($conn, $new_sql);                                   
                            }
            
                          }
                      }else{
                        return;
                      }
                      
                      $x++;
                      refBonus($new_ot_ref_code);
                  }
                  if($user['buy_first_plan'] == 0){ //first plabn buying
                    refBonus($ot_ref_code);
                    $sql = "UPDATE users SET buy_first_plan = '1' WHERE id = ".$user['id'];
                    mysqli_query($conn, $sql);
                  }
                  
                  // ================================================================================
                  // ================================================================================
                  header("location: task.php?success=Successfully buy a plan&q=");
              }
          }
      }  
      }else{
        header("location: package.php?error=Not enough money");
      }





  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charSet="utf-8" />
    <title>Package - TB Earn</title>
    <meta name="description" content="Earn Money with mobile phone" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/favicon.ico" />
    <meta name="theme-color" content="#008000" />
    <meta name="next-head-count" content="6" />
    <link rel="preload" href="style.css" as="style" />
    <link rel="stylesheet" href="style.css" />
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
            .confirmation-dialog {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .confirmation-dialog .dialog-content {
            background-color: white;
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .confirmation-dialog .buttons {
            text-align: right;
            margin-top: 20px;
        }

        .confirmation-dialog .buttons button {
            padding: 8px 16px;
            margin-left: 10px;
        }
        .row{
          display: flex;
          justify-content: space-around;
        }
        .row a{
          background: red;
          width: 50px;
          text-align: center;
          padding-top: 5px;
          border-radius: 5px;
          color: white;
        }
        .row button{
          color: white;
          border-radius: 5px;
          background: green;
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
      <div class="min-h-screen bg-[#eee] pb-10">
        <div
          class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
          <a href="index.php">
            <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
          </a>
          <h2 class="text-xl font-bold">Packages </h2>
        </div>
        <div class="grid grid-cols-2 gap-5 p-5">
          <?php 
          $user_id = $user['id'];
          $sql = "SELECT * FROM plans";
          $pack_query = mysqli_query($conn, $sql);
          while($plan_loop = mysqli_fetch_array($pack_query)){
            
            $isExist = false;
            $plan_loop_id = $plan_loop['id'];
            $price = $plan_loop['price'];
            $name = $plan_loop['name'];
            $income = $plan_loop['daily_income'];
            $ads = $plan_loop['daily_limit'];
            $validity = $plan_loop['validity'];


            $sql = "SELECT * FROM buy_plans WHERE plan_id = '$plan_loop_id' AND user_id = '$user_id'";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $count = mysqli_num_rows($query);
            if($count > 0){
              $buy_time = new DateTime($row['create_at']);
              $interval = $buy_time->diff($today);
              if($interval->days <= $validity){
                  $isExist = true;
              }else{
                $isExist = false;
                $sql = "DELETE FROM buy_plans WHERE plan_id = '$plan_loop_id' AND user_id = '$user_id'";
                mysqli_query($conn, $sql);
              }
            }
            ?>
          <!-- ========================================== -->
          <div
            class=" p-5 relative bg-white w-full overflow-hidden border border-gray-300 rounded-lg">
            <div class=" bg-white">
              <h2 class="text-xl text-center font-bold whitespace-nowrap"><?= $name ?></h2>
              <p class="w-7 text-black h-7 bg-none flex justify-center items-center rounded-full absolute top-0 right-0">3x</p>
              <h2 class="text-lg text-center font-bold whitespace-nowrap"><?= $price ?>৳</h2>
              <hr class="my-2">
              <div class="text-sm text-gray-700">
                <!-- ============================================== -->
                <p class="flex gap-2 items-center">
                  <img src="img/tick.svg"> 
                  Daily <?= $ads ?> Ads 
                </p>
                <p class="flex gap-2 items-center">
                  <img src="img/tick.svg"> 
                  Daily Income <?= $income ?>৳ 
                </p>
                <p class="flex gap-2 items-center">
                  <img src="img/tick.svg"> 
                  Validity <?= $validity ?> days 
                </p>
                <!-- ================================================ -->
              </div>
              <?php
              if($isExist){
                echo "<button disabled class='align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none block w-full bg-[#0f9b0f] text-white mt-4 border shadow-none rounded-lg'>
                Running Package
                </button>";
              }else{
              ?>
              <button  onclick="openConfirmation(<?= $plan_loop_id ?>)"
                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none block w-full bg-[#0f9b0f] text-white mt-4 border shadow-none rounded-lg"
                type="button"> Buy now 
              </button>
                <?php } ?>
            </div>
            <!-- alert -->
            <div id="<?= $plan_loop_id ?>" class="confirmation-dialog">
                <div class="dialog-content">
                    <p>আপনি কি Package টি কিনতে চাচ্ছেন...?</p>
                    <div class="buttons">
                        <div class="row">
                            <form action="" method="post">
                                <input type="hidden" name="buying" value="<?= $plan_loop_id ?>"/>
                                <input type="hidden" name="amount" value="<?= $price ?>"/>
                                <button type="submit" onclick="confirmAction()">Yes</button>
                            </form>
                            <a href="package.php">No</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- alert -->
          </div>
          <?php } ?>
          <!-- ========================================== -->
        </div>
      </div>
      <div
        style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none">
      </div>
    </div>
    <script>
        function openConfirmation(x) {
            document.getElementById(x).style.display = 'block';
        }

        function closeConfirmation() {
            document.getElementById(x).style.display = 'none';
        }

        function confirmAction() {
            closeConfirmation();
            //window.location.href = "..home/";
        }
    </script>
  </body>
</html>