@extends('admin.layouts.dashboard-master')

@section('title')
  Manage Brands
@endsection

@section('content')
<div class="container">
  <div class="table_title"><span style="font-size: 20px;">Manage Brand</span> <div style="float: right;margin-top: -14px"><a href="#" class="btn btn-info add-new-btn" role="button" style="margin-bottom:7px;" data-toggle="modal" data-target="#add-brand">+ Add New</a></div></div>      
  <table class="table table-bordered cstm-admin-tbl">
    <thead class="cstm-tbl-th">
      <tr>
        <th>Category</th>
        <th>Brand Name</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody class="cstm-tbl-td">
      @foreach($brands as $brand)
      <tr>
        <td>{{ app("App\Http\Controllers\BaseController")->getCategoryName($brand->category_id) }}</td>
        <td>{{$brand->brand_name}}</td>
        <td>
        	@if($brand->status == 1)
          <span style="color: green">Active</span>
          @else
          <span style="color: red">Inactive</span>
          @endif
        </td>
        <td></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$brands->links()}}
</div>

<!-- Modal add new brand -->
<div id="add-brand" class="modal fade">
  <div class="modal-dialog modal-confirm">
    <div class="modal-content">
      <div class="modal-header">
        <h4>Add a brand</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="add-fabrics-type-main">
        <div class="col-sm-12 col-md-12">
        <form method="post" action="{{route('post-add-brand')}}">
          @csrf
          <div class="form-group">
            <select id="pet" name="pet" class="form-control" required>
              <option disabled selected hidden>--Select Pet Type--</option>
              @foreach($pets as $pet)
              <option value="{{$pet->id}}">{{$pet->pet_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <select id="category" name="category" class="form-control" required>
              <option disabled selected hidden>--Select Category--</option>
             
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="brand" placeholder="Enter brand name..." class="form-control" required>
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
<!-- End Modal add new brand-->
@endsection

@push('js')
<script type="text/javascript">
  $('#pet').change(function(){
    var petID = $(this).val();    
    if(petID){
        $.ajax({
           type:"GET",
           url:"{{ route('get-category-list' )}}?pet_id="+petID,
            success:function(res){  
            jQuery('select[name="category"]').empty();             
            if(res){
                $("#category").append('<option value="1" disabled selected hidden>--Select Category--</option>');
                $.each(res,function(key,value){
                    $("#category").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#category").empty();
            }
           }
        });
    }else{
        $("#category").empty();
    }      
   });
</script>
@endpush