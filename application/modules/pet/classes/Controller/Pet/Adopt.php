<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Pet_Adopt extends Controller_Frontend {
	protected $protected = TRUE;
	public function action_index()
	{
		if ($_POST)
		{
			try
			{
				if (array_key_exists('adopt', $_POST))
				{
					$pet = ORM::factory('Pet')
					->where('id', '=', $_POST['adopt'])
					->where('user_id', '=', 0)
					->find();
					$pet->user_id = $this->user->id;
					$pet->abandoned = time();
					$pet->save();
					Hint::success('You have adopted ' . $pet->name . '.');
				}
				$this->redirect('pets');
			}
			catch (ORM_Validation_Exception $e)
			{
				Hint::error($e->errors('models'));
			}
		}
		Breadcrumb::add('Your pets', Route::url('pets'));
		Breadcrumb::add('Adopt a pet', Route::url('pet/adopt'));
		$this->view = new View_Pet_Adopt;
		$pets = ORM::factory('Pet')
		->where('user_id', '=', 0)
		->order_by('abandoned', 'desc')
		->find_all();
		$array = array();
		foreach ($pets as $pet)
		{
			$array[] = $pet;
		}
		$this->view->pets = $array;
		$this->view->pets_count = count($array);
		$this->view->href = array(
				'create' => Route::url('pet/create'),
			);
	}

}