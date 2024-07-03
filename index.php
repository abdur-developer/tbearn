<?php require "includes/chack_users.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charSet="utf-8" />
		<title>TB Earn</title>
		<meta name="description" content="Earn Money with mobile phone" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" href="/favicon.ico" />
		<meta name="theme-color" content="#008000" />
		<meta name="next-head-count" content="6" />
		<link rel="preload" href="style.css" as="style" />
		<link rel="stylesheet" href="style.css" data-n-g />
		<link rel="preload" href="style1.css" as="style" />
		<link rel="stylesheet" href="style1.css" data-n-p />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<style>
		.hidden{ display: none; }

        .x-slider { 
            display: flex; 
            justify-content: center; 
            align-items: center;
			box-sizing: border-box; 
        } 

        .carousel { 
            position: relative; 
            width: 1000px; 
            height: 200px; 
            overflow: hidden; 
            background-color: #cdcdcd; 
        } 

        .carousel-item .slide-image { 
            width: 1000px; 
            height: 200px; 
            background-size: cover; 
            background-repeat: no-repeat; 
        } 

        .carousel-item { 
            position: absolute; 
            width: 100%; 
            height: 270px; 
            border: none; 
            top: 0; 
            left: 100%; 
        } 

        .carousel-item.active { 
            left: 0; 
            transition: all 0.3s ease-out; 
        } 

        .carousel-item div { 
            height: 100%; 
        }
		.notice{
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #fc90c6;
            text-align: center;
            display: flex;
            justify-content: left;
        }
        .notice span{
            background: #4600b6;
            padding: 5px 10px;
            color: #fff;
        }
        .notice marquee{
            color: #000;
            font-size: 16px;
            padding-top: 5px;
            text-align: center;
            font-weight: 600;
        }
	  </style>
	</head>
	<body>
		<div id="preload" class="h-screen w-screen flex items-center justify-center">
			<div
				class="bg-white p-5 px-10 rounded-lg  flex items-center flex-col justify-center">
				<svg class="animate-spin text-[#008000] border-white mb-2"
					viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
					width="24" height="24">
					<path
						d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
						stroke="currentColor" stroke-width="5" stroke-linecap="round"
						stroke-linejoin="round"></path>
					<path
						d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
						stroke="currentColor" stroke-width="5" stroke-linecap="round"
						stroke-linejoin="round" class="text-blue-500"></path>
				</svg>
				<h2>Loading</h2>
			</div>
		</div>
	<div id="next">
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
            if(isset($_REQUEST['success'])){
                $success = $_REQUEST['success'];
                echo "
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'WOW...',
                        text: '$success'
                        });
                </script>
                ";
            }
        ?>
		<main class="flex bg-white min-h-screen mb-10 min-w-screen flex-col justify-start items-baseline">
			<div class="bg-white w-full p-3 flex items-center gap-3">
				<div>
					<img src="img/profile.jpg" alt="avatar" class="inline-block relative object-cover object-center !rounded-full w-12 h-12 rounded-lg border-2 border-white">
				</div>
				<div>
					<h2 class="text-black text-xl mb-1"><?= $user["name"] ?></h2>
					<span onClick="tapForBalance()" style="background: #0000ff; padding: 3px 5px;"
                    class="bg-[#0000FF] text-sm text-white rounded-full cursor-pointer flex items-center gap-1">
						<img src="img/tap.jpg" alt class="h-4 rounded-full w-4">
						<span id="bText">Tap for Balance</span>
						<span id="bNumber" class="hidden"><?= $user['balance'] ?> taka</span>
					</span>
				</div>
			</div>
			<a href="logout.php">
				<span class="rounded-full bg-white absolute top-3 right-3 p-2">
					<img src="img/out.svg" alt="" srcset="" class="h-6 font-bold cursor-pointer w-6 text-black">
				</span>
			</a>
			
			<div class="p-5 w-full ">
                <div class="w-full h-[140px] lg:h-[80vh] overflow-hidden mt-5 rounded">
                    <div class="x-slider">
                        <div class="carousel">
                            <?php
                                $sliders = mysqli_query($conn, "SELECT * FROM slider");
                                while($slider = mysqli_fetch_array($sliders)){
                                    echo "<div class='carousel-item'> 
                                        <div class='slide-image'>
                                            <img src='".$slider["link"]."'>
                                        </div> 
                                    </div>";
                                }
                            ?>
                            
                        </div> 
                    </div>
				</div>
				<div class="border border-gray-300 rounded-lg">
					<h2 class="p-3 text-[#008000] text-xl font-bold">All Services</h2>
					<hr class="border-gray-300">
					<div class="grid  grid-cols-4 gap-5 rounded-lg my-4">
						<a href="task.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/task.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">My Task</h2>
                                </div>
                            </div>
                        </a>
                        <a href="deposit.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/invest.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Invest</h2>
                                </div>
                            </div>
                        </a>
                        <a href="withdraw.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/withdraw.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Withdraw</h2>
                                </div>
                            </div>
                        </a>
                        <a href="package.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/plan.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Plan</h2>
                                </div>
                            </div>
                        </a>
                        <a href="profile.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/profile.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Profile</h2>
                                </div>
                            </div>
                        </a>
                        <a href="transection.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/transection.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Transection</h2>
                                </div>
                            </div>
                        </a>
                        <a href="refer.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/refer.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Refer</h2>
                                </div>
                            </div>
                        </a>
                        <a href="helpline.php">
                            <div class="cursor-pointer ">
                                <div class="flex justify-center items-center flex-col">
                                    <img  class="h-10 cursor-pointer w-10 " src="img/temp_1/customer.png">
                                    <h2 class=" text-black mt-2 text-center text-sm">Helpline</h2>
                                </div>
                            </div>
                        </a>
                    </div>
				</div>
				
				<div class="border border-gray-300 rounded-lg mt-3">
                    <a target="_blank" href="">
                        <div class="bg-white rounded-lg shadow-lg border border-gray-300 flex items-center">
                            <div class="m-5">
                                <img src="img/yt.webp" class="h-10 w-10 ">
                            </div>
                            <div>
                                <h2 class="text-xl font-bold">How To Work</h2>
                                <h3>Click here to see youtube video tutorial</h3>
                            </div>
                        </div>
                    </a>
                </div>
			</div>
		</main>
        <div class="notice">
            <span>Notice</span>
            <marquee behavior="scroll" direction="left"><?= $sys_set['notice'] ?></marquee>
        </div>
	</div><script>
		function tapForBalance(){
			var balance = document.getElementById('bNumber');
			var bText = document.getElementById('bText');
			balance.classList.remove("hidden");
			bText.classList.add("hidden");
			setTimeout(() => {
				balance.classList.add("hidden");
				bText.classList.remove("hidden");
			}, 1500);
		}
		
		document.addEventListener('DOMContentLoaded', function(){
			setTimeout(() => {
				document.querySelector('#preload').style.display = "none";
				document.querySelector('#next').style.display = "block";
			}, 500);
		})

		window.onload = function () { 
			let slides = 
				document.getElementsByClassName('carousel-item'); 

			function addActive(slide) { 
				slide.classList.add('active'); 
			} 

			function removeActive(slide) { 
				slide.classList.remove('active'); 
			} 

			addActive(slides[0]); 
			setInterval(function () { 
				for (let i = 0; i < slides.length; i++) { 
					if (i + 1 == slides.length) { 
						addActive(slides[0]); 
						setTimeout(removeActive, 350, slides[i]); 
						break; 
					} 
					if (slides[i].classList.contains('active')) { 
						setTimeout(removeActive, 350, slides[i]); 
						addActive(slides[i + 1]); 
						break; 
					} 
				} 
			}, 3000); 
		};
	</script>
	</body>
</html>