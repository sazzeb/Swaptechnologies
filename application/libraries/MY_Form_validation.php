<?php 
	/**
	* 
	*/
	class MY_Form_validation extends CI_Form_validation
	{
		public $CI;

		//this is to make the is_unique function to work very well
		public function is_unique($str, $field)
		{
		    sscanf($field, '%[^.].%[^.]', $table, $field);
		    return is_object($this->CI->db)
		        ? ($this->CI->db->limit(1)->get_where($table, array($field => $str))->num_rows() === 0)
		        : FALSE;
		}
	}
 ?>