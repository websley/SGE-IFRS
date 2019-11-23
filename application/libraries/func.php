<?php

function echo_flush($str = null) {

	if ($str != null) echo $str.'<br/>';
	@ob_flush();
	@flush();
	
}

function pre($array, $exit = false) {
	
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	if ($exit) exit;
	
}

function is_date($str) {
		
	if (empty($str)) return false;
	
	$e = explode(' ', trim($str));
	if (strpos($e[0], '-') !== false)
		list($aa, $mm, $dd) = explode('-', $e[0]);
	else
		list($dd, $mm, $aa) = explode('/', $e[0]);
	
	return (checkdate($mm , $dd, $aa));
	
}

function date_us($str) {

	if (strpos($str, ' ') !== false) {
		list($date, $time) = explode(' ', $str);
		list($dd, $mm, $aa) = explode('/', $date);
		return $aa.'-'.$mm.'-'.$dd.' '.$time.':00';
	}
	else if (strpos($str, '/') !== false) {
		list($dd, $mm, $aa) = explode('/', $str);
		return $aa.'-'.$mm.'-'.$dd;
	}
	else {
		return $str;
	}

}

function date_br($str) {
	
	if (empty($str)) return '';
	
	@list($date, $time) = explode(' ', $str);
	list($aa, $mm, $dd) = explode('-', $date);
	$date = $dd.'/'.$mm.'/'.$aa;
	if (!empty($time)) $date .= ' '.substr($time, 0, 5);
	return $date;
	
}

function remove_accent($value) {

	$ret = "";
	$vetor_1 = array(192,193,194,195,196,197,199,200,201,202,203,204,205,206,207,210,211,212,213,214,217,218,219,220,224,225,226,227,228,229,231,232,233,234,235,236,237,238,239,242,243,244,245,246,249,250,251,252);
	$vetor_2 = array("A","A","A","A","A","A","C","E","E","E","E","I","I","I","I","O","O","O","O","O","U","U","U","U","a","a","a","a","a","a","c","e","e","e","e","i","i","i","i","o","o","o","o","o","u","u","u","u");
	for ($cont=0;$cont <= (strlen($value)-1);$cont++) {
		$ord = ord($value[$cont]);
		if (($ord<32) or ($ord>126)) {
			$varx = "";
			for ($contj=0;$contj <= (count($vetor_1));$contj++) {
				if ($ord == @$vetor_1[$contj])
					$varx = $vetor_2[$contj];
			}
			$ret .= $varx;
		}
		else
			$ret .= $value[$cont];
	}
	return $ret;
	
}

function array_to_json_chart($array, $legenda = false) {
	
	if (!sizeof($array) || sizeof($array) > 200) return json_encode(array());
	
	$colunas = array_keys(current($array));
	
	if ($legenda) {
		$new = array();
		foreach ($colunas as $key => $coluna) {
			$new[] = $coluna;
			if ($key) {
				$new[] = "{ role: 'annotation' }";
			}
		}
		$colunas = $new;
	}
	
	$new = array();
	$new[] = $colunas;
	foreach ($array as $a) {
		
		$n = array_values($a);

		$nn = array();
		foreach ($n as $k => $v) {
			if ($k) {
				$nn[] = (int)$n[$k];
				if ($legenda) {
					$nn[] = ''.$n[$k].'';
				}
			}
			else {
				$nn[] = $n[$k];
			}
		}
		
		$new[] = $nn;
		
	}
	
	$json = json_encode($new);
	
	if ($legenda) {
		$json = str_replace('"{ role: \'annotation\' }"', '{ role: \'annotation\' }', $json);
	}
	
	return $json;
	
}

function download($filename, $force = true) {

	if (file_exists($filename)) {
		
		echo filesize($filename);
		echo $filename;
		
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Cache-Control: private", false);
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ". filesize($filename));
		//download
		//header('Content-Type: application/octet-stream'); 
		header('Content-Type: application/pdf');

		if ($force) {
			//download
			//header('Content-Disposition: inline; filename="'. basename($filename) .'";');
			header('Content-Disposition: inline; filename="'. basename($filename) .'";');
		}

		return @readfile($filename);
		exit;
		
	}
	
}

function filename($file) {
	
	$filename = remove_accent(utf8_decode($file));
	$filename = strtolower($filename);
	$filename = str_replace('  ', ' ', $filename);
	$filename = str_replace(' ', '_', $filename);
	//$filename = 'teste';
	
	return $filename;
	
}