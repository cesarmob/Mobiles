<?php
ob_start();
session_start();
$pagetitle = "Login";
include 'config/init.php';

if (isset($_SESSION['user'])) {

    redirect('index.php', 'welcome user');
}

?>

<div class="py-4 bg-secondary text-white text-center">
		<h3> Login Form </h3>
</div>
<div class="py-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 shadow-blur">
					<div class="card shadow-sm">
						<div class="card-header">
							<h4>Login</h4>
						</div>
						<div class="card-body">
							<?php echo alertMsg(); ?>
							<form action="login-code.php" method="POST" enctype="">
								<div class="mb-3">
									<label for="email">Email</label> <br/>
									<input
												class="form-control"
												type="email"
												name="email"
												id="email"
												onfocus="this.placeholder=''"
												onblur="this.placeholder='example@company.eg'"
												placeholder="example@company.eg"
												autocomplete="off"
									/>
								</div>
								<div class="mb-3">
									<label for="email">Password</label> <br/>
									<input
												class="form-control"
												type="password"
												name="pass"
												id="pass"
												onfocus="this.placeholder=''"
												onblur="this.placeholder='Secret Password'"
												placeholder="Secret Password"
												autocomplete="new-password"
									/>
								</div>
								<div class="mb-3">
									<button class="btn btn-primary w-100" type="submit" name="loginbtn"> Login </button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div
</div>
<? include ('includes/footer.php');?>
