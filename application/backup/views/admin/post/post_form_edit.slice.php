@extends('admin.template.admin')
@section('content')
    <script src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
    <script>
    $(document).ready(function(){
      tinymce.init({
        selector: 'textarea',
        height: 500,
        theme: 'modern',
        media_strict: false,
        plugins: 'media print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern',
        toolbar1: 'media | formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
        image_advtab: true,
        relative_urls: false,
        remove_script_host: false,
        link_class_list: [
            {title: 'None', value: ''},
            {title: 'PDF / GAMBAR', value: 'pdf'},
        ],
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
        valid_elements : "*[*]",
        extended_valid_elements: "iframe[src|width|height|name|align], embed[width|height|name|flashvars|src|bgcolor|align|play|loop|quality|allowscriptaccess|type|pluginspage]",
        inline_styles : true,
        media_filter_html: false,
        verify_html : false
      });
    });
    </script>
    <style>
      .chosen-container,
      .chosen-container+.help-inline,
      [class*=chosen-container] {
          vertical-align: middle
      }

      .select2-container-multi.tag-input-style .select2-choices .select2-search-choice,
      .select2.tag-input-style .select2-selection .select2-selection__choice,
      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice {
          font-weight: 400;
          text-shadow: 1px 1px 1px rgba(0, 0, 0, .15);
          transition: all .2s ease 0s;
          vertical-align: baseline;
          white-space: nowrap
      }

      .chosen-container>.chosen-single,
      [class*=chosen-container]>.chosen-single {
          line-height: 28px;
          height: 32px;
          box-shadow: none;
          background: #FAFAFA
      }

      .chosen-choices {
          box-shadow: none!important
      }

      .chosen-container-single .chosen-single abbr {
          background: 0 0
      }

      .chosen-container-single .chosen-single abbr:after {
          content: "\f00d";
          display: inline-block;
          color: #888;
          font-family: FontAwesome;
          font-size: 13px;
          position: absolute;
          right: 0;
          top: -7px
      }

      .chosen-container-single .chosen-single abbr:hover:after,
      .chosen-container-single.chosen-disabled .chosen-single abbr:hover:after {
          color: #464646
      }

      .chosen-single div b {
          background: 0 0!important
      }

      .chosen-container .chosen-results-scroll-down span,
      .chosen-container .chosen-results-scroll-up span,
      .chosen-container-multi .chosen-choices li.search-choice .search-choice-close,
      .chosen-rtl .chosen-search input[type=text] {
          background: 0 0
      }

      .chosen-single div b:before {
          content: "\f0d7";
          display: inline-block;
          color: #888;
          font-family: FontAwesome;
          font-size: 12px;
          position: relative;
          top: -1px;
          left: 1px
      }

      .chosen-container-active.chosen-with-drop .chosen-single div b:before {
          content: "\f0d8"
      }

      .chosen-container-single .chosen-search {
          position: relative
      }

      .chosen-container-single .chosen-search input[type=text] {
          background: 0 0;
          border-radius: 0;
          line-height: 28px;
          height: 28px
      }

      .chosen-container-single .chosen-search:after {
          content: "\f002";
          display: inline-block;
          color: #888;
          font-family: FontAwesome;
          font-size: 14px;
          position: absolute;
          top: 8px;
          right: 12px
      }

      .chosen-container-multi .chosen-choices li.search-field input[type=text] {
          height: 25px
      }

      .chosen-container-multi .chosen-choices li.search-choice {
          line-height: 16px;
          padding-bottom: 4px
      }

      .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:before {
          content: "\f00d";
          display: inline-block;
          color: #888;
          font-family: FontAwesome;
          font-size: 13px;
          position: absolute;
          right: 2px;
          top: -1px
      }

      .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover {
          text-decoration: none
      }

      .chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover:before,
      .chosen-container-multi .chosen-choices li.search-choice-focus .search-choice-close:before {
          color: #464646
      }

      .chosen-container .chosen-results-scroll-down span:before,
      .chosen-container .chosen-results-scroll-up span:before {
          content: "\f0d7";
          display: inline-block;
          color: #888;
          font-family: FontAwesome;
          font-size: 12px;
          position: relative;
          top: -1px;
          left: 1px
      }

      .chosen-container .chosen-results-scroll-up span:before,
      .chosen-container-active .chosen-single-with-drop div b:before {
          content: "\f0d8"
      }

      .chosen-rtl .chosen-search:after {
          content: "";
          display: none
      }

      .chosen-rtl .chosen-search:before,
      .select2-search:before {
          content: "\f002";
          font-family: FontAwesome
      }

      .chosen-rtl .chosen-search:before {
          display: inline-block;
          color: #888;
          font-size: 14px;
          position: absolute;
          top: 9px;
          left: 12px
      }

      .chosen-container-single .chosen-single {
          border-radius: 0
      }

      .chosen-container .chosen-results li.highlighted {
          background: #316AC5;
          color: #FFF
      }

      .chosen-container-single .chosen-drop {
          border-radius: 0;
          border-bottom: 3px solid #4492C9;
          border-color: #4492C9
      }

      .chosen-container-active .chosen-single,
      .chosen-single.chosen-single-with-drop {
          border-color: #4492C9
      }

      .form-group.has-error .chosen-single {
          border-color: #f2a696!important
      }

      .form-group.has-info .chosen-single {
          border-color: #72aec2!important
      }

      .form-group.has-warning .chosen-single {
          border-color: #e3c94c!important
      }

      .form-group.has-success .chosen-single {
          border-color: #9cc573!important
      }

      .chosen-container-active.chosen-with-drop .chosen-single {
          border-color: #4492C9
      }

      .chosen-container.chosen-with-drop .chosen-drop {
          left: auto;
          right: auto;
          display: block
      }

      @media only screen and (-webkit-min-device-pixel-ratio:2),
      only screen and (min-resolution:144dpi) {
          .chosen-container .chosen-results-scroll-down span,
          .chosen-container .chosen-results-scroll-up span,
          .chosen-container-multi .chosen-choices li.search-choice .search-choice-close,
          .chosen-container-single .chosen-search input[type=text],
          .chosen-container-single .chosen-single abbr,
          .chosen-container-single .chosen-single div b,
          .chosen-rtl .chosen-search input[type=text] {
              background-image: none!important;
              background-repeat: no-repeat!important;
              background-size: auto!important
          }
      }

      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice {
          background-image: none;
          background-color: #91B8D0;
          color: #FFF;
          display: inline-block;
          font-size: 13px;
          margin-bottom: 3px;
          margin-right: 3px;
          padding: 6px 22px 7px 9px;
          position: relative;
          border: none;
          -webkit-box-shadow: none;
          box-shadow: none;
          border-radius: 0
      }

      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice .search-choice-close {
          position: absolute;
          top: 0;
          bottom: 0;
          right: 0;
          width: 18px;
          height: auto;
          line-height: 25px;
          text-align: center
      }

      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice .search-choice-close:before {
          color: #FFF;
          position: static;
          font-size: 11px
      }

      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover {
          background-color: rgba(0, 0, 0, .2)
      }

      .tag-input-style+.chosen-container-multi .chosen-choices li.search-choice .search-choice-close:hover:before {
          color: #FFF
      }

      .tag-input-style+.chosen-container-multi.chosen-rtl .chosen-choices li.search-choice {
          padding: 6px 9px 7px 22px;
          margin-left: 0;
          margin-right: 3px!important
      }

      .tag-input-style+.chosen-container-multi.chosen-rtl .chosen-choices li.search-choice .search-choice-close {
          right: auto;
          left: 0
      }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/chosen.min.css'); ?>">
    <h2 style="margin-top:0px">Post <?php echo $button ?></h2>
    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Bahasa Indonesia</a></li>
      <li><a data-toggle="tab" href="#menu1">English</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active" style="padding:10px;margin-bottom:10px;background-color:white;border:solid 1px #dcdcdc">
            <div class="form-group">
                <label for="varchar">Judul <?php echo form_error('judul') ?></label>
                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul" value="<?php echo $judul; ?>" />
            </div>
            <div class="form-group">
                <label for="isi">Isi <?php echo form_error('isi') ?></label>
                <textarea class="form-control" rows="15" name="isi" id="isi" placeholder="Isi"><?php echo $isi; ?></textarea>
            </div>
            <?php if(!empty($featured_image)): ?>
                <img src="<?php echo base_url('assets/images/').$featured_image ?>" alt="" style="height:200px;border:solid 5px silver">
            <?php endif; ?>
            <div class="form-group">
                <label for="varchar">Featured Image <?php echo form_error('featured_image') ?></label>
                <input type="file" name="featured_image" class="form-control">
                <input type="hidden" name="old_image" value="<?php echo $featured_image ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
      </div>
      <div id="menu1" class="tab-pane fade" style="padding:10px;margin-bottom:10px;background-color:white;border:solid 1px #dcdcdc">
            <div class="form-group">
                <label for="varchar">Title <?php echo form_error('title') ?></label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
            </div>
            <div class="form-group">
                <label for="isi">Content <?php echo form_error('content') ?></label>
                <textarea class="form-control" rows="15" name="content" id="content" placeholder="Content"><?php echo $title; ?></textarea>
            </div>
            <?php if(!empty($featured_image)): ?>
                <img src="<?php echo base_url('assets/images/').$featured_image ?>" alt="" style="height:200px;border:solid 5px silver">
            <?php endif; ?>
      </div>
    </div>
      <div class="form-group">
          <label class="" for="#">Kategori</label>
          <select multiple="" class="chosen-select form-control" name="kategori" id="form-field-select-4" data-placeholder="Kategori Blog">
            <?php
            print_r($kategori);
            ?>
          </select>
          <input type="hidden" name="kat" id="kat">
      </div>
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/post') ?>" class="btn btn-default">Cancel</a>
	</form>
  <!-- page specific plugin scripts -->
  <script src="<?php echo base_url() ?>assets/ace/chosen.jquery.min.js"></script>
  <!-- ace scripts -->
  <script src="<?php echo base_url() ?>assets/ace/ace-elements.min.js"></script>
  <script src="<?php echo base_url() ?>assets/ace/ace.min.js"></script>
  <script>
  $(document).ready(function(){
    $('.chosen-select').change(function(){
      var data = $('.chosen-select').val();
      $('#kat').val(data);
    });
  });
  </script>
  <script>
    if(!ace.vars['touch']) {
        $('.chosen-select').chosen({allow_single_deselect:true});
    }
  </script>
@endsection