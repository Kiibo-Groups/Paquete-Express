<style>
    #<?php echo e($mapId); ?> {
        height: 100%;
    }
</style>
<style>
    #<?php echo e($mapId); ?> {
    <?php if(! isset($attributes['style'])): ?>
        height: 100vh;
    <?php else: ?>
        <?php echo e($attributes['style']); ?>

    <?php endif; ?>
    }
</style>

<div id="<?php echo e($mapId); ?>" <?php if(isset($attributes['class'])): ?>
class='<?php echo e($attributes["class"]); ?>'
        <?php endif; ?>
></div>
<script
        src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(config('maps.google_maps.access_token', null)); ?>&callback=initMap<?php echo e($mapId); ?>&libraries=&v=3"
        async
></script>

<script>
    let map<?php echo e($mapId); ?> = "";

    function initMap<?php echo e($mapId); ?>() {
        map<?php echo e($mapId); ?> = new google.maps.Map(document.getElementById("<?php echo e($mapId); ?>"), {
            center: { lat: <?php echo e($centerPoint['lat'] ?? $centerPoint[0]); ?>, lng: <?php echo e($centerPoint['long'] ?? $centerPoint[1]); ?> },
            zoom: <?php echo e($zoomLevel); ?>,
        });

    function addInfoWindow(marker, message) {

        var infoWindow = new google.maps.InfoWindow({
            content: message
        });

        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.open(map<?php echo e($mapId); ?>, marker);
        });
    }

        <?php $__currentLoopData = $markers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $marker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            var marker<?php echo e($loop->iteration); ?> = new google.maps.Marker({
                position: {
                    lat: <?php echo e($marker['lat'] ?? $marker[0]); ?>,
                    lng: <?php echo e($marker['long'] ?? $marker[1]); ?>

                },
                map: map<?php echo e($mapId); ?>,
                <?php if(isset($marker['title'])): ?>
                title: "<?php echo e($marker['title']); ?>",
                <?php endif; ?>
                icon: <?php if(isset($marker['icon'])): ?>"<?php echo e($marker['icon']); ?>" <?php else: ?> null <?php endif; ?>
            });

            <?php if(isset($marker['info'])): ?>
                addInfoWindow(marker<?php echo e($loop->iteration); ?>, <?php echo json_encode($marker['info'], 15, 512) ?>);
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    }
</script>
<?php /**PATH /var/www/html/Paquete-Express/resources/views/vendor/maps/components/google.blade.php ENDPATH**/ ?>