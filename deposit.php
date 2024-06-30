<?php require "includes/chack_users.php";
//?method=rocket&amount=5000&trx=grsegerger
if(isset($_REQUEST['trx'])){
    $method = $_REQUEST['method'];
    $amount = $_REQUEST['amount'];
    $trx = $_REQUEST['trx'];
    $sql = "INSERT INTO deposit (method, amount, trx_id, user_id)
    VALUES ('$method', '$amount', '$trx', '$sessionId')";
    
    if(mysqli_query($conn, $sql)){
        header("location: index.php?success=Deposit successfull please wait for confirmation");
    }
}
//UPDATE `method` SET `r_number` = '01709409266' WHERE `method`.`id` = 1;
$sql = "SELECT * FROM method WHERE id = 1";
$method = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>Deposit - TB Earn</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="style.css"/>
        <style>
            .hidden{
                display: none;
            }
        </style>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div id="__next">
            <!-- ============================================= -->
            <div class="bg-[#ebebeb] pb-10">
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center " id="nav_1st">
                    <a href="index.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Deposit<!-- --> </h2>
                </div>
                <!-- ================================ -->
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center nav_2nd hidden">
                    <a href="deposit.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Rocket Send Money </h2>
                </div>
                <!-- ================================ -->
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center nav_2nd hidden">
                    <a href="deposit.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Nagad Send Money </h2>
                </div>
                <!-- ================================ -->
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center nav_2nd hidden">
                    <a href="deposit.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Bkash Send Money </h2>
                </div>
                <!-- ================================ -->
                 <div class="min-h-screen bg-[#ebebeb] pb-10" id="first_sec">
                     <div class="flex justify-center m-5 p-4 bg-white rounded-lg py-5 shadow hind">
                         Notice: প্রথমবার 2000 টাকা বা তার বেশি ডিপোজিট করলে 500 টাকা এক্সট্রা বোনাস পাবেন। বোনাসসহ একাউন্টে 2500 টাকা পাবেন। ডিপোজিট অটো সিস্টেম।
                     </div>
                     <div class="flex gap-3 items-center justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                         <h2 class=" text-xl">Balance:</h2>
                         <h2 class=" text-[#008000] text-xl font-bold">
                             <span id="balance"><?= $user['balance'] ?></span> BDT
                         </h2>
                     </div>
                     <div class="flex flex-col items-center justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                         <h2 class="mb-3  text-xl ">Amount</h2>
                         <div class="flex w-full max-w-lg items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                             <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                 <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" class="h-8 cursor-pointer w-6 text-gray-900" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                     <path d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"></path>
                                 </svg>
                             </div>
                             <div class="relative w-full min-w-[200px] h-11">
                                 <input id="amount_id" placeholder="Enter Amount" type="number" name="amount" required class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 " value=""/>
                                 <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden">Mobile Number<!-- --> </label>
                             </div>
                         </div>
                         <p class="text-red-500 text-sm text-left w-full mt-1">
                             Minimum deposit 500 BDT
                         </p>
                         <div class="mt-5 flex justify-center gap-3 flex-wrap">
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>500</span>
                             </div>
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>1000</span>
                             </div>
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>2000</span>
                             </div>
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>3000</span>
                             </div>
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>5000</span>
                             </div>
                             <div class="amount_text relative grid items-center font-sans font-bold uppercase whitespace-nowrap select-none border border-blue-500 text-blue-700 py-1.5 px-3 text-xs rounded-lg cursor-pointer">
                                 <span>10000</span>
                             </div>
                         </div>
                     </div>
                     <div class="flex flex-col items-center justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                         <h2 class="mb-3 text-lg">Select Payment Method</h2>
                         <div class="flex gap-5">
                             <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                                 <div>
                                     <input id="nagad_in" type="radio" name="method" value="nagad" required/>
                                     <img src="img/nagad.jpg" alt="" class="h-8  w-8 mx-auto"/>
                                     <h2 class=" text-[#008000] text-sm font-bold">Nagad</h2>
                                 </div>
                             </label>
                             <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                                 <div>
                                     <input id="bkash_in" type="radio" name="method" value="bkash"  required/>
                                     <img src="img/bkash.webp" alt="" class="h-8  w-8 mx-auto"/>
                                     <h2 class=" text-[#008000] text-sm font-bold">bKash</h2>
                                 </div>
                             </label>
                             <label class="p-3 relative  rounded-lg cursor-pointer border-4 border-gray-300">
                                 <div>
                                     <input id="rocket_in" type="radio" name="method" value="rocket"  required/>
                                     <img src="img/rocket.png" alt="" class="h-8  w-8 mx-auto"/>
                                     <h2 class=" text-[#008000] text-sm font-bold">Rocket</h2>
                                 </div>
                             </label>
                         </div>
                     </div>
                     <div class="m-5">
                         <button onClick="next()" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-full">
                             Next
                         </button>
                     </div>
                 </div>
            </div>
            <!-- ===================================================================================== -->
            <!-- ===================================================================================== -->
            <!-- ===================================================================================== -->
            <!-- ===================================================================================== -->
            <!-- ===================================================================================== -->
            <div class="bg-[#ebebeb] pb-10 hidden" id="sec_2nd">
                <div id="rocket-info"  class="hidden info_method">
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow">
                        <h2>
                            <span class=" text-[#008000] text-xl font-bold">Important notice:</span> 
                            We accept only "Send Money" from your Rocket account.  Please Cashout the exact amount.
                        </h2>
                        <br>
                        <h2>
                            <span class=" text-[#008000] text-xl font-bold">Notice:</span>  
                            <span class="hind">সফলভাবে ডিপোজিট সম্পন্ন করতে আপনার রকেট একাউন্ট থেকে সঠিকভাবে এবং সঠিক এমাউন্ট নিচের নাম্বারটিতে অবশ্যই সেন্ড মানি করে ট্রানজেকশন আইডিটি নিচের বক্সে দিয়ে ADD DEPOSIT এ ক্লিক করুন।</span>
                        </h2>
                        <br>
                        <img width="1280" height="405"class=" w-full max-w-lg" style="color: transparent;" src="img/rocket_info.jpg">
                    </div>
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow whitespace-nowrap">
                        <div class="flex gap-1 items-center">
                            <img src="img/rocket.png" alt="" class="-ml-[2px] h-7 w-7">
                            <h2 class=" text-lg ">Rocket Agent: </h2>
                            <h3 class="text-lg"><?= $method['r_number'] ?></h3>
                            <div>
                                <span class="bg-[#15A710] rounded-lg cursor-pointer px-3 text-white text-sm" onClick="copy('<?= $method['r_number'] ?>')" >Copy</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-5">
                            <img src="img/amount.jpg" alt="" class="h-5">
                            <h2 class="text-xl ">Amount: <span class="deposit_amount">0</span></h2> 
                        </div>
                    </div>
                </div>
                <div id="bkash-info" class="hidden info_method">
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow">
                        <h2>
                            <span class=" text-[#008000] text-xl font-bold">Important notice:</span> 
                            We accept only "Send Money" from your Nagad account.  Please Cashout the exact amount.</h2>
                            <br>
                            <h2>
                                <span class=" text-[#008000] text-xl font-bold">Notice:</span>  
                                <span class="hind">সফলভাবে ডিপোজিট সম্পন্ন করতে আপনার নগদ একাউন্ট থেকে সঠিকভাবে এবং সঠিক এমাউন্ট নিচের নাম্বারটিতে অবশ্যই সেন্ড মানি করে ট্রানজেকশন আইডিটি নিচের বক্সে দিয়ে ADD DEPOSIT এ ক্লিক করুন।</span>
                            </h2>
                            <br>
                            <img width="1280" height="405"class=" w-full max-w-lg" style="color: transparent;" src="img/nagad_info.webp">
                    </div>
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow whitespace-nowrap">
                        <div class="flex gap-1 items-center">
                            <img src="img/nagad.jpg" alt="" class="-ml-[2px] h-7 w-7">
                            <h2 class=" text-lg ">Nagad Agent: </h2>
                            <h3 class="text-lg"><?= $method['n_number'] ?></h3>
                            <div>
                                <span class="bg-[#15A710] rounded-lg cursor-pointer px-3 text-white text-sm" onClick="copy('<?= $method['n_number'] ?>')" >Copy</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-5">
                            <img src="img/amount.jpg" alt="" class="h-5">
                            <h2 class="text-xl ">Amount: <span class="deposit_amount">0</span></h2> 
                        </div>
                    </div>
                </div>
                <div id="nagad-info" class="hidden info_method">
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow">
                        <h2>
                        <span class=" text-[#008000] text-xl font-bold">Important notice:</span>
                            We accept only "Send Money" from your Bkash account.  Please Cashout the exact amount.
                        </h2>
                        <br>
                        <h2>
                            <span class=" text-[#008000] text-xl font-bold">Notice:</span>  
                            <span class="hind">সফলভাবে ডিপোজিট সম্পন্ন করতে আপনার বিকাশ একাউন্ট থেকে সঠিকভাবে এবং সঠিক এমাউন্ট নিচের নাম্বারটিতে অবশ্যই সেন্ড মানি করে ট্রানজেকশন আইডিটি নিচের বক্সে দিয়ে ADD DEPOSIT এ ক্লিক করুন।</span>
                        </h2>
                        <br>
                        <img width="1280" height="267" class="w-full max-w-lg" style="color: transparent;" src="img/bkash_info.webp">
                    </div>
                    <div class=" m-5 p-4 bg-white rounded-lg py-5 shadow whitespace-nowrap">
                        <div class="flex gap-1 mb-2 items-center">
                            <img src="img/bkash.webp" alt="" class="h-5 w-5 mr-1">
                            <h2 class="text-lg">Bkash Agent: </h2>
                            <h3 class="text-lg"><?= $method['b_number'] ?></h3>
                            <div>
                                <span class="bg-[#15A710] rounded-lg cursor-pointer px-3 text-white text-sm" onClick="copy('<?= $method['r_number'] ?>')" >Copy</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-1 mt-5">
                            <img src="img/amount.jpg" alt="" class="h-5">
                            <h2 class="text-xl ">Amount: <span class="deposit_amount">0</span></h2> 
                        </div>
                    </div>
                </div>
                
                <form action="" method="post">
                    <div class="flex flex-col justify-center m-5 p-4 bg-white rounded-lg py-5 shadow">
                        <h2 class="mb-3  text-xl ">Transaction ID</h2>
                        <div class="flex w-full max-w-lg items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                            <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" class="h-8 cursor-pointer w-6 text-gray-900" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M320 144c-53.02 0-96 50.14-96 112 0 61.85 42.98 112 96 112 53 0 96-50.13 96-112 0-61.86-42.98-112-96-112zm40 168c0 4.42-3.58 8-8 8h-64c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h16v-55.44l-.47.31a7.992 7.992 0 0 1-11.09-2.22l-8.88-13.31a7.992 7.992 0 0 1 2.22-11.09l15.33-10.22a23.99 23.99 0 0 1 13.31-4.03H328c4.42 0 8 3.58 8 8v88h16c4.42 0 8 3.58 8 8v16zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zm-16 272c-35.35 0-64 28.65-64 64H112c0-35.35-28.65-64-64-64V176c35.35 0 64-28.65 64-64h416c0 35.35 28.65 64 64 64v160z"></path>
                                </svg>
                            </div>
                            <input type="hidden" name="method" id="input_method">
                            <input type="hidden" name="amount" id="input_amount">
                            <div class="relative w-full min-w-[200px] h-11">
                                <input placeholder="Enter Transaction ID" type="text" name="trx" required class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 ">
                                <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden"> </label>
                            </div>
                        </div>
                        <p class="text-sm mt-2">You must correctly enter the Transaction ID, Amount and Method. Of course within 1 minute automatically the Deposit will be successful and the balance will be added.</p>
                    </div>
                    <div class="m-5">
                        <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-full">Add Deposit</button>
                    </div>
                </form>
            </div>
            <!-- ============================================= -->
        </div>
        <script>
            const amounts = document.getElementsByClassName('amount_text');
            const amount_id = document.getElementById('amount_id');
            const sec_2nd = document.getElementById('sec_2nd');

            for (let i = 0; i < amounts.length; i++) { //amount click event
                amounts[i].addEventListener('click', function(){
                    amount_id.value = amounts[i].innerText;
                })
            }
            const nav_1st = document.getElementById('nav_1st');
            const nav_2nd = document.getElementsByClassName('nav_2nd');
            const info = document.getElementsByClassName('info_method');
            const deposit_amount = document.getElementsByClassName('deposit_amount');

            for (let i = 0; i < nav_2nd.length; i++) { //nav hidden
                nav_2nd[i].addEventListener('click', function(){
                    nav_2nd[i].classList.add('hidden');
                    nav_1st.classList.remove('hidden');
                })
            }
            function next(){ //first sec to second sec
                const rocket = document.getElementById('rocket_in');
                const nagad = document.getElementById('nagad_in');
                const bkash = document.getElementById('bkash_in');

                const input_amount = document.getElementById('input_amount');

                const first_sec = document.getElementById('first_sec');
                var inputValue = amount_id.value;


                // alert(amount_id.value);
                if (inputValue === null || inputValue === '') {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Input field is empty!"
                        });
                }else if(500 > parseInt(inputValue)){
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Minimum deposit 500 BDT"
                        });
                }else{ //have balance and selected
                    input_amount.value = inputValue;
                    for(let i = 0; i < deposit_amount.length; i++){ //add amount 
                        deposit_amount[i].innerText = inputValue;
                    }
                    if (nagad.checked) {
                        changeRemove(1, "nagad");
                    } else if (bkash.checked) {
                        changeRemove(2, "bkash");
                    } else if (rocket.checked) {
                        changeRemove(0, "rocket");
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Please, select a mathod!"
                            });
                    }
                }
                
                
            }
            function changeRemove(i, method){
                const input_method = document.getElementById('input_method');
                input_method.value = method;
                nav_1st.classList.add('hidden');

                nav_2nd[i].classList.remove('hidden');
                info[i].classList.remove('hidden');

                first_sec.classList.add("hidden");
                sec_2nd.classList.remove("hidden");
            }
            function copy(text){
                navigator.clipboard.writeText(text).then(function(){
                    Swal.fire({
                        icon: "success",
                        title: "Copied...",
                        text: "Number Copied to clipboard"
                        });
                });
            }
        
        </script>
    </body>
</html>