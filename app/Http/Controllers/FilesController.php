<?php

namespace App\Http\Controllers;

use App\Models\files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FilesController extends Controller
{



    public function __construct()
    {
        $this->middleware("auth");
    }
    public function index()
    {
        $userid=Auth()->user()->id;
        $files = files::where("userid","=",$userid)->get();
        return view('files.index')->with('files', $files);
    }

    public function publicfiles(){
        $files=DB::table('public_files')->get();
        return view('files.public')->with("file",$files);
    }
    public function showpublic($id){
        $files=DB::table('public_files')->where("file_id",$id)->first();
        return view('files.showpublic')->with("file",$files);
    }

    public function changestatus($id){
        $file=files::find($id);
        if($file->status =="private"){
            $file->status="public";
            $file->save();
            return redirect()->back()->with("done","public file done");
        }
        else{
            $file->status="private";
            $file->save();
            return redirect()->back()->with("done","private file done");
        }
    }


    public function create()
    {
        return view('files.create');
    }


    public function store(Request $request)
    {
        $size = 3 * 1024;
        $request->validate([
            "name" => 'required|min:5|max:10',
            "description" => 'required|min:10|max:50',
            "file" => "required|max:$size|mimes:pdf,docx,pptx"
        ]);
        $files = new files();
        $files->name = $request->name;
        $files->description = $request->description;
        $file_data = $request->file("file");
        $file_name = time() . $file_data->getClientOriginalName();
        $location = public_path("./files/");
        $file_data->move($location, $file_name);
        $files->file = $file_name;
        $userid= Auth()->user()->id;
        $files->userid=$userid;
        $files->save();
        return redirect()->route('file.index')->with('done',"created done");
    }


    public function show($id)
    {
        $file= files::find($id);
        return view('files.show')->with('file',$file);
    }

    public function edit($id)
    {
        $file=files::find($id);
        return view('files.update')->with('file',$file);
    }


    public function update(Request $request,$id)
    {
        $size=3*1024;
        $request->validate([
            "name" => 'required|min:5|max:10',
            "description" => 'required|min:10|max:50',
            "file" => "max:$size|mimes:pdf,docx,pptx"
        ]);
        $file=files::find($id);
        $file->name=$request->name;
        $file->description=$request->description;
        $file_data=$request->file('file');
        if($file_data != null){
            $file_name= time() .$file_data->getClientOriginalName();
            $location=public_path("./files/");
            $file_data->move($location,$file_name);
            $old_file=$file->file;
            $file_path_name=public_path() . "/files/" .$old_file;
            unlink($file_path_name);

        }

        else{
            $file_name=$file->file;
        }
        $file->file=$file_name;
        $file->save();
        return redirect()->route('file.index')->with("done","updated done");
    }


    public function destroy($id)
    {
        $files = files::find($id);
        $old_file=$files->file;
        $file_path_name=public_path()."/files/".$old_file;
        unlink($file_path_name);
        $files->delete();
        return redirect()->back()->with("done","delete done");
    }

    public function download($id){
        $file=files::find($id);
       $file_name= $file->file;
       $file_path_name= public_path() ."/files/". $file_name;
       return response()->download($file_path_name);

    }
}
