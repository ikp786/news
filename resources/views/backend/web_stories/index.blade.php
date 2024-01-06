@extends('backend.layouts')
@push('style')
<style>
</style>
@endpush
@push('content')
<div class="card">
  <div class="card-header flex-column flex-md-row">
    <div class="dt-action-buttons text-end pt-3 pt-md-0">
      <div>
        <h5 class=" float_left">Web Stories</h5>
      </div>
    </div>
    <div class="dt-action-buttons text-end pt-3 pt-md-0">
      <div class="dt-buttons"> <a href="{{ route('admin.web_stories.create') }}"> <button class="btn btn-primary"
            type="button">Add New Story</button> </a> </div>
    </div>
  </div>
  <div class="card-body">
    <form class="dt_adv_search" method="POST">
      <div class="row">
        <div class="col-12">
          <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="form-floating form-floating-outline">
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
  <hr class="mt-0">
  <div class="card-datatable table-responsive">
    <table class="dt-advanced-search table table-bordered yajra-datatable">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
<hr class="my-5">
@endpush
@push('script')
<script type="text/javascript">
  $( document ).ready(function() {
    
    var table = $('.table-bordered').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
        url: "{{ route('admin.web_stories.index') }}",
        data: function(d) {
          // d.name = $('#title').val();
        }
      },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'short_description', name: 'short_description'},
            {data: 'status', name: 'status'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });  
    // Handle form field changes
    $('form.dt_adv_search input').on('keyup change input', function() {
      table.ajax.reload();
    });  
  });

$(document).on('click', '.delete-record', function () {
    var CategoryId = $(this).data('id');
    
    if (confirm('Are you sure you want to delete this Web Story?')) {
        $.ajax({
          url: "{{ url('admin/web_stories') }}/" + CategoryId, // Use the url() function
            type: 'DELETE',
            data: {
                '_token': '{{ csrf_token() }}', // You may need to pass CSRF token
            },
            success: function (res) {
              if (res.status === 200) {                      
                      toastr.success(res.message);
                      window.location.href = "{{ route('admin.web_stories.index') }}"; 
              }
            },
            error: function (xhr) {
              toastr.error('Oops... Something went wrong. Please try again.');
            }
        });
    }
});

$(document).on('click', '.change-status', function () {
    var CategoryId = $(this).data('id');  
        $.ajax({
          url: "{{ url('admin/web_stories/status') }}/" + CategoryId, // Use the url() function

            type: 'GET',
            data: {
                '_token': '{{ csrf_token() }}', // You may need to pass CSRF token
            },
            success: function (res) {
              if (res.status === 200) {                      
                      toastr.success(res.message);
                      // window.location.href = "{{ route('admin.web_stories.index') }}"; 
              }
            },
            error: function (xhr) {
              toastr.error('Oops... Something went wrong. Please try again.');
            }
        });    
});

</script>
@endpush