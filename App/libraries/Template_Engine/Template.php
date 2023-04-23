<?php
class Template
{
	public $header ="";
	public $footer ="";

    public function engine_view($type,$data = [])
	{
		
		if (!empty($data))
			extract($data);
		require "App/views/". $this->header.".view.php";
		if ($type=='table') {
			require "App/libraries/Template_Engine/src/table.eng.php";
		}
		if ($type=='form') {
			require "App/libraries/Template_Engine/src/form.eng.php";
		}
		require "App/views/". $this->footer.".view.php";
		
	}


	public function engine_viewq($name, $data = [])
	{
		if (!empty($data))
			extract($data);
		$filename = "App/libraries/Template_Engine/" . $name . ".eng.php";
		if (file_exists($filename)) {
			require $filename;
		} else {
			$filename = "App/libraries/Template_Engine/404.eng.php";
			require $filename;
		}
	}

}