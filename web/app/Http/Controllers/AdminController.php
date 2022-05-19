<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $all = Admin::all();
        $cols = ['帳號', '密碼', '刪除', '操作'];
        $rows = [];
        foreach ($all as $a) {
            $temp = [
                [
                    'tag' => '',
                    'text' => $a->acc,
                ],
                [
                    'tag' => '',
                    'text' => str_repeat('*', strlen($a->pw)),
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-danger',
                    'action' => 'delete',
                    'id' => $a->id,
                    'text' => '刪除',
                ],
                [
                    'tag' => 'button',
                    'type' => 'button',
                    'btn_color' => 'btn-info',
                    'action' => 'edit',
                    'id' => $a->id,
                    'text' => '編輯',
                ],
            ];
            $rows[] = $temp;
        }
        $view = [
            'header' => '管理者管理',
            'module' => 'Admin',
            'cols' => $cols,
            'rows' => $rows,
        ];
        return view('backend.module', $view);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $view = [
            'action' => '/admin/admin',
            'modal_header' => '新增管理者',
            'modal_body' => [
                [
                    'label' => '帳號',
                    'tag' => 'input',
                    'type' => 'text',
                    'name' => 'acc',
                ],
                [
                    'label' => '密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pw',
                ],
                [
                    'label' => '確認密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pw2',
                ],
            ],
        ];
        return view('modals.base_modal', $view);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $admin = new Admin();
        $admin->acc = $request->input('acc');
        $admin->pw = Hash::make($request->input('pw'));
        $admin->save();
        return redirect('/admin/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $admin = Admin::find($id);
        $view = [
            'action' => '/admin/admin/' . $id,
            'method' => 'patch',
            'modal_header' => '編輯管理者資料',
            'modal_body' => [
                [
                    'label' => '帳號',
                    'tag' => '',
                    'text' => $admin->acc,
                ],
                [
                    'label' => '密碼',
                    'tag' => 'input',
                    'type' => 'password',
                    'name' => 'pw',
                    'value' => $admin->pw,
                ],
            ],
        ];
        return view('modals.base_modal', $view);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $admin = Admin::find($id);
        if ($admin->pw != $request->input('pw')) {
            $admin->pw = Hash::make($request->input('pw'));
            $admin->save();
        }
        return redirect('/admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Admin::destroy($id);
    }
}