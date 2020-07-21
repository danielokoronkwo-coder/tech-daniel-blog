@extends('layouts.app')
@section('content')
<div class="signup-form">
    <form action="/examples/actions/confirmation.php" method="post">
		<h2>Contact Us</h2>
		<p class="hint-text">Encountering Any Difficulty? Send Us a Message</p>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <textarea name="message" id="contact-message" cols="46" rows="10">Your Message...</textarea>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
        </div>
    </form>
</div>
@endsection