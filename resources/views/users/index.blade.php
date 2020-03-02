@extends('layouts.app')


@section('content')
<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/components.css">

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

    <section class="section">
      <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-button">
          <a href="{{ route('users.create') }}" class="btn btn-primary">Add New</a>
        </div>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Users</a></div>
          <div class="breadcrumb-item">All Users</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">Users</h2>
        <p class="section-lead">

        </p>


        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Users</h4>
              </div>
              <div class="card-body">
                  <table class="table table-striped" id="table-1">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>NIM</th>
                      <th>TTL</th>
                      <th>Alamat</th>
                      <th>Angkatan</th>
                      <th>No Hp</th>
                      <th>Email</th>
                      <th>Level</th>
                      <th>Option</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $key => $user)
                    <tr>
                      <td>
                        {{ ++$i }}
                      </td>
                      <td>{{ $user->name }}
                    </td>
                    <td>
                      {{ $user->nim }}
                    </td>
                    <td>
                        {{ $user->ttl }}
                    </td>
                    <td>
                        {{ $user->alamat }}
                    </td>
                    <td>
                        {{ $user->angkatan }}
                    </td>
                    <td>
                        {{ $user->nohp }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->is_admin }}
                    </td>
                    <td>
                        <div class="table-links">
                            <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}">Show</a>
                            {{-- <div class="bullet"></div> --}}
                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            {{-- <div class="bullet"></div> --}}
                            <form action="{{ route('users.destroy', $user->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>

                          </div>
                    </td>
                </tr>
                    </tbody>
                    @endforeach
                  </table>
                </div>

                <div class="float-right">
                    {{ $data->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script>
        $(document).ready( function () {
         $('#table-1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ url('users-list') }}",
                columns: [
                         { data: 'id', name: 'id' },
                         { data: 'name', name: 'name' },
                         { data: 'email', name: 'email' },
                         { data: 'created_at', name: 'created_at' }
                      ]
             });
          });
       </script>
    <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="../node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script>

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="../assets/js/page/modules-datatables.js"></script>

    {{-- <script src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#user').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function(){

         load_data('');

         function load_data(user_query = '')
         {
          var _token = $("input[name=_token]").val();
          $.ajax({
           url:"{{ route('user.action') }}",
           method:"POST",
           data:{user_query:user_query, _token:_token},
           dataType:"json",
           success:function(data)
           {
            var output = '';
            if(data.length > 0)
            {
             for(var count = 0; count < data.length; count++)
             {
              output += '<tr>';
              output += '<td>'+data[count].name+'</td>';
              output += '<td>'+data[count].nim+'</td>';
              output += '<td>'+data[count].ttl+'</td>';
              output += '<td>'+data[count].alamat+'</td>';
              output += '<td>'+data[count].angkatan+'</td>';
              output += '<td>'+data[count].nohp+'</td>';
              output += '<td>'+data[count].email+'</td>';
              output += '<td>'+data[count].is_admin+'</td>';
              output += '</tr>';
             }
            }
            else
            {
             output += '<tr>';
             output += '<td colspan="6">No Data Found</td>';
             output += '</tr>';
            }
            $('tbody').html(output);
           }
          });
         }

         $('#search').click(function(){
          var user_query = $('#user').val();
          load_data(user_query);
         });

        });
        </script> --}}

@endsection
