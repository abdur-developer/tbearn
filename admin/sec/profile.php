
<link rel="stylesheet" href="../style.css"/>
<div class="min-h-screen bg-[#ebebeb] pb-10">
    <div class="bg-white m-5 rounded-lg overflow-hidden p-5">
        <form method="post" action="" class="mb-4 flex flex-col gap-6">
            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="relative w-full min-w-[200px] h-11">
                    <input required placeholder="Enter username" type="text" name="name" value="<?= $admin['username'] ?>" 
                    class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    
                </div>
            </div>
            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                    <img src="../img/lock.svg" alt="" srcset="" class="h-8 cursor-pointer w-6 text-gray-900">
                </div>
                <div class="relative w-full min-w-[200px] h-11">
                    <input type="hidden" name="q" value="profile">
                    <input required placeholder="Enter Password" name="password" type="password" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    
                </div>
            </div>
            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Change Username</button>
        </form>
        <form method="post" action="" class="mb-4 flex flex-col gap-6">
            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                    <img src="../img/lock.svg" alt="" srcset="" class="h-8 cursor-pointer w-6 text-gray-900">
                </div>
                <div class="relative w-full min-w-[200px] h-11">
                    <input type="hidden" name="q" value="profile">
                    <input required placeholder="Enter Old Password" name="password" type="password" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    
                </div>
            </div>
            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                    <img src="../img/lock.svg" alt="" srcset="" class="h-8 cursor-pointer w-6 text-gray-900">
                </div>
                <div class="relative w-full min-w-[200px] h-11">
                    <input required placeholder="Enter New Password" name="new" type="password" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    
                </div>
            </div>
            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                    <img src="../img/lock.svg" alt="" srcset="" class="h-8 cursor-pointer w-6 text-gray-900">
                </div>
                <div class="relative w-full min-w-[200px] h-11">
                    <input required placeholder="Confirm Password" name="confirm" type="password" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    
                </div>
            </div>
            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Change Password</button>
        </form>
    </div>
</div>