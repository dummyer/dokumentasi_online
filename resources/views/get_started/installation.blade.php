<link href="/css/main.css" rel="stylesheet">
<link href="/css/sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
						<a class="animate_hover" href="<?php echo url('/doc/'); ?>/<?php echo session('version'); ?>/{{ str_replace(' ', '-', strtolower($child->title)) }}">{{ $child->title }}</a>
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
				<input type="text" class="content__container_header_search_input" readonly placeholder="Search..." data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false" />
			</div>
			<div class="content__container_header_version">
				<div class="content__container_header_version_text">Version</div>
				<select class="content__container_header_version_select" id="vers" onChange="changeVersion()">
					@foreach($vers as $v)
						<option value="{{ $v }}" {{ (session('version') == $v) ? 'selected' : '' }}>{{ $v }}</option>
					@endforeach
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
			<h2 id="{{ str_replace(' ', '-', strtolower($parent->title)) }}"><i class="fa-solid fa-hashtag"></i><a class="content__container_body_title" href="#{{ str_replace(' ', '-', strtolower($parent->title)) }}">{{ $parent->title }}</a></h2>
				<div class="content__container_body_content">{!! $parent->content !!}</div>
				@foreach($daftar_isi_child as $child)
					@if($child->parent_id == $parent->id)
						<h3 id="{{ str_replace(' ', '-', strtolower($child->title)) }}"><i class="fa-solid fa-hashtag"></i><a class="content__container_body_title" href="#{{ str_replace(' ', '-', strtolower($child->title)) }}">{{ $child->title }}</a></h3>
						<div class="content__container_body_content">{!! $child->content !!}</div>
					@endif
				@endforeach
			@endforeach
		</div>
		
	</div>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Search</h4>
        </div>
        <div class="modal-body">
          <input class="form-control" id="searchForm" placeholder="Search Doc" autocomplete="off" />
		  <br>
		  <p id="search_content">Enter a search term to find results in the documentation.</p>
        </div>
		{{--
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
		--}}
      </div>
      
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="{{ url('/'); }}/js/jquery.mark.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$(document).ready(function(){
       scroll();

   });
   
   function scroll(){
	    $('html, body').animate({
           scrollTop: $(window.location.hash).offset().top
         }, 1000);
   }
	function showSideBar(id){
		$('#child_'+id).toggle('slow');
	}
	
	function changeVersion(){
		$.ajax({
                    
                    type: 'post',
                    url: '{{ url('/doc/change_version') }}',
                    data: {
						_token: '{{ csrf_token() }}',
						vers: $('#vers').val()
					},
                    dataType: 'json',
                    complete: function(data) {
						window.location.href = '{{ url('/doc/'); }}/'+$('#vers').val()+'/{{ $menu }}';
						//location.reload(true);
                    },
                    error: function(xhr, status) {
						//location.reload(true);
                    }
                });
	}
	
	$("#searchForm").on('keypress', function (e){
		var search = $(this).val().trim();
		 var sidebar_list_parent = <?php echo json_encode($parent_search); ?>;
		 var version = $('#vers').val();
		 
		if (e.which == 13 && search != '') {
			$('#search_content').empty();
			$(this).prop('disabled', true);
			Swal.fire({
				title: 'Please wait...',
				allowOutsideClick: false,
				showConfirmButton: false
			});
			swal.showLoading();
			
			$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var type = 'POST';
                var url = '{{ url('/doc/search_doc') }}';

                $.ajax({
                    type: type,
                    url: url,
					data: {
						_token: '{{ csrf_token() }}',
						search: search,
						version: version
					},
                    dataType: 'json',
                    complete: function(result) {
						swal.close();
						var data = result.responseJSON;
						
						for(var a=0;a<sidebar_list_parent.length;a++){
								$('#search_content').append('<ul>');
								$('#search_content').append('<label><a onClick="closeModal()" href="{{ url('/doc/'); }}/'+version+'/'+((sidebar_list_parent[a].sidebar.title).replace(/ /g,"-")).toLowerCase()+'#'+((sidebar_list_parent[a].title).replace(/ /g,"-")).toLowerCase()+'">'+sidebar_list_parent[a].title+'</a></label>');
								
								$('#search_content').append('<ul>');
										for(var i=0;i<data.length;i++){
											if(data[i].parent_id == sidebar_list_parent[a].id){
												$('#search_content').append('<li><a onClick="closeModal()" href="{{ url('/doc/'); }}/'+data[i].daftarisi_version.version+'/'+((data[i].sidebar.title).replace(/ /g,"-")).toLowerCase()+'#'+((data[i].title).replace(/ /g,"-")).trim().toLowerCase()+'">'+data[i].title+'</a></li>');
											}
										}
										$('#search_content').append('</ul>');
								$('#search_content').append('</ul>');
						
							
						}
						
						
						
						$('#searchForm').removeAttr('disabled')
						$('#search_content').mark(search);

						
                    },
                    error: function(xhr, status) {
                        swal.close();
                    }
                });
			
		}
	});
	
	function closeModal(){
		$('#myModal').modal('toggle');	
	}

</script>