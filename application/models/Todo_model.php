<?php 

class Todo_model extends CI_Model
{
    private $tb = 'todoo';

    public function ambilTodoByParams($params, $user = '')
    {   
        $table = $this->tb;
        $this->db->select('id_todoo, title, slug, info, nickname, full_name, todoo.id_access, access, todoo.id_status, status, date_created, date_finished');
        $this->db->join('user', "user.id = $table.id_user");
        $this->db->join('access', "access.id_access = $table.id_access");
        $this->db->join('status', "status.id_status = $table.id_status");
        return $this->db->where("$table.$params[0]", $params[1])
                        ->where('nickname', $user)
                        ->order_by('id_todoo', 'DESC')
                        ->get($table)
                        ->result_array();

        
        
    }

    public function getDetailsTodoo($slug, $user)
    {
        $table = $this->tb;
        $this->db->select('id_todoo, title, slug, info, nickname, full_name, todoo.id_access, access, todoo.id_status, status, date_created, date_finished');
        $this->db->join('user', "user.id = $table.id_user");
        $this->db->join('access', "access.id_access = $table.id_access");
        $this->db->join('status', "status.id_status = $table.id_status");
        return $this->db->where('slug', $slug)
            ->where('nickname', $user)
            ->get($table)
            ->row_array();
    }

    public function getAllPublicTodo()
    {
        $table = $this->tb;
        $this->db->select('id_todoo, title, slug, info, nickname, full_name, todoo.id_access, access, todoo.id_status, status, date_created, date_finished');
        $this->db->join('user', "user.id = $table.id_user");
        $this->db->join('access', "access.id_access = $table.id_access");
        $this->db->join('status', "status.id_status = $table.id_status");
        return $this->db->where("$table.id_access", 2)
            ->order_by('id_todoo', 'DESC')
            ->get($table)
            ->result_array();
    }

}