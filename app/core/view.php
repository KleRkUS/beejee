<?php 
class View
{
	
	private $template_view = 'layout.php';

	function generate($content_view, $template_view, $data = null)
	{

		if(is_array($data)) {
			extract($data);
		}
		
		include 'app/views/'.$template_view;
	}
}