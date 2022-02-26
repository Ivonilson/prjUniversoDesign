<?php 

class Conn {
	
	public static $host = "localhost";
	public static $user = "root";
	public static $pass = "";
	public static $dbName = "universo_design";
	
	private static $Connect = null;

	private static function Conectar()
	{
		try {
			if(self::$Connect == null):
				self::$Connect = new PDO('mysql:host=' .self::$host .'; dbname='.self::$dbName.'; charset=utf8', self::$user, self::$pass);
			endif;
		} catch (Exception $ex) {
			echo 'Mensagem: '. $ex->getMessage();
			die;
		}
		return self::$Connect;
	}

	public function getConn() 
	{
		return self::Conectar();
	}

}

?>