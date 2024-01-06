@extends('backend.layouts')
@push('content')


<div class="row ">
  <!-- Ratings -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card" style="background-color: #C2D9FF">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Total Latest News</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">{{isset($associate) ? $associate : 0}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Ratings -->
  <!-- Sessions -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card" style="background-color: #DADDB1">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Total Category News</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">{{isset($totalAssociate) ? $totalAssociate : 0}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <!-- Sessions -->
  <!-- Ratings -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card" style="background-color: #C2D9FF">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Total Recent News</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">{{isset($associate) ? $associate : 0}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Ratings -->
  <!-- Sessions -->
  <div class="col-xl-3 col-sm-6 mt-5">
    <div class="card" style="background-color: #DADDB1">
      <div class="row">
        <div class="col-6">
          <div class="card-body">
            <div class="card-info">
              <h6 class="mb-4 pb-1 text-nowrap">Total Web Stories</h6>
              <div class="d-flex align-items-end mb-3">
                <h4 class="mb-0 me-2">{{isset($totalAssociate) ? $totalAssociate : 0}}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

@endpush