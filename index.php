<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="css/style1.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container contact">
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image" />
				<h2>Contact Us</h2>
				<h4>We would love to hear from you !</h4>
			</div>
		</div>

		<div class="col-md-9">
			<form action="submitdata.php" method="post" enctype="multipart/form-data">
				<div class="contact-form">
					<div class="form-group">
						<label class="control-label col-sm-2 requiredField" for="fname">First Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Enter First Name" name="fname">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2 requiredField" for="lname">Last Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Enter Last Name" name="lname">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2 requiredField" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control"  placeholder="Enter email" name="email">
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="control-label col-sm-2" for="email">Image:</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="img" placeholder="choose img" name="img">
						</div>
					</div> -->

					<div class="form-group">
						<label class="control-label col-sm-2 requiredField" for="email">File:</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" placeholder="choose file" name="user_file">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2 requiredField" for="comment">Comment:</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" name="comment"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">Submit</button>
							<a role ="button" class="btn btn-info" href="view_contact.php">All Contact</a>
						</div>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>