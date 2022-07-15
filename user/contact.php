<?php
session_start();

$_SESSION;

include ('https://github.com/Leord11/Hotel-Booking/blob/main/config/db.php');
include('https://github.com/Leord11/Hotel-Booking/blob/main/functions.php');

$user_data = check_login($conn);
check_role_user($_SESSION['role']);

if(isset($_POST['submit'])){

	$first_name = mysqli_real_escape_string($conn,$_POST['first_name']);
	$last_name = mysqli_real_escape_string($conn,$_POST['last_name']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$subject = mysqli_real_escape_string($conn,$_POST['subject']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);
	$sql = "INSERT INTO messages (first_name, last_name, email, subject, message)
			VALUES ('$first_name','$last_name','$email','$subject','$message')";

	if(mysqli_query($conn,$sql)) {
		$_SESSION['msg'] = "Successfully sent";

		mysqli_free_result($sql);
		mysqli_close($conn);
		header('Location: ../user/contact.php');
	}	else {
		echo 'query error' . mysqli_error($conn);
	}	
}

?>


<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Hotel</title>
  
    <script src="../js/script.js" defer></script>
    <script src="../js/scroll.js" defer></script>
    

    <link rel="stylesheet" href="../css/style-contact.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/active.css">

</head>
<body>

<div class="container">
        <nav class="navbar">
            <div class="brand-title">Luxury Suites</div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>
            <div class="navbar-links">
                <ul>
                    <li><a href="../user/index.php">Home</a></li>
                    <li><a href="../user/contact.php">Contacts</a></li>
                    <li><a href="../user/reservations.php">
                        Reservations</a></li>
                    <li><a href="../login.php">Logout</a></li>
                </ul>
            </div>
            
        </nav>
    </div> 
			<?php if(isset($_SESSION['msg'])): ?>
                <div class="message-container">
               
            	<div class="success-message">
                <h2><?php echo  $_SESSION['msg']; ?><a href="../close.php"> x</a></h2>
                
            	</div>
            	</div> 
            <?php endif; ?> 
    <section>
		
		<div class="title">
			<h1>Contact Us</h1>
			<p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil officia natus, adipisci cupiditate sint quibusdam velit possimus dignissimos nulla amet tempora.</p>
		</div>
		<div class="contact">
		<div class="contact-form">
				<form method="POST">
					<div class="row">
						<div class="input50">
							<input type="text" placeholder="First Name" name="first_name" value="<?php echo $user_data['firstname'];?>" readonly>
						</div>
						<div class="input50">
							<input type="text" placeholder="Last Name" name="last_name" value="<?php echo $user_data['lastname'];?>" readonly>
						</div>

					</div>
					<div class="row">
						<div class="input50">
							<input type="text" placeholder="Email" name="email" value="<?php echo $user_data['email'];?>" readonly>
						</div>
						<div class="input50">
							<input type="text" placeholder="Subject" name="subject">
						</div>

					</div>
					<div class="row">
						<div class="input100">
							<textarea placeholder="Message" name="message"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="input100">
							<input type="submit" value="Send" name="submit">
						</div>
					</div>
				</form>
			</div>

			<div class="contact-info">
				<div class="info-box">
					<img src="../img/address.png" class="contact-icon" alt="">
					<div class="details">
						<h4>Address</h4>
						<p>123 Test Drive, New York, USA</p>
					</div>
				</div>
				<div class="info-box">
					<img src="../img/email.png" class="contact-icon" alt="">
					<div class="details">
						<h4>Email</h4>
						<a href="mailto:anyone@example.com">anoyone@example.com</a>
						<a href="mailto:anyone@example.com">anoyone@example.com</a>
					</div>
				</div>
				<div class="info-box">
					<img src="../img/call.png" class="contact-icon" alt="">
					<div class="details">
						<h4>Call</h4>
						<a href="tel:+197855555">+1978 555 555</a>
						<a href="tel:+197855444">+1978 555 444</a>
					</div>
				</div>

			</div>
		</div>

	</section>


<script src="../js/nav-indicator.js" defer></script>

<?php include('../templates/footer.php'); ?>

</html>
