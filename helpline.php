<?php require "includes/dbcon.php";
  $sql = "SELECT * FROM system_set WHERE id = 1";
  $system = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  $sql = "SELECT * FROM plans WHERE status = 'approved'";
  $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charSet="utf-8"/>
    <title>About us -tbearn.com</title>
    <meta name="description" content="Earn Money with mobile phone"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="icon" href="/favicon.ico"/>
    <meta name="theme-color" content="#008000"/>
    <meta name="next-head-count" content="6"/>
    <link rel="preload" href="style.css" as="style"/>
    <link rel="stylesheet" href="style.css" data-n-g=""/>
  </head>
  <body>
    <div id="__next">
      <div class="min-h-screen bg-[#ebebeb]">
        <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
          <a href="index.php">
              <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
          </a>
          <h2 class="text-xl font-bold">HelpLine<!-- --> </h2>
        </div>
        <div class="bg-white m-5 p-5 rounded-lg overflow-hidden flex flex-col justify-center items-center">
          <div class="flex flex-col items-center justify-center">
            <h2 class="text-2xl text-black mb-5 font-bold mt-10">Help Line</h2>
            <p class="text-black text-center mb-5 max-w-[700px]">
              Contact 24/7 helpline for any need. We are at your service 24 hours a day.
            </p>
          </div>
          <div class="flex items-center justify-center flex-col gap-5">
            <a target="_blank" href="<?= $system['tg_channel'] ?>">
              <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg border hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] flex items-center gap-1 border-[#008000] text-[#008000]" type="button">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path>
                </svg> Telegram Channel
              </button>
            </a>
            <a target="_blank" href="<?= $system['tg_group'] ?>">
              <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg border hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] flex items-center gap-1 border-[#008000] text-[#008000]" type="button">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                  <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path>
                </svg> Telegram Group
                </button>
              </a>
              <a target="_blank" href="<?= $system['tg_support'] ?>">
                <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg border hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] flex items-center gap-1 border-[#008000] text-[#008000]" type="button">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path>
                  </svg> Customer Support
                </button>
              </a>
              <a target="_blank" href="<?= $system['tg_ceo'] ?>">
                <button class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg border hover:opacity-75 focus:ring focus:ring-blue-200 active:opacity-[0.85] flex items-center gap-1 border-[#008000] text-[#008000]" type="button">
                  <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 496 512" class="h-4 w-4" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"></path>
                  </svg> CEO ID
                </button>
              </a>
            </div>
          </div>
        </div>
        <div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
      </div>
    </body>
  </html>