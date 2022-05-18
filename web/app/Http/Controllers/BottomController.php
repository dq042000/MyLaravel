<?php

namespace App\Http\Controllers;

use App\Models\Bottom;

class BottomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bottom = Bottom::first();
        $cols = ['頁尾版權文字'];
        $rows = [
            [
                'tag' => '',
                'text' => $bottom->bottom,
            ],
            [
                'tag' => 'button',
                'type' => 'button',
                'btn_color' => 'btn-info',
                'action' => 'edit',
                'id' => $bottom->id,
                'text' => '編輯',
            ],
        ];
        $view = [
            'header' => '頁尾版權管理',
            'module' => 'Bottom',
            'cols' => $cols,
            'rows' => $rows,
        ];
        return view('backend.module', $view);
    }
}