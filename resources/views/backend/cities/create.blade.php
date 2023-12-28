@extends('backend.layouts')
@push('style')
    <style>
    </style>
@endpush
@push('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex-column flex-md-row">
                    <h5 class=" float_left">Add City</h5>
                    <div class="dt-action-buttons text-end pt-3 pt-md-0">
                        <div class="dt-buttons"> <a href="{{ route('admin.cities.index') }}"> <button
                                    class="btn btn-primary" type="button">City List</button> </a> </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ Form::model($city, ['route' => ['admin.cities.store'], 'role' => 'form',
                'id'=>'frmCity',
                'class' => 'row g-3', 'method'=>'post']) }}
                    @if($city->id)
                        {!! Form::hidden('id', $city->id) !!}
                    @endif
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required', 'placeholder' =>
                                'Name',
                                'id' => 'title','oninput' => 'filterAlphabets(this)']) !!}
                                <label for="title">Name <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="name-error"></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                       
                        
                    </div>
                    
                    <div class="col-12 mt-4">
                        <button class="btn btn-primary d-grid w-100" id="arpit" type="submit">Sumbit</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endpush
@push('script')
    <script>
        $(document).ready(function () {
            $('#frmCity').on('submit', function (e) {
                e.preventDefault();
                var $form = $(this);
                var url = $form.attr('action');
                var formData = new FormData($form[0]);
                $('.validation-class').html('');
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('.spinner-loader').css('display', 'block');
                    },
                    success: function (res) {
                        $('.spinner-loader').css('display', 'none');
                        if (res.status === 200) {
                            toastr.success(res.message);
                            window.location.href =
                                "{{ route('admin.cities.index') }}";
                        } else if (res.status === 422) {
                            $.each(res.message, function (key, value) {
                                $("#" + key + "-error").text(value[0]);
                            });
                        } else {
                            toastr.error(res.message);
                            $('#error').show().html(res.message);
                        }
                    },
                    error: function () {
                        $('.spinner-loader').css('display', 'none');
                        toastr.error('Oops... Something went wrong. Please try again.');
                    }
                });
            });
        });
        function filterAlphabets(inputField) {
      // Remove non-alphabetic characters using a regular expression
      inputField.value = inputField.value.replace(/[^a-zA-Z\s]/g, '');
    }

    </script>
@endpush
