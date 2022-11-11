<?php

namespace App\Http\Controllers\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Sidebar;
use App\Models\DaftarIsi;
use App\Models\Version;

class DocController extends Controller
{
    function index($version, $menu = null){
		$vers = [];
		$get_vers = Version::all();
		foreach($get_vers as $v){
			array_push($vers, $v->version);
		}
			if(in_array($version, $vers)){
				session()->put('version', $version);
			}else{
				session()->put('version', $vers[0]);
			}
	
		
		if(!in_array($version, $vers)){
			return abort(404);
		}
	
		$daftar_isi_parent = [];
		$daftar_isi_child = [];
		if($menu == null){
			$menu = str_replace('-', ' ', strtolower(DaftarIsi::first()->title));
		}
		
		$selected_vers = session('version');
		$title = ucwords(str_replace('-', ' ', $menu));
		$active_menu = Sidebar::where('title', 'ILIKE', '%'.$title.'%')->whereHas('sidebar_version', function($q) use($selected_vers){
			$q->where('version', $selected_vers);
		})->first();
		$sidebar_list_parent = Sidebar::where('is_show', true)->where('is_parent', true)->whereHas('sidebar_version', function($q) use($selected_vers){
			$q->where('version', $selected_vers);
		})->get();
		$sidebar_list_child = Sidebar::where('is_show', true)->where('is_parent', false)->whereHas('sidebar_version', function($q) use($selected_vers){
			$q->where('version', $selected_vers);
		})->get();
		$daftar_isi_parent = DaftarIsi::where('is_parent', true)->whereHas('sidebar', function($q) use($title){
			$q->where('title', 'ILIKE', '%'.$title.'%');
		})->whereHas('daftarisi_version', function($q) use($selected_vers){
			$q->where('version', $selected_vers);
		})->get();
		$daftar_isi_child = DaftarIsi::where('is_parent', false)->whereHas('sidebar', function($q) use($title){
			$q->where('title', 'ILIKE', '%'.$title.'%');
		})->whereHas('daftarisi_version', function($q) use($selected_vers){
			$q->where('version', $selected_vers);
		})->get();
		if($version != null){
			
		}else{
			//return 1;
		}
		
		
		return view('get_started.installation', compact('sidebar_list_parent', 'sidebar_list_child', 'daftar_isi_parent', 'daftar_isi_child', 'title', 'menu', 'active_menu', 'vers'));
	}
	
	function change_version(Request $request){
		session()->put('version', $request->vers);
		
	}
}
