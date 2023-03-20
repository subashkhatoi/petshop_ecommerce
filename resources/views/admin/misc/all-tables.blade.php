@extends('admin.layouts.dashboard-master')

@section('title')
  Tables
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="all-tbls">
    <div class="table_title"><span style="font-size: 20px;">Manage Health Considerations</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-hc">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>HC Type</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($health_considerations as $hc)
        <tr>
          <td>{{$hc->hc_type}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="all-tbls">
    <div class="table_title"><span style="font-size: 20px;">Manage Breeds</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-breed">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>All Breeds</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($breeds as $breed)
        <tr>
          <td>{{$breed->breed}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
 <div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Weights</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-weights">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Weights</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($weights as $weight)
        <tr>
          <td>{{$weight->weight}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Volumes</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-volumes">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Volumes</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($volumes as $volume)
        <tr>
          <td>{{$volume->volume}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Tablet Quantity</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-quantity">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($quantites as $quantity)
        <tr>
          <td>{{$quantity->quantity}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Composition</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-composition">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Composition</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($compositions as $composition)
        <tr>
          <td>{{$composition->composition}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<div class="row">
    <div class="all-tbls" style="margin-top: 20px">
    <div class="table_title"><span style="font-size: 20px;">Color</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-color">+ Add New</a></div></div>      
    <table class="table table-bordered cstm-admin-tbl">
      <thead class="cstm-tbl-th">
        <tr>
          <th>Color</th>
        </tr>
      </thead>
      <tbody class="cstm-tbl-td">
        @foreach($colors as $color)
        <tr>
          <td>{{$color->color}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

<!-- Modal health consideration -->
<div id="add-hc" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Health Consideration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-hc')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="hc" placeholder="Enter health consideration..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal health consideration-->
<!-- Modal breed -->
<div id="add-breed" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add New Breed</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-breed')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="breed" placeholder="Enter breed..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal breed-->
<!-- Modal weights -->
<div id="add-weights" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Weight</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-weight')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="weight" placeholder="Enter weight..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal weights-->
<!-- Modal volumes -->
<div id="add-volumes" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Volume</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-volume')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="volume" placeholder="Enter volume..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal volumes-->
<!-- Modal quantity -->
<div id="add-quantity" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Tablet Quantity</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-quantity')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="quantity" placeholder="Enter quantity..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal quantity-->
<!-- Modal composition -->
<div id="add-composition" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Composition</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-composition')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="composition" placeholder="Enter composition..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal composition-->
<!-- Modal color -->
<div id="add-color" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add Color</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-color')}}">
          @csrf
          <div class="form-group">
            <input type="text" name="color" placeholder="Enter color..." class="form-control" required>
          </div>
        <div style="text-align: center;display: flex;justify-content: center;">
          <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success">Add</button>
        </div>
        </form>
       </div>
      </div>
    </div>
  </div>
</div>
<!-- End Modal color-->
@endsection

@push('css')
<style type="text/css">
  .all-tbls{
    width: 45%;
    margin-left: auto;
    margin-right: auto;
  }
</style>
@endpush
