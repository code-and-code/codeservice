<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogController extends Controller
{
    public function index(Request $request)
    {

        if ($request->input('l')) {
            Log::setFile(base64_decode($request->input('l')));
        }

        if ($request->input('dl')) {
            return response()->download(Log::pathToLogFile(base64_decode($request->input('dl'))));
        } elseif ($request->has('del')) {
            File::delete(Log::pathToLogFile(base64_decode($request->input('del'))));
            return redirect()->to($request->url());
        }

        $logs = Log::all();

        return view('admin.log.log', [
            'logs' => $logs,
            'files' => Log::getFiles(true),
            'current_file' => Log::getFileName()
        ]);
    }
}

