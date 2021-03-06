@extends('admin.template.admin')
@section('content')

        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            .dataTables_wrapper {
                min-height: 500px
            }
            
            .dataTables_processing {
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                margin-left: -50%;
                margin-top: -25px;
                padding-top: 20px;
                text-align: center;
                font-size: 1.2em;
                color:grey;
            }
          #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
          #sortable li {     
            height: auto!important;
            line-height: 1.2em;
            padding: 10px;
            border: solid 1px white;
            background-color: #2196F3;
            color: white; 
          }
          html>body #sortable li { height: 1.5em; line-height: 1.2em; }
          .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
        </style>
        <div class="row">
            <div class="col-md-9">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-12">
                        <h2 style="margin-top:0px">Panel Sidebar</h2>
                    </div>
                    <div class="col-md-6 text-center">
                        <div style="margin-top: 4px"  id="message">
                            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo anchor(site_url('admin/sidebar/create'), 'Create', 'class="btn btn-primary"'); ?>
                    </div>
                    <div class="col-md-12" style="margin-top:20px">
                        <table class="table table-bordered table-striped" id="mytable">
                            <thead>
                                <tr>
                                    <th width="80px">No</th>
                                    <th>Title</th>
                                    <th width="200px">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <h2>Urutkan Sidebar</h2>
                <div class="panel panel-primary panel-body">
                    <ul id="sortable">
                    <?php foreach ($sidebar as $list): ?>
                        <li class="ui-state-default" id="item-<?php echo $list->id ?>"><?php echo $list->title ?></li>
                    <?php endforeach ?>
                    </ul>
                    <br>
                    <button id="sorted" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>


        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "sidebar/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id",
                            "orderable": false
                        },{"data": "title"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
          $( function() {
            $( "#sortable" ).sortable({
              placeholder: "ui-state-highlight",
            });
            $( "#sortable" ).disableSelection();
            $('#sorted').click(function(){
                var data = $('#sortable').sortable('serialize');
                $.ajax({
                    url:'<?php echo base_url("admin/sidebar/change_arrange");?>',
                    type:'post',
                    data:data,
                    success:function(response){
                        window.location.reload();
                    }
                });
            });
          } );
        </script>
@endsection