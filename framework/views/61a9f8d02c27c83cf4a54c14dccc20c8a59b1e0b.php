<?php $__env->startSection('title'); ?>
  List New Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="anp-main">
  	<?php if(session()->has('products')): ?>
    <a href="<?php echo e(route('add-new-product-step1')); ?>">
    <div class="step1" style="border-bottom: 1px solid #ccc">
      Step-1 (All Information)
    </div>
    </a>
    <?php else: ?>
    <div class="step1" style="border-bottom: 1px solid #ccc">
      Step-1 (All Information)
    </div>
    <?php endif; ?>

    <a href="<?php echo e(route('add-new-product-step2')); ?>">
    <div class="step2" style="border-bottom: 1px solid #ccc">
  		Step-2 (Description & Thumbnail)
  	</div>
    </a>

  	<div class="step2">
  		Step-3 (Preview)
  	</div>

    <div class="step2-main">
      
        <div class="page">
          <div class="page__demo">
            <div class="main-container page__container">
              <table class="table">
                <tbody class="table__tbody">
                  <tr>
                    <td width="38%">
                      <span>Title</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(session()->get('products.title')); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td width="38%">
                      <span>Pet Type</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getPetName(session()->get('products.pet'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Category</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getCategoryName(session()->get('products.category'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Subcategory</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getSubcategoryName(session()->get('products.subcategory'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Brand</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getBrandName(session()->get('products.brand'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Price</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span>Rs. <?php echo e(session()->get('products.price')); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Offer Price</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span>Rs. <?php echo e(session()->get('products.offerprice')); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>GST Percentage</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(session()->get('products.gst')); ?>%</span>
                    </td>
                  </tr>

                  <?php if(session()->get('products.lifestage')): ?>
                  <?php
                     $lifestage = app("App\Http\Controllers\BaseController")->getLifestage(session()->get('products.lifestage'));
                   ?>
                  <tr>
                    <td>
                      <span>Lifestage</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e($lifestage->lifestage_category); ?> (<?php echo e($lifestage->lifestage_subcategory); ?>)</span>
                    </td>
                  </tr>
                  <?php else: ?>
                  <tr>
                    <td>
                      <span>Lifestage</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span></span>
                    </td>
                  </tr>
                  <?php endif; ?>

                  <tr>
                    <td>
                      <span>Health Consideration</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getHealthConsideration(session()->get('products.health_consideration'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Breed</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getBreed(session()->get('products.breed'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Composition</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getComposition(session()->get('products.composition'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Weight</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getWeight(session()->get('products.weight'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Volume</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getVolume(session()->get('products.volume'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Tablet Quantity</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getTabQuantity(session()->get('products.tablet_quantity'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Color</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(app("App\Http\Controllers\BaseController")->getColor(session()->get('products.color'))); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Size</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo e(session()->get('products.size')); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Size</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><?php echo session()->get('description'); ?></span>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <span>Thumbnail</span>
                    </td>
                    <td width="3%"> : </td>
                    <td>
                      <span><img src="<?php echo e(asset('storage/images/products/'.session()->get('thumbnail') )); ?>" style="margin-bottom: 10px;height: 175px;margin-top: 10px"></span>
                    </td>
                  </tr>
                
                </tbody>
              </table>
            </div>
          </div>

          <div style="text-align: center;display: flex;justify-content: center;margin-top: -35px;">
            <form method="post" action="<?php echo e(route('post-add-product')); ?>">
              <?php echo csrf_field(); ?>
              <input type="submit" class="btn btn-success" value="Submit">
            </form>
          </div>
          
        </div>
       
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
  .table{
  width: 100%;
  border-spacing: 0;
  border-collapse: collapse;
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .12), 0 1px 2px 0 rgba(0, 0, 0, .24);
  background-color: var(--tableBgColor, #fff);
}


.page{
  margin-top: -65px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.page__demo{
  flex-grow: 1;
}

.main-container{
  padding-left: 1rem;
  padding-right: 1rem;
  max-width: 1000px;
  
  margin-right: auto;
  margin-left: auto;
}

.page__container{
  margin-top: 4rem;
  margin-bottom: 4rem;
}
.ps-scrollbar-x-rail{
  display: none !important;
}

}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/add-new-product-step3.blade.php ENDPATH**/ ?>