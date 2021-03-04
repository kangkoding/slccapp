@extends('template.simple.page')
@section('content')
    <style>
        @media screen and(max-width:768px){
            .prodi {
                margin-top:70px;
            }
        }
    </style>
    <div class="container">
        <div class="row prodi">
            <div class="col-md-12">
                @php $lang = $this->session->userdata('swu_lang') @endphp
                <h4>@if($lang != 2) {{ $prodi->nama_program }} @else {{ $prodi->program_name }} @endif</h4>
                @if($lang != 2) {{ $prodi->deskripsi }} @else {{ $prodi->description }} @endif
            </div>
        </div>
    </div>
@endsection