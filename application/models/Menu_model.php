<?php
	class menu_model extends CI_Model{

		function __construct() {
			parent::__construct();
		}

		public function getallmenus() {
			$sql = "SELECT * FROM menu";
			$sql .= " ORDER BY sequence";

			$query = $this->db->query($sql);
			$result_data = $query->result_array();

			return $result_data;
		}

		public function getmenu($id)
		{
			$sql = "SELECT * FROM menu";
			$sql .= " WHERE id = '$id' ";
			$sql.= " ORDER BY sequence";

			$query = $this->db->query($sql);
			$result_data = $query->row_array();

			return $result_data;
		}

		public function insertmenu()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'name_th' => $this->input->post('name_th'),
				'name_en' => $this->input->post('name_en'),
				'detail' => trim($this->input->post('detail')),
				'created_at' => time(),
			);

			$query = $this->db->insert('menu', $data);
			return $this->db->insert_id();
		}

		public function updatemenu()
		{
			$data = array(
				'name' => $this->input->post('name'),
				'name_th' => $this->input->post('name_th'),
				'name_en' => $this->input->post('name_en'),
				'detail' => trim($this->input->post('detail')),
				'updated_at' => time(),
			);

			$this->db->where('id', $this->input->post('id'));
			$query = $this->db->update('menu', $data);
			return TRUE;
		}

	public function deletemenu($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('menu');
		return TRUE;
	}
	}
