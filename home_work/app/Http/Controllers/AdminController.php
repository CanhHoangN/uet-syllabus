<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Levels;
use App\Suggests;
use App\Templates;
use App\Methods;
use App\Levels_vi;
use App\Suggests_vi;
use App\Templates_vi;
use App\Methods_vi;
use App\Syllabus;
use App\ConstraintLabel_vi;
use App\ConstraintLabel;

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function language($lg)
    {
        if (Session::has('language')) {
            Session::forget('language');
        }
        Session::put('language', $lg);
        return redirect('/admin/dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'admin' => '1'])) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/admin')->with('flash_message_error', 'Invalid Username or Password');
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard()
    {
        $totalUsers = User::where('admin', '=', '0')->count();
        $totalTemps = Templates::count();
        $totalLevels = Levels::count();
        $totalMethods = Methods::count();
        $totalSuggests = Suggests::count();
        $totalSyllabus = Syllabus::count();
        return view('admin.dashboard', compact('totalUsers', 'totalTemps', 'totalLevels', 'totalMethods', 'totalSuggests', 'totalSyllabus'));
    }
    public function logout()
    {
        Session::flush();
        return redirect('/admin/logut')->with('flash_message_success', 'Logged out Successfully');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function checkPassword(Request $request)
    {
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if (Hash::check($current_password, $check_password->password)) {
            echo "true";
            die;
        } else {
            echo "false";
            die;
        }
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if (Hash::check($current_password, $check_password->password)) {
                $password = bcrypt($data['new_pwd']);
                User::where('id', '1')->update(['password' => $password]);
                return redirect('/admin/settings')->with('flash_message_success', 'Password update Successfully!');
            } else {
                return redirect('/admin/settings')->with('flash_message_error', 'Incorrect Current Password!');
            }
        }
    }
    public function descLevels()
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $descLevels = Levels::all();
        } else {
            $descLevels = Levels_vi::all();
        }

        return view('admin.descLevels', compact('descLevels'));
    }
    public function editDL($id)
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $dl = Levels::find($id);
        } else {
            $dl = Levels_vi::find($id);
        }

        return view('admin.editDL', compact('dl'));
    }
    public function editedDL(Request $request, $id)
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($request->isMethod('POST')) {
            $data = $request->all();
            if ($language == "en") {
                $lv = Levels::find($id);
            } else {
                $lv = Levels_vi::find($id);
            }

            $lv->nameLevel = $data['lv'];
            $lv->descriptionLevel = $data['descLV'];
            $lv->save();
            return redirect('admin/descLevels')->with('flash_message_success', 'Description Level Update Successfully!');
        } else {
            return redirect('admin/descLevels')->with('flash_message_error', 'Description Level Update Losing!');
        }
    }
    public function suggest(Request  $request, $idTemplate)
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $sg = Suggests::where('idTemplate', $idTemplate)->get();
        } else {
            $sg = Suggests_vi::where('idTemplate', $idTemplate)->get();
        }
        $template = Templates::find($idTemplate);
        return view('admin.suggests', compact('sg', 'template'));
    }
    public function editSG($idTemp, $idLV)
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $sg = Suggests::where([
                ['idTemplate', '=', $idTemp],
                ['idLevel', '=', $idLV]
            ])->first();
        } else {
            $sg = Suggests_vi::where([
                ['idTemplate', '=', $idTemp],
                ['idLevel', '=', $idLV]
            ])->first();
        }

        return view('admin.editSG', compact('idTemp', 'sg'));
    }
    public function editedSG(Request $request, $idTemp, $idLV)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $title = $data['titleSG'];
            $desc = $data['descSG'];
            $ex = $data['exampleSG'];

            $language = Session::get('language');

            if ($language == null) {
                $language = "vi";
            }
            if ($language == "en") {
                Suggests::where([
                    ['idTemplate', '=', $idTemp],
                    ['idLevel', '=', $idLV]
                ])->update(
                    [
                        'title' => $title,
                        'descriptionSuggest' => $desc,
                        'example' => $ex
                    ]
                );
            } else {
                Suggests_vi::where([
                    ['idTemplate', '=', $idTemp],
                    ['idLevel', '=', $idLV]
                ])->update(
                    [
                        'title' => $title,
                        'descriptionSuggest' => $desc,
                        'example' => $ex
                    ]
                );
            }

            return redirect('admin/suggest/' . $idTemp)->with('flash_message_success', 'Suggest Update Successfully!');
        } else {
            return redirect('admin/suggest/' . $idTemp)->with('flash_message_error', 'Description Level Update Losing!');
        }
    }

    public function methods()
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $mt = Methods::all();
        } else {
            $mt = Methods_vi::all();
        }

        return view('admin.methods', compact('mt'));
    }
    public function editMT($id)
    {
        $language = Session::get('language');

        if ($language == null) {
            $language = "vi";
        }
        if ($language == "en") {
            $mt = Methods::find($id);
        } else {
            $mt = Methods_vi::find($id);
        }
        return view('admin.editMT', compact('mt'));
    }
    public function editedMT(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();

            $language = Session::get('language');

            if ($language == null) {
                $language = "vi";
            }
            if ($language == "en") {
                $mt = Methods::find($id);
            } else {
                $mt = Methods_vi::find($id);
            }
            $mt->nameMethod = $data['nameMethod'];
            $mt->save();
            return redirect('admin/methods')->with('flash_message_success', 'Method Update Successfully!');
        } else {
            return redirect('admin/methods')->with('flash_message_error', 'Methods Update Losing!');
        }
    }
    public function customers()
    {
        $customers = User::orderBy('admin', 'DESC')->paginate(50);
        $total = User::count();
        return view('admin.listCustomers', compact('customers', 'total'));
    }
    public function listCustomer(Request $request)
    {
        $data = $request->all();
        $name = $data['cName'];

        $customers = User::where('name', 'LIKE', '%' . $name . '%')
            ->paginate(50);
        $total = User::where('name', 'LIKE', '%' . $name . '%')
            ->count();
        return view('admin.listCustomers', compact('customers', 'total'));
    }

    public function deleteCustomer($id)
    {
        $customer = User::find($id);
        $customer->delete();
        return redirect('admin/customers')->with('flash_message_success', 'Delete User Successfully!');
    }

    public function addAdmin($id)
    {
        $customer = User::find($id);
        if ($customer->admin == 0) {
            $customer->admin = 1;
            $customer->save();
            return redirect('admin/customers')->with('flash_message_success', 'Add Admin Successfully!');
        } else {
            return redirect('admin/customers')->with('flash_message_error', 'Add Admin failure!');
        }
    }
    public function editUser($id)
    {
        $customer = User::find($id);
        return view('admin.editUser', compact('customer'));
    }

    public function editedUser(Request $request, $id)
    {
        if ($request->isMethod('POST')) 
        {
            $data = $request->all();
            $customer = User::find($id);
            $customer->name = $data['nameUser'];
            $customer->email = $data['email'];
            $customer->save();
            return redirect('admin/customers')->with('flash_message_success', 'Edit User Successfully!');
        }
    }
    public function editConstraintLB()
    {
        $language = Session::get('language');

            if ($language == null) {
                $language = "vi";
            }
        if($language == "en")
        {
            $lb = ConstraintLabel::find(1);
        }
        else
        {
            $lb = ConstraintLabel_vi::find(1);
        }
        return view('admin.editConstraintLB', compact('lb'));
    }
    public function editedConstraintLB(Request $request)
    {
        $data = $request->all();
        
        $language = Session::get('language');

            if ($language == null) {
                $language = "vi";
            }
        if($language == "en")
        {
            $lb = ConstraintLabel::find(1);
        }
        else
        {
            $lb = ConstraintLabel_vi::find(1);
        }
        $lb->nameApp = $data['nameApp'];
        $lb->l1 = $data['l1'];
        $lb->title = $data['title'];
        $lb->des = $data['des'];
        $lb->r1 = $data['r1'];
        $lb->r2 = $data['r2'];
        $lb->r3 = $data['r3'];
        $lb->save();
    }

    public function syllabus($id)
    {
        $firstSyllabus = Syllabus::where('idUser', $id)->first();
        //print_r(explode("\r\n",$firstSyllabus));
        $syllabuses = Syllabus::where('idUser', $id)->get();
        if (sizeof($syllabuses) == 0) {
            return Redirect('/admin/customers')->with('empty', 'Your syllabus is empty');
        }
        return view('admin.syllabus', compact('syllabuses', 'firstSyllabus'));
    }
    public function getContent($id)
    {
        $content = Syllabus::where('idSyllabus', $id)->first();
        return response()->json($content);
    }
}
