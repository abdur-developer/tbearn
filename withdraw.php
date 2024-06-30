<?php
  require "includes/chack_users.php";
  // method=nagad&number=346546&amount=45675
  if(isset($_POST['number'])){
    $method = $_POST['method'];
    $number = $_POST['number'];
    $amount = $_POST['amount'];
    
    if(strlen($number) != 11){
        header("location: withdraw.php?error=This number must be 11 characters long");
    }elseif($amount <= 499){
      header("location: withdraw.php?error=This amount must be minimum 500");
    }elseif($user['balance'] < $amount){
      header("location: withdraw.php?error=Not enough money");
    }else{

        $sql = "UPDATE users SET balance = '".$user['balance'] - $amount."' WHERE id = '$sessionId'";
        
        if(mysqli_query($conn, $sql)){
            $sql = "INSERT INTO withdraw (user_id, amount, number, method)
            VALUES ('$sessionId', '$amount', '$number', '$method')";
            
            if(mysqli_query($conn, $sql)){
                $sql = "INSERT INTO transaction (user_id, amount, massage, trx_id)
                VALUES ('$sessionId', '$amount', 'withdraw', '".generateRandomText()."')";

                if(mysqli_query($conn, $sql)){
                    header("location: index.php?success=Withdraw successfull please wait some minutes");
                }
            }
        }        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>Withdraw - TB Earn</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="style.css"/>    
    </head>
    <body>
        <div id="__next">
            <form class="min-h-screen bg-[#ebebeb] pb-10" action="" method="post">
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
                    <a href="index.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Withdraw<!-- --> </h2>
                </div>
                <div class="flex justify-center m-5 p-4 bg-white rounded-lg py-5 shadow text-center hind">
                    Notice: মিনিমাম উইথড্র 500 টাকা। উইথড্র দেয়ার সাথে সাথে অটোম্যাটিকভাবে পেমেন্ট পেয়ে যাবেন।
                </div>
                <div class="flex gap-3 items-center justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                    <h2 class=" text-xl">Balance:</h2>
                    <h2 class=" text-[#008000] text-xl font-bold"><?= $user['balance'] ?>  BDT</h2>
                </div>
                <div class="flex flex-col items-center justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                    <h2 class="mb-3 text-lg">Select Payment Method</h2>
                    <div class="flex gap-5">
                        <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                            <div>
                                <input type="radio" name="method" value="nagad" required/>
                                <img src="img/nagad.jpg" alt="" class="h-8  w-8 mx-auto"/>
                                <h2 class=" text-[#008000] text-sm font-bold">Nagad</h2>
                            </div>
                        </label>
                        <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                            <div>
                                <input type="radio" name="method" value="bkash" required/>
                                <img src="img/bkash.webp" alt="" class="h-8  w-8 mx-auto"/>
                                <h2 class=" text-[#008000] text-sm font-bold">bKash</h2>
                            </div>
                        </label>
                        <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                            <div>
                                <input type="radio" name="method" value="rocket" required/>
                                <img src="img/rocket.png" alt="" class="h-8  w-8 mx-auto"/>
                                <h2 class=" text-[#008000] text-sm font-bold">Rocket</h2>
                            </div>
                        </label>
                    </div>
                </div>
                <div class="flex flex-col justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                    <h2 class="mb-3  text-xl "> Number</h2>
                    <div class="flex w-full max-w-lg items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="h-8 cursor-pointer w-6 text-gray-900" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input placeholder="Enter number" type="number" name="number" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden"> </label>
                        </div>
                    </div>
                    <h2 class="my-3  text-xl "> Amount</h2>
                    <div class="flex w-full max-w-lg items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <img src="/images/amount.jpg" alt="" class="h-5"/>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input placeholder="Enter amount" type="number" name="amount" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden"> </label>
                        </div>
                    </div>
                    <p class="text-red-500 text-sm text-left w-full mt-1">
                        Minimum withdraw 500 BDT
                    </p>
                </div>
                <div class="m-5">
                    <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-full">Withdraw</button>
                </div>
            </form>
            <div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
        </div>
    </body>
  </html>