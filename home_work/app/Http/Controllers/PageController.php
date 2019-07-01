<?php

namespace App\Http\Controllers;

use App\levels;
use App\methods;
use App\suggests;
use App\templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    //
    public function index(){
        $levels = levels::all();
        $templates = templates::all();
        $template = templates::where([
            ['idTemplate', '=', '1'],

        ])->get();
        $methods = methods::where([
            ['idTemplate', '=', '1'],
            ['idLevel', '=', '1'],
        ])->get();
        $suggests = suggests::all();
        $suggest = suggests::where([
            ['idTemplate', '=', '1'],
            ['idLevel', '=', '1'],
        ]);
        return view('index',compact(['levels','methods','templates','template',"suggests"]));
    }
    public function getDescLevel($idLevel){
        $desc = levels::where('idLevel',$idLevel)->value('descriptionLevel');
        $arr = array(
            'desc'=>$desc
        );
        return response()->json($arr);


    }
    public function getMethods($idTemplate,$idLevel){
        $methods = DB::table('methods')
            ->where([
                ['idTemplate', '=', $idTemplate],
                ['idLevel', '=', $idLevel]
            ])->get();
        return response()->json($methods) ;
    }
    public function getSuggest($idTemplate,$idLevel){
        $suggest = DB::table('suggests')
            ->where([
                ['idTemplate', '=', $idTemplate],
                ['idLevel', '=', $idLevel]
            ])->get();
        $examples = explode("\n",$suggest[0]->example);
        $suggest[0]->example = array($examples);
        return response()->json($suggest) ;
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index');
    }
    public function save(Request $req)
    {
        $syllabus= new Syllabus();
        if(Auth::check()){
            $syllabus->idUser=Auth::user()->id;
        }
        else
        {
            return Redirect('/login');
        }
        
    }
}
