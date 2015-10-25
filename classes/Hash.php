<?php 
 class Hash{
 	public static function make($string, $salf = ''){
 		return hash('sha256', $string . $salf);
 	}
 	public static function salt($lenght){
 		return mcrypt_create_iv($lenght);
 	}
 	public static function unique(){
 		return self::make(uniqid());
 	}
 }
 ?>