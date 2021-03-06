<?php defined('SYSPATH') OR die('No direct script access.');

class View_Message_Index extends Abstract_View_Message {

	public $title = 'Messages';

	public function messages()
	{
		$messages = array();

		foreach ($this->messages as $message)
		{
			$messages[] = array(
				'created' => Date::format($message->created),
				'subject' => $message->subject,
				'content' => substr(strip_tags($message->content), 0, 100),
				'id'	  => $message->id,
				'read'    => $message->read,
				'href'    => Route::url('message.view', array('id' => $message->id)),

				'sender' => array(
					'id' => $message->sender->id,
					'username'  => $message->sender->username,
					'avatar' => $message->sender->avatar(),
					'href'      => Route::url('user.profile', array(
						'id'     => $message->sender->id,
					)),
				),
			);
		}

		return $messages;
	}

	public function total_messages()
	{
		return count($this->messages);
	}

	public function links()
	{
		return array(
			'create' => Route::url('message.create', array(
				'action' => 'create',
			)),
			'inbox' => Route::url('message'),
			'outbox' => Route::url('message', array(
				'controller' => 'outbox',
			)),
		);
	}


}
