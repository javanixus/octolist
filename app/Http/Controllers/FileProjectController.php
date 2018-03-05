<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use App\FilesProject;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use JWTException;
use JWTAuth;
use Auth;

class FileProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    public function up(Request $request, $id)
    {
        $project = Project::Where('id', $id)->get()->first();

        if ($project) {
            $file_project = FilesProject::Where('project_id', $id)->get()->first();
                if($request->hasFile('filefield')){
                    $file = $request->file('filefield');
                    $filename = $project->id . '_' . time() . '.' . $file->getClientOriginalExtension();

                    if ($file_project) {
                        $exist = Storage::disk('file_project')
                        ->exists($file_project->file_name);

                        if (isset($file_project->file_name) AND $exist) {
                            Storage::disk('file_project')->delete($file_project->file_name);
                        }
                    }

                    if (Storage::disk('file_project')->put($filename, File::get($request->filefield))) {
                        $file_project = FilesProject::Create([
                            'name' => $project->project_title,
                            'file_name' => $filename,
                            'project_id' => $project->id,
                        ]);

                        $response = [
                            'msg' => 'File Berhasil diupload',
                        ];
                    }
                }
        } else {
            $response = [
                'msg' => 'project tidak ada',
            ];
        }

        return response()->json($response, 200);

    }

    public function down(Request $request, $id)
    {
        $file_project = FilesProject::Where('project_id', $id)->firstOrFail();
        $file = Storage::disk('file_project')->get($file_project->file_name);

        return response()->download('/storage/file_project/namafile');
    }

    public function destroy($id)
    {
        $file_delete = FilesProject::where('project_id', $id)->get()->first();

        if ($file_delete) {
            $file_delete->delete();
            Storage::disk('file_project')->delete($file_delete->file_name);
            $response = [
                'msg' => 'File berhasil dihapus',
            ];
        } else {
             $response = [
                'msg' => 'Tidak ada File',
            ];
        }

        return response()->json($response);
    }
}
