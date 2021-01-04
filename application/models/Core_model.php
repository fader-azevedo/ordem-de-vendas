<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Core_model extends CI_Model{


	public function get_all($table=null, $condition=null){

		if($table){
			if(is_array($condition)){
				$this->db->where($condition);
			}
			return $this->db->get($table)->result();
		}else{
			return false;
		}
	}

	public function get_by_id($table = null, $condition = null){
		if($table && is_array($condition)){
			$this->db->where($condition);
			$this->db->limit(1);

			return $this->db->get($table)->row();
		}else{
			return false;
		}
	}

	public function insert($table = null, $data = null, $last = null){

		if($table && is_array($data)){
			$this->db->insert($table,$data);

			if($last){
				$this->session->set_userdata('last_id',$this->db->insert_id());
			}

			if($this->db->affected_rows() > 0){
				$this->session->set_flashdata('success','data saved');
			}else{
				$this->session->set_flashdata('error','error when try save data');
			}
		}
	}

	public function update($table = null, $data = null, $condition = null){
		if($table && is_array($data) && is_array($condition)){

			if($this->db->update($table,$data,$condition)){
				$this->session->set_flashdata('success','data updated');
			}else{
				$this->session->set_flashdata('error','error when try update');
			}
		}
	}

	public function delete($table, $condition){
		$this->db->db_debug = false;
		if($table && is_array($condition)){
			$status = $this->db->delete($table, $condition);
			$error = $this->db->error();

			if(!$status){
				foreach ($error as $code){
					if($code == 1451){
						$this->session->set_flashdata('error','this object is used in other table');
					}
				}
			}else{
				$this->session->set_flashdata('success','object deleted');
			}
			$this->db->db_debug = true;
			return true;
		}else{
			return false;
		}
	}
}

