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

    public function updateData($query)
    {
        return $this->db->where('id', $query['id'])->update('register', $query);
    }

    public function deleteData($id)
    {
        return $this->db->where('id', $id)->delete('register');
    }

    public function allData()
    {
        return $this->db->order_by('id', 'desc')->get('register')->result();
    }

    public function getData($id)
    {
        return $this->db->where('id', $id)->get('register')->row();
    }

    public function getUserByUsername($username)
    {
        return $this->db->where('username', $username)->get('register')->row();
    }

    public function resetPassword($username, $password)
    {
        $this->db->set('password', $password);
        return $this->db->where('username', $username)->update('register');
    }

}

