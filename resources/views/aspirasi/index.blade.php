@extends('layouts.app')


@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

    <section class="section">
      <div class="section-header">
        <h1>Aspirasi</h1>
        <div class="section-header-button">
          <a href="{{ route('aspirasi.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Aspirasi</a></div>
          <div class="breadcrumb-item">All Aspirasi</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Aspirasi</h2>
        <p class="section-lead">

        </p>


        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Aspirasi</h4>
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
                  <table class="table table-striped" id="aspirasi">
                    <tr>
                      <th>No</th>
                      <th>Aspirasi</th>
                      <th>Options</th>
                    </tr>

                    @foreach ($data as $key => $aspirasi)
                    <tr>
                      <td>
                        {{ ++$i }}
                      </td>
                      <td>{{ $aspirasi->aspirasi }}
                    </td>
                    <td>
                        <div class="table-links">
                            <a class="btn btn-info btn-sm" href="{{ route('aspirasi.show',$aspirasi->id) }}">Show</a>
                            <div class="bullet"></div>
                            <a class="btn btn-primary btn-sm" href="{{ route('aspirasi.edit',$aspirasi->id) }}">Edit</a>
                            <div class="bullet"></div>
                            <form action="{{ route('aspirasi.destroy', $aspirasi->id)}}" method="post">
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
    {{-- <script type="text/javascript">
        $(document).ready( function () {
     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  $('#laravel_datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: {
          url: "{{ url('users-list') }}",
          type: 'GET',
          data: function (d) {
          d.start_date = $('#start_date').val();
          d.end_date = $('#end_date').val();
          }
         },
         columns: [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },
                  { data: 'email', name: 'email' },
                  { data: 'created_at', name: 'created_at' }
               ]
      });
   });

  $('#btnFiterSubmitSearch').click(function(){
     $('#laravel_datatable').DataTable().draw(true);
  });
      </script> --}}
@endsection
