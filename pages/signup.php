<section id="signup-sec" ng-controller="signUpController">
	<div class="mid-box">
		<form id="signup-form" name="signupForm" ng-submit="onSignup($event.target)">
			<div class="container-fluid">
				<h5 align="center">Already have an Account? <a href="./login" class="bg-font">Log In</a></h5>
				<div class="space"></div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="fname" id="fnameid" class="form-control" placeholder="First Name..." required ng-model="fname">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="lname" id="lnameid" class="form-control" placeholder="Last Name..." required ng-model="lname">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="email" name="email" id="emailid" class="form-control" placeholder="Email..." required ng-model="email">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="email" name="cemail" id="cemailid" class="form-control" placeholder="Confirm Email..." required ng-model="cemail" ng-pattern="email">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="password" name="pass" id="passid" class="form-control" placeholder="Password..." required ng-model="password" ng-minlength="7" ng-maxlength="10">
							<small class="error" ng-show="signupForm.pass.$error.minlength">Min length 7</small>
							<small class="error" ng-show="signupForm.pass.$error.maxlength">
								Max length 10
							</small>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="password" name="cpass" id="cpassid" class="form-control" placeholder="Confirm Password..." required ng-model="cpassword" ng-pattern="password">
							<small class="error" ng-show="signupForm.cpass.$error.pattern">Password shoud match</small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<select id="professionid" name="profession" class="form-control" required ng-model="profession">
								<option>{{profession}}</option>
								<option ng-repeat="profession in professions">{{profession}}</option>
							</select>
							<small class="error" ng-show="signupForm.profession.$error.required">please select one option</small>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="mobno" id="mobnoid" class="form-control" placeholder="Mobile Number..." required ng-model="mobileno" ng-minlength="10" ng-maxlength="10" ng-pattern="regex">
							<small class="error" ng-show="signupForm.mobno.$error.maxlength">Maxlength  should be 10</small>
							<small class="error" ng-show="signupForm.mobno.$error.minlength">Minlength  should be 10</small>
							<small class="error" ng-show="signupForm.mobno.$error.pattern">Should have valid no</small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="con" id="conid" class="form-control" placeholder="Country..." required ng-model="country">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="form-group">
							<input type="text" name="city" id="cityid" class="form-control" placeholder="City..." required ng-model="city">
						</div>
					</div>
				</div>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="interest_check1" ng-model="isInterest">
				      I'm also intrested in publishing my work.
				    </label>
				</div>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="checkbox" class="form-check-input" name="interest_check2	" ng-model="emailMe">
				      Yes, email me with News &amp; Special offers from archue.com 
				    </label>
				</div>
				<div class="space"></div>
				<div class="signup-btn text-center">
					<button class="btn btn-lg bg-color text-white" ng-disabled="!signupForm.$valid">Signup</button>
				</div>	
			</div>
		</form>
	</div>
</section>
<?php include("../include/error-info.php"); ?>