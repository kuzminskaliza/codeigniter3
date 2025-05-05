<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Class DatabaseModel
 * @property CI_DB_query_builder $db
 */
class DatabaseModel extends CI_Model
{
    public function addData(array $query)
    {
        $this->db->insert('register', $query);
        return $this->db->insert_id();
    }

    // Method to update data in the 'register' table
    public function updateData($query)
    {
        return $this->db->where('id', $query['id'])->update('register', $query);
    }

    // Method to delete data from the 'register' table by ID
    public function deleteData($id)
    {
        return $this->db->where('id', $id)->delete('register');
    }

    // Method to retrieve all data from the 'register' table
    public function allData()
    {
        return $this->db->order_by('id', 'desc')->get('register')->result();
    }

    // Method to get data from the 'register' table by ID
    public function getData($id)
    {
        return $this->db->where('id', $id)->get('register')->row();
    }

    // Method to get user data by username from the 'register' table
    public function getUserByUsername($username)
    {
        return $this->db->where('username', $username)->get('register')->row();
    }

    // Method to reset password for a user in the 'register' table
    public function resetPassword($username, $password)
    {
        $this->db->set('password', $password);
        return $this->db->where('username', $username)->update('register');
    }

}

