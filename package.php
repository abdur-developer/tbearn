<?php require "includes/chack_users.php";
  if(isset($_REQUEST['id'])){
      $plan_id = $_REQUEST['id'];
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
  $sql = "SELECT * FROM plans WHERE status = '1'";
  $query = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="style.css" data-n-g />
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
            #nprogress {
              pointer-events: none;
            }
            #nprogress .bar {
              background: #B72B41;
              position: fixed;
              z-index: 9999;
              top: 0;
              left: 0;
              width: 100%;
              height: 3px;
            }
            #nprogress .peg {
              display: block;
              position: absolute;
              right: 0px;
              width: 100px;
              height: 100%;
              box-shadow: 0 0 10px #B72B41, 0 0 5px #B72B41;
              opacity: 1;
              -webkit-transform: rotate(3deg) translate(0px, -4px);
              -ms-transform: rotate(3deg) translate(0px, -4px);
              transform: rotate(3deg) translate(0px, -4px);
            }
            #nprogress .spinner {
              display: block;
              position: fixed;
              z-index: 1031;
              top: 15px;
              right: 15px;
            }
            #nprogress .spinner-icon {
              width: 18px;
              height: 18px;
              box-sizing: border-box;
              border: solid 2px transparent;
              border-top-color: #B72B41;
              border-left-color: #B72B41;
              border-radius: 50%;
              -webkit-animation: nprogresss-spinner 400ms linear infinite;
              animation: nprogress-spinner 400ms linear infinite;
            }
            .nprogress-custom-parent {
              overflow: hidden;
              position: relative;
            }
            .nprogress-custom-parent #nprogress .spinner,
            .nprogress-custom-parent #nprogress .bar {
              position: absolute;
            }
            @-webkit-keyframes nprogress-spinner {
              0% {
                -webkit-transform: rotate(0deg);
              }
              100% {
                -webkit-transform: rotate(360deg);
              }
            }
            @keyframes nprogress-spinner {
              0% {
                transform: rotate(0deg);
              }
              100% {
                transform: rotate(360deg);
              }
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
          <?php while($plan = mysqli_fetch_array($query)){ ?>
          <!-- ========================================== -->
          <div
            class=" p-5 relative bg-white w-full overflow-hidden border border-gray-300 rounded-lg">
            <div class=" bg-white">
              <h2 class="text-xl text-center font-bold whitespace-nowrap"><?= $plan['name'] ?></h2>
              <p class="w-7 text-black h-7 bg-none flex justify-center items-center rounded-full absolute top-0 right-0">3x</p>
              <h2 class="text-lg text-center font-bold whitespace-nowrap"><?= $plan['price'] ?>৳</h2>
              <hr class="my-2">
              <div class="text-sm text-gray-700">
                <!-- ============================================== -->
                <p class="flex gap-2 items-center">
                  <svg stroke="currentColor" fill="currentColor"
                    stroke-width="0" version="1" viewBox="0 0 48 48"
                    enable-background="new 0 0 48 48" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#8BC34A"
                      points="24,3 28.7,6.6 34.5,5.8 36.7,11.3 42.2,13.5 41.4,19.3 45,24 41.4,28.7 42.2,34.5 36.7,36.7 34.5,42.2 28.7,41.4 24,45 19.3,41.4 13.5,42.2 11.3,36.7 5.8,34.5 6.6,28.7 3,24 6.6,19.3 5.8,13.5 11.3,11.3 13.5,5.8 19.3,6.6">
                    </polygon>
                    <polygon fill="#CCFF90"
                      points="34.6,14.6 21,28.2 15.4,22.6 12.6,25.4 21,33.8 37.4,17.4">
                    </polygon>
                  </svg> 
                  Daily <?= $plan['daily_limit'] ?> Ads 
                </p>
                <p class="flex gap-2 items-center">
                  <svg stroke="currentColor" fill="currentColor"
                    stroke-width="0" version="1" viewBox="0 0 48 48"
                    enable-background="new 0 0 48 48" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#8BC34A"
                      points="24,3 28.7,6.6 34.5,5.8 36.7,11.3 42.2,13.5 41.4,19.3 45,24 41.4,28.7 42.2,34.5 36.7,36.7 34.5,42.2 28.7,41.4 24,45 19.3,41.4 13.5,42.2 11.3,36.7 5.8,34.5 6.6,28.7 3,24 6.6,19.3 5.8,13.5 11.3,11.3 13.5,5.8 19.3,6.6">
                    </polygon>
                    <polygon fill="#CCFF90"
                      points="34.6,14.6 21,28.2 15.4,22.6 12.6,25.4 21,33.8 37.4,17.4">
                    </polygon>
                  </svg> 
                  Daily Income <?= $plan['daily_income'] ?>৳ 
                </p>
                <p class="flex gap-2 items-center">
                  <svg stroke="currentColor" fill="currentColor"
                    stroke-width="0" version="1" viewBox="0 0 48 48"
                    enable-background="new 0 0 48 48" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon fill="#8BC34A"
                      points="24,3 28.7,6.6 34.5,5.8 36.7,11.3 42.2,13.5 41.4,19.3 45,24 41.4,28.7 42.2,34.5 36.7,36.7 34.5,42.2 28.7,41.4 24,45 19.3,41.4 13.5,42.2 11.3,36.7 5.8,34.5 6.6,28.7 3,24 6.6,19.3 5.8,13.5 11.3,11.3 13.5,5.8 19.3,6.6">
                    </polygon>
                    <polygon fill="#CCFF90"
                      points="34.6,14.6 21,28.2 15.4,22.6 12.6,25.4 21,33.8 37.4,17.4">
                    </polygon>
                  </svg> 
                  Validity <?= $plan['validity'] ?> days 
                </p>
                <!-- ================================================ -->
              </div>
              <a href="package.php?id=<?= $plan['id']."&amount=".$plan['price'] ?>"
                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none block w-full bg-[#0f9b0f] text-white mt-4 border shadow-none rounded-lg"
                type="button"> Buy now </a>
            </div>
          </div>
          <?php } ?>
          <!-- ========================================== -->
        </div>
      </div>
      <div
        style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none">
      </div>
    </div>
  </body>
</html>