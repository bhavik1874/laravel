<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class DashboardController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['title']   = 'Laravel';
		$data['content'] = view('dashboard');

		return view('layout.index', $data);
	}
}
