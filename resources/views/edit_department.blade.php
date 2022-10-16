@extends('template')

@section('mytitle', 'Edit Department')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header">Edit Department</h5>
            <div class="card-body">
                <form action="{{ route('department.edit_validation') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="form-label">Department Name</label>
                        <input type="text" class="form-control" name="department_name" value="{{ $data->department_name }}" >
                        @if($errors->has('department_name'))
                            <span class="text-danger">{{ $errors->first('department_name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Content Person</label>
                        @php
                        $contact_person = explode(" , " , $data->contact_person);
                        @endphp
                        @foreach($contact_person as $key )
                        <div class="row mt-2">
                        <div class="col com-md-10">
                            <input type="text" name="contact_person[]" class="form-control" value="{{ $key }}">
                        </div>
                        {{-- <div class="col-col-md-2">
                            @if($key == 0)
                                <button type="button" name="add_person" id="add_person" class="btn btn-success btn-sm">+</button>
                            @else
                                <button type="button" data-id="" class="btn btn-danger btn-sm">+</button>
                            @endif
                        </div> --}}
                        </div>
                        @endforeach
                        
                        <div id="append_person"></div>
                    </div>
                    <div class="form-group mb-3">
                        <input type="hidden" name="hidden_id" value="{{ $data->id }}">
                        <input type="submit" class="btn btn-primary" value="Edit">
                    </div>                    
                </form>
            </div>
          </div>
    </div>
    {{-- @include('DataTable_script') --}}
    {{-- <script> 
        // add row
        $(document).ready(function () {

            var count_person = $('#total_contact_person').val();

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

    </script> --}}
@endsection