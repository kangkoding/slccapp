@extends('template.simple.page')
@section('subcontent')
    <style>
		@media screen and (max-width: 460px) {
            .banner-left {
                height: 60px!important;
                background-position-y: -370px!important;
            }
		}
    </style>
	<div class="row p-20">
		@php $lang = $this->session->userdata('swu_lang') @endphp
		<div class="h-title" style="padding-bottom:10px;border-bottom:dotted 1px silver">
			<h3><i class="fa fa-files-o"></i> @if($lang != 2) {{ $data->judul }} @else {{ $data->title }} @endif  </h3>
			<span>{{ date('D, F, Y', strtotime($data->created)) }}</span>
		</div>
		<div class="content p-20">
			@if($lang != 2) {{ $data->isi }} @else {{ $data->content }} @endif
			
			<iframe src="" style="width:0px;height:0px" frameborder="0" id="embeded"></iframe>
		</div>
	</div>
	<!-- The Modal -->
    <div class="modal" id="modalPDF">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Lihat</h4>
            <button type="button" class="close">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" id="embed">
          </div>
        </div>
      </div>
    </div>
	<script>
	    $(document).ready(function(){
	       var src = $('.pdf').attr('href');
	       if(src != ''){
	           $('#embeded').attr('src',src).attr('style','width:100%; height:70vh;');
	       }
	       $('.pdf').click(function(e){
	          e.preventDefault();
	          var file = $(this).attr('href');
	          $('#embed').html('<iframe src="'+file+'" style="width:100%; height:70vh;" frameborder="0" id="embed"></iframe>');
	          $('#modalPDF').show();
	       });
	       $('.close').click(function(){
	           $('#modalPDF').hide(); 
	       });
	    });
	</script>
@endsection