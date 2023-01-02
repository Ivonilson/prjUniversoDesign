<?php
class Conn
{

	public static $host = "localhost";
	public static $user = "root";
	public static $pass = "";
	public static $dbName = "abgsol79_universo_design";

	private static $Connect = null;

	private static function Conectar()
	{
		try {
			if (self::$Connect == null) :
				self::$Connect = new PDO('mysql:host=' . self::$host . '; dbname=' . self::$dbName . '; charset=utf8', self::$user, self::$pass);
			endif;
		} catch (Exception $ex) {
			echo 'Mensagem: ' . $ex->getMessage();
			die;
		}
		return self::$Connect;
	}

	public function getConn()
	{
		return self::Conectar();
	}

	public function validarUsuario()
	{
		$u = filter_input(INPUT_POST, 'usuario');
		$p = crypt(filter_input(INPUT_POST, 'senha'), 'administrador');

		try {

			$retorno = self::Conectar()->query("SELECT user, pass FROM tbl_user WHERE user = '$u' AND pass = '$p'");

			$resultado = $retorno->fetchAll(PDO::FETCH_OBJ);
			return $resultado;
		} catch (PDOException $erro) {
			echo "ERRO: " . $erro->getMessage();
		}
	}
}

?>
