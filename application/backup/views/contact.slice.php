@extends('template.simple.app')
@section('content')
<div class="col-lg-12">
        <div class="headline"><h3>Formulir Hubungi Kami</h3></div>
        <form id="formx" method="post" action="<?php echo base_url('home/contact_send') ?>" class="form-horizontal" role="form">
            
            <div class="tag-box tag-box-v3 form-page">                
            	<div class="headline"><h4>Hubungi Kami</h4></div>                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Nama" required="" name="gb_name" />
                        
                    </div>
                </div>
                              
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Alamat Email" name="gb_email"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Telepon</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="No. Telepon" name="gb_telepon"/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Pesan</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" rows="3" required="" name="gb_message"></textarea>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection