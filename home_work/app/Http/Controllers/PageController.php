<?php

namespace App\Http\Controllers;

use App\Levels;
use App\Levels_vi;
use App\Methods;
use App\Methods_vi;
use App\Suggests;
use App\Suggests_vi;
use App\Templates;
use App\Template_vi;
use App\User;
use App\Syllabus;
use App\ConstraintLabel_vi;
use App\ConstraintLabel;
use Auth;
use Hash;
use http\Cookie;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class PageController extends Controller
{
    //
    public function language($lg)
    {
        if (Session::has('language') == true) {
            Session::forget('language');
        }

        Session::put('language', $lg);

        return Redirect('/');
    }
    public function index()
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "vi") {
            $cstLB = ConstraintLabel_vi::find(1);
            $levels = Levels_vi::all();
            $templates = Template_vi::all();
            $template = Template_vi::where([
                ['idTemplate', '=', '1'],

            ])->get();
            $methods = Methods_vi::where([
                ['idTemplate', '=', '1'],
                ['idLevel', '=', '1'],
            ])->get();
            $suggests = Suggests_vi::all();
            $suggests = Suggests_vi::where([
                ['idTemplate', '=', '1'],
                ['idLevel', '=', '1'],
            ]);
            return view('index', compact(['cstLB', 'levels', 'methods', 'templates', 'template', "suggests", 'language']));
        } else if ($language == "en") {
            $cstLB = ConstraintLabel::find(1);
            $levels = Levels::all();
            $templates = Templates::all();
            $template = Templates::where([
                ['idTemplate', '=', '1'],

            ])->get();
            $methods = Methods::where([
                ['idTemplate', '=', '1'],
                ['idLevel', '=', '1'],
            ])->get();
            $suggests = Suggests::all();
            $suggest = Suggests::where([
                ['idTemplate', '=', '1'],
                ['idLevel', '=', '1'],
            ]);

            return view('index', compact(['cstLB', 'levels', 'methods', 'templates', 'template', "suggests", 'language']));
        }
    }
    public function getDescLevel($idLevel)
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if ($language == "vi") {
            $desc = levels_vi::where('idLevel', $idLevel)->value('descriptionLevel');
            $arr = array(
                'desc' => $desc
            );
            return response()->json($arr);
        } else if ($language == "en") {
            $desc = levels::where('idLevel', $idLevel)->value('descriptionLevel');
            $arr = array(
                'desc' => $desc
            );
            return response()->json($arr);
        }
    }
    public function getMethods($idTemplate, $idLevel)
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if ($language == "vi") {
            $methods = DB::table('methods_vi')
                ->where([
                    ['idTemplate', '=', $idTemplate],
                    ['idLevel', '=', $idLevel]
                ])->get();
            return response()->json($methods);
        } else {
            $methods = DB::table('methods')
                ->where([
                    ['idTemplate', '=', $idTemplate],
                    ['idLevel', '=', $idLevel]
                ])->get();
            return response()->json($methods);
        }
    }
    public function getSuggest($idTemplate, $idLevel)
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if ($language == "vi") {
            $suggest = DB::table('suggests_vi')
                ->where([
                    ['idTemplate', '=', $idTemplate],
                    ['idLevel', '=', $idLevel]
                ])->get();
            $examples = explode("\n", $suggest[0]->example);
            $suggest[0]->example = array($examples);
            return response()->json($suggest);
        } else if ($language == "en") {
            $suggest = DB::table('suggests')
                ->where([
                    ['idTemplate', '=', $idTemplate],
                    ['idLevel', '=', $idLevel]
                ])->get();
            $examples = explode("\n", $suggest[0]->example);
            $suggest[0]->example = array($examples);
            return response()->json($suggest);
        }
    }
    public function login()
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if (Auth::check()) {
            return redirect('/');
        } else {
            return view('loginandregister.login', compact('language'));
        }
    }
    public function postlogin(Request $req)
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if (Auth::check()) {
            return redirect('/');
        } else {
            if ($language == "vi") {
                $this->validate(
                    $req,
                    [
                        'email' => 'email',
                        'password' => 'required|min:6|max:20'
                    ],
                    [
                        'email.email' => 'Sai về cú pháp email',
                        'password.max' => 'Mật khẩu dài nhất là 20 kí tự',
                        'password.min' => 'Mật khẩu ngắn nhất là 6 kí tự'
                    ]
                );
            } else {
                $this->validate(
                    $req,
                    [
                        'email' => 'email',
                        'password' => 'required|min:6|max:20'
                    ],
                    [
                        'email.email' => 'Incorrect email format',
                        'password.max' => 'Max 20',
                        'password.min' => 'Password is at least 6 characters'
                    ]
                );
            }

            $remember_me = $req->has('remember') ? true : false;

            if (Auth::attempt(['email' => $req->email, 'password' => $req->password, 'admin' => '0'], $remember_me)) {

                return redirect('/')->with(['flag' => 'success', 'message' => 'Login successfully']);
            } else {
                $mess = "";
                if ($language == "vi") {
                    $mess = "Tài khoản hoặc mật khẩu không chính xác.";
                } else {
                    $mess = "These credentials do not match our records.";
                }

                return redirect()->back()->with(['flag' => 'danger', 'message' => $mess]);
            }
        }
    }
    public function register()
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }

        return view('loginandregister.register', compact('language'));
    }
    public function tutorial()
    {
        return view('tutorial');
    }
    public function postregister(Request $req)
    {
        $language = Session::get('language');
        if ($language == null) {
            $language = "vi";
        }
        if ($language == "vi") {
            $this->validate(
                $req,
                [
                    'email' => 'email|unique:users',
                    'password' => 'min:6|max:20',
                    'repassword' => 'same:password'
                ],
                [
                    'email.email' => 'Sai cú pháp email',
                    'email.unique' => 'Email đã được sử dụng',
                    'password.min' => 'Mật khẩu ngắn nhất gồm 6 kí tự',
                    'password.max' => 'Mật khẩu dài nhất gồm 20 kí tự',
                    'repassword.same' => 'Mật khẩu xác nhận không khớp'
                ]
            );
        } else {
            $this->validate(
                $req,
                [
                    'email' => 'email|unique:users',
                    'password' => 'min:6|max:20',
                    'repassword' => 'same:password'
                ],
                [
                    'email.email' => 'Incorrect email format',
                    'email.unique' => 'Someone used this email',
                    'password.min' => 'Min: 6',
                    'password.max' => 'Max: 20',
                    'repassword.same' => 'Password is not the same'
                ]
            );
        }

        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        $mess = "";
        if ($language == "vi") {
            $mess = "Tạo tài khoản thành công.";
        } else {
            $mess = "Account successfully created.";
        }
        return redirect('/login')->with('success', $mess);
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }

    public function save(Request $req)
    {
        $language = Session::get('language');
            if ($language == null) {
                $language = "vi";
            }
            if ($language == "en") {
                $lb = ConstraintLabel::find(1);
            } else {
                $lb = ConstraintLabel_vi::find(1);
            }
        if (Auth::check()) {
            $data = $req->all();
            if ($data != null) {
                if ($data['textboxvalue'] != null || $data['textboxvalue1'] != null || $data['textboxvalue2'] != null) {
                    return view('save', compact('data', 'language', 'lb'));
                } else {
                    return Redirect('/')->with('emptySyllabus', 'Empty');
                }
            }
        } else {
            return Redirect('/login')->with('login', 'Please login !');
        }
    }

    public function confirmsave(Request $req)
    {

        $data = $req->all();
        $name = DB::table('syllabus')->select('nameSyllabus')->where([
            ['nameSyllabus', '=', $data['name']],
            ['idUser', '=', \Illuminate\Support\Facades\Auth::id()]

        ])->first();
        if ($name == null) {
            $syllabus = new Syllabus();

            if (Auth::check()) {
                $syllabus->idUser = Auth::user()->id;
            } else {
                return Redirect('/login');
            }
            $syllabus->idUser = Auth::user()->id;
            $syllabus->nameSyllabus = $data['name'];
            $syllabus->intended = $data['text1'];
            $syllabus->OutcomeBased = $data['text2'];
            $syllabus->Teaching = $data['text3'];
            $syllabus->save();
            return redirect('/')->with('success', 'Success!');
        } else {
            // dd('error');

            return Redirect('/')->with('used', 'The syllabus name already exists !');
        }
    }
    public function syllabus()
    {
        if (Auth::check()) {

            $firstSyllabus = Syllabus::where('idUser', Auth::user()->id)->first();
            //print_r(explode("\r\n",$firstSyllabus));
            $syllabuses = Syllabus::where('idUser', Auth::user()->id)->paginate(8);
            $language = Session::get('language');
            if ($language == null) {
                $language = "vi";
            }
            if ($language == "en") {
                $lb = ConstraintLabel::find(1);
            } else {
                $lb = ConstraintLabel_vi::find(1);
            }
            if (sizeof($syllabuses) == 0) {
                return Redirect('/')->with('empty', 'Your syllabus is empty');
            }
            return view('syllabus', compact('syllabuses', 'firstSyllabus', 'lb', 'language'));
        } else {
            return Redirect('/login');
        }
    }

    public function content($id)
    {
        $content = Syllabus::where('idSyllabus', $id)->first();
        return response()->json($content);
    }

    public function check(Request $req)
    {
        $name = Syllabus::where('nameSyllabus', $req->name)->count();
        if ($name != 0) {
            return 'Name already in use.';
        } else {
            return 'Success.';
        }
    }
    public function edit(Request $req)
    {
        $data = $req->all();
        DB::table('syllabus')->where('idSyllabus', $data['idsyl'])->update(['intended' => $data['_ilo'], 'OutcomeBased' => $data['_oba'], 'Teaching' => $data['_tla']]);
        return Redirect('/syllabus');
    }

    public function delete(Request $req)
    {
        $data = $req->all();
        DB::table('syllabus')->where('idSyllabus', $data['idsyl_dl'])->delete();
        return Redirect('/syllabus');
    }

    public function export(Request $req)
    {
        $data = $req->all();
        $sylep = Syllabus::where('idSyllabus', $data['idsyl_ep'])->first();
        $wordTest = new \PhpOffice\PhpWord\PhpWord();
        $newSection = $wordTest->addSection();
        $desc1 = "Intended Learning Outcomes: ";
        $desc2 = $sylep->intended;
        $desc3 = "Outcome-based Assessment";
        $desc4 = $sylep->OutcomeBased;
        $desc5 = "Teaching and Learning Activities";
        $desc6 = $sylep->Teaching;

        $newSection->addText($desc1);
        $newSection->addText($desc2);
        $newSection->addText($desc3);
        $newSection->addText($desc4);
        $newSection->addText($desc5);
        $newSection->addText($desc6);

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('Syllabus.docx'));
        } catch (Exception $e) { }

        return response()->download(storage_path('Syllabus.docx'));
    }
}
