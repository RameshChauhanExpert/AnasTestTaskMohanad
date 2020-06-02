<?php
if (! defined('BASEPATH')) exit('No direct script access allowed');
if (! function_exists('GetForeignKey')) {
    function GetForeignKey($table,$where_col,$where_id,$fetch_col)
    {     
       $ci = get_instance(); 
       $query = $ci->db->select($fetch_col)->where($where_col,$where_id)->get($table);
       $result = $query->row_array();
       return $result[$fetch_col];
    }
} 
if (! function_exists('GetForeignKeyRow')) {
    function GetForeignKeyRow($table,$where_col,$where_id)
    {     
       $ci = get_instance(); 
       $query = $ci->db->select('*')->where($where_col,$where_id)->get($table);
       $result = $query->row_array();
       return $result;
    }
}  
if (! function_exists('GetForeignKeyRows')) {
    function GetForeignKeyRows($table,$where_col,$where_id)
    {     // get main CodeIgniter object
        $ci = get_instance();    
        // Write your logic as per requirement
       $query = $ci->db->select('*')->where($where_col,$where_id)->order_by('id','ASC')->get($table);
       $result = $query->result_array();
       return $result;
    }
} 

if (! function_exists('GetFeaturedCategories')) {
    function GetFeaturedCategories()
    {      
       $ci = get_instance();       
       $query = $ci->db->select('*')->where('featured','1')->order_by('id','ASC')->get('categories');
       $result = $query->result_array();
       return $result;
    }
} 

?>