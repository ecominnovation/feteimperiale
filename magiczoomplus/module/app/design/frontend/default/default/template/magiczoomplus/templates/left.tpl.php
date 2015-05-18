<?php
$m = intval(self::$options->getValue('selectors-margin'));
$ws = intval(self::$options->getValue('selector-max-width'));
$wm = intval(self::$options->getValue('thumb-max-width'));
$hm = intval(self::$options->getValue('thumb-max-height'));
?>
<!-- Begin magiczoomplus -->
<div class="MagicToolboxContainer selectorsLeft" style="max-width: <?php echo ($wm + $ws + $m)?>px;padding-left:<?php echo $ws+$m; ?>px;">
    <?php if(count($thumbs) > 1):?>
    <div id="MagicToolboxSelectors<?php echo $pid?>" class="MagicToolboxSelectorsContainer<?php echo $magicscroll;?>" style="width: <?php echo $ws?>px;margin-left: -<?php echo $ws+$m; ?>px;">
        <?php echo join("\n\t",$thumbs)?>
    </div>
    <?php if(!empty($magicscroll)): ?>
        <script type="text/javascript">
            MagicScroll.extraOptions.MagicToolboxSelectors<?php echo $pid?> = MagicScroll.extraOptions.MagicToolboxSelectors<?php echo $pid?> || {};
            MagicScroll.extraOptions.MagicToolboxSelectors<?php echo $pid?>.direction = 'bottom';
            <?php if(self::$options->checkValue('height', 0)): ?>
            MagicScroll.extraOptions.MagicToolboxSelectors<?php echo $pid?>.height = <?php echo $hm?>;
            <?php endif?>
        </script>
    <?php endif?>
    <?php endif?>
    <div class="MagicToolboxMainContainer">
        <?php echo $main?>
        <?php if(isset($message)):?>
            <div class="MagicToolboxMessage"><?php echo $message?></div>
        <?php endif?>
    </div>
    <div style="clear:both"></div>
    <?php if(isset($hotspots)):?>
    <div>
        <?php echo $hotspots?>
    </div>
    <?php endif?>
</div>
<!-- End magiczoomplus -->
