@extends('admin.layouts.dashboard-master')

@section('title')
  Manage Lifestage
@endsection

@section('content')
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Lifestages</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-lifestage">+ Add New</a></div></div>      
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Lifestage Category</th>
        <th>Lifestage Subcategory</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      @foreach($lifestages as $lifestage)
      <tr>
        <td>{{$lifestage->lifestage_category}}</td>
        <td>{{$lifestage->lifestage_subcategory}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- Modal add new lifestage -->
<div id="add-lifestage" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-lifestage')}}">
          @csrf
          
          <div class="form-group">
            <select name="lifestage_category" class="form-control" required>
              <option disabled selected hidden>--Select Lifestage Category--</option>
              <option>Starter</option>
              <option>Puppy</option>
              <option>Adult</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="lifestage_subcategory" placeholder="Enter lifestage subcategory..." class="form-control" required>
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
<!-- End Modal add new lifestage-->
@endsection
