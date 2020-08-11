@extends('layouts.app')

@section('content')
<section class="section" style="padding-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div class="section-title text-center">
                        <h3>WIN WIN<br>
                          <small>EMPRESAS REGISTRADAS</small></h3>
                          <br>
                    </div>

                    <!--div class="service-box text">
                      <p>Estas son las empresas que trabajan con nosotros.</p>
                    </div-->
                </div>
            </div>
            @if(count($empresas) >= 1)
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
                <form method="get" class="form-inline">
				<div class="form-group">
                    <label>Industria</label>
					<select name="industria" class="form-control select2">
                        <option></option>
                        @foreach($industrias as $emp)
                        <option value="{{ $emp->industria }}" {{ ($emp->industria == request('industria') ? 'selected':'') }}>{{ $emp->nombreIndustria($emp->industria) }}</option>
                        @endforeach
                    </select>
					<button class="btn btn-default">Filtrar</button>
				</div>
                </form>
            </div>
            <div class="col-md-12"><br></div>

                @foreach($empresas as $logo)
                    <div class="col-md-3 col-sm-4 text-center" style="margin-bottom: 20px;">
                        <a href="https://{{ $logo->web }}" target="_blank" class="logo-web"><img src="{{ Storage::disk('public')->url('logos/'.$logo->logo) }}" class="img-responsive" style="margin-bottom: 5px;"></a>
                        <a href="mailto:{{ $logo->email }}">{{ $logo->email }}</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection
