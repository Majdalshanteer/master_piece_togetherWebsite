@extends('pages.layout.master')


@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
        <style>
            .section {
	position: relative;
	height: 100vh;
}

.section .section-center {
	position: absolute;
	top: 50%;
	left: 0;
	right: 0;
	-webkit-transform: translateY(-50%);
	transform: translateY(-50%);
}

#booking {
	font-family: 'Alice', serif;
	background: rgba(133, 104, 73, 0.33);
}

.booking-form {
	position: relative;
	max-width: 912px;
	width: 100%;
	margin: auto;
	background: #fff;
	border-radius: 6px;
	-webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
	box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
}

.booking-form .booking-bg {
	position: absolute;
	left: 25px;
	top: -25px;
	bottom: -25px;
	width: 400px;
	background-image: url('../img/background.jpg');
	background-size: cover;
	background-position: center;
	padding: 25px;
	border-radius: 6px;
	-webkit-box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
	box-shadow: 0px 5px 10px -5px rgba(0, 0, 0, 0.1);
	overflow: hidden;
}

.booking-form .booking-bg::before {
	content: '';
	position: absolute;
	left: 0;
	right: 0;
	bottom: 0;
	top: 0;
	background: rgba(133, 104, 73, 0.78);
}

.booking-form>form {
	margin-left: 425px;
	padding: 30px;
}

.booking-form .form-header {
	margin-bottom: 30px;
	margin-top: 60px;
	position: relative;
	z-index: 20;
}

.booking-form .form-header h2 {
	font-family: 'Playfair Display', serif;
	margin-top: 0;
	margin-bottom: 15px;
	font-weight: 900;
	color: #fff;
	font-size: 42px;
	text-transform: capitalize;
}

.booking-form .form-header p {
	color: #fff;
	font-size: 18px;
}

.booking-form .form-group {
	position: relative;
	margin-bottom: 20px;
}

.booking-form .form-control {
	background-color: #fff;
	height: 45px;
	padding: 0px 15px;
	color: #151515;
	border: 1px solid #e5e5e5;
	font-size: 16px;
	font-weight: 700;
	-webkit-box-shadow: none;
	box-shadow: none;
	border-radius: 40px;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.booking-form .form-control::-webkit-input-placeholder {
	color: #e5e5e5;
}

.booking-form .form-control:-ms-input-placeholder {
	color: #e5e5e5;
}

.booking-form .form-control::placeholder {
	color: #e5e5e5;
}

.booking-form .form-control:focus {
	background: #f8f8f8;
}

.booking-form input[type="date"].form-control:invalid {
	color: #e5e5e5;
}

.booking-form select.form-control {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

.booking-form select.form-control:invalid {
	color: #e5e5e5;
}

.booking-form select.form-control option {
	color: #151515;
}

.booking-form select.form-control+.select-arrow {
	position: absolute;
	right: 3px;
	bottom: 5px;
	width: 32px;
	line-height: 32px;
	height: 32px;
	text-align: center;
	pointer-events: none;
	color: #e5e5e5;
	font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
	content: '\279C';
	display: block;
	-webkit-transform: rotate(90deg);
	transform: rotate(90deg);
}

.booking-form .form-label {
	color: #856849;
	text-transform: uppercase;
	line-height: 24px;
	height: 24px;
	font-size: 14px;
	font-weight: 400;
	margin-left: 20px;
}

.booking-form .form-btn {
	margin-top: 30px;
}

.booking-form .submit-btn {
	display: block;
	width: 100%;
	color: #fff;
	background-color: rgba(133, 104, 73, 0.9);
	font-weight: 700;
	font-size: 18px;
	border: none;
	border-radius: 40px;
	height: 55px;
	-webkit-transition: 0.2s all;
	transition: 0.2s all;
}

.booking-form .submit-btn:hover,
.booking-form .submit-btn:focus {
	background-color: rgba(133, 104, 73, 1);
}

@media only screen and (max-width: 768px) {
	.booking-form .booking-bg {
		position: relative;
		left: 0;
		right: 0;
		bottom: 0;
		top: -15px;
		width: 95%;
		margin: auto;
	}
	.booking-form>form {
		margin-left: 0px;
	}
}
        </style>
</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<div class="booking-bg">
							<div class="form-header">
								<h2>Make your reservation</h2>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate laboriosam numquam at</p>
							</div>
						</div>
						<form>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check In</span>
										<input class="form-control" type="date" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Check Out</span>
										<input class="form-control" type="date" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Adults</span>
										<select class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Children</span>
										<select class="form-control">
											<option>0</option>
											<option>1</option>
											<option>2</option>
										</select>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<span class="form-label">Room Type</span>
								<select class="form-control" required>
									<option value="" selected hidden>Select room type</option>
									<option>Private Room (1 to 2 People)</option>
									<option>Family Room (1 to 4 People)</option>
								</select>
								<span class="select-arrow"></span>
							</div>
							<div class="form-btn">
								<button class="submit-btn">Check availability</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
    
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>


   @endsection
