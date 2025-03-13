<?php

namespace App\Core;

use App\Core\Redirect;
use App\Core\Session;
use App\Core\View;

class Controller 
{	
	protected $model;	
	protected Redirect $redirect;	
	protected Session $session;
	protected User $user;
	protected View $view;	
		
	public function view(
		$content_view, 
		$template_view = null, 
		$payload = null, 
		$title = ''
		) : void
	{	
		$this->view = new View();				
		$this->view->generate($content_view, $template_view, $payload, $title);
	}

	public function session () : Session
	{
		return $this->session;
	}

	public function setSession (Session $session) : void
	{
		$this->session = $session;
	}

	public function redirect(string $url) : void	
	{	
		$this->redirect = Redirect::to($url);
	}	

	public function index()
	{
		
	}
}
