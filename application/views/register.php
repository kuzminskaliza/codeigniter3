<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 4 CDN https://www.w3schools.com/bootstrap4/bootstrap_get_started.asp-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Register Form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Register Form</h3>

                <?= form_open_multipart('crud/addData'); ?>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= set_value('username', $arr->username ?? '') ?>">
                        <?= form_error('username') ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="<?= set_value('password', $arr->password ?? '') ?>">
                        <?= form_error('password') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" value="<?= set_value('name', $arr->name ?? '') ?>">
                        <?= form_error('name') ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= set_value('email', $arr->email ?? '') ?>">
                        <?= form_error('email') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="phone">Phone</label>
                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone Number" value="<?= set_value('phone', $arr->phone ?? '') ?>">
                        <?= form_error('phone') ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="language">Languages</label>
                        <select class="form-control" name="language" id="language">
                            <option value="">Select</option>
                            <option value="PHP" <?= set_select('language', 'PHP', ($arr->language ?? '') == 'PHP') ?>>PHP</option>
                            <option value="JAVA" <?= set_select('language', 'JAVA', ($arr->language ?? '') == 'JAVA') ?>>JAVA</option>
                            <option value="Python" <?= set_select('language', 'Python', ($arr->language ?? '') == 'Python') ?>>Python</option>
                        </select>
                        <?= form_error('language') ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" <?= set_radio('gender', 'Male', isset($arr->gender) && $arr->gender == 'Male') ?>>
                            <label class="form-check-label" for="genderMale">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" <?= set_radio('gender', 'Female', isset($arr->gender) && $arr->gender == 'Female') ?>>
                            <label class="form-check-label" for="genderFemale">Female</label>
                        </div>
                        <?= form_error('gender') ?>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Qualification</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="qualification[]" value="BCA" <?= set_checkbox('qualification[]', 'BCA', in_array('BCA', explode(',', $arr->qualification ?? ''))) ?>>
                            <label class="form-check-label" for="qualificationBCA">BCA</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="qualification[]" value="MCA" <?= set_checkbox('qualification[]', 'MCA', in_array('MCA', explode(',', $arr->qualification ?? ''))) ?>>
                            <label class="form-check-label" for="qualificationMCA">MCA</label>
                        </div>
                        <?= form_error('qualification[]') ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="<?= base_url('home/login') ?>">Login here</a>.</p>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</body>
</html>
