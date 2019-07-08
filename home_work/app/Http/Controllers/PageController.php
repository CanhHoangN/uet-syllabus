<?php

namespace App\Http\Controllers;

use App\levels;
use App\methods;
use App\suggests;
use App\templates;
use App\User;
use App\Syllabus;
use Auth;
use Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class PageController extends Controller
{
    //
    public function index()
    {
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
        return view('index', compact(['levels', 'methods', 'templates', 'template', "suggests"]));
    }
    public function getDescLevel($idLevel)
    {
        $desc = levels::where('idLevel', $idLevel)->value('descriptionLevel');
        $arr = array(
            'desc' => $desc
        );
        return response()->json($arr);
    }
    public function getMethods($idTemplate, $idLevel)
    {
        $methods = DB::table('methods')
            ->where([
                ['idTemplate', '=', $idTemplate],
                ['idLevel', '=', $idLevel]
            ])->get();
        return response()->json($methods);
    }
    public function getSuggest($idTemplate, $idLevel)
    {
        $suggest = DB::table('suggests')
            ->where([
                ['idTemplate', '=', $idTemplate],
                ['idLevel', '=', $idLevel]
            ])->get();
        $examples = explode("\n", $suggest[0]->example);
        $suggest[0]->example = array($examples);
        return response()->json($suggest);
    }
    public function login()
    {
        return view('loginandregister.login');
    }
    public function postlogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Enter email.',
                'email.email' => 'Incorrect email format.',
                'password.required' => 'Enter password.',
                'password.max' => 'Max 20.',
                'password.min' => 'Min 6.'
            ]
        );
        $admin = User::where('email', $req->email)->first();
        if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'admin' => '0'])) {
            return redirect('/')->with(['flag' => 'success', 'message' => 'Login successfully.']);
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Login unsuccessful.']);
        }
    }
    public function register()
    {
        return view('loginandregister.register');
    }
    public function postregister(Request $req)
    {
        $this->validate(
            $req,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:20',
                'repassword' => 'required|same:password'
            ],
            [
                'name.required' => 'Enter fullname.',
                'email.required' => 'Enter email.',
                'email.email' => 'Incorrect email format.',
                'email.unique' => 'Someone used this email.',
                'password.required' => 'Enter password.',
                'password.min' => 'Min: 6.',
                'password.max' => 'Max: 20',
                'repassword.required' => 'Enter repassword.',
                'repassword.same' => 'Password is not the same.'
            ]
        );
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect('/login')->with('success', 'Account successfully created.');
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function save(Request $req)
    {
        $data = $req->all();
        return view('save', compact('data'));
    }

    public function confirmsave(Request $req)
    {
        $data = $req->all();

        $syllabus = new Syllabus();

        if (Auth::check()) {
            $syllabus->idUser = Auth::user()->id;
        } else {
            return Redirect('/login');
        }
        $syllabus->idUser = Auth::user()->id;
        $syllabus->nameSyllabus = $data['name'];
        $syllabus->content = '<html><div class="text-box">
        <label id="ILO">Intended Learning Outcomes</label>
        <p>' . $data['text1'] . '</p>
        <label id="OBA">Outcome-based Assessment</label>
        <p>' . $data['text2'] . '</p>

        <label id="TAL">Teaching and Learning.</label>
        <p>' . $data['text3'] . '</p>';
        $syllabus->save();
        return redirect('/');
    }
    public function syllabus()
    {
        if (Auth::check()) {
            $syllabuses = Syllabus::where('idUser', Auth::user()->id)->get();
            return view('syllabus', compact('syllabuses'));
        } else {
            return Redirect('/login');
        }
    }

    public function content($id)
    {
        $content=Syllabus::where('idSyllabus', $id)->first();
            echo $content->content;
    }
}
