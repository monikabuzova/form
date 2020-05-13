
<?php
	$msg = '';
	$msgClass = '';

	if(filter_has_var(INPUT_POST, 'submit')){

		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);
		if(!empty($email) && !empty($name) && !empty($message)){
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){

				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {

				$toEmail = 'monikabuzova95@gmail.com';
				$subject = 'Contact Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';


				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";


				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){

					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {

					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {

			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Coach G</title>
</head>
<body>
<div class="container">
<h1>Online Coaching Application</h1>
<br>
<p>Congratulations on taking the first step to starting your own personal finess journey! Please fill out the below form with as much information as possible and once you click submit you will be contacted within the next 24 hours. I really look forward to working with you and helping you achieve the body you want and know you deserve!</p>
<br>
</div>
<br>

<div class="container">
	<?php if($msg != ''): ?>
			<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
		<?php endif; ?>
  <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="text/plain" novalidate>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">First name *</label>
      <input type="text" class="form-control" name="name" id="validationCustom01" value="<?php echo isset($_POST['first_name']) ? $name : ''; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Last name *</label>
      <input type="text" class="form-control" name="last_name" id="validationCustom02" value="<?php echo isset($_POST['last_name']) ? $name : ''; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>

  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Phone *</label>
      <input type="text" class="form-control" name="phone"id="validationCustom03" value="<?php echo isset($_POST['phone']) ? $name : ''; ?>" required>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Email *</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="text" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" value="<?php echo isset($_POST['Email']) ? $name : ''; ?>"required>
        <div class="invalid-feedback">
          Please enter email.
        </div>
      </div>
    </div>
      </div>
      <div class="form-row mt-4">
    <div class="form-group">
<label for="exampleFormControlTextarea1">What are your personal fitness goals and aspirations right now? </label>
<textarea class="form-control rounded-0" name="message" id="exampleFormControlTextarea1" value="<?php echo isset($_POST['goals']) ? $name : ''; ?>" rows="5"></textarea>
</div>
</div>
<div class="form-row mt-4">
<div class="form-group">
<label for="exampleFormControlTextarea2">What has stoped you acheiving this in the past?
</label>
<textarea class="form-control rounded-0" name="stop"id="exampleFormControlTextarea2" rows="5"></textarea>
</div>
</div>

<div class="form-row mt-4">
<div class="form-group">
<label>Are you currently happy with how you look and how you feel right now?
 </label>
 <div class="form-check">
   <input type="checkbox" class="form-check-input" id="Yes2" >
   <label class="form-check-label" for="Yes2">Yes</label>
 </div>
 <div class="form-check">
   <input type="checkbox" class="form-check-input" id="No2" >
   <label class="form-check-label" for="No2">No</label>
 </div>
</div>
</div>
<div class="form-row mt-4">
<div class="form-group">
<label for="exampleFormControlTextarea4">How is it going to impact your life when you achieve the goal you have in mind?
</label>
<textarea class="form-control rounded-0" name="achieve" id="exampleFormControlTextarea4" rows="2"></textarea>
</div>
</div>
<div class="form-row mt-4">

<label>How would you describe your ability to weight train?
 </label>
 </div>
<div class="form-row">
 <div class="form-check form-check-inline">
   <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
   <label class="form-check-label" for="inlineCheckbox1">Beginner</label>
</div>
 <div class="form-check form-check-inline">
   <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
   <label class="form-check-label" for="inlineCheckbox2">Intermediate</label>
 <div class="form-check form-check-inline">
   </div>
   <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
   <label class="form-check-label" for="inlineCheckbox3">Advanced</label>
 </div>
 </div>
<div class="form-row mt-4">
<div class="form-group mt-4">
<label for="exampleFormControlTextarea1">Are you willing to financially invest in yourself to get the results you want?
 </label>
 <br>
 </div>
 </div>
 <div class="form-check">
   <input class="form-check-input" type="checkbox" name="Finance" value="Finance1" id="invalidCheck" required>
<label class="form-check-label" >
Yes, I understand investing in myself is the best thing I can do.
</label>
 </div>
 <div class="form-check">
   <input class="form-check-input" type="checkbox" name="Value" value="" id="invalidCheck1" required>
<label class="form-check-label" for="invalidCheck1">
Maybe, I have the funds but need to see if the value is right.
</label>
 </div>
 <div class="form-check">
   <input class="form-check-input" type="checkbox" name="No" value="No" id="invalidCheck2" required>
<label class="form-check-label" for="invalidCheck2">
No, I don't have the money right now.
</label>
 </div>
 <div class="form-row mt-4">
 <label>If answered yes to the abpve question, are you in a position to invest between 5 to 10 per day?
  </label>
  </div>

  <div class="form-row">
   <div class="form-check form-check-inline">
     <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option1">
     <label class="form-check-label" for="inlineCheckbox5">Yes</label>
   </div>
   <div class="form-check form-check-inline">
     <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option2">
     <label class="form-check-label" for="inlineCheckbox6">No</label>
   </div>
  </div>
  <div class="form-row mt-4">

  <label>How much of a priority is getting in shape to you right now?
   </label>
</div>

   <div class="form-check">
     <input class="form-check-input" type="checkbox" name="Priority" value="Priority" id="invalidCheck4" required>
  <label class="form-check-label" for="invalidCheck4">
  High Priority: I need to start working on myself immediately.
  </label>
   </div>
   <div class="form-check">
     <input class="form-check-input" type="checkbox" name="Work" value="Priority" id="invalidCheck5" required>
  <label class="form-check-label" for="invalidCheck5">
  Low Priority: This isn’t a priority, and i’m happy to go at my own pace.
  </label>
   </div>
   <div class="form-row">
 <div class="form-group mt-4">
<label for="exampleFormControlTextarea9">I am very selective of who I work with, what makes you think you would be a good client? </label>
<textarea class="form-control rounded-0" id="exampleFormControlTextarea9" rows="5"></textarea>
</div>
</div>

<div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck8" required>
      <label class="form-check-label" for="invalidCheck8">
        Agree to terms and conditions
      </label>
      </div>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
  </form>

  <button class="btn btn-primary"name="SubmitFormBtn" type="submit">Submit form</button>
</div>
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {

    var forms = document.getElementsByClassName('needs-validation');

    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
<?php
if (isset($_POST['SubmitFormBtn'])) {
  echo "Hello world";
}
?>
</script>


  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
