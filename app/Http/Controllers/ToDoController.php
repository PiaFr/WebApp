<?php
/**
 * Created by Pia Freilinger.
 * Date: 05.04.2018
 */
namespace App\Http\Controllers;

use App\ToDoModel;
use Illuminate\Support\Facades\Auth;
use View;


class ToDoController extends Controller
{
    public function index(){

        $user = Auth::user();
        $uid = $user->id;

        $todos = ToDoModel::where('userid', $uid)->get();

        return View::make('home')->with('todos', $todos);
    }

    public function create()
    {
        return View::make('create');
    }

    public function store(){

        $rules = array(
            'title'    => 'required',
            'priority'      => 'required',
            'duration'    => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/index.php/home/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = Auth::user();

            $todo = new ToDoModel();
            $todo->title       = Input::get('title');
            $todo->description = Input::get('description');
            $todo->location    = Input::get('location');
            $todo->priority    = Input::get('priority');
            $todo->duration    = Input::get('duration');;

            $todo->userId = $user->id;
            $todo->save();

            return Redirect::to('home');
        }
    }

    public function edit($id)
    {
        $todo = ToDoModel::find($id);

        return View::make('edit')
            ->with('todo', $todo);
    }

    public function update($id)
    {
        $rules = array(
            'title'    => 'required',
            'priority'      => 'required',
            'duration'    => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/home/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $todo = ToDoModel::find($id);
            $todo->title       = Input::get('title');
            $todo->description = Input::get('description');
            $todo->location    = Input::get('location');
            $todo->priority    = Input::get('priority');
            $todo->duration    = Input::get('duration');
            $todo->save();

            return Redirect::to('home');
        }
    }

    public function destroy($id)
    {
        $todo = ToDoModel::find($id);
        $todo->delete();

        return Redirect::to('home');
    }


}
