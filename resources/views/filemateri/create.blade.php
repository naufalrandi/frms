@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('filemateri.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Filemateri</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Filemateri</a></div>
        <div class="breadcrumb-item">Create New Filemateri</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Create New Filemateri</h2>
      <p class="section-lead">
        On this page you can create a new Filemateri and fill in all fields.
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
              <h4>Create Filemateri</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('filemateri.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama File:</strong>
                            <input type="text" name="name" class="form-control" placeholder="neme" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong> Link File:</strong>
                                {!! Form::text('file', null, array('placeholder' => 'Link File','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mata Kuliah:</strong>
                            <select class="form-control" name="matkul_id" >
                                @foreach ($matakuliah as $matakuliah)
                                    <option value="{{ $matakuliah->id }}">{{ $matakuliah->matkulwajib }}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
