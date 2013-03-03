<?php defined('SYSPATH') OR die('No direct script access.');
 
class Setting_Account extends Setting {

	public $title = "Account";
	public $icon = "icon-user";

	public function __construct(Model_User $user)
	{
		parent::__construct($user);

		$view = new View_User_Settings_Account;

		$this->add_content($view);
	}

	/**
	 * @return Validation
	 */
	public function get_validation()
	{
		// TODO: Implement get_validation() method.
	}

	/**
	 * Save the user information.
	 */
	public function save()
	{
		// TODO: Implement save() method.
	}

}