<link href="/css/main.css" rel="stylesheet">
<link href="/css/sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="base__container">
	<div class="sidebar__container">
		<div class="sidebar__container_menulist">
			<div class="sidebar__container_menulist_logo">
				<img class="sidebar__container_menulist_logo_img" src="<?php url('/'); ?>/assets/img/laravel.png"  />
			</div>
			@foreach($sidebar_list_parent as $parent)
			<ul class="sidebar__container_menulist_parent">
				<a class="animate_hover" href="#{{ str_replace(' ', '-', strtolower($parent->title)) }}" onClick="showSideBar({{ $parent->id }})">{{ $parent->title }}</a>
				<div id="child_{{ $parent->id }}" class="menu_list {{ ($active_menu != null && $active_menu->parent_id == $parent->id) ? 'active':''}}">
				@foreach($sidebar_list_child as $child)
					@if($child->parent_id == $parent->id)
					<li class="sidebar__container_menulist_child">
					<span class="{{ str_replace(' ', '-', strtolower($child->title)) == $menu ? 'active_dot' : '' }}"></span>
						<a class="animate_hover" href="<?php echo url('/doc/1/'); ?>/{{ str_replace(' ', '-', strtolower($child->title)) }}">{{ $child->title }}</a>
					</li>
					@endif
				@endforeach
				</div>
			</ul>
			@endforeach
		</div>
	</div>
	<div class="content__container">
		<div class="content__container_header">
			<div class="content__container_header_search">
				<div class="content__container_header_search_text"></div>
				<input type="text" class="content__container_header_search_input" placeholder="Search..." />
			</div>
			<div class="content__container_header_version">
				<div class="content__container_header_version_text">Version</div>
				<select class="content__container_header_version_select">
					<option>9.x</option>
				</select>
			</div>
		</div>
		
		<div class="content__container_isi">
			<h1 class="content__container_isi_title">{{ $title }}</h1>
			@foreach($daftar_isi_parent as $parent)
			<ul class="content__container_isi_daftarisi_parent">
				<i class="fa-solid fa-hashtag"></i><a href="#{{ str_replace(' ', '-', strtolower($parent->title)) }}">{{ $parent->title }}</a>
				@foreach($daftar_isi_child as $child)
					@if($child->parent_id == $parent->id)
					<li class="content__container_isi_daftarisi_child">
						<i class="fa-solid fa-hashtag"></i><a href="#{{ str_replace(' ', '-', strtolower($child->title)) }}">{{ $child->title }}</a>
					</li>
					@endif
				@endforeach
			</ul>
			@endforeach
		</div>
		
		<div class="content__container_body">
			@foreach($daftar_isi_parent as $parent)
			<h2><i class="fa-solid fa-hashtag"></i><a class="content__container_body_title" href="#{{ str_replace(' ', '-', strtolower($parent->title)) }}">{{ $parent->title }}</a></h2>
				<div class="content__container_body_content">{!! $parent->content !!}</div>
				@foreach($daftar_isi_child as $child)
					@if($child->parent_id == $parent->id)
						<h3><i class="fa-solid fa-hashtag"></i><a class="content__container_body_title" href="#{{ str_replace(' ', '-', strtolower($child->title)) }}">{{ $child->title }}</a></h3>
						<div class="content__container_body_content">{!! $child->content !!}</div>
					@endif
				@endforeach
			@endforeach
		</div>
		
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script>
	function showSideBar(id){
		$('#child_'+id).toggle('slow');
	}

</script>