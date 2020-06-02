<?php

class MainModel extends CI_Model {

public function insert_row($table,$data)
{
$this->db->insert($table,$data);
return $this->db->insert_id();
}
public function get_row($table,$where)
{
return $this->db->where($where)->get($table)->row_array();

}
public function get_result($table,$where,$orderby='')
{
return $this->db->where($where)->order_by($orderby)->get($table)->result_array();

}
public function get_result_asc($table,$where)
{
return $this->db->where($where)->order_by('id','asc')->get($table)->result_array();
}
public function get_result_desc($table,$where)
{
return $this->db->where($where)->order_by('id','desc')->get($table)->result_array();
}
public function update_row($table,$where,$data)
{
if($this->db->where($where)->update($table,$data))
{
return true;
}
return false;
}
public function delete_row($table,$where)
{
if($this->db->where($where)->delete($table))
{
return true;
}
return false;
}
public function custom_query($query)
{
return $this->db->query($query)->result_array();
}
public function custom_query_row($query)
{
return $this->db->query($query)->row_array();
}
public function custom_query_num_row($query)
{
return $this->db->query($query)->num_rows();
}

}

