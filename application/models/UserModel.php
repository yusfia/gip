<?php
class UserModel extends CI_Model
{
    public function insert_data($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function delete_data($table, $where)
    {
	    return $this->db->delete($table, $where);
    }

    public function get_all_data($table)
	{
		return $this->db->get($table);
	}

    public function searchByName($name)
    {
        return $this->db->select('*')->from('user')->where("nama LIKE '%$name%'")->get();
    }
}