<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class UsersController extends BaseController
{
	protected $table = 'users';
	public function index()
	{
		$data['users']   = DB::table($this->table)->get();
		$data['title']   = 'Users';
		$data['content'] = view('user.index', $data);

		return view('layout.index', $data);
	}

	public function add(Request $request)
	{
		if ($request->input())
		{
			$request->validate([
				'name'     => 'required|min:3|max:20',
				'password' => 'required',
				'email'    => 'required|email|unique:users'
				// 'file'     => 'mimes:jpeg,png,jpg|max:3072' //3 MB max
			]);

			$data['name']     = $request->input('name');
			$data['email']    = $request->input('email');
			$data['password'] = md5($request->input('password'));

			$result = DB::table($this->table)->insert($data);

			if ($result)
			{
				$request->session()->flash('success_message', 'Data Inserted');

				return redirect('users');
			}
			else
			{
				$request->session()->flash('error_message', 'Something goes wrong.');

				return redirect('users');
			}
		}

		$data['title']   = 'Add User';
		$data['content'] = view('user.add', $data);

		return view('layout.index', $data);
	}

	public function edit(Request $request, $id = '')
	{
		if ($request->input())
		{
			// echo '<pre>';
			$data['name']  = $request->input('name');
			$data['email'] = $request->input('email');
			$result        = DB::table($this->table)->where('id', $request->input('id'))->update($data);

			if ($result)
			{
				$request->session()->flash('success_message', 'Data Updated');

				return redirect('users');
			}
			else
			{
				$request->session()->flash('error_message', 'Something goes wrong.');

				return redirect('users');
			}
		}
		else
		{
			$data['title']   = 'Edit User';
			$data['id']      = $id;
			$data['user']    = DB::table($this->table)->where('id', $id)->first();
			$data['content'] = view('user.edit', $data);

			return view('layout.index', $data);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Projects  $project
	 * @return \Illuminate\Http\Response
	 */
	public function delete(Request $request, $id = '')
	{
		$id = Projects::find( $request->post('user_id') );
		if ($id)
		{
			$id ->delete();
			$request->session()->flash('success_message', 'Record Deleted.');
			return response()->json(['true']);

		}
		else
		{
			$request->session()->flash('error_message', 'Something goes wrong.');
			return response()->json(['false']);

		}
	}
}
