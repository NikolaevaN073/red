<?php

namespace App\Core;

class View
{	
	public function generate($content_view, $template_view = null, $payload = null, $title = '') : void
	{
		if ($template_view) {
			include_once ROOT_DIR .'/views/'. $template_view;	
		}			
	}
}
