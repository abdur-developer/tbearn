<?php
    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        
        $sql = "SELECT COUNT(*) as count FROM transaction WHERE user_id = '$id'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $count = $row['count'];
        ?>



        <div class="box-container">
            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading"><?= $user['balance'] ?></h2>
                    <h2 class="topic">Balance</h2>
                </div>

                <!-- <img src="../img/13.png" alt="Views"> -->
            </div>

            <div class="box box2">
                <div class="text">
                    <h2 class="topic-heading"><?= $user['deposit'] ?></h2>
                    <h2 class="topic">Deposit</h2>
                </div>

                <!-- <img src="../img/13.png" alt="likes"> -->
            </div>

            <div class="box box3">
                <div class="text">
                    <h2 class="topic-heading"><?= $user['withdraw'] ?></h2>
                    <h2 class="topic">Withdraw</h2>
                </div>

                <!-- <img src="../img/13.png" alt="comments"> -->
            </div>

            <div class="box box4">
                <div class="text">
                    <h2 class="topic-heading"><?= $count ?></h2>
                    <h2 class="topic">Transection</h2>
                </div>

                <!-- <img src="../img/13.png" alt="published"> -->
            </div>
        </div>
        <div class="user-action">
            <a href="?q=user_details&balance=add&id=<?= $id ?>" class="bg-green">+ Balance</a>
            <a href="?q=user_details&balance=min&id=<?= $id ?>" class="bg-red">- Balance</a>
            <?php
            if($user['status'] == 0){
                echo "<a href='?q=user_details&d_action=active&id=$id' class='bg-orange'>Active</a>";
            }else{
                echo "<a href='?q=user_details&d_action=ban&id=$id' class='bg-orange'>Ban User</a>";
            }
            ?>
        </div>
        <div class="report-container">
            <div class="report-header">
                <h1 class="recent-Articles">User Details</h1>
                <!--  -->
            </div>
            <style>

            </style>
            <div class="report-body package">
                <link rel="stylesheet" href="../style.css"/>
                <?php 
                if(isset($_REQUEST['balance'])){
                    $balance = $_REQUEST['balance'];
                    ?>
                    <div class="bg-white m-5 rounded-lg overflow-hidden p-5">
                        <form method="post" action="" class="mb-4 flex flex-col gap-6">
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <img src="../img/withdraw.webp" class="h-6 cursor-pointer w-6 text-gray-900"/>
                                        
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input type="hidden" name="d_action" value="<?= $balance ?>">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="hidden" name="old_bl" value="<?= $user['balance'] ?>">
                                    <input required placeholder="Enter number" type="number" name="balance_tk" 
                                    class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                </div>
                            </div>
                            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Update</button>
                        </form>
                    </div>
                    <?php
                }else{ ?>
                    <div class="bg-white m-5 rounded-lg overflow-hidden p-5">
                        <form method="post" action="" class="mb-4 flex flex-col gap-6">
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input  value="<?= $user['name'] ?>" required placeholder="Enter username" type="text" name="d_name" 
                                    class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                </div>
                            </div>
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 cursor-pointer w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M19.5 9.75a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v2.69l4.72-4.72a.75.75 0 111.06 1.06L16.06 9h2.69a.75.75 0 01.75.75z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input  value="<?= $user['number'] ?>" required placeholder="Enter number" type="number" name="d_number" 
                                    class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                </div>
                            </div>
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <img src="../img/lock.svg" alt="" srcset="" class="h-8 cursor-pointer w-6 text-gray-900">
                                </div>
                                <input type="hidden" name="q" value="user_details">
                                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input  value="<?= $user['password'] ?>" required placeholder="Enter password" type="password" name="d_password" 
                                    class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                </div>
                            </div>
                            <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Update</button>
                        </form>
                    </div>
                <?php }
                ?>
            </div>
        </div>




        <?php
    }
?>
