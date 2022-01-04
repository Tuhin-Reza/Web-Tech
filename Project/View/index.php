<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<script src="js/footer.js" defer></script>
	<title>Home Page</title>
</head>
<body>
	<header>
		<p>Airline Reservition Website</p>
	</header>
	<main> 
		<ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="signIn.php">Signin</a></li>
            <li><a href="registration.php">Signup</a></li>
            <li><a href="index.php">About</a></li>
        </ul> 		
		<article>
			<div class="ab">
				<h4>Flights To Top Cities</h4><br>
				<div class="newspaper2">
				    <div>
					    <label>Flights to Cox's Bazar</label><br>
				        <label>Flights to Sylhet</label><br>
				        <label>Flights to Saidpur</label><br>
				        <label>Flights to Muscat</label>
			        </div>
			        <div>
			            <label>Flights to Dhaka</label><br>
				        <label>Flights to Jessore</label><br>
				        <label>Flights to Barisal</label>
			       </div>

			        <div>
			            <label>Flights to Chittagong</label><br>
			            <label>Flights to Rajshahi</label><br>
			            <label>Flights to Riyadh</label>
			        </div>
			    </div><br><br>

			    <h4>Flight Top International Destinations</h4><br>
			    <div class="newspaper2">
				    <div>
					    <label>Flights to Jeddah</label><br>
				     	<label>Flights to Dammam</label><br>
			            <label>Flights to Dubai</label>
			    	</div>
				    <div>
				       <label>Flights to Dammam</label><br>
				       <label>Flights to Al Madinah</label><br>
				       <label>Flights to Manama</label>			
			        </div>
				    <div>
				    	<label>Flights to Abu Dhabi</label><br>
				        <label>Flights to Doha</label><br>
				        <label>Flights to Sharjah</label>					
			    	</div>
		        </div><br><br>

		        <h4>Flights To Top Countries</h4><br>
		        <div class="newspaper2">
					<div>
						<label>Flights to Saudi Arabia</label><br>
						<label>Flights to Oman</label><br>
						<label>Flights to United Arab Emirates</label>
					</div>
					<div>
						<label>Flights to Kuwait</label><br>
						<label>Flights to India</label><br>
						<label>Flights to Qatar</label>
					</div>
					<div>
						<label>Flights to Bahrain</label><br>
						<label>Flights to Thailand</label><br>
						<label>Flights to Nepal</label>
					</div>
		        </div><br><br>
		    </div>
		</article>
	</main>

	<footer>
		<div class="newspaper">
				<div>
			        <label>COMPANY</label><br><br>
			        <label>About Wego</label><br><br>
			        <label>Press</label><br><br>
			        <label>Careers</label><br><br>
			        <label>Contact Us</label>
		       </div>
		       <div>
		        	<label>LEARN MORE</label><br><br>
			        <label>Cookie Consent</label><br><br>
			        <label>Affiliates</label><br><br>
			        <label>Advertise</label><br><br>
			       <label>Hoteliers</label>		
		       </div>
	           <div>
			       <label>EXPLOR</label><br><br>
			       <label>Airport Directory</label><br><br>
			       <label>Airline Directory</label><br><br>
			       <label>Flight Schedules</label><br><br>
			       <label>Hotel Chain</label>			
		       </div>
	   </div><br><br>
       <?php
           include('inc/footer.php');
        ?>	
	</footer>
</body>
</html>