@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('matakuliah.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Show Matakuliah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Matakuliah</a></div>
        <div class="breadcrumb-item">Show Matakuliah</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Show Matakuliah</h2>
      <p class="section-lead">
        On this page you can Show a Matakuliah and fill in all fields.
      </p>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Show Matakuliah</h4>
            </div>
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>kode:</strong>
                        {{ $matakuliah->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Mata Kuliah Wajib:</strong>
                        {{ $matakuliah->matkulwajib }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Semester:</strong>
                        {{ $matakuliah->semester->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prasyarat:</strong>
                        {{ $matakuliah->prasyarat }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Co Syarat:</strong>
                        {{ $matakuliah->cosyarat }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah SKS:</strong>
                        {{ $matakuliah->sks }}
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
