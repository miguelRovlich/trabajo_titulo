<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Coverage;

use Validator;
class CoverageController extends Controller
{
    public function __Construct(){
    	$this->middleware('auth');
        $this->middleware('user.status');
    	$this->middleware('isadmin');
    }

    public function getList(){
    	$states = Coverage::where('ctype', 0)->get();
    	$data = ['states' => $states];
    	return view('admin.coverage.list', $data);
    }

    public function postCoverageStateAdd(Request $request){
    	$rules = [
    		'name' => 'required'
    	];

    	$messages = [
    		'name.required' => 'Es requerido el nombre de la cobertura.'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
    	else:
    		$coverage = new Coverage;
    		$coverage->ctype = '0';
    		$coverage->state_id = '0';
    		$coverage->name = e($request->input('name'));
    		$coverage->price ='0';
    		$coverage->days = $request->input('days');

    		if($coverage->save()):
    			return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
    		endif;
    	endif;
    }

    public function getCoverageEdit($id){
        $coverage = Coverage::findOrFail($id);
        $data = ['coverage' => $coverage];
        return view('admin.coverage.edit', $data);
    }

    public function postCoverageStateEdit($id, Request $request){
        $rules = [
            'name' => 'required'
        ];

        $messages = [
            'name.required' => 'Es requerido el nombre de la cobertura.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $coverage = Coverage::find($id);
            $coverage->status = $request->input('status');
            $coverage->name = e($request->input('name'));
            $coverage->days = $request->input('days');

            if($coverage->save()):
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCoverageCities($id){
        $state = Coverage::findOrFail($id);
        $cities = Coverage::where('state_id', $id)->get();
        $data = ['cities' => $cities, 'id' => $id, 'state' => $state];
        return view('admin.coverage.cities', $data);
    }


    public function postCoverageCityAdd(Request $request){
        $rules = [
            'name' => 'required',
            'shipping_value' => 'required'
        ];

        $messages = [
            'name.required' => 'Es requerido el nombre de la cobertura.',
            'shipping_value.required' => 'El valor del envió es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $coverage = new Coverage;
            $coverage->ctype = '1';
            $coverage->state_id = $request->input('state_id');
            $coverage->name = e($request->input('name'));
            $coverage->price = $request->input('shipping_value');
            $coverage->days = $request->input('days');

            if($coverage->save()):
                return back()->with('message', 'Guardado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCoverageCityEdit($id){
        $coverage = Coverage::findOrFail($id);
        $data = ['coverage' => $coverage];
        return view('admin.coverage.edit_city', $data);
    }

    public function postCoverageCityEdit($id, Request $request){
        $rules = [
            'name' => 'required',
            'shipping_value' => 'required'
        ];

        $messages = [
            'name.required' => 'Es requerido el nombre de la cobertura.',
            'shipping_value.required' => 'El valor del envió es requerido.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'Se ha producido un error.')->with('typealert', 'danger');
        else:
            $coverage = Coverage::findOrFail($id);
            $coverage->status = $request->input('status');
            $coverage->name = e($request->input('name'));
            $coverage->price = $request->input('shipping_value');
            $coverage->days = $request->input('days');

            if($coverage->save()):
                return back()->with('message', 'Actualizado con éxito.')->with('typealert', 'success');
            endif;
        endif;
    }

    public function getCoverageDelete($id){
        $coverage = Coverage::findOrFail($id);
        if($coverage->delete()):
            return back()->with('message', 'Eliminado con éxito.')->with('typealert', 'success');
        endif;
    }
}
