<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_User_Settings extends Abstract_Controller_User {

	protected $protected = TRUE;

	public function action_index()
	{
		$settings = new Settings;

		$settings->add_setting(new Setting_Preferences($this->user));
		$settings->add_setting(new Setting_Profile($this->user));
		$settings->add_setting(new Setting_Account($this->user));

		if ($this->request->method() == HTTP_Request::POST)
		{
			$setting = $settings->get_by_id($this->request->post('settings-tab'));
			if ($setting)
			{
				$post = $this->request->post();
				$validation = $setting->get_validation($post);

				if ($validation->check())
				{
					try {
						$setting->save($post);
						Hint::success('Updated '.$setting->title.'!');
					}
					catch (ORM_Validation_Exception $e)
					{
						Hint::error($e->errors('models'));
					}
				}
				else
				{
					Hint::error($validation->errors());
				}
			}
			else
			{
				Hint::error('Invalid settings id!');
			}
		}

		$this->view = new View_User_Settings;
		$this->view->settings = $settings;
	}

}
