<?php ?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    const baseUrl = "<?= base_url() ?>";
</script>
<script src="/assets/js/main.js"></script>
<style>
    td[rowspan="2"] {
        vertical-align: middle !important;
    }
    tr, td{
        cursor: pointer;
    }
</style>
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
		<table class="table table-bordered text-center">
			<tr class="bg-info">
				<th>ID</th>
				<th style="max-width: 100px;">Full Name/Email</th>
				<th>Username</th>
				<th>Gender</th>
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
                    <tr class="user-row" data-id="<?= $value->id ?>"
                        data-email="<?= $value->email ?>"
                        data-phone="<?= $value->phone ?>"
                        data-language="<?= $value->language ?>"
                        data-qualification="<?= $value->qualification ?>">
                        <td style="width: 50px;"><?= ++$key ?></td>
                        <td style="width: 200px;"><?= $value->name ?></td>
                        <td><?= $value->username ?></td>
                        <td><?= $value->gender ?></td>
                        <td><?= $status ?></td>
						<td style="white-space: nowrap;"><?= $value->added_on ?></td>
						<td style="width: 130px;">
							<a href="resetPassword/<?= $value->id ?>"
							   class="btn btn-secondary btn-sm">
								<i class="fas fa-lock"></i>Password</a></td>
						<td style="width: 130px;">
                            <a href="getData/<?= $value->id ?>"
							   class="btn btn-warning btn-sm">
								<i class="fas fa-edit"></i>Update</a></td>
						<td style="width: 130px;">
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


