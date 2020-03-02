@extends('layouts.app')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

    <section class="section">
      <div class="section-header">
        <h1>Event</h1>
        <div class="section-header-button">
          <a href="{{ route('event.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Event</a></div>
          <div class="breadcrumb-item">All Event</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Event</h2>
        <p class="section-lead">

        </p>


        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Event</h4>
              </div>
              <div class="card-body">
                {{-- <div class="float-right">
                  <form action="{{ route('users.search') }}" method="GET">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="search" value="{{ old('search') }}">
                      <div class="input-group-append">
                        <button class="btn btn-primary" value="search"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div> --}}

                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                  <table class="table table-striped" id="event">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Tempat</th>
                      <th>Tanggal</th>
                      <th>Waktu</th>
                      <th>Options</th>
                    </tr>

                    @foreach ($data as $key => $event)
                    <tr>
                      <td>
                        {{ ++$i }}
                      </td>
                      <td>{{ $event->name }}</td>
                      <td>{{ $event->tempat }}</td>
                      <td>{{ $event->date }}</td>
                      <td>{{ $event->time }}</td>
                    <td>
                        <div class="table-links">
                            <a class="btn btn-info btn-sm" href="{{ route('event.show',$event->id) }}">Show</a>
                            <div class="bullet"></div>
                            <a class="btn btn-primary btn-sm" href="{{ route('event.edit',$event->id) }}">Edit</a>
                            <div class="bullet"></div>
                            <form action="{{ route('event.destroy', $event->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>

                          </div>
                    </td>
                </tr>
                @endforeach
              </table>

                <div class="float-right">
                    {{ $data->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
