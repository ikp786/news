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
                <h5 class=" float_left">Add Category</h5>
                <div class="dt-action-buttons text-end pt-3 pt-md-0">
                    <div class="dt-buttons"> <a href="{{ route('admin.categories.index') }}"> <button
                                class="btn btn-primary" type="button">Category List</button> </a> </div>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($category, ['route' => ['admin.categories.store'], 'role' => 'form', 'id'=>'frmCategory', 'class' => 'row g-3', 'method'=>'post']) }}
                @if($category->id)
                {!! Form::hidden('id', $category->id) !!}
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title', 'id' => 'title']) !!}
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="title-error"></span>
                        </div>
                    </div>
                    @php
                        $layout = config('constants.LAYOUTS');
                    @endphp
                    <div class="col-md-6 ">
                        <div class="form-floating form-floating-outline">
                            {!! Form::select('layout', $layout,null, ['class' => 'form-select  form-select-lg', 'id' => 'layout', 'placeholder' => 'Select Layout']) !!}
                            <label for="layout">layout <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="layout-error"> </span>
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-floating form-floating-outline">
                            {!! Form::select('status', [1 => 'Active',0=>'Inactive'],null, ['class' => 'form-select  form-select-lg', 'id' => 'status', 'placeholder' => 'Select status']) !!}
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <span class="text-danger validation-class" id="status-error"> </span>                            
                        </div>
                    </div>

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
            $('#frmCategory').on('submit', function (e) {
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
                                "{{ route('admin.categories.index') }}";
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