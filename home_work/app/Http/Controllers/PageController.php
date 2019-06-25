<?php

namespace App\Http\Controllers;

use App\levels;
use App\methods;
use App\templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('index',compact(['levels','methods','templates','template']));
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

}
