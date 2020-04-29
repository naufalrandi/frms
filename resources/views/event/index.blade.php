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
                <div class="clearfix mb-3"></div>

                <div class="table-responsive">
                  <table class="table table-striped" id="event">
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Link File</th>
                      <th>Mata kuliah</th>
                      <th>Options</th>
                    </tr>

                    @foreach ($data as $key => $event)
                    <tr>
                      <td>
                        {{ ++$i }}
                      </td>
                      <td>{{ $event->name }}</td>
                      <td><a href="{{ $event->file }}">{{ $event->file }} </a></td>
                      <td>{{ $event->matakuliah->matkulwajib }}</td>
                    <td>
                        <div class="table-links">
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
