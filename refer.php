<?php
    require "includes/chack_users.php"; //$sessionId
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>Refer - TB Earn</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="style.css" data-n-g=""/>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div id="__next">
            <div class="min-h-screen bg-[#ebebeb] pb-10">
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
                    <a href="index.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Refer<!-- --> </h2>
                </div>
                <img width="200" height="200"class="mx-auto" style="color:transparent" src="img/referx.webp"/>
                <div class="flex bg-white m-5 flex-col rounded-lg py-5 shadow items-center">
                    <h2 class="text-2xl mb-4 font-bold whitespace-nowrap">Your Reference Link</h2>
                    <div class="relative flex w-full justify-center max-w-[24rem]">
                        <div class="relative w-full min-w-[200px] h-10 min-w-0">
                            <input type="email" readonly="" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-2.5 rounded-[7px] border-blue-gray-200 focus:border-red-500 pr-20" value="<?= $system['base_link'] ."register.php?ref=". $user['ref_code'] ?>"/>
                        </div>
                        <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-2 px-4 bg-blue-500 text-white shadow-md shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none !absolute right-1 top-1 rounded" onClick="copy()">COPY</button>
                    </div>
                    <p class="p-5 text-sm">You will get 10% commission on the amount deposited by the person you refer. If your refer joiner deposits 50,000 BDT then you will get instant 5,000 BDT and you can withdraw that money instantly.</p>
                </div>
                <h2 class="text-xl ml-5 mt-10">All Refer: <?= $total_refer ?></h2>
                
            </div>
        </div>
        <script>
            function copy(){
                let text = "<?= $system['base_link'] ."register.php?ref=". $user['ref_code'] ?>";
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