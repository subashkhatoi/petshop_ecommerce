<?php $__env->startSection('title'); ?>
  List New Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
  <div class="anp-main">
  	<?php if(session()->has('products')): ?>
    <a href="<?php echo e(route('add-new-product-step1')); ?>">
    <div class="step1">
      Step-1 (All Information)
    </div>
    </a>
    <?php else: ?>
    <div class="step1">
      Step-1 (All Information)
    </div>
    <?php endif; ?>

    <div class="step2" style="border-bottom: 1px solid #ccc">
  		Step-2 (Description & Thumbnail)
  	</div>

  	<div class="step2-main">
  		
        <form method="post" action="<?php echo e(route('post-add-product-step2')); ?>" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="col-sm-12 col-md-12">
            <div class="form-group">
              <textarea name="description" id="summernote"><?php echo e(session()->get('description')); ?></textarea>
            </div>
          </div>

          <div class="col-sm-12 col-md-12">
          	<div class="form-group">
              <input type="file" name="thumbnail" class="form-control">
            </div>
          </div>

          <?php if(session()->has('thumbnail')): ?>
          <div class="col-sm-12 col-md-12">
            <img src="<?php echo e(asset('storage/images/products/'.session()->get('thumbnail') )); ?>" style="margin-bottom: 10px;height: 175px;margin-top: 10px">
          </div>
          <a href="<?php echo e(route('remove-uploaded-thumbnail')); ?>" style="margin-left:15px;border:1px solid #f44336;color:#fff;background-color: #f44336;padding: 1px 5px 1px 5px;border-radius: 4px;font-size: 12px;">Remove</a>
          <?php endif; ?>
            
          <div style="text-align: center;display: flex;justify-content: center;">
          	<a href="<?php echo e(route('add-new-product-step1')); ?>" class="btn btn-success" style="margin-left: 9px">Previous</a>
            <input type="submit" class="btn btn-success" value="Next">
          </div>
        </form>
       
  	</div>
     
    <?php if(session()->has('description') || session()->has('thumbnail')): ?>
    <a href="<?php echo e(route('add-new-product-step3')); ?>">
  	<div class="step2">
  		Step-3 (Preview)
  	</div>
    </a>
    <?php else: ?>
    <div class="step2">
      Step-3 (Preview)
    </div>
    <?php endif; ?>
    
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script>
	$('textarea#summernote').summernote({
       placeholder: 'Enter Product Description',
       tabsize: 2,
       height: 100,
       toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
       // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        // ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        // ['help', ['help']]
      ],
      });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.dashboard-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mawandbaw\resources\views/admin/product/add-new-product-step2.blade.php ENDPATH**/ ?>