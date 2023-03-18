<?
class Connect{
    private $host = "localhost";
	private $userName = "smv_user";
	private $password = "203752";
	private $dbName = "smv_bd";
	public $connect;

	public function getConnection() {
		$this->connect = mysqli_connect($this->host,$this->userName,$this->password,$this->dbName);
		if(!$this->connect){
			die("Ошибка подключения к БД: \n".mysqli_connect_error());
		} else {
			return $this->connect;
		}
	}
}