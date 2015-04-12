<?php namespace App\Http\Controllers;

use App\Data;
use App\Http\Requests\DeviceDataInRequest;
use \Input;
use \Validator;

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
	 * Get Device data in json format and store it.
	 *
	 */
	public function index()
	{
		$data = Data::orderBy('created_at', 'desc')
					->take(10)
					->get();
		return $data;
	}

	/**
	 * Get Device data in json format and store it.
	 *
	 */
	public function in()
	{
		$data = Input::json();

		$validator = Validator::make($data->all(), [
			'device_id' => 'required|min:5', 
			'temperature' => 'required|numeric', 
			'level' => 'required|numeric',
		]);

		if($validator->passes()){
			$d = new Data($data->all());
			$d->save();
			return ['response' => 'success!'];
		}else{
			return ['response' => 'error', 'errors' => $validator->errors()->all()];
		}
	}

}
