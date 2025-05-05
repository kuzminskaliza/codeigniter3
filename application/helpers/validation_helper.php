<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @param bool $is_add
 * @return void
 */
function setCustomValidationRules(bool $is_add)
{
    /** @var CodeIgniterInstance|CI_Controller $CI */
	$CI =& get_instance();

	$CI->form_validation->set_error_delimiters('<div class="text-danger mt-1 mb-3">', '</div>');

	$CI->form_validation->set_rules(
		'username',
		'Username',
		'required|trim|regex_match[/^\S+$/]|checkUsernameAvailable'
	);

	$CI->form_validation->set_rules(
		'name',
		'Full name',
		'required|trim'
	);

	$CI->form_validation->set_rules(
		'email',
		'Email',
		'required|trim|valid_email'
	);

	$CI->form_validation->set_rules(
		'phone',
		'Phone',
		'required|trim'
	);

	$CI->form_validation->set_rules(
		'language',
		'Language',
		'required|trim'
	);

	$CI->form_validation->set_rules(
		'gender',
		'Gender',
		'required'
	);

	$CI->form_validation->set_rules(
		'qualification[]',
		'Qualification',
		'required'
	);

}

/**
 * @param string $username
 * @return bool
 */
function checkUsernameAvailable(string $username): bool
{
    /** @var CodeIgniterInstance|CI_Controller $CI */
	$CI =& get_instance();
	$user_id = $CI->session->userdata('user_id');

	if ($user_id) {
		$currentUser = $CI->crudRepository->getData($user_id);
		if ($currentUser && $currentUser->username === $username) {
			return true;
		}
	}

	$existingUser = $CI->crudRepository->getUserByUsername($username);

	if ($existingUser && (!$user_id || $existingUser->id != $user_id)) {
		$CI->form_validation->set_message('checkUsernameAvailable', 'The username is already taken.');
		return false;
	}
	return true;
}
