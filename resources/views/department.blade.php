@extends('template')


@section('mytitle', 'Department')

@section('content')
<div class="container-fluid">
    @if(session()->has('success'))
      <div id="alert" class="alert alert-success">
          {{session()->get('success')}}
      </div>
    @endif
        <div class="card">
          <h5 class="card-header">
            <div class="row">
              <div class="col col-md-6">Department Managemant</div>
              <div class="col col-md-6">
                <a href="/department/add" class="btn btn-success btn-sm float-right" > Add </a>
              </div>
            </div>

          </h5>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd" id="department_table">
                    <thead>
                      <tr>
                        <th scope="col">Department Name</th>
                        <th scope="col">Contact Person</th>
                        <th scope="col">created_at</th>
                        <th scope="col">updated_at</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>  
            </div>  
          </div>
        </div>
  </div>

  <script>
    $(document).ready(function () {

      setTimeout(function(){
                $('#alert').fadeOut('slow');
            } , 5000);

        $('#department_table').DataTable({
            processing:true,
            serverSide:true,
            ajax:'{{ route("department.fetch_all") }}',
            columns: [
                {data: 'department_name' , name: 'department_name'},
                {data: 'contact_person' , name: 'contact_person'},
                {data: 'created_at' , name: 'created_at'},
                {data: 'updated_at' , name: 'updated_at'},
                {data: 'action' , name: 'action' , orderable:false , searchable:false},
            ]
        });

        // delete
        $(document).on('click' , '.delete' , function(){
          var id = $(this).data('id');
            if(confirm("Are you sure you want to delete it?")){
                window.location.href="/department/delete/"+id;
            }
        });


    });

  </script>
@endsection
