<?php
$slider1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT link FROM slider WHERE id = 1"));
$slider2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT link FROM slider WHERE id = 2"));
$slider3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT link FROM slider WHERE id = 3"));
?>
<link rel="stylesheet" href="../style.css"/>
<div class="min-h-screen bg-[#ebebeb] pb-10">
    <!-- ============================================================== -->
    <div class="flex justify-center items-center rounded-lg">
        <form class="mt-8 mb-2 relative w-80 max-w-screen-lg sm:w-96 bg-white p-5 rounded-lg" method="post" action="" enctype="multipart/form-data">
            <div class="relative h-16">
                <img alt="avatar" src="<?= '../'.$slider1['link'] ?>" class="inline-block object-cover object-center !rounded-full rounded-lg absolute left-0 right-0 -top-[4rem] border h-24 mx-auto w-24 border-green-500 bg-white shadow-green-900/20 ring-4 ring-green-500/30"/>
            </div>
            <div class="mb-4 flex flex-col gap-6">
                <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                    <div class="relative w-full min-w-[200px] h-11">
                        <input required name="slider-upolad" type="file" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="slider" value="1">
            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Change</button>
        </form>
    </div>
    <!-- ============================================================== -->
    <div class="flex justify-center items-center rounded-lg">
        <form class="mt-8 mb-2 relative w-80 max-w-screen-lg sm:w-96 bg-white p-5 rounded-lg" method="post" action="" enctype="multipart/form-data">
            <div class="relative h-16">
                <img alt="avatar" src="<?= '../'.$slider2['link'] ?>" class="inline-block object-cover object-center !rounded-full rounded-lg absolute left-0 right-0 -top-[4rem] border h-24 mx-auto w-24 border-green-500 bg-white shadow-green-900/20 ring-4 ring-green-500/30"/>
            </div>
            <div class="mb-4 flex flex-col gap-6">
                <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                    <div class="relative w-full min-w-[200px] h-11">
                        <input required name="slider-upolad" type="file" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="slider" value="2">
            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Change</button>
        </form>
    </div>
    <!-- ============================================================== -->
    <div class="flex justify-center items-center rounded-lg">
        <form class="mt-8 mb-2 relative w-80 max-w-screen-lg sm:w-96 bg-white p-5 rounded-lg" method="post" action="" enctype="multipart/form-data">
            <div class="relative h-16">
                <img alt="avatar" src="<?= '../'.$slider3['link'] ?>" class="inline-block object-cover object-center !rounded-full rounded-lg absolute left-0 right-0 -top-[4rem] border h-24 mx-auto w-24 border-green-500 bg-white shadow-green-900/20 ring-4 ring-green-500/30"/>
            </div>
            <div class="mb-4 flex flex-col gap-6">
                <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                    <div class="relative w-full min-w-[200px] h-11">
                        <input required name="slider-upolad" type="file" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                    </div>
                </div>
            </div>
            <input type="hidden" name="slider" value="3">
            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Change</button>
        </form>
    </div>
</div>