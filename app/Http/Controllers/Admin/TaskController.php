<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Task;
use Illuminate\Http\Request;
use App\Support\Crontab;

class TaskController extends Controller
{
    protected $task;
    protected $cron;

    public function __construct(Task $task, Crontab $cron)
    {
       $this->task = $task;
       $this->cron = $cron;
    }

    protected function validation(array $request)
    {
        return \Validator::make($request,
            [
                'minutes'    => 'required|numeric',
                'hour'       => 'required|',
                'month'      => 'required|string',
                'day'        => 'required|string',
                'week'       => 'required|string',
                'command_id' => 'required'
            ]);
    }

    protected function setDate( array $data)
    {
        $date  = $data['minutes'].' '.$data['hour'].' '.$data['month'] .' '.$data['day'] .' '.$data['week'];
        return $date;
    }

    public function create($id)
    {
        return view('admin.task.create',compact('id'));
    }

    public function store(Request $request)
    {
        $validator = $this->validation($request->all());
        if ($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors($validator);
        } else
        {
            $task = $this->task->create(['date' =>$this->setDate($request->all()), 'command_id' => $request->input('command_id')]);
            $this->addCron($task);
            return redirect()->back()->with('status', 'Gravado/Adiconado seu CRONTAB');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            return view("admin.task.edit")->with('task', $this->task->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('task.index'))->with('error', ' ');
        }
    }

    public function update($id, Request $request)
    {
        /*
        $this->command->find($id)->update($request->all());
        return redirect()->back()->with('status', 'Salvo');
        */
    }

    public function delete($id)
    {

        try {

            $taks = $this->task->findOrFail($id);
            $this->removeCron($taks);
            return redirect()->back()->with('status', 'Excluido');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', ' ');
        }

    }

    protected function addCron(Task $task)
    {
        $job = $task->date.' '.$task->Command->command;
        $this->cron->addJob($task->job);
    }

    protected function removeCron(Task $task)
    {
        $job = $task->date.' '.$task->Command->command;
        $this->cron->removeJob($task->job);
        $task->delete();
    }
    //
}
