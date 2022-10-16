@extends('template')

@section('mytitle', 'Visitor')

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
              <div class="col col-md-6">Visitor Managemant</div>
              <div class="col col-md-6">
                {{-- <a href="/department/add" class="btn btn-success btn-sm float-right" > Add </a> --}}
              </div>
            </div>

          </h5>
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderd" id="visitor_table">
                    <thead>
                      <tr>
                        <th scope="col">Visitor Name</th>
                        <th scope="col">Meet Person Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Time In</th>
                        <th scope="col">Time Out</th>
                        <th scope="col">Status</th>
                        <th scope="col">Enter By</th>
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
        var table = $('#visitor_table').DataTable({
            processing:true,
            serverSide:true,
            ajax: "{{ route('visitor.fetchall') }}",
            columns: [
                {data:'visitor_name' , name:'visitor_name' },
                {data:'visitor_meet_person_name' , name:'visitor_meet_person_name' },
                {data:'visitor_department' , name:'visitor_department' },
                {data:'visitor_enter_time' , name:'visitor_enter_time' },
                {data:'visitor_out_time' , name:'visitor_out_time' },
                {data:'visitor_status' , name:'visitor_status' },
                {data:'name' , name:'name' },
                {data:'action' , name:'action' , orderable:false , searchable:false}
            ]
        });
    });
</script>
@endsection