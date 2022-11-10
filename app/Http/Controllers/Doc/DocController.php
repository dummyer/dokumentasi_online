<?php

namespace App\Http\Controllers\Doc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Sidebar;
use App\Models\DaftarIsi;

class DocController extends Controller
{
    function index($version = null, $menu = 1){
		$sidebar_list_parent = Sidebar::where('is_show', true)->where('is_parent', true)->get();
		$sidebar_list_child = Sidebar::where('is_show', true)->where('is_parent', false)->get();
		$daftar_isi = DaftarIsi::where('sidebar_id', $menu)->get();;

		if($version != null){
			
		}else{
			//return 1;
		}
		
		return view('get_started.installation', compact('sidebar_list_parent', 'sidebar_list_child'. 'daftar_isi'));
	}
}
