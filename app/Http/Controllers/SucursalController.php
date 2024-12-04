<?php

namespace App\Http\Controllers;

use App\Models\sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$data = sucursal::all();

		return view('panel.sucursal.index', compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('panel.sucursal.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 */
	public function show(sucursal $sucursal)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit($id)
	{
		return view('panel.sucursal.edit', ['id' => $id]);
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, sucursal $sucursal)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(sucursal $sucursal)
	{
		//
	}
}
