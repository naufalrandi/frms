@extends('layouts.app')


@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('matakuliah.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Create New Matakuliah</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Matakuliah</a></div>
        <div class="breadcrumb-item">Create New Matakuliah</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Create New Matakuliah</h2>
      <p class="section-lead">
        On this page you can create a new Matakuliah and fill in all fields.
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
              <h4>Create Matakuliah</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('matakuliah.store') }}" method="POST">
                    @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Kode:</strong>
                            <input type="text" name="kode" class="form-control" placeholder="kode" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Mata Kuliah :</strong>
                            <input type="text" name="matkulwajib" class="form-control" placeholder="Mata Kuliah wajib" required>
                        </div>
                    </div><div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Wajib / minat:</strong>
                            <input type="text" name="minat" class="form-control" placeholder="Wajib atau Minat, Jika minat tulis bidang minat" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Jumlah SKS:</strong>
                            <input type="text" name="sks" class="form-control" placeholder="Jumlah SKS" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prasyarat:</strong>
                            <input type="text" name="prasyarat" class="form-control" placeholder="Prasyarat">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Co Syarat:</strong>
                            <input type="text" name="cosyarat" class="form-control" placeholder="Co Syarat">
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
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
