<!DOCTYPE html>
<html>

	<head>
		<title>Twilio Form</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
	</head>

	<body>
		<div class="container my-5">
			<div class="row">
				<div class="col-lg-6 mx-auto">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title text-center">Send a Message</h5>
						</div>
						<div class="card-body">
							<form method="post">
								<div class="form-group">
									<label for="to">To:</label>
									<input type="text" class="form-control" name="to" id="to"
										placeholder="Enter receiver's phone number">
								</div>
								<div class="form-group">
									<label for="message">Message:</label>
									<textarea class="form-control" name="message" id="message"
										placeholder="Enter your message"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Send</button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Twilio PHP SDK -->
		<?php
		require_once __DIR__ . '/vendor/twilio-php-main/src/Twilio/autoload.php';
		use Twilio\Rest\Client;

		// Your Twilio Account SID and Auth Token from twilio.com/console
		$account_sid = 'ACe34b4d1a06505841d4cae39fac4e868e';
		$auth_token = '8d30b88e16771d03c0c2527e5eb1011a';
		// Set your Twilio phone number
		$twilio_number = '+15855221230';

		// Get the recipient's phone number from the form input
		$to_number = $_POST['to'];

		// Get the message from the form input
		$message = $_POST['message'];

		// Create a new Twilio client
		$client = new Client($account_sid, $auth_token);

		try {
			// Use the Twilio API to send an SMS message
			$message = $client->messages->create(
				$to_number,
				array(
					'from' => $twilio_number,
					'body' => $message
				)
			);

			// Print a success message if the SMS was sent successfully
			echo "Message sent successfully to " . $to_number . " (Message ID: " . $message->sid . ")";
		} catch (Exception $e) {
			// Print an error message if there was an error sending the SMS
			echo "Error sending SMS: " . $e->getMessage();
		}
		?>