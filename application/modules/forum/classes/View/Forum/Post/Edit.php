<?php defined('SYSPATH') OR die('No direct script access.');

class View_Forum_Post_Edit extends View_Base {

	public $post;

	public function title()
	{
		return 'Editing post #'.$this->post->id;
	}

	public function post()
	{
		$post = $this->post->as_array();
		$post['content'] = Security::xss_clean($post['content']);
		return $post;
	}


}

