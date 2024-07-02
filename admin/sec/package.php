
<div class="report-container">
    <div class="report-header">
        <h1 class="recent-Articles">Package</h1>
        <a href="?q=package&action=add" class="view-btn">Add</a>
    </div>
    <?php 
    if(isset($_REQUEST['action'])){ 
        $action = $_REQUEST['action'];
        $name = ""; $price = ""; $income = ""; $ads = ""; $validity = "";
        
        if($action == "edit"){
            $id = $_REQUEST['id'];
            $package = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM plans WHERE id = $id"));
            $name = $package['name'];
            $price = $package['price'];
            $income = $package['daily_income'];
            $ads = $package['daily_limit'];
            $validity = $package['validity'];
        }
        ?>
        <div class="report-body package">
        <link rel="stylesheet" href="../style.css"/>
        <div class="min-h-screen bg-[#ebebeb] pb-10">
            <div class="bg-white m-5 rounded-lg overflow-hidden p-5">
                <form method="post" action="" class="mb-4 flex flex-col gap-6">
                    <!-- ============================================== -->
                    <input type="hidden" name="p_action" value="<?= $action ?>">
                    <?php
                    if($action == 'edit'){
                        echo "<input type='hidden' name='p_id' value='$id'>";
                    }
                    ?>
                    <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input required type="text" name="p_name" value="<?= $name ?>"
                            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500">
                                Name
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input required type="text" name="p_price" value="<?= $price ?>"
                            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500">
                                Price
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input required type="number" name="p_income" value="<?= $income ?>"
                            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500">
                                Daily income
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input required type="number" name="p_ads" value="<?= $ads ?>"
                            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500">
                                Daily ads
                            </label>
                        </div>
                    </div>
                    <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                        <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="relative w-full min-w-[200px] h-11">
                            <input required type="number" name="p_validity" value="<?= $validity ?>"
                            class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                            <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500">
                                Validity
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Update</button>
                    <!-- ======================================================== -->
                </form>
            </div>
        </div>
        </div>
    <?php }else{ ?>
    <table class="report-body package">
        <thead class="">
            <tr>
                <th><h3 class="t-op">Name</h3></th>
                <th><h3 class="t-op">Price</h3></th>
                <th><h3 class="t-op">Income</h3></th>
                <th><h3 class="t-op">Ads</h3></th>
                <th><h3 class="t-op">Validity</h3></th>
                <th><h3 class="t-op">Action</h3></th>
            </tr>
        </thead>

        <tbody class="items">
            <?php  
            $user_query = mysqli_query($conn, "SELECT * FROM plans");
            if($user_query){
                while($row = mysqli_fetch_assoc($user_query)){ 
                    ?>
                <tr>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['daily_income'] ?></td>
                    <td><?= $row['daily_limit'] ?></td>
                    <td><?= $row['validity'] ?></td>
                    <td><h3 class="t-op-nextlvl"><a href="?q=package&action=edit&id=<?= $row['id'] ?>" class="view-btn">Edit</a></h3></td>
                </tr>
                    
                    
             <?php }
            }  ?>
            
        </tbody>
    </table>
    <?php } ?>
</div>