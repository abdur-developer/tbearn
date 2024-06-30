<?php
    require "includes/chack_users.php";
?>
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
        <link rel="stylesheet" href="style.css" data-n-g=""/>
    </head>
    <body>
      <div id="__next">
         <div class="min-h-screen bg-[#ebebeb] pb-10">
            <div class="h-14 w-full bg-[#008000] pl-4  gap-5 shadow text-white flex items-center ">
               <a href="index.php">
                  <img src="img/back.svg" class="h-7 font-bold cursor-pointer w-7">
               </a>
               <h2 class="text-xl font-bold">
                  Profile<!-- --> 
               </h2>
            </div>
            <div class="bg-white m-5 rounded-lg overflow-hidden">
               <div class="flex p-4 bg-white items-center gap-2 border-b border-t border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd"></path>
                     </svg>
                  </span>
                  Name: <?= $user['name'] ?>
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"></path>
                     </svg>
                  </span>
                  Mobile Number: <?= $user['number'] ?>
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M12 21.75c5.385 0 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25 2.25 6.615 2.25 12s4.365 9.75 9.75 9.75zM10.5 7.963a1.5 1.5 0 00-2.17-1.341l-.415.207a.75.75 0 00.67 1.342L9 7.963V9.75h-.75a.75.75 0 100 1.5H9v4.688c0 .563.26 1.198.867 1.525A4.501 4.501 0 0016.41 14.4c.199-.977-.636-1.649-1.415-1.649h-.745a.75.75 0 100 1.5h.656a3.002 3.002 0 01-4.327 1.893.113.113 0 01-.045-.051.336.336 0 01-.034-.154V11.25h5.25a.75.75 0 000-1.5H10.5V7.963z" clip-rule="evenodd"></path>
                     </svg>
                  </span>
                  Deposit Balance: <?= $user['deposit'] ?> BDT
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M12 21.75c5.385 0 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25 2.25 6.615 2.25 12s4.365 9.75 9.75 9.75zM10.5 7.963a1.5 1.5 0 00-2.17-1.341l-.415.207a.75.75 0 00.67 1.342L9 7.963V9.75h-.75a.75.75 0 100 1.5H9v4.688c0 .563.26 1.198.867 1.525A4.501 4.501 0 0016.41 14.4c.199-.977-.636-1.649-1.415-1.649h-.745a.75.75 0 100 1.5h.656a3.002 3.002 0 01-4.327 1.893.113.113 0 01-.045-.051.336.336 0 01-.034-.154V11.25h5.25a.75.75 0 000-1.5H10.5V7.963z" clip-rule="evenodd"></path>
                     </svg>
                  </span>
                  Withdraw Balance: <?= $user['withdraw'] ?> BDT
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0A.75.75 0 018.25 6h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75zM2.625 12a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zM7.5 12a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12A.75.75 0 017.5 12zm-4.875 5.25a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0zm4.875 0a.75.75 0 01.75-.75h12a.75.75 0 010 1.5h-12a.75.75 0 01-.75-.75z" clip-rule="evenodd"></path>
                     </svg>
                  </span>
                  Package: <?= $package_name ?>
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path>
                     </svg>
                  </span>
                  Refer Code: <?= $user['ref_code'] ?>
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                     </svg>
                  </span>
                  Total Refer: <?= $user['total_refer'] ?>
               </div>
               <div class="flex p-4 bg-white items-center gap-2 border-b border-gray-100">
                  <span class="bg-[#008000] p-1 rounded-full text-white">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 cursor-pointer w-5 ">
                        <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                        <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z"></path>
                     </svg>
                  </span>
                  Task: <?= $total_task ?>
               </div>
            </div>
         </div>
         <div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
      </div>
      <script id="__NEXT_DATA__" type="application/json">{"props":{"pageProps":{}},"page":"/profile","query":{},"buildId":"UX3a12h5SzfcRqHiFIPPJ","nextExport":true,"autoExport":true,"isFallback":false,"scriptLoader":[]}</script>
      <next-route-announcer>
         <p aria-live="assertive" id="__next-route-announcer__" role="alert" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; top: 0px; width: 1px; white-space: nowrap; overflow-wrap: normal;"></p>
      </next-route-announcer>
   </body>
</html>