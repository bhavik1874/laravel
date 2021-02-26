<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProjectsController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$data['title']   = 'Projects';
		$data['content'] = view('project.index')->with('projects', Projects::all());
		// return view('projects.index')->with('projects',Project::all());

		return view('layout.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function add(Request $request)
	{
		if ($request->input())
		{
			$data['name']        = $request->input('name');
			$data['description'] = $request->input('description');
			$result              = Projects::insert($data);

			if ($result)
			{
				$request->session()->flash('success_message', 'Data Inserted.');

				return redirect('projects');
			}
			else
			{
				$request->session()->flash('error_message', 'Something goes wrong.');

				return redirect('projects');
			}
		}

		$data['title']   = 'Add project';
		$data['content'] = view('project.add', $data);

		return view('layout.index', $data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Projects  $project
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id = '')
	{
		$id = base64_decode($id);

		if ($request->input())
		{
			$data['name']        = $request->input('name');
			$data['description'] = $request->input('description');
			$result              = Projects::where('id', $request->input('id'))->update($data);

			if ($result)
			{
				$request->session()->flash('success_message', 'Data Updated.');

				return redirect('projects');
			}
			else
			{
				$request->session()->flash('error_message', 'Something goes wrong.');

				return redirect('projects');
			}
		}
		else
		{
			$data['title']   = 'Edit User';
			$data['content'] = view('project.edit')->with('project', Projects::find($id));

			return view('layout.index', $data);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Projects  $project
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id = '')
	{
		$id = Projects::find( $id );
		if ($id)
		{
			$id ->delete();
			$request->session()->flash('success_message', 'Record Deleted.');

			return redirect('projects');
		}
		else
		{
			$request->session()->flash('error_message', 'Something goes wrong.');

			return redirect('projects');
		}
	}
}
