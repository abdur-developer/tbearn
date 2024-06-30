<?php require "includes/chack_users.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>Profile - TB Earn</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" href="style.css" data-n-g=""/>
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
            }
            a {
                text-decoration: none;
            }
            a {
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
        <div id="__next">
            <div class="min-h-screen bg-[#ebebeb] pb-10">
                <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
                    <a href="index.php">
                        <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
                    </a>
                    <h2 class="text-xl font-bold">Transactions<!-- --> </h2>
                </div>
                <div class="bg-white m-5 rounded-lg overflow-hidden">
                <?php
                    $trx_s = mysqli_query($conn, "SELECT * FROM transaction WHERE user_id = '$sessionId'");
                    while($trx = mysqli_fetch_array($trx_s)){ ?>
                        <div class="border-b rounded-b-none border-gray-300 flex px-4 justify-between items-center gap-2 p-2 mb-2 rounded-lg">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 text-green-600 cursor-pointer w-8 ">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm4.28 10.28a.75.75 0 000-1.06l-3-3a.75.75 0 10-1.06 1.06l1.72 1.72H8.25a.75.75 0 000 1.5h5.69l-1.72 1.72a.75.75 0 101.06 1.06l3-3z" clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <h2 class="text-lg -mb-1"><?= $trx['massage'] ?></h2>
                                    <p class="text-sm text-red-700"><span class="text-black">trx :</span> <?= $trx['trx_id'] ?></p>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-right " <?= is_add_trx($trx['is_add']) ?> > <?= $trx['amount'] ?></h3>
                                <!-- color: #B9315E ; -->
                                <p class="text-right text-sm text-gray-700"><?= getDefferenceTime($trx['time']) ?></p>
                            </div>
                        </div>
                <?php
                    }
                ?>
                    
                </div>
            <div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
        </div>
    </body>
</html>