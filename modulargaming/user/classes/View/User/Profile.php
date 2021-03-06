<?php defined('SYSPATH') OR die('No direct script access.');

class View_User_Profile extends Abstract_View {

	/**
	 * @var Model_User the profile user
	 */
	public $user;

	/**
	 * @var String html for the tabs.
	 */
	public $tabs;

	public function title()
	{
		return $this->user->username.'\'s Profile';
	}

	public function user()
	{
		$user = $this->user;
		return array(
			'id'         => $user->id,
			'username'   => $user->username,
			'created'    => Date::format($user->created),
			'last_login' => Date::format($user->last_login),
			'post_count' => $user->get_property('forum.posts'),
			'avatar'     => $user->avatar(),
			'title'      => $user->title->title,
			'about'      => $user->get_property('about'),
			'signature'  => $user->get_property('signature')
		);
	}

}
