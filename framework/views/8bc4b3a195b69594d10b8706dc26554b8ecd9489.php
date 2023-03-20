<?php $__env->startSection('title'); ?>
  Online platform for all your pet's need
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php 
  $category = app('App\Http\Controllers\BaseController')->getCategoryName($category_id);
  $pet_id = \App\Category::where('slug',$slug)->value('pet_id'); 
  $pet_name = app('App\Http\Controllers\BaseController')->getPetName($pet_id); 
?>
<div class="product-list-main">
	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="container">
			<div class="row">
			    <div class="col-md-12 category-result">
		            <div class="category-result-head">
		                <span class="category-section"><?php echo e($pet_name); ?> <?php echo e($category); ?> </span>
		                <span class="new-filter-section">
		                  <span class="nfs-filter"><a data-toggle="modal" data-target="#myModal" data-backdrop="static" data-keyboard="false"><i class="fa fa-sliders" style="color: #400080;margin-right: 1px"></i> Filter</a></span>
		                </span>
		            </div>
			    </div>
			</div>
		<div class="Cust-row">
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php
              $thumbnail = \App\ProductImage::where('product_id',$product->id)->where('is_thumbnail',1)->where('status',1)->value('image');
              $sc = \App\Category::where('id',$product->category)->value('slug');
              $off_percentage = ($product->price - $product->offer_price) / $product->price * 100;
              $round_off_percentage = round($off_percentage);
			 ?>
			<div class="pl-Cust-col"><a href="<?php echo e(route('product-details',[$sc,$product->slug])); ?>">
				<div class="plm-details">
					<div class="main-img"><img src="<?php echo e(asset('storage/images/products/'.$thumbnail)); ?>" alt="Category"></div>
				    <div class="InnerP-tit"> <?php echo e($product->title); ?> </div>
					<div class="InnerP-cont">
						<span class="currentPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->offer_price); ?></span>
						<span class="discPrice"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo e($product->price); ?></span>
            <span class="off-per">( <?php echo e($round_off_percentage); ?>% OFF )</span>
					</div>
				</div></a>
      </div>
		    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		</div>
	</div>
	
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog" style="margin-top: 45px;">
    <div class="modal-content">
      <form action="<?php echo e(URL::current()); ?>" method="get">
      <!-- Modal Header -->
        <div class="modal-header">
          <div class="side-filter modal-title">Filters</div>
           <button type="button" class="close" data-dismiss="modal" style="color:#fff;background-color: #01BEA2;padding: 5px;margin-top: -11px;margin-right: -11px">&times;</button>
        </div>
        
              <!-- Modal body -->
           <div class="modal-body">
                <!-- accordin container-->
            <div class="acc-container" id="fix-accordin">

               <div class="acc">                        
                    <div class="side-filter-title accordion">Price</div>                    
                        <div class="panel">
                          <div class="ac-a" style="display: flex;margin-bottom: 10px">
                                <fieldset>
                                  <label for="minPrice">Min Price</label>
                                  <select id="minPrice" name="minPrice" title="Minimum Price" class="filter filterPrice fancySelect">
                                    <option value="" hidden>No Minimum Price</option>
                                    <option value="0" <?php if($minPrice == "0"): ?> selected <?php endif; ?>>0</option>
                                    <option value="50" <?php if($minPrice == "50"): ?> selected <?php endif; ?>>&#x20a8; 50</option>
                                    <option value="100" <?php if($minPrice == "100"): ?> selected <?php endif; ?>>&#x20a8; 100</option>
                                    <option value="200" <?php if($minPrice == "200"): ?> selected <?php endif; ?>>&#x20a8; 200</option>
                                    <option value="300" <?php if($minPrice == "300"): ?> selected <?php endif; ?>>&#x20a8; 300</option>
                                    <option value="400" <?php if($minPrice == "400"): ?> selected <?php endif; ?>>&#x20a8; 400</option>
                                    <option value="500" <?php if($minPrice == "500"): ?> selected <?php endif; ?>>&#x20a8; 500</option>
                                    <option value="800" <?php if($minPrice == "800"): ?> selected <?php endif; ?>>&#x20a8; 800</option>
                                    <option value="1000" <?php if($minPrice == "1000"): ?> selected <?php endif; ?>>&#x20a8; 1000</option>
                                    <option value="1500" <?php if($minPrice == "1500"): ?> selected <?php endif; ?>>&#x20a8; 1500</option>
                                    <option value="2000" <?php if($minPrice == "2000"): ?> selected <?php endif; ?>>&#x20a8; 2000</option>
                                    <option value="2500" <?php if($minPrice == "2500"): ?> selected <?php endif; ?>>&#x20a8; 2500</option>
                                    <option value="3000" <?php if($minPrice == "3000"): ?> selected <?php endif; ?>>&#x20a8; 3000</option>
                                    <option value="5000" <?php if($minPrice == "5000"): ?> selected <?php endif; ?>>&#x20a8; 5000</option>
                                  </select>
                                </fieldset>
                                 <fieldset>
                                  <label for="maxPrice">Max Price</label>
                                  <select id="maxPrice" name="maxPrice" title="Maximum Price" class="filter filterPrice fancySelect">
                                    <option value="" hidden>No Maximum Price</option>
                                    <option value="0" <?php if($maxPrice == "0"): ?> selected <?php endif; ?>>0</option>
                                    <option value="50" <?php if($maxPrice == "50"): ?> selected <?php endif; ?>>&#x20a8; 50</option>
                                    <option value="100" <?php if($maxPrice == "100"): ?> selected <?php endif; ?>>&#x20a8; 100</option>
                                    <option value="200" <?php if($maxPrice == "200"): ?> selected <?php endif; ?>>&#x20a8; 200</option>
                                    <option value="300" <?php if($maxPrice == "300"): ?> selected <?php endif; ?>>&#x20a8; 300</option>
                                    <option value="400" <?php if($maxPrice == "400"): ?> selected <?php endif; ?>>&#x20a8; 400</option>
                                    <option value="500" <?php if($maxPrice == "500"): ?> selected <?php endif; ?>>&#x20a8; 500</option>
                                    <option value="800" <?php if($maxPrice == "800"): ?> selected <?php endif; ?>>&#x20a8; 800</option>
                                    <option value="1000" <?php if($maxPrice == "1000"): ?> selected <?php endif; ?>>&#x20a8; 1000</option>
                                    <option value="1500" <?php if($maxPrice == "1500"): ?> selected <?php endif; ?>>&#x20a8; 1500</option>
                                    <option value="2000" <?php if($maxPrice == "2000"): ?> selected <?php endif; ?>>&#x20a8; 2000</option>
                                    <option value="2500" <?php if($maxPrice == "2500"): ?> selected <?php endif; ?>>&#x20a8; 2500</option>
                                    <option value="3000" <?php if($maxPrice == "3000"): ?> selected <?php endif; ?>>&#x20a8; 3000</option>
                                    <option value="5000" <?php if($maxPrice == "5000"): ?> selected <?php endif; ?>>&#x20a8; 5000</option>
                                  </select>
                                </fieldset>
                        </div>
                    </div>
               </div> 

               <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Lifestage</div> 
                  <?php
                     $lifestages = \App\Lifestage::orderBy('id','asc')->get();
                     $lstage = Illuminate\Support\Facades\Input::has('lifestage') ? Illuminate\Support\Facades\Input::get('lifestage') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $lifestages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lifestage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="lifestage[]" value="<?php echo e($lifestage->id); ?>" <?php echo e(in_array($lifestage->id, $lstage) ? 'checked' : ''); ?>> <?php echo e($lifestage->lifestage_category); ?>(<?php echo e($lifestage->lifestage_subcategory); ?>)</label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Health Consideration</div> 
                  <?php
                     $health_considerations = \App\HealthConsideration::orderBy('id','asc')->get();
                     $h_c = Illuminate\Support\Facades\Input::has('hc') ? Illuminate\Support\Facades\Input::get('hc') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $health_considerations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $health_consideration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="hc[]" value="<?php echo e($health_consideration->id); ?>" <?php echo e(in_array($health_consideration->id, $h_c) ? 'checked' : ''); ?>> <?php echo e($health_consideration->hc_type); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Breed</div> 
                  <?php
                     $breeds = \App\Breed::orderBy('id','asc')->get();
                     $bd = Illuminate\Support\Facades\Input::has('breed') ? Illuminate\Support\Facades\Input::get('breed') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $breeds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="breed[]" value="<?php echo e($breed->id); ?>" <?php echo e(in_array($breed->id, $bd) ? 'checked' : ''); ?>> <?php echo e($breed->breed); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Composition</div> 
                  <?php
                     $compositions = \App\Composition::orderBy('id','asc')->get();
                     $comp = Illuminate\Support\Facades\Input::has('composition') ? Illuminate\Support\Facades\Input::get('composition') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $compositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $composition): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="composition[]" value="<?php echo e($composition->id); ?>" <?php echo e(in_array($composition->id, $comp) ? 'checked' : ''); ?>> <?php echo e($composition->composition); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Weight</div> 
                  <?php
                     $weights = \App\Weight::orderBy('id','asc')->get();
                     $wt = Illuminate\Support\Facades\Input::has('weight') ? Illuminate\Support\Facades\Input::get('weight') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $weights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $weight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="weight[]" value="<?php echo e($weight->id); ?>" <?php echo e(in_array($weight->id, $wt) ? 'checked' : ''); ?>> <?php echo e($weight->weight); ?> KG</label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Volume</div> 
                  <?php
                     $volumes = \App\Volume::orderBy('id','asc')->get();
                     $vl = Illuminate\Support\Facades\Input::has('volume') ? Illuminate\Support\Facades\Input::get('volume') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $volumes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $volume): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="volume[]" value="<?php echo e($volume->id); ?>" <?php echo e(in_array($volume->id, $vl) ? 'checked' : ''); ?>> <?php echo e($volume->volume); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>

                <div class="acc">                        
                  <div class="side-filter-title accordion">Tablet Quantity</div> 
                  <?php
                     $quantities = \App\TabletQuantity::orderBy('id','asc')->get();
                     $qty = Illuminate\Support\Facades\Input::has('quantity') ? Illuminate\Support\Facades\Input::get('quantity') : [] ;
                  ?>                   
                    <div class="panel">
                      <div class="ac-a">
                            <?php $__currentLoopData = $quantities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quantity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="quantity[]" value="<?php echo e($quantity->id); ?>" <?php echo e(in_array($quantity->id, $qty) ? 'checked' : ''); ?>> <?php echo e($quantity->quantity); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div> 
                </div>

                <div class="cstm-av-hr"></div>
                      
                <a href="#" class="card-shop-now" style="float: right;margin-top: 10px;">Clear all filters</a> 
            </div>
           <!-- Modal footer -->
            <div class="modal-footer">
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             <input type="submit" class="btn btn-info" value="Apply">
            </div>
          </form>
          </div>
       </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startPush('js'); ?>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/frontend/pets/product-list.blade.php ENDPATH**/ ?>