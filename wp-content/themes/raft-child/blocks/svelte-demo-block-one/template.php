<?php
// generate unique id for block:
$block_id = uniqid();
?>

<?php if ($is_preview) : ?>

    <p>Rendering is currently only possible on frontend, not in Gutenberg editor mode.</p>

<?php else : ?>

    <div class="svelte-demo-block-container" data-block-id="<?php echo $block_id; ?>">
    </div>

    <script type="text/javascript">
        // store props in global var
        if (typeof svelteDemoBlockData === 'undefined'){
            window.svelteDemoBlockData = [];
        }
   
        window.svelteDemoBlockData['<?php echo $block_id; ?>'] = {
            title: '<?php echo get_field("title"); ?>'
        };
    </script>

<?php endif; ?>