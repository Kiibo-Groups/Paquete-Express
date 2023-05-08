<?php
function renderStarRating($rating, $maxRating = 5)
{
    $fullStar = "<i class = 'far fa-star filled'></i>";
    $halfStar = "<i class = 'far fa-star-half filled'></i>";
    $emptyStar = "<i class = 'far fa-star'></i>";
    $rating = $rating <= $maxRating ? $rating : $maxRating;

    $fullStarCount = (int) $rating;
    $halfStarCount = ceil($rating) - $fullStarCount;
    $emptyStarCount = $maxRating - $fullStarCount - $halfStarCount;

    $html = str_repeat($fullStar, $fullStarCount);
    $html .= str_repeat($halfStar, $halfStarCount);
    $html .= str_repeat($emptyStar, $emptyStarCount);
    $html = $html;
    return $html;
}
?>

<div class="s-r-inner">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="product-card p-col">
        <a class="product-thumb" href="<?php echo e(route('front.product',$item->slug)); ?>">
            <img class="lazy" alt="Product" src="<?php echo e(asset('assets/images/'.$item->thumbnail)); ?>" style=""></a>
        <div class="product-card-body">
            <h3 class="product-title"><a href="<?php echo e(route('front.product',$item->slug)); ?>">
                <?php echo e(strlen(strip_tags($item->name)) > 35 ? substr(strip_tags($item->name), 0, 35) : strip_tags($item->name)); ?>

            </a></h3>
            <div class="rating-stars">
                <?php echo renderStarRating($item->reviews->avg('rating')); ?>

            </div>
            <h4 class="product-price">
                <?php echo e(PriceHelper::grandCurrencyPrice($item)); ?>

            </h4>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>
<div class="bottom-area">
    <a id="view_all_search_" href="javascript:;"><?php echo e(__('View all result')); ?></a>
</div><?php /**PATH /var/www/html/Paquete-Express/resources/views/includes/search_suggest.blade.php ENDPATH**/ ?>