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

class AdminController extends Controller
{
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
        $total = User::where('admin', '=', '0')->count();
        return view('admin.dashboard', compact('total'));
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
        $descLevels = Levels::all();
        return view('admin.descLevels', compact('descLevels'));
    }
    public function editDL($id)
    {
        $dl = Levels::find($id);
        return view('admin.editDL', compact('dl'));
    }
    public function editedDL(Request $request, $id)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $lv = Levels::find($id);
            $lv->descriptionLevel = $data['descLV'];
            $lv->save();
            return redirect('admin/descLevels')->with('flash_message_success', 'Description Level Update Successfully!');
        } else {
            return redirect('admin/descLevels')->with('flash_message_error', 'Description Level Update Losing!');
        }
    }
    public function suggest(Request  $request, $idTemplate)
    {
        $template = Templates::find($idTemplate);
        $sg = Suggests::where('idTemplate', $idTemplate)->get();
        return view('admin.suggests', compact('sg', 'template'));
    }
    public function editSG($idTemp, $idLV)
    {
        $sg = Suggests::where([
            ['idTemplate', '=', $idTemp],
            ['idLevel', '=', $idLV]
        ])->first();
        return view('admin.editSG', compact('idTemp', 'sg'));
    }
    public function editedSG(Request $request, $idTemp, $idLV)
    {
        if ($request->isMethod('POST')) {
            $data = $request->all();
            $title = $data['titleSG'];
            $desc = $data['descSG'];
            $ex = $data['exampleSG'];
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
            return redirect('admin/suggest/' . $idTemp)->with('flash_message_success', 'Suggest Update Successfully!');
        } else {
            return redirect('admin/suggest/' . $idTemp)->with('flash_message_error', 'Description Level Update Losing!');
        }
    }
}
