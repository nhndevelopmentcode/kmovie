<?php

function __autoload($class_name) {
	global $globalclasspath;
	foreach ($globalclasspath as $prefix ) {
		$path = $prefix . '/' . $class_name . '.php';
		if (file_exists ( $path )) {
			require_once $path;
			return;
		}
	}
}

?>