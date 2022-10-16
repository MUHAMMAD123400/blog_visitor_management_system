@extends('template')

@section('mytitle', 'Add Department')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Add New Department</h5>
            <div class="card-body">
                <form action="{{ route('department.add_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Department Name</label>
                        <input type="text" class="form-control" name="department_name">
                        @if($errors->has('department_name'))
                            <span class="text-danger">{{ $errors->first('department_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Content Person</label>
                        <div class="row">
                            <div class="col col-md-10">
                                <input type="text" name="contact_person[]" class="form-control" >
                            </div>
                            <div class="col col-md-2">
                                <button type="button" name="add_person" id="add_person" class="btn btn-success btn-sm" >+</button>
                            </div>
                        </div>
                        <div id="append_person"></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </form>
            </div>
          </div>
    </div>
    {{-- @include('DataTable_script') --}}
    <script> 
        // add row
        $(document).ready(function () {

            var count_person = 0;

            $(document).on('click' , '#add_person' , function(){
                count_person++;
                var html = '<div class="row mt-2" id="person_'+count_person+'"><div class="col-md-10"><input type="text" name="contact_person[]" class="form-control department_content_person"></div><div class="col-md-2"><button type="button" name="remove_person" class="btn btn-danger btn-sm remove_person" data-id="'+count_person+'" >-</button></div></div>';
            $('#append_person').append(html);
            });
        
            // remove row
            $(document).on('click' , '.remove_person' , function(){
                var btn_id = $(this).data('id');
                $('#person_'+btn_id).remove();
            });

        });

    </script>
@endsection