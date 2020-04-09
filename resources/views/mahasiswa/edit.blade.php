@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Edit Mahasiswa</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Mahasiswa</a></div>
        <div class="breadcrumb-item">Edit Mahasiswa</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Edit  Mahasiswa</h2>
      <p class="section-lead">
        On this page you can Edit a Mahasiswa and fill in all fields.
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
              <h4>Edit Mahasiswa</h4>
            </div>
            <div class="card-body">
                {!! Form::model($mahasiswa, ['method' => 'PATCH','route' => ['mahasiswa.update', $mahasiswa->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>NIM:</strong>
                            {!! Form::text('nim', null, array('placeholder' => 'nim','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jenis Kelamin:</strong>
                            <select class="form-control" name="jeniskelamin" >
                                <option>Laki Laki</option>
                                <option>Perempuan</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tempat tanggal lahir:</strong>
                            {!! Form::date('ttl', null, array('placeholder' => 'ttl','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Alamat:</strong>
                            {!! Form::textarea('alamat', null, array('placeholder' => 'alamat','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Angkatan:</strong>
                            {!! Form::text('angkatan', null, array('placeholder' => 'angkatan','class' => 'form-control')) !!}
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
