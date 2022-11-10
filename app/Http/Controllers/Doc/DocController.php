<?php

namespace App\Http\Controllers\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Sidebar;
use App\Models\DaftarIsi;

class DocController extends Controller
{
    function index($version, $menu = null){
		$daftar_isi_parent = [];
		$daftar_isi_child = [];
		if($menu == null){
			$menu = str_replace('-', ' ', strtolower(DaftarIsi::first()->title));
		}
		$title = ucwords(str_replace('-', ' ', $menu));
		$active_menu = Sidebar::where('title', 'ILIKE', '%'.$title.'%')->first();
		$sidebar_list_parent = Sidebar::where('is_show', true)->where('is_parent', true)->get();
		$sidebar_list_child = Sidebar::where('is_show', true)->where('is_parent', false)->get();
		$daftar_isi_parent = DaftarIsi::where('is_parent', true)->whereHas('sidebar', function($q) use($title){
			$q->where('title', 'ILIKE', '%'.$title.'%');
		})->get();
		$daftar_isi_child = DaftarIsi::where('is_parent', false)->whereHas('sidebar', function($q) use($title){
			$q->where('title', 'ILIKE', '%'.$title.'%');
		})->get();
		if($version != null){
			
		}else{
			//return 1;
		}
		
		
		return view('get_started.installation', compact('sidebar_list_parent', 'sidebar_list_child', 'daftar_isi_parent', 'daftar_isi_child', 'title', 'menu', 'active_menu'));
	}
}
