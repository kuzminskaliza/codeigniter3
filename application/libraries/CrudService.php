<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CrudService
{
    const USER_STATUS_ACTIVE = 1;
    const USER_STATUS_INACTIVE = 0;
    /** @var CodeIgniterInstance|CI_Controller $CS */
    protected $CS;

    public function __construct()
    {
        $this->CS =& get_instance();
        $this->CS->load->helper('validation');
        $this->CS->load->model('crudRepository');
        $this->CS->load->model('viewHandler');
        $this->CS->load->library('form_validation');
    }

    public function loadView()
    {
        $this->CS->load->view($this->CS->viewHandler->getView('login'));
    }

    public function register()
    {
        $this->CS->load->view($this->CS->viewHandler->getView('insert'));
    }

    public function addData()
    {
        setCustomValidationRules(true);
        if ($this->CS->form_validation->run()) {
            $post = $this->CS->input->post();
            $hashed_password = password_hash($post['password'], PASSWORD_DEFAULT);
            $post['password'] = $hashed_password;
            $post['qualification'] = isset($post['qualification']) ? implode(',', $post['qualification']) : '';

            $this->CS->crudRepository->addData($post);
        } else {
            log_message('error', 'Form validation failed.');
            $this->CS->load->view($this->CS->viewHandler->getView('insert'));
        }

    }

    public function allData()
    {
        if ($this->CS->session->userdata('logged_in')) {
            $data['arr'] = $this->CS->crudRepository->allData();

            $content = $this->CS->load->view($this->CS->viewHandler->getView('allData'), $data, true);

            $this->CS->load->view('header.php');
            $this->CS->load->view('content.php', ['content' => $content]);
            $this->CS->load->view('footer.php');
        } else {
            redirect($this->CS->viewHandler->getRedirect('login'));
        }
    }

    public function getData($id)
    {
        if ($id != '') {
            $data['arr'] = $this->CS->crudRepository->getData($id);
            $content = $this->CS->load->view($this->CS->viewHandler->getView('update'), $data, true);

            $this->CS->load->view('header.php');
            $this->CS->load->view('content.php', ['content' => $content]);
            $this->CS->load->view('footer.php');
        }
    }

    public function updateData()
    {
        setCustomValidationRules(false);
        if ($this->CS->form_validation->run()) {
            $post = $this->CS->input->post();
            $post['qualification'] = isset($post['qualification']) ? implode(',', $post['qualification']) : '';
            $this->CS->crudRepository->updateData($post);
        } else {
            log_message('error', 'Form validation failed.');
            $id = $this->CS->session->userdata('user_id');
            $this->CS->session->unset_userdata('user_id');
            $data['arr'] = $this->CS->crudRepository->getData($id);
            $this->CS->load->view($this->CS->viewHandler->getView('update'), $data);
        }
    }

    public function deleteData($id)
    {
        if ($this->CS->session->userdata('login_id') == $id) {
            log_message('error', 'Attempted to delete own record.');
            $this->CS->session->set_flashdata('deleteMsg', 'You cannot delete your own record.');
            redirect($this->CS->viewHandler->getRedirect('allData'));
        } else {
            $this->CS->crudRepository->deleteData($id);
        }
    }

    public function resetPassword($id)
    {
        if ($this->CS->session->userdata('logged_in')) {
            $data['arr'] = $this->CS->crudRepository->getData($id);
            $content = $this->CS->load->view($this->CS->viewHandler->getView('reset_password'), $data, true);
            $this->CS->load->view('header.php');
            $this->CS->load->view('content.php', ['content' => $content]);
            $this->CS->load->view('footer.php');
        } else {
            redirect($this->CS->viewHandler->getRedirect('login'));
        }
    }

    public function passwordVerify()
    {
        $data = $this->CS->input->post();

        if ($data['password'] === $data['confirm_password']) {
            log_message('info', 'Passwords match.');
            $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
            $username = $data['username'];
            $password = $hashed_password;

            $this->CS->crudRepository->resetPassword($username, $password);
        } else {
            log_message('error', 'Passwords do not match.');
            $this->CS->session->set_flashdata('errorMsg', 'Passwords do not match. Please try again.');
            $id = $this->CS->session->userdata('user_id');
            $this->resetPassword($id);
        }
    }

    public function login()
    {
        $post = $this->CS->input->post();
        if (empty($post)) {
            $this->CS->load->view($this->CS->viewHandler->getView('login'));
        } else {
            $this->CS->crudRepository->login($post['username'], $post['password']);
        }
    }

    public function logout()
    {
        log_message('debug', 'logout method called.');
        $this->CS->session->unset_userdata('login_id');
        $this->CS->session->unset_userdata('user_id');
        $this->CS->session->unset_userdata('full_name');
        $this->CS->session->unset_userdata('logged_in');
        redirect($this->CS->viewHandler->getRedirect('login'));
    }

    public function getUserAjax()
    {
        $id = $this->CS->input->post('id');

        if (!empty($id)) {
            $user = $this->CS->crudRepository->getData($id);
            header('Content-Type: application/json');
            echo json_encode([
                'email' => $user->email,
                'phone' => $user->phone,
                'language' => $user->language,
                'qualification' => explode(' , ', $user->qualification),
                'updated_on' => $user->updated_on,
            ]);
        } else {
            show_error('Missing user ID', 400);
        }
    }

    public function toggleStatus()
    {
        $id = $this->CS->input->post('id');
        try {
            if (empty($id)) {
                throw new Exception('Missing user ID');
            }
            $user = $this->CS->crudRepository->getData($id);

            if (!$user) {
                throw new Exception('User not found');
            }

            $newStatus = $user->status == self::USER_STATUS_ACTIVE ? self::USER_STATUS_INACTIVE : self::USER_STATUS_ACTIVE;

            if ($this->CS->crudRepository->updateUserStatus($id, $newStatus)) {
                $result = [
                    'success' => true,
                    'status' => $newStatus,
                ];
            } else {
                throw new Exception('Failed to update user status');
            }
        } catch (Exception $e) {
            $result = [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($result);

    }
}
