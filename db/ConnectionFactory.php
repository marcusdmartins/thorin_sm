<?php
class ConnectionFactory {
	private static $conn;
	public static function getConection() {
		try {
			if (is_null(self::$conn)) {
				self::$conn = new PDO('mysql:host=localhost;dbname=thorin_sm', "root", "");
				self::$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				return self::$conn;
			} else {
				return self::$conn;
			}
		} catch(PDOException $e) {
			echo 'ERROR: ' . $e -> getMessage();
		}
	}

}// fim da classe ConnectionFactory

