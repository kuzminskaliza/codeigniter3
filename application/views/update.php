<?php ?>
<section class="content-header">
	<h3 style="align-items: center">Update Form</h3>
	<div class="container mt-5">
		<div class="card">
			<div class="card-body">
				<?php
				if (!empty($arr->id)) {
					$this->session->set_userdata('user_id', $arr->id);
					echo form_open_multipart('crud/updateData');
				}
				?>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="username">Username</label>
						<input type="text" name="username" class="form-control" id="username" placeholder="Username"
							   value="<?= set_value('username', $arr->username ?? '') ?>">
						<?= form_error('username') ?>
					</div>

					<div class="form-group col-md-6">
						<label for="status">Status</label>
						<select class="form-control" name="status" id="status">
							<option value="0" <?= set_select('status', '0', $arr->status == '0') ?>>Deactive</option>
							<option value="1" <?= set_select('status', '1', $arr->status == '1') ?>>Active</option>
						</select>
						<?= form_error('status') ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="name">Full Name</label>
						<input type="text" name="name" class="form-control" id="name" placeholder="Full Name"
							   value="<?= set_value('name', $arr->name ?? '') ?>">
						<?= form_error('name') ?>
					</div>

					<div class="form-group col-md-6">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" id="email" placeholder="Email"
							   value="<?= set_value('email', $arr->email ?? '') ?>">
						<?= form_error('email') ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="phone">Phone</label>
						<input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number"
							   value="<?= set_value('phone', $arr->phone ?? '') ?>">
						<?= form_error('phone') ?>
					</div>

					<div class="form-group col-md-6">
						<label for="language">Languages</label>
						<select class="form-control" name="language" id="language">
							<option value="">Select</option>
							<option value="PHP" <?= set_select('language', 'PHP', ($arr->language ?? '') == 'PHP') ?>>
								PHP
							</option>
							<option
								value="JAVA" <?= set_select('language', 'JAVA', ($arr->language ?? '') == 'JAVA') ?>>
								JAVA
							</option>
							<option
								value="Python" <?= set_select('language', 'Python', ($arr->language ?? '') == 'Python') ?>>
								Python
							</option>
						</select>
						<?= form_error('language') ?>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-6">
						<label>Gender</label>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="genderMale"
								   value="Male" <?= set_radio('gender', 'Male', isset($arr->gender) && $arr->gender == 'Male') ?>>
							<label class="form-check-label" for="genderMale">Male</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="gender" id="genderFemale"
								   value="Female" <?= set_radio('gender', 'Female', isset($arr->gender) && $arr->gender == 'Female') ?>>
							<label class="form-check-label" for="genderFemale">Female</label>
						</div>
						<?= form_error('gender') ?>
					</div>

					<div class="form-group col-md-6">
						<label>Qualification</label>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="qualification[]"
								   value="BCA" <?= set_checkbox('qualification[]', 'BCA', in_array('BCA', explode(',', $arr->qualification ?? ''))) ?>>
							<label class="form-check-label" for="qualificationBCA">BCA</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="qualification[]"
								   value="MCA" <?= set_checkbox('qualification[]', 'MCA', in_array('MCA', explode(',', $arr->qualification ?? ''))) ?>>
							<label class="form-check-label" for="qualificationMCA">MCA</label>
						</div>
						<?= form_error('qualification[]') ?>
					</div>
				</div>

				<button type="submit" class="btn btn-info">Submit</button>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</section>
