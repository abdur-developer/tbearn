<?php
require "includes/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>forgot - tbearn.com</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <div id="__next">
            <div class="min-h-screen bg-[#ebebeb] pb-10">
                <div class="flex justify-center min-h-screen items-center rounded-lg">
                    <form id="regi" class="mt-8 mb-2 relative w-80 max-w-screen-lg sm:w-96 bg-white p-5 rounded-lg">
                        <div class="relative h-16">
                            <img alt="avatar" src="<?= $logo_link ?>" class="inline-block object-cover object-center !rounded-full rounded-lg absolute left-0 right-0 -top-[4rem] border h-24 mx-auto w-24 border-green-500 bg-white shadow-green-900/20 ring-4 ring-green-500/30"/>
                        </div>
                        <div class="mb-4 flex flex-col gap-6">
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M19.5 9.75a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v2.69l4.72-4.72a.75.75 0 111.06 1.06L16.06 9h2.69a.75.75 0 01.75.75z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input placeholder="Enter Mobile Number" name="number" type="number" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 " value=""/>
                                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden"></label>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] rounded-lg mt-6 border bg-[#008000] shadow-none flex gap-3 justify-center items-center">Send Otp</button>
                        <p class="block antialiased font-sans text-base leading-relaxed text-gray-700 mt-4 text-center font-normal">
                            Have an account? <br/>
                            <a class="font-light text-[#008000] transition-colors hover:text-red-700 text-lg" href="login.php">Login now</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
