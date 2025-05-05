<h3 class="">Change Password</h3>
<div class="container">

	<?php if ($this->session->flashdata('errorMsg')): ?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong><?= $this->session->flashdata('errorMsg'); ?></strong>
		</div>
	<?php endif; ?>


	<div class="row justify-content-center mt-5">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('crud/passwordVerify') ?>" method="post">
						<div class="form-group">
							<label for="email">Username:</label>
							<input type="username" id="username" name="username" class="form-control" value=
							"<?= set_value('username', $arr->username ?? '') ?>" disabled="disabled">
							<input type="hidden" name="username"
								   value="<?= set_value('username', $arr->username ?? '') ?>">

						</div>
						<div class="form-group">
							<label for="password">New Password:</label>
							<input type="password" id="password" name="password" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="confirm_password">Confirm New Password:</label>
							<input type="password" id="confirm_password" name="confirm_password" class="form-control"
								   required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Reset Password</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

