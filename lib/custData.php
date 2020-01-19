<?php
	class custData
	{
		public $host=DB_HOST;
		public $user=DB_USER;
		public $pass=DB_PASS;
		public $dbname=DB_NAME;

		public $link;
		public $error;

		public function __construct()
		{
			$this->connect();
		}

		public function connect()
		{
			$this->link= new mysqli($this->host, $this->user, $this->pass, $this->dbname);
			if (!$this->link)
			{
				$this->error="Connection Failed".$this->link->connect_error;
			}
		}

		public function select($query)
		{
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if ($result->num_rows>0)
			{
				return $result;
			}
			else
			{
				return false;
			}
		}

		public function insert($query) {

			$insert=$this->link->query($query) or die($this->link->error.__LINE__);
			if ($insert)
			{
				return $insert;
			}
			else
			{
				return false;
			}
		}


		public function delete($query) {

			$delete=$this->link->query($query) or die($this->link->error.__LINE__);
			if ($delete) {
				return $delete;
			} else {

				return false;
			}
		}	

		public function update($query) 
		{
			$update=$this->link->query($query) or die($this->link->error.__LINE__);
			if ($update) {
				return $update;
			} else {

				return false;
			}
		}


		public function download($query)
		{
			$download=$this->link->query($query) or die($this->link->error.__LINE__);
			if ($download)
			{
				return $download;
			}
			 else
			{ 
				return false;
			}
		}



	}



 ?>