<?php

include '../app/models/Task.php';
//use Illuminate\Http\Request;
class TasksController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getAll()
	{
    $todos = Task::all();
    $array = [
      'todos' => $todos
    ];
    return Response::json($array);
  }
  
  public function get($id)
  {
    $todo = Task::find($id);
    $array = [
      'todos' => $todo
    ];
    return Response::json($array);
  }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    try{
      $task = new Task;
      $data = Input::all();
      $task->title =  $data['todo']['title'];
      $task->isCompleted =  $data['todo']['isCompleted'];
      $task->save();
      $res = ['todos' => $task];
      return Response::json($res);
    }
    catch(Exception $err){
      return $err;
    }
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $data = Input::all();
    $task = Task::find($id);
    $task->title =  $data['todo']['title'];
    $task->isCompleted =  $data['todo']['isCompleted'];
    $task->save();
    $res = ['todos' => $task];
    return Response::json($res);
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$task = Task::find($id);
    $task->delete();
    $res = ['todos' => $task];
    return Response::json($res);
  }
  
}
