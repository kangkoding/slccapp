@extends('template.simple.app')
@section('content')
	<div style="margin-top:15px">
        <div class="headline"><h3>Formulir Pendaftaran Pencari Kerja</h3></div>
        @if(!empty($message))
        <div class="well red">
            {{ $message }}
        </div>
        @endif
        <form method="post" action="{{ base_url('auth/create_user') }}" class="form-horizontal"> 
            <div class="tag-box tag-box-v3 form-page">                
            	<div class="headline"><h4>Data Login</h4></div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Username" required="" name="identity" value="{{ $username }}" required="" />
                        <div class="note"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Alamat Email</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Email untuk login" required="" name="email" value="{{ $email }}" required=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" placeholder="Password untuk login" required="" name="password"  required=""/>
                        <div class="note"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Konfirmasi Password</label>
                    <div class="col-lg-9">
                        <input type="password" class="form-control" placeholder="Ulangi password di atas" required="" name="password_confirm" required=""/>
                        <div class="note"></div>
                    </div>
                </div>
            </div>
                        <div class="tag-box tag-box-v3 form-page">
                <div class="headline"><h4>Data Pribadi</h4></div>                
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nama Lengkap</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" required="" name="full_name" value="{{ $full_name }}" required=""/>
                        <div class="note"></div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tempat Lahir</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Tempat Lahir" required="" name="birth_place" value="{{ $birth_place }}" required=""/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tanggal Lahir</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="Format tanggal/bulan/tahun. Contoh: 18/02/1980" id="date1" required="" value="{{ $birth_date }}" name="birth_date" required=""/>
                    </div>
                </div>
                        
                <div class="form-group">
                    <label class="col-lg-3 control-label">No KTP</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" placeholder="No KTP" required="" name="id_number" value="{{ $id_number }}" required=""/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jenis Kelamin</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="gender">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Alamat</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" rows="3" required="" value="{{ $address }}" name="address"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kota/Kabupaten</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="city_id">
                            @foreach($city as $ct)
                            <option value="{{ $ct-> id }}">{{ $ct->name }}</option>
                            @endforeach
                        </select>
                    	</div>
                </div>                
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kode Pos</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="Kode Pos" type="text" name="postal_code" value="{{ $postal_code }}" required=""/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">No Telepon</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="No Telepon" type="text" name="phone" value="{{ $phone }}" required=""/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">No Handphone</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="No Handphone" type="text" required="" name="mobile_number" value="{{ $mobile_number }}" required=""/>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Kewarganegaraan</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="country">
                            <option value="WNI">WNI</option>
                            <option value="WNA">WNA</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Status Perkawinan</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="marriage_status">
                            <option value="Kawin">Kawin</option>
                            <option value="Tidak Kawin">Tidak Kawin</option>
                            <option value="Janda">Janda</option>
                            <option value="Duda">Duda</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Agama</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="religion">
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Islam">Islam</option>
                            <option value="Budha">Budha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Pendidikan Tertinggi</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="id_kat_pendidikan">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">NIM (Khusus Alumni)</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="(kosongkan jika bukan alumni UDINUS)" type="text" value="{{ $nim }}" name="nim" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">IPK</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="Indeks Prestasi Kumulatif saat kuliah" type="text" value="{{ $ipk }}" name="ipk" />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Bidang</label>
                    <div class="col-lg-9">
                        <select class="form-control select2" name="id_bidang">
                            @foreach ($bidang as $bd)
                            <option value="{{ $bd->id }}">{{ $bd->bidang }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Jika anda penyandang disabilitas, tuliskan disini</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="" type="text" name="ket_disabilitas" value="{{ $ket_disabilitas }}" />
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-9">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
	</div>
@endsection