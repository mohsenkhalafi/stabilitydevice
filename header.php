<!DOCTYPE html>
<?php  ?>
<html dir="rtl" lang="en"><head>
   <meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/favicon.ico">
	<script src="js/sound.js"></script>
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark sticky-top bg-info flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">لیست مراکز</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
         <li class="nav-item text-nowrap">
         <p id="demo"></p>
		 <button onclick="showNotification();"> </button>
		 <a href="javascript:play_single_sound();"></a>
		 <div id='hsBoard'>
	  
	    </div>
	    <br />
	    
	    </body>
	    </html>
        </li>
    </ul>
</nav>
<audio id="audiotag1" src="alarm/alarm.wav" preload="auto"></audio>

<script type="text/javascript">
	function play_single_sound() {
		document.getElementById('audiotag1').play();
	}
</script>
 <script type="text/javascript">



function notify(msg) {
			
			var option = {
				body: msg,
				
				icon: 'danger.png',
				
			}
			
			var notify = new Notification("Timed Out", option);
			//alert(notify.title);
			
			setTimeout(function(){notify.close()}, 8000);
			
			notify.onshow = function(){
				play_single_sound();
				console.log('Notification showing...');
				// 
			};
			
			notify.onclose = function(){
				console.log('Notification closed!');
			};
			
			notify.onerror = function(){
				console.log('Notification error!');
			};
			
			notify.onclick = function(){
				console.log('Notification Click!');
			};
			
		}
		
		function showNotification(msg){
			
			if ( !("Notification" in window) ) {
				
				console.error("Your browser does not support Notification");
				//alert('Your browser does not support Notification');
				
			} else if ( Notification.permission === "granted" ) {
				
				notify(msg);
				
			} else if ( Notification.permission !== "denied" ) {
				
				Notification.requestPermission(function(permission){
					
					if ( permission === "granted" ) {
						
						notify(msg);
						
					}
					
				});
				
			}
			
		}
		
		
		
		</script>
	

