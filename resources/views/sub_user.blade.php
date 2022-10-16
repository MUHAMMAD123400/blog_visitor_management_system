@extends('template')

@section('mytitle', 'Sub User')

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
                    <div class="col col-md-6">Sub User Managemant</div>
                    <div class="col col-md-6">
                      <a href="{{ route('sub_user.add') }}" class="btn btn-success btn-sm float-right" > Add </a>
                    </div>
                  </div>

                </h5>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">created_at</th>
                        <th scope="col">updated_at</th>
                        <th scope="col">Type</th>
                        <th scope="col">action</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>     
                </div>
              </div>
        </div>
@include('DataTable_script')
{{-- <script>
    $(document).ready(function(){
        $('.table').DataTable({
            processing : true,
            serverSide: true,
            ajax: "{{ route('user.table') }}",
            columns: [
                {data: 'id' , name: 'id'},
                {data: 'name' , name: 'name'},
                {data: 'email' , name: 'email'},
                {data : "created_at",name : "created_at"},
                  {data : "updated_at",name : "updated_at"},
                  {data : "type",name : "type"},
                {data: 'action' , name: 'action' , orderable:false , searchable:false}
            ]
        });
    });
</script> --}}

{{-- another work --}}
<script>
  $(document).ready(function(){
   
  });
  
    $(document).ready(function(){

      // alert auto hide
        setTimeout(function(){
          $('#alert').fadeOut('slow');
        } , 5000 );

        // datatable ajax
        $('.table').DataTable({
            processing : true,
            serverSide: true,
            ajax: "{{ route('sub_user.fetchall') }}",
            columns: [
                {data: 'id' , name: 'id'},
                {data: 'name' , name: 'name'},
                {data: 'email' , name: 'email'},
                {data : "created_at",name : "created_at"},
                  {data : "updated_at",name : "updated_at"},
                  {data : "type",name : "type"},
                {data: 'action' , name: 'action' , orderable:false , searchable:false}
            ]
        });

        // delete data datatable
        $(document).on('click' , '.delete' , function(){
            var id = $(this).data('id');
            // alert(id);
            if(confirm("Are You sure you want to remove it?")){
              window.location.href = "/sub_user/delete/" + id;
            }
        });
    });
</script>
@endsection