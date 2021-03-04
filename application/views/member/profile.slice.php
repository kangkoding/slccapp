@extends('template.simple.app')
@section('content')
	<div class="row" style="margin-top:15px;padding-right:10px">
            <div class="table-label">
                <div class="clear"></div>
            </div>
            <div class="panel panel-green">
                <div class="panel-heading">
                    Ubah Profil
                </div>
                <div class="panel-body">
                    <div class="form-container table-container">
                        <form action="<?php echo base_url('member/page/change_profile') ?>" method="post" id="crudForm"  enctype="multipart/form-data" class="form-horizontal" accept-charset="utf-8">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Nama Lengkap<span class='required'>*</span></label>
                            <div class="col-sm-9">
                            <input id='field-cari_fullname' class='form-control' name='full_name' type='text' value="{{ $data_user->full_name }}" maxlength='64' />
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Tempat Lahir<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <input id='field-cari_birthplace' class='form-control' name='birth_place' type='text' value="{{ $data_user->birth_place }}" maxlength='16' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Tanggal Lahir<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <input id='field-cari_birthdate' name='birth_date' type='text' value='{{ $data_user->birth_date }}' maxlength='10' class='datepicker-input form-control' />
        						<a class='datepicker-input-clear' tabindex='-1'>Bersihkan</a> (dd/mm/yyyy)                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                No. KTP<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <input id='field-cari_ktp' class='form-control' name='id_number' type='text' value="{{ $data_user->id_number }}" maxlength='32' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Jenis Kelamin<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select id='field-cari_kelamin' name='cari_kelamin' class='chosen-select form-control' data-placeholder='Pilih Jenis Kelamin'>
                                    @if($data_user->gender == 'Pria')
                                    <option value='Pria' selected>Pria</option>
                                    @elseif($data_user->gender == 'Wanita')
                                    <option value='Wanita' selected >Wanita</option>
                                    @else
                                    <option value='Pria'>Pria</option>
                                    <option value='Wanita'>Wanita</option>
                                    @endif
                                </select>                                  
                                </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Alamat<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <textarea id='field-cari_alamat' name='address' class='texteditor form-control' >{{ $data_user->address }}</textarea>                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Kota/Kabupaten<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select name="city_id" id="city_id" class="form-control">
                                    @foreach($city_id as $city)
                                        @if($data_user->city_id == $city->id)
                                        <option value="{{ $city->id  }}" selected>{{ $city->name }}</option>
                                        @else
                                        <option value="{{ $city->id  }}">{{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Kode Pos</label>
                            <div class="col-sm-9">
                                <input id='field-cari_kodepos' class='form-control' name='postal_code' type='text' value="{{ $data_user->postal_code }}" maxlength='5' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                No. Telepon</label>
                            <div class="col-sm-9">
                                <input id='field-cari_telepon' class='form-control' name='phone' type='text' value="{{ $data_user->phone }}" maxlength='16' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                No. HP<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <input id='field-cari_hp' class='form-control' name='mobile_number' type='text' value="{{ $data_user->mobile_number }}" maxlength='16' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Kewarganegaraan<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select id='field-cari_kewarganegaraan' name='country' class='chosen-select form-control' data-placeholder='Pilih Kewarganegaraan'>
                                    @if($data_user->country == 'WNI')
                                    <option value='WNI' selected='selected' >WNI</option>
                                    @elseif($data_user->country == 'WNA')
                                    <option value='WNA' selected >WNA</option>
                                    @else
                                    <option value='WNI'>WNI</option>
                                    <option value='WNA'>WNA</option>
                                    @endif
                                </select>                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Status<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select id='field-cari_marital' name='marriage_status' class='chosen-select form-control' data-placeholder='Pilih Status'>
                                    @if($data_user->marriage_status == 'Kawin')
                                    <option value='Kawin'  selected>Kawin</option>
                                    @elseif($data_user->marriage_status == 'Tidak Kawin')
                                    <option value='Tidak Kawin' selected>Tidak Kawin</option>
                                    @elseif($data_user->marriage_status == 'Janda')
                                    <option value='Janda' selected >Janda</option>
                                    @elseif($data_user->marriage_status == 'Duda')
                                    <option value='Duda'  selected>Duda</option>
                                    @else
                                    <option value='Kawin'  >Kawin</option>
                                    <option value='Tidak Kawin' >Tidak Kawin</option>
                                    <option value='Janda'  >Janda</option>
                                    <option value='Duda'  >Duda</option>
                                    @endif
                                </select>                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Agama<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select id='field-cari_agama' name='cari_agama' class='chosen-select form-control' data-placeholder='Pilih Agama'>
                                    @if($data_user->religion == 'Islam')
                                    <option value='Islam' selected>Islam</option>
                                    @elseif($data_user->religion == 'Kristen')
                                    <option value='Kristen' selected>Kristen</option>
                                    @elseif($data_user->religion == 'Katolik')
                                    <option value='Katolik' selected>Katolik</option>
                                    @elseif($data_user->religion == 'Budha')
                                    <option value='Budha' selected>Budha</option>
                                    @elseif($data_user->religion == 'Hindu')
                                    <option value='Hindu' selected>Hindu</option>
                                    @elseif($data_user->religion == 'Konghucu')
                                    <option value='Konghucu' selected>Konghucu</option>
                                    @elseif($data_user->religion == 'Lainya')
                                    <option value='Lainnya' selected>Lainnya</option>
                                    @else
                                    <option value='Islam'>Islam</option>
                                    <option value='Kristen'>Kristen</option>
                                    <option value='Katolik'>Katolik</option>
                                    <option value='Budha'>Budha</option>
                                    <option value='Hindu'>Hindu</option>
                                    <option value='Konghucu'>Konghucu</option>
                                    <option value='Lainnya'>Lainnya</option>
                                    @endif
                                </select>                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Pendidikan<span class='required'>*</span></label>
                            <div class="col-sm-9">
                                <select id='field-pendidikan_id'  name='pendidikan_id' class='chosen-select form-control' data-placeholder='Pilih Pendidikan' style='width:300px'>
                                    @foreach($kat_pendidikan as $pend)
                                        @if($pend->id == $data_user->id_kat_pendidikan)
                                        <option value='{{ $pend->id }} ' selected>{{ $pend->pendidikan }}</option>
                                        @else
                                        <option value='{{ $pend->id }} '>{{ $pend->pendidikan }}</option>
                                        @endif
                                    @endforeach
                                </select>                                    
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                IPK (Jika Kuliah)</label>
                            <div class="col-sm-9">
                                <input id='field-cari_ipk' class='form-control' name='ipk' type='text' value="{{ $data_user->ipk }}" maxlength='4' />                                    </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Bidang</label>
                            <div class="col-sm-9">
                                <select id='field-bid_id'  name='id_bidang' class='chosen-select form-control' data-placeholder='Pilih Bidang' style='width:300px'>
                                    @foreach($bidang as $bd)
                                        @if($bd->id == $data_user->id_bidang)
                                        <option value='{{ $bd->id }}  ' selected>{{ $bd->bidang }}</option>
                                        @else
                                        <option value='{{ $bd->id }}  ' >{{ $bd->bidang }}</option>
                                        @endif
                                    @endforeach
                                </select>                                   
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" style="text-align:left">
                                Jika anda penyandang cacat tuliskan disini</label>
                            <div class="col-sm-9">
                                <input id='field-cari_cacat' class='form-control' name='ket_disabilitas' type='text' value="" maxlength='128' />                                    </div>
                        </div>
                        <div class="form-group">
                        <div id='report-error' class='report-div error bg-danger' style="display:none"></div>
                        <div id='report-success' class='report-div success bg-success' style="display:none"></div>
                    	</div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-7">
                                <button class="btn btn-default btn-success b10" type="submit" id="form-button-save">
                                    <i class="fa fa-save"></i>
                                    Simpan
                                </button>
        					</div>
                        </div>
                        </form>                
                    </div>
                </div>
            </div>
	</div>
@endsection