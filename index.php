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
			<div class="bg-[#008000] w-full p-3 flex items-center gap-3">
				<div>
					<img src="img/profile.jpg" alt="avatar" class="inline-block relative object-cover object-center !rounded-full w-12 h-12 rounded-lg border-2 border-white">
				</div>
				<div>
					<h2 class="text-white text-xl mb-1"><?= $user["name"] ?></h2>
					<span onClick="tapForBalance()" class="bg-[#fff]  text-sm px-1 text-[#444] rounded-full cursor-pointer flex items-center gap-1">
						<img src="img/tap.jpg" alt class="h-4 rounded-full w-4">
						<span id="bText">Tap for Balance</span>
						<span id="bNumber" class="hidden"><?= $user['balance'] ?> taka</span>
					</span>
				</div>
			</div>
			<a href="logout.php">
				<span class="rounded-full bg-white absolute top-3 right-3 p-2">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 font-bold cursor-pointer w-6 text-black">
						<path fill-rule="evenodd" d="M7.5 3.75A1.5 1.5 0 006 5.25v13.5a1.5 1.5 0 001.5 1.5h6a1.5 1.5 0 001.5-1.5V15a.75.75 0 011.5 0v3.75a3 3 0 01-3 3h-6a3 3 0 01-3-3V5.25a3 3 0 013-3h6a3 3 0 013 3V9A.75.75 0 0115 9V5.25a1.5 1.5 0 00-1.5-1.5h-6zm10.72 4.72a.75.75 0 011.06 0l3 3a.75.75 0 010 1.06l-3 3a.75.75 0 11-1.06-1.06l1.72-1.72H9a.75.75 0 010-1.5h10.94l-1.72-1.72a.75.75 0 010-1.06z"
								clip-rule="evenodd"></path>
					</svg>
				</span>
			</a>
			
			<div class="p-5 w-full ">
				<div class="border border-gray-300 rounded-lg">
					<h2 class="p-3 text-[#008000] text-xl font-bold">My TB Earn</h2>
					<hr class="border-gray-300">
					<div class="grid  grid-cols-4 gap-5 rounded-lg my-4">
						<a href="task.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#946e58" width="500" height="500" class="h-10 cursor-pointer w-10 " src="img/work.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">My Work</h2>
							</div>
						</a>
						<a href="deposit.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#6ea787" width="500" height="500" class="h-10 cursor-pointer w-10" src="img/deposit.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Deposit</h2>
							</div>
						</a>
						<a href="withdraw.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#1e8a8b" width="500" height="500" class="h-10 cursor-pointer w-10" src="img/withdraw.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Withdraw</h2>
							</div>
						</a>
						<a href="package.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#ee8857" width="500" height="500" class="h-10 cursor-pointer w-10 " src="img/package.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Packages</h2>
							</div>
						</a>
						<a href="profile.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#8a4095" width="500" height="500" class="h-10 cursor-pointer w-10 " src="img/profile.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Profile</h2>
							</div>
						</a>
						<a href="refer.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#b2428e" width="500" height="500" class="h-10 cursor-pointer w-10 " src="img/refer.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Refer</h2>
							</div>
						</a>
						<a href="transection.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#5d7369" width="500" height="500" class="h-10 cursor-pointer w-10" src="img/transactions.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Transaction</h2>
							</div>
						</a>
						<a href="helpline.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img color="#946e58" width="500" height="500" class="h-10 cursor-pointer w-10 " src="img/helpline.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Helpline</h2>
							</div>
						</a>
					</div>
				</div>
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
				<div class="border border-gray-300 rounded-lg mt-5">
					<h2 class="p-3 text-[#008000] text-xl font-bold">Company</h2>
					<hr class="border-gray-300">
					<div class="grid  grid-cols-4 gap-5 rounded-lg my-4">
						<a href="setting.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/set.avif" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Settings</h2>
							</div>
						</a>
						<a href="about.php">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/about.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">About</h2>
							</div>
						</a>
						<a href="">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/yt.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">HTW</h2>
							</div>
						</a>
					</div>
				</div>
				<div class="border border-gray-300 rounded-lg mt-5">
					<h2 class="p-3 text-[#008000] text-xl font-bold">Our Partner</h2>
					<hr class="border-gray-300">
					<div class="grid  grid-cols-4 gap-5 rounded-lg my-4">
						<a target="blank" href="https://www.daraz.com.bd/">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/daraz.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Daraz</h2>
							</div>
						</a>
						<a target="blank" href="https://www.ajkerdeal.com/">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/ajkerdeal.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">AjkerDeal</h2>
							</div>
						</a>
						<a target="blank" href="https://www.Bikroy.com/">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/bikroy.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Bikroy</h2>
							</div>
						</a>
						<a target="blank" href="https://www.othoba.com/">
							<div class="cursor-pointer flex items-center flex-col">
								<img width="500" height="500" class="h-10 cursor-pointer w-10" src="img/othoba.webp" style="color: transparent;">
								<h2 class=" text-black mt-2 text-center">Othoba</h2>
							</div>
						</a>
					</div>
				</div>
			</div>
		</main>
		<div style="position:fixed;z-index:9999;top:16px;left:16px;right:16px;bottom:16px;pointer-events:none"></div>
	</div>
	<p aria-live="assertive" id="__next-route-announcer__" role="alert" style="border: 0px; clip: rect(0px, 0px, 0px, 0px); height: 1px; margin: -1px; overflow: hidden; padding: 0px; position: absolute; top: 0px; width: 1px; white-space: nowrap; overflow-wrap: normal;">dfghrhrfthrt</p>
	<script>
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