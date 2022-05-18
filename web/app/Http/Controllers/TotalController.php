<?php

namespace App\Http\Controllers;

use App\Models\Total;

class TotalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $total = Total::first();
        $cols = ['進站總人數'];
        $rows = [
            [
                'tag' => '',
                'text' => $total->total,
            ],
            [
                'tag' => 'button',
                'type' => 'button',
                'btn_color' => 'btn-info',
                'action' => 'edit',
                'id' => $total->id,
                'text' => '編輯',
            ],
        ];
        $view = [
            'header' => '進站人數管理',
            'module' => 'Total',
            'cols' => $cols,
            'rows' => $rows,
        ];
        return view('backend.module', $view);
    }
}