<?php if(!isset($error)): ?>

            <div class="progress-area-step pt-4">
                <ul class="progress-steps">
                <?php for($i=0; $i <= $numbers; $i++): ?>

                <?php if($i == 0): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'Pending'): ?>
                            <li class="active">
                                <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                                <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                                <div class="progress-title"><?php echo e(date('l, d M, Y',strtotime($track_orders[$i]['created_at']))); ?></div>
                                <div class="progress-title"><?php echo e(__('Product Pending For Approval')); ?></div>
                            </li>
                        <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                            <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                        </li>
                        <?php endif; ?>
                    <?php else: ?>
                    <li>
                        <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                        <div class="progress-title"><?php echo e(__('Pending')); ?></div>
                        <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if(!isset($track_orders[3])): ?>


                <?php if($i == 1): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'In Progress'): ?>
                        <li class="active">
                            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                            <div class="progress-title"><?php echo e(date('l, d M, Y',strtotime($track_orders[$i]['created_at']))); ?></div>
                            <div class="progress-title"><?php echo e(__('Product Shift For Delevery')); ?></div>
                        </li>
                        <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                            <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                            <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                        </li>
                        <?php endif; ?>
                    <?php else: ?>
                    <li>
                        <div class="icon"><i class="fas fa-arrow-alt-circle-right"></i></div>
                        <div class="progress-title"><?php echo e(__('Processing')); ?></div>
                        <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                    </li>
                    <?php endif; ?>
                <?php endif; ?>


                <?php if($i == 2): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'Delivered'): ?>
                        <li class="active">
                            <div class="icon"><i class="fas fa-check-circle"></i></div>
                            <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                            <div class="progress-title"><?php echo e(date('l, d M, Y',strtotime($track_orders[$i]['created_at']))); ?></div>
                            <div class="progress-title"><?php echo e(__('Product Delevery Compleate')); ?></div>
                        </li>
                        <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-check-circle"></i></div>
                            <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                            <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                        </li>
                        <?php endif; ?>
                    <?php else: ?>
                    <li>
                        <div class="icon"><i class="fas fa-check-circle"></i></div>
                        <div class="progress-title"><?php echo e(__('Delivered')); ?></div>
                        <div class="progress-title"><?php echo e(__('Soon')); ?></div>
                    </li>
                    <?php endif; ?>

                <?php endif; ?>

                <?php endif; ?>

                <?php if($i == 3): ?>
                    <?php if(!empty($track_orders[$i])): ?>
                        <?php if($track_orders[$i]['title'] == 'Canceled'): ?>
                        <li class="active">
                            <div class="icon"><i class="fas fa-times-circle"></i></div>
                            <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                            <div class="progress-title"><?php echo e(date('l, d M, Y',strtotime($track_orders[$i]['created_at']))); ?></div>
                            <div class="progress-title"><?php echo e(__('Product Delevery Rejected')); ?></div>
                        </li>
                        <?php else: ?>
                        <li>
                            <div class="icon"><i class="fas fa-times-circle"></i></div>
                            <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                            <div class="progress-title"><?php echo e(__('Not')); ?></div>
                        </li>
                        <?php endif; ?>
                    <?php else: ?>
                    <li>
                        <div class="icon"><i class="fas fa-times-circle"></i></div>
                        <div class="progress-title"><?php echo e(__('Rejected')); ?></div>
                        <div class="progress-title"><?php echo e(__('Not')); ?></div>
                    </li>
                    <?php endif; ?>

                <?php endif; ?>

                <?php endfor; ?>
            </ul>
        </div>


<?php else: ?>

    <p><?php echo e(__('Order Not Found')); ?></p>
<?php endif; ?>
<?php /**PATH /var/www/html/Paquete-Express/resources/views/user/order/track.blade.php ENDPATH**/ ?>