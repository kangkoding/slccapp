@extends('admin.template.admin')
@section('content')
	<h2>About Section</h2>    <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function(){
      tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        plugins: 'code print preview media searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
        toolbar1: 'code formatselect media | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        relative_urls: false,
        remove_script_host: false,
        image_class_list: [
            {title: 'None', value: ''},
            {title: 'Zoomable images', value: 'content-images'},
        ],
        templates: [
          { title: 'Test template 1', content: 'Test 1' },
          { title: 'Test template 2', content: 'Test 2' }
        ],
        images_upload_handler: function (blobInfo, success, failure) {
          var xhr, formData;
          xhr = new XMLHttpRequest();
          xhr.withCredentials = false;
          xhr.open('POST', "<?php echo base_url() ?>admin/post/upload_gambar");
          xhr.onload = function() {
              var json;
              if (xhr.status != 200) {
                  failure("HTTP Error: " + xhr.status);
                  return;
              }
              json = JSON.parse(xhr.responseText);
              if (!json || typeof json.location != "string") {
                  failure("Invalid JSON: " + xhr.responseText);
                  return;
              }
              success(json.location);
          };
          formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());
          xhr.send(formData);
        },
          valid_elements : "@[id|class|style|title|dir<ltr?rtl|lang|xml::lang],"
          + "a[rel|rev|charset|hreflang|tabindex|accesskey|type|"
          + "name|href|target|title|class],strong/b,em/i,strike,u,"
          + "#p[style],-ol[type|compact],-ul[type|compact],-li,br,img[longdesc|usemap|"
          + "src|border|alt=|title|hspace|vspace|width|height|align],-sub,-sup,"
          + "-blockquote,-table[border=0|cellspacing|cellpadding|width|frame|rules|"
          + "height|align|summary|bgcolor|background|bordercolor],-tr[rowspan|width|"
          + "height|align|valign|bgcolor|background|bordercolor],tbody,thead,tfoot,"
          + "#td[colspan|rowspan|width|height|align|valign|bgcolor|background|bordercolor"
          + "|scope],#th[colspan|rowspan|width|height|align|valign|scope],caption,-div,"
          + "-span,-code,-pre,address,-h1,-h2,-h3,-h4,-h5,-h6,hr[size|noshade],-font[face"
          + "|size|color],dd,dl,dt,cite,abbr,acronym,del[datetime|cite],ins[datetime|cite],"
          + "object[classid|width|height|codebase|*],param[name|value|_value],embed[type|width"
          + "|height|src|*],map[name],area[shape|coords|href|alt|target],bdo,"
          + "button,col[align|char|charoff|span|valign|width],colgroup[align|char|charoff|span|"
          + "valign|width],dfn,fieldset,form[action|accept|accept-charset|enctype|method],"
          + "input[accept|alt|checked|disabled|maxlength|name|readonly|size|src|type|value],"
          + "kbd,label[for],legend,noscript,optgroup[label|disabled],option[disabled|label|selected|value],"
          + "q[cite],samp,select[disabled|multiple|name|size],small,"
          + "textarea[cols|rows|disabled|name|readonly],tt,var,big",
          extended_valid_elements : "p[style]",
          inline_styles : true,
          verify_html : false
      });
    });
    </script>
    <div class="row">
    	<div class="col-md-12">
    		<form action="{{ base_url('admin/about_section/update') }}" method="post" enctype="multipart/form-data">
    			<div class="form-group">
    				<label for="">About Images</label><br>
    				<img src="{{ base_url('assets/images/').$data->about_images }}" alt="" style="height:50px">
    				<br>
    				<input type="file" name="about_images" class="form-control">
    				<input type="hidden" name="old_image" value="{{ $data->about_images }}">
    			</div>
    			<div class="form-group">
    				<label for="">About Text</label>
    				<textarea name="about_text" id="" cols="30" rows="10">{{ $data->about_text }}</textarea>
    			</div>
    			<div class="form-group">
    				<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    			</div>
    		</form>
    	</div>
    </div>
@endsection