@extends('admin.template.admin')
@section('content')
    <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
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
        <h2 style="margin-top:0px"><?php echo $button ?> Program Studi</h2>
        <form action="<?php echo $action; ?>" method="post">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Bahasa Indonesia</a></li>
      <li><a data-toggle="tab" href="#menu1">English</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active" style="padding:10px;margin-bottom:10px;background-color:white;border:solid 1px #dcdcdc">
	    <div class="form-group">
            <label for="varchar">Nama Program <?php echo form_error('nama_program') ?></label>
            <input type="text" class="form-control" name="nama_program" id="nama_program" placeholder="Nama Program" value="<?php echo $nama_program; ?>" />
        </div>
	    <div class="form-group">
            <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <textarea class="form-control" rows="15" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" />
      </div>
      <div id="menu1" class="tab-pane fade" style="padding:10px;margin-bottom:10px;background-color:white;border:solid 1px #dcdcdc">
        <div class="form-group">
            <label for="varchar">Name <?php echo form_error('program_name') ?></label>
            <input type="text" class="form-control" name="program_name" id="program_name" placeholder="Name" value="<?php echo $program_name; ?>" />
        </div>
        <div class="form-group">
            <label for="description">Description <?php echo form_error('description') ?></label>
            <textarea class="form-control" rows="15" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />  
      </div>
    </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/program_studi') ?>" class="btn btn-default">Cancel</a>
	</form>
@endsection