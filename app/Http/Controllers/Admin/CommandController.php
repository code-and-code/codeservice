<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Command;
use Illuminate\Http\Request;
use Cocur\BackgroundProcess\BackgroundProcess;
use Symfony\Component\Process\Process;

class CommandController extends Controller
{
    protected $command;
    protected $path    = 'shells';

    public function __construct(Command $command)
    {
       $this->command = $command;
       $this->path    = storage_path($this->path);
    }

    public function index()
    {
        $commands = $this->command->all();
        return view('admin.command.index')->with('commands', $commands);// index = all category
    }

    public function create($id)
    {
        return view('admin.command.create',compact('id'));
    }

    public function store(Request $request)
    {
        $this->command->create($request->except('file'));
        return redirect()->back()->with('status', 'Salvo');
    }

    public function show($id)
    {
        return "Show $id";
        //return view show = one category
    }

    public function edit($id)
    {
        try {
            return view("admin.command.edit")->with('command', $this->command->findOrFail($id));
        } catch (\Exception $e) {
            return redirect(route('command.index'))->with('error', ' ');
        }
    }

    public function update($id, Request $request)
    {
        $this->command->find($id)->update($request->all());
        return redirect()->back()->with('status', 'Salvo');
    }

    public function delete($id)
    {
        try {
            $this->command->findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Excluido');
        } catch (\Exception $e) {
            return redirect(route('category.index'))->with('error', ' ');
        }
        //return delete category database
    }

    public function exec ($id)
    {

        try {

            $command = $this->command->findOrFail($id);

            $process = new BackgroundProcess($command->command);
            $process->run();

            $msg[] = sprintf('Processo %d', $process->getPid());
            while ($process->isRunning()) {
                      sleep(1);
            }
            $msg[]= "\nFeito.\n";
            \Log::notice('Commando Excutado: '.$command->command);

            if($process->getPid() == 0)
            {
                \Log::error('Falha Commando Excutado: '.$command->command);
                throw  new \Exception('Falha ao Executar');
            }
            return redirect()->back()->with('cmd',$msg);


        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function upload(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'file' => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()], 500);
        }
        else
        {
            $file = $request->file('file');
            $file = $file[0];

            if ($file->isValid()) {
                $file = $request->file('file')[0];

                if ($file->isValid()) {

                    $fileName = md5(microtime()).'.'.$file->getClientOriginalExtension(); //$file->getClientOriginalName(), $file->getRealPath();
                    $filePath = $this->path.'/'.$fileName;

                    $file->move($this->path, $fileName);
                    $command = $this->command->create(['command' => 'bash '.$this->path.'/'.$fileName,
                                                       'src' => $filePath,
                                                       'file' => $fileName,
                                                       'name' => $file->getClientOriginalName(),
                                                       'service_id' => $request->input('service')
                                                      ]);

                    return response()->json(['route' => route('command.edit',['id' => $command])], 200);
                }

                } else
                {
                    return response()->json([], 500);
                }
        }
    }
}
