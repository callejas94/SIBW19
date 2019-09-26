<?php
class Input {
	static $errors = true;

  static function check($arr, $on = false) {
    if ($on === false) {
      $on = $_REQUEST;
    }
    foreach ($arr as $value) {
      if (empty($on[$value])) {
        self::throwError('Faltan datos en el formulario', 900);
      }
    }
  }

  static function validateInt($val) {
		$val = filter_var($val, FILTER_VALIDATE_INT);
		if ($val === false) {
			self::throwError('Entero no valido', 901);
		}
		return $val;
	}

  static function validateStr($val) {
		if (!is_string($val)) {
			self::throwError('String no valido', 902);
		}
		$val = trim(htmlspecialchars($val));
		return $val;
	}

  static function validateEmail($val) {
		$val = filter_var($val, FILTER_VALIDATE_EMAIL);
		if ($val === false) {
			self::throwError('Email no valido', 903);
		}
		return $val;
	}

	static function validateUrl($val) {
		$val = filter_var($val, FILTER_VALIDATE_URL);
		if ($val === false) {
			self::throwError('URL no valida', 904);
		}
		return $val;
	}

	static function validateDate($val) {
		$val = Input::validateStr($val);
		$val = date('Y-m-d H:i', strtotime($val));
		
		if ($val === false) {
			self::throwError('Fecha no valida', 905);
		}
		return $val;
	}

	

	static function throwError($error = 'Error en Procesar', $errorCode = 0) {
		if (self::$errors === true) {
			throw new Exception($error, $errorCode);
		}
	}
}
?>
