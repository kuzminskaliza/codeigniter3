<?php ?>
<section class="content-header">

	<?php foreach (['successMsg' => 'success', 'deleteMsg' => 'danger'] as $msg => $type): ?>
		<?php if ($this->session->flashdata($msg)): ?>
			<div class="alert alert-<?= $type ?> alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong><?= $this->session->flashdata($msg); ?></strong>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>

	<h3 class="m-0">List of Users</h3>
	<div class="card-body p-0">
		<table class="table table-bordered">
			<tr class="bg-info">
				<th>ID</th>
				<th style="max-width: 100px;">Full Name</th>
				<th>Username</th>
				<th>Email/Phone</th>
				<th>Language</th>
				<th>Gender</th>
				<th>Qualification</th>
				<th>Status</th>
				<th>Added_On</th>
				<th colspan="3" class="text-center">Action</th>
			</tr>
			<?php if (!empty($arr)) {
				foreach ($arr as $key => $value) {
					if ($value->status == '1') {
						$status = '<span class="badge bg-success">Active</<span>';
					} else {
						$status = '<span class="badge bg-danger">Deactive</<span>';
					}

					?>
					<tr>
						<td><?= ++$key ?></td>
						<td><?= $value->name ?></td>
						<td><?= $value->username ?></td>
						<td>
							<?= $value->email ?>
							<br>
							<?= $value->phone ?>
						</td>
						<td><?= $value->language ?></td>
						<td><?= $value->gender ?></td>
						<td><?= $value->qualification ?></td>
						<td><?= $status ?></td>
						<td style="white-space: nowrap;"><?= $value->added_on ?></td>
						<td>
							<a href="resetPassword/<?= $value->id ?>"
							   class="btn btn-secondary btn-sm">
								<i class="fas fa-lock"></i>Password</a></td>
						<td><a href="getData/<?= $value->id ?>"
							   class="btn btn-warning btn-sm">
								<i class="fas fa-edit"></i>Update</a></td>
						<td>
							<a href="deleteData/<?= $value->id ?>"
							   class="btn btn-danger btn-sm"
							   onclick="return confirm('Are you sure you want to delete the article?')">
								<i class="fas fa-trash"></i>Delete</a>
						</td>
					</tr>
				<?php }
			} else { ?>
				<tr>
					<td colspan="11" class="text-center">No Record Found</td>
				</tr>
			<?php } ?>
		</table>
	</div>

</section>


