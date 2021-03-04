@extends('template.simple.app')
@section('content')
    <div class="col-lg-12">
        <div class="headline"><h3>FAQ (Frequently Asked Questions)</h3></div>
                <div class="panel-group acc-v1 margin-bottom-40" id="accordion">
                    @foreach($data as $dt)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $dt->id }}">
                                    <strong>{{ $dt->question }}</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse{{ $dt-> id }}" class="panel-collapse collapse in">
                            <div class="panel-body">
                               <p>
                                 {{ $dt->answer }}
                               </p> 
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection