@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('matakuliah.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Matakuliah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Matakuliah</a></div>
        <div class="breadcrumb-item">Edit Matakuliah</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Edit  Matakuliah</h2>
      <p class="section-lead">
        On this page you can Edit a Matakuliah and fill in all fields.
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
              <h4>Edit Matakuliah</h4>
            </div>
            <div class="card-body">
                {!! Form::model($matakuliah, ['method' => 'PATCH','route' => ['matakuliah.update', $matakuliah->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>kode:</strong>
                            {!! Form::text('kode', null, array('placeholder' => 'kode','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mata Kuliah Wajib:</strong>
                            {!! Form::text('matkulwajib', null, array('placeholder' => 'matkulwajib','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jumlah SKS:</strong>
                            {!! Form::text('sks', null, array('placeholder' => 'sks','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prasyarat:</strong>
                            {!! Form::text('prasyarat', null, array('placeholder' => 'prasyarat','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Co syarat:</strong>
                            {!! Form::text('cosyarat', null, array('placeholder' => 'cosyarat','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Semester:</strong>
                            <select class="form-control" name="semester_id" >
                                @foreach ($semester as $sem)
                                    <option value="{{ $sem->id }}">{{ $sem->name }}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
