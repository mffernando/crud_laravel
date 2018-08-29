<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{

public function create()
{
	return view('carcreate');
}

#store data
public function store(Request $request)
{
	$car = new Car();
	$car->carcompany = $request->get('carcompany');
	$car->model = $request->get('model');
	$car->price = $request->get('price');
	$car->save();

	return redirect('car')->with('success', 'Car has been successfully added!');
}

#car index
public function index()
{
	$cars = Car::all();
	return view('carindex', compact('cars'));
}

#car edit
public function edit($id)
{
	$car = Car::find($id);
	return view('caredit', compact('car', 'id'));
}

#car update
public function update(Request $request, $id)
{
	$car = new Car();
	$car->carcompany = $request->get('carcompany');
	$car->model = $request->get('model');
	$car->price = $request->get('price');
	$car->save();

	return redirect('car')->with('success', 'Car has been successfully updated!');	
}

#car delete
public function destroy($id)
{
	$car = Car::find($id);
	$car->delete();

	return redirect('car')->with('warning', 'Car has been successfully deleted!');		
}

}
