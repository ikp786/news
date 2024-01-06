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
                <h5 class=" float_left">Add Web Story</h5>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons"> <a href="{{ route('admin.web_stories.index') }}"> <button
                                class="btn btn-primary" type="button">Web Story List</button> </a> </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($news, ['route' => ['admin.web_stories.store'], 'role' => 'form', 'id'=>'frmWebStory', 'class' => 'row g-3', 'method'=>'post']) }}
                @if($news->id)
                {!! Form::hidden('id', $news->id) !!}
                @endif
                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::select('category_id', $categories,null, ['class' => 'form-select', 'id' => 'category_id', 'placeholder' => 'Select category']) !!}
                            <label for="category_id">Category <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="category_id-error"> </span>                            
                        </div>
                    </div>

                   

                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::text('city[]', null, ['class' => 'form-control', 'placeholder' => 'City', 'id' => 'city']) !!}
                            <label for="city">City <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="city-error"></span>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::text('title[]', null, ['class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title']) !!}
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="title-error"></span>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::text('short_description[]', null, ['class' => 'form-control', 'placeholder' => 'Short Description', 'id' => 'short_description']) !!}
                            <label for="short_description">Short Description <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="short_description-error"></span>
                        </div>
                    </div>


                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::file('image[]', ['class' => 'form-control', 'id' => 'image']) !!}
                            <label for="image">Image <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="image-error"></span>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::select('status[]', [1 => 'Active',0=>'Inactive'],null, ['class' => 'form-select  form-select-lg', 'id' => 'status', 'placeholder' => 'Select status']) !!}
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="status-error"> </span>                            
                        </div>
                    </div>
                </div>

                <div id="form-fields-container">
                    <script type="text/html" id="form-field-template">
                        <div class="row">
                            <hr>
       
                        <div class="col-md-6 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::text('city[]', null, ['class' => 'form-control', 'placeholder' => 'City', 'id' => 'city']) !!}
                                <label for="city">City <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="city-error"></span>
                            </div>
                        </div>

                        <div class="col-md-6 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::text('title[]', null, ['class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title']) !!}
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="title-error"></span>
                            </div>
                        </div>
    
                        <div class="col-md-6 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::text('short_description[]', null, ['class' => 'form-control', 'placeholder' => 'Short Description', 'id' => 'short_description']) !!}
                                <label for="short_description">Short Description <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="short_description-error"></span>
                            </div>
                        </div>
    
                        <div class="col-md-6 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::file('image[]', ['class' => 'form-control', 'id' => 'image']) !!}
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="image-error"></span>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mt-3">
                            <div class="form-floating form-floating-outline">
                                {!! Form::select('status[]', [1 => 'Active',0=>'Inactive'],null, ['class' => 'form-select  form-select-lg', 'id' => 'status', 'placeholder' => 'Select status']) !!}
                                <label for="status">Status <span class="text-danger">*</span></label>
                                <span class="text-danger validation-class" id="status-error"> </span>                            
                            </div>
                        </div>
                        <div class="col-md-2">
                        <button type="button" style="width:100px" class="btn btn-danger remove-field mt-4">Remove</button>
                        </div>
                    </div>
                    </script>
                </div>
                <button type="button" style="width:145px" class="btn btn-success" id="add-field">Add Field</button>
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

      $('#category_id').change(function () {
            var categoryId = $(this).val();

            // Make an AJAX request to get the layout based on the selected category
            $.ajax({
                url: '{{ route('admin.web_stories.layout') }}', // Replace with your actual route
                type: 'POST',
                data: {
                    'category_id': categoryId,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Update the layout input with the received layout value
                    $('#layout').val(response.layout);
                },
                error: function () {
                    console.error('Error fetching layout.');
                }
            });
        });

            let fieldCounter = 1;

            $('#add-field').click(function () {
                var template = $('#form-field-template').html();
                var clone = $(template);

                // Update IDs and names to ensure uniqueness
                clone.find('[id]').each(function () {
                    var originalId = $(this).attr('id');
                    $(this).attr('id', originalId + '-' + fieldCounter);
                });

                clone.find('[name]').each(function () {
                    var originalName = $(this).attr('name');
                    $(this).attr('name', originalName + '-' + fieldCounter);
                });

                fieldCounter++;

                // Append the cloned form fields to the container
                $('#form-fields-container').append(clone);

                // Add functionality to remove button
                $('.remove-field').click(function () {
                    // $(this).parent().remove();
                    $(this).closest('.row').remove(); 
                });
            });
            
            $('#frmWebStory').on('submit', function (e) {
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
                                "{{ route('admin.web_stories.index') }}";
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

</script>
@endpush