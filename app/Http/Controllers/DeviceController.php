<?php namespace App\Http\Controllers;

use App\Data;
use App\Http\Requests\DeviceDataInRequest;
use \Input;

class DeviceController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		// $this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function in()
	{
		$data = Input::json();

		$d = new Data($data->all());
		$d->save();
		return ['response' => 'success'];
	}

}
