<link href="/css/main.css" rel="stylesheet">
<link href="/css/sidebar.css" rel="stylesheet">

<div class="base__container">
	<div class="sidebar__container">
		<div class="sidebar__container_menulist">
			<div class="sidebar__container_menulist_logo">
				<img class="sidebar__container_menulist_logo_img" src="<?php url('/'); ?>/assets/img/laravel.png"  />
			</div>
			@foreach($sidebar_list_parent as $parent)
			<ul class="sidebar__container_menulist_parent">
				<div class="sidebar__container_menulist_parent-label">{{ $parent->title }}</div>
				@foreach($sidebar_list_child as $child)
					@if($child->parent_id == $parent->id)
					<li class="sidebar__container_menulist_child"><div class="sidebar__container_menulist_child-label">{{ $child->title }}</div></li>
					@endif
				@endforeach
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
			
		</div>
		
	</div>
</div>