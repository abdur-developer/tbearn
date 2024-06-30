<?php
if(isset($_REQUEST['number'])){//?number=5645&password=5467
    $number = $_REQUEST['number'];
    $pass =$_REQUEST['password'];

    require "includes/dbcon.php";
    $sql = "SELECT COUNT(*) as count FROM users WHERE number = '$number'";
    $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $count = $row['count'];
    if ($count > 0) {
        $sql = "SELECT * FROM users WHERE number = '$number'";
        $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $id = $row['id'];
        $has_pass = $row['password'];

        if(password_verify($pass, $has_pass)){
            session_start();
            $time = 60 * 60 * 24 * 2 ; // 2 days
            ini_set('session.gc_maxlifetime', $time);
            ini_set('session.cookie_lifetime', $time);
            $_SESSION["id"] = $id + 155;
            session_write_close();
            header("location: index.php");
        }else{
            header("location: login.php?error=password wrong..try again/forget password ..!");
        }
    }else{
        header("location: login.php?error=number not found on our database..!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charSet="utf-8"/>
        <title>login - tbearn.com</title>
        <meta name="description" content="Earn Money with mobile phone"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="/favicon.ico"/>
        <meta name="theme-color" content="#008000"/>
        <meta name="next-head-count" content="6"/>
        <link rel="preload" href="style.css" as="style"/>
        <link rel="stylesheet" href="style.css" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <?php
            if(isset($_REQUEST['error'])){
                $error = $_REQUEST['error'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: '$error'
                        });
                </script>
                ";
            }
        ?>
        <div id="__next">
            <div class="min-h-screen bg-[#ebebeb] pb-10">
                <div class="flex justify-center min-h-screen items-center rounded-lg">
                    <form class="mt-8 mb-2 relative w-80 max-w-screen-lg sm:w-96 bg-white p-5 rounded-lg" method="post" action="">
                        <div class="relative h-16">
                            <img alt="avatar" src="img/logo.png" class="inline-block object-cover object-center !rounded-full rounded-lg absolute left-0 right-0 -top-[4rem] border h-24 mx-auto w-24 border-green-500 bg-white shadow-green-900/20 ring-4 ring-green-500/30"/>
                        </div>
                        <div class="mb-4 flex flex-col gap-6">
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 cursor-pointer w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M19.5 9.75a.75.75 0 01-.75.75h-4.5a.75.75 0 01-.75-.75v-4.5a.75.75 0 011.5 0v2.69l4.72-4.72a.75.75 0 111.06 1.06L16.06 9h2.69a.75.75 0 01.75.75z" clip-rule="evenodd"></path>
                                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input placeholder="Enter Mobile Number" name="number" type="number" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden">Mobile Number
                                    <!-- -->
                                    </label>
                                </div>
                            </div>
                            <div class="flex items-center border justify-center border-gray-300 rounded-lg overflow-hidden">
                                <div class="h-12 w-12 flex items-center justify-center border-r border-gray-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-8 cursor-pointer w-6 text-gray-900">
                                        <path fill-rule="evenodd" d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="relative w-full min-w-[200px] h-11">
                                    <input placeholder="Enter Password" name="password" type="password" class="peer w-full h-full bg-transparent text-blue-gray-700 font-sans font-normal outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 border focus:border-2 border-t-transparent focus:border-t-transparent text-sm px-3 py-3 rounded-md border-blue-gray-200 focus:border-green-500 !border !border-gray-300 focus:border-none border-none bg-white text-gray-900  placeholder:text-gray-500 focus:!border-gray-900 focus:!border-t-gray-900 "/>
                                    <label class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[&#x27; &#x27;] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[&#x27; &#x27;] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-blue-gray-400 peer-focus:text-green-500 before:border-blue-gray-200 peer-focus:before:!border-green-500 after:border-blue-gray-200 peer-focus:after:!border-green-500 hidden">Mobile Number
                                    <!-- -->
                                    </label>
                                </div>
                            </div>
                            <a href="forget.php">
                                <p class="-mt-5 -mb-5 text-gray-900">Forgot password?</p>
                            </a>
                        </div>
                        <button type="submit" class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 text-white shadow-blue-500/20 hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full hover:bg-[#008000] mt-6 border bg-[#008000] shadow-none flex gap-3 justify-center items-center rounded-lg">Login</button>
                        <p class="block antialiased font-sans text-gray-700 mt-4 text-center font-normal text-sm">
                            Not registered yet? <br/>
                            <a class="font-light text-[#008000] transition-colors hover:text-red-700 text-lg" href="register.php">Create new account</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
