<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class CrudRepository
 * @property DatabaseModel $databaseModel
 * @property ViewHandler $viewHandler
 * @property CI_Loader $load
 * @property CI_Session $session
 */
class CrudRepository extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('databaseModel');
        $this->load->model('viewHandler');
    }

    public function addData($post)
    {
        $post['added_on'] = date('d M, Y');
        $post['status'] = 1;

        $dbId = $this->databaseModel->addData($post);
        if ($dbId) {
            $this->session->set_userdata('full_name', $post['name']);
            $this->session->set_userdata('login_id', $dbId);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_flashdata('successMsg', 'Data has been inserted Sucessfully');
            redirect($this->viewHandler->getRedirect('allData'));
        } else {
            log_message('error', 'Data insertion problem');
        }
    }

    public function updateData($post)
    {
        $post['updated_on'] = date('Y-m-d h:i:s');
        if ($this->session->userdata('login_id') == $this->session->userdata('user_id')) {
            $this->session->set_userdata('full_name', $post['name']);
        }

        $post['id'] = $this->session->userdata('user_id');
        $this->session->unset_userdata('user_id');
        $result = $this->databaseModel->updateData($post);
        if ($result) {
            $this->session->set_flashdata('successMsg', 'Data has been updated Sucessfully');
            redirect($this->viewHandler->getRedirect('allData'));
        }
    }

    public function login($username, $password)
    {
        $user = $this->getUserByUsername($username);
        if ($user && password_verify($password, $user->password) && $user->status == '1') {
            $this->session->set_userdata('login_id', $user->id);
            $this->session->set_userdata('full_name', $user->name);
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_flashdata('successMsg', 'Login successful!');
            redirect($this->viewHandler->getRedirect('allData'));
        } else {
            $this->session->set_flashdata('errorMsg', 'Invalid username or password.');
            log_message('error', 'Login failed for username: ' . $username);
            $this->load->view($this->viewHandler->getView('login'));
        }
    }

    public function deleteData($id)
    {
        $result = $this->databaseModel->deleteData($id);
        if ($result) {
            $this->session->set_flashdata('deleteMsg', 'Data has been deleted Sucessfully');
            redirect($this->viewHandler->getRedirect('allData'));
        }
    }

    public function resetPassword($username, $password)
    {
        $result = $this->databaseModel->resetPassword($username, $password);

        if ($result) {
            $this->session->set_flashdata('successMsg', 'Password has been updated Sucessfully');
            redirect($this->viewHandler->getRedirect('allData'));
        }
    }

    public function getData($id)
    {
        return $this->databaseModel->getData($id);
    }

    public function allData()
    {
        return $this->databaseModel->allData();
    }

    public function getUserByUsername($username)
    {
        return $this->databaseModel->getUserByUsername($username);
    }
}
