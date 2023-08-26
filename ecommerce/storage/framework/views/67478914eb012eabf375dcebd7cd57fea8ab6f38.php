<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>

        <td><?php echo e($data->user->first_name); ?></td>

        <td>
            <span class="badge badge-primary"><?php echo e($data->status); ?></span>
        </td>
        <?php if($data->lastMessage): ?>
        <td><?php echo e(\Carbon\Carbon::parse($data->lastMessage->created_at)->diffForHumans()); ?></td>
        <?php else: ?>
        <td> <?php echo e(__('No Reply')); ?></td>
        <?php endif; ?>
    <td>
        <div class="action-list">
            <a class="btn btn-secondary btn-sm "
                href="<?php echo e(route('back.ticket.edit',$data->id)); ?>">
                <i class="fas fa-eye"></i>
            </a>
            <a class="btn btn-danger btn-sm " data-toggle="modal"
                data-target="#confirm-delete" href="javascript:;"
                data-href="<?php echo e(route('back.ticket.destroy',$data->id)); ?>">
                <i class="fas fa-trash-alt"></i>
            </a>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/Paquete-Express/resources/views/back/ticket/table.blade.php ENDPATH**/ ?>