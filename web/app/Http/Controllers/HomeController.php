<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Image;
use App\Models\Menu;
use App\Models\Mvim;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->sideBar();

        $ads = implode('  ', Ad::where('sh', 1)->get()->pluck('text')->all());
        $mvims = Mvim::where('sh', 1)->get();
        $this->view['ads'] = $ads;
        $this->view['mvims'] = $mvims;
        return view('main', $this->view);
    }

    protected function sideBar()
    {
        $menus = Menu::where('sh', 1)->get();
        $images = Image::where('sh', 1)->get();
        foreach ($menus as $key => $menu) {
            $subs = $menu->subs;
            $menu->subs = $subs;
            $menus[$key] = $menu;
        }
        $this->view['menus'] = $menus;
        $this->view['images'] = $images;
    }
}