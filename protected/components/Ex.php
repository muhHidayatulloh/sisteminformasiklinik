<?php	
	class Ex
	{
		
		public static function enkrip($param)
		{
			return md5(md5(md5("semrawutbackhelor".$param)));
		}
	}