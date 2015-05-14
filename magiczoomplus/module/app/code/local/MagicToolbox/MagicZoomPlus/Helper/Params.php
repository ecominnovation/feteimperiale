<?php

class MagicToolbox_MagicZoomPlus_Helper_Params extends Mage_Core_Helper_Abstract {

    public function __construct() {


    }

    public function getBlocks() {
		return array(
			'default' => 'Defaults',
			'product' => 'Product page',
			'category' => 'Category page',
			'newproductsblock' => 'New Products block',
			'recentlyviewedproductsblock' => 'Recently Viewed Products block'
		);
	}

	public function getDefaultValues() {
		return array(
			'product' => array(
				'enable-effect' => 'Zoom &amp; Expand',
			),
			'category' => array(
				'enable-effect' => 'No',
				'thumb-max-width' => '135',
				'thumb-max-height' => '135',
				'show-message' => 'No',
			),
			'newproductsblock' => array(
				'enable-effect' => 'No',
				'thumb-max-width' => '135',
				'thumb-max-height' => '135',
				'show-message' => 'No',
			),
			'recentlyviewedproductsblock' => array(
				'enable-effect' => 'No',
				'thumb-max-width' => '76',
				'thumb-max-height' => '76',
				'show-message' => 'No',
			)
		);
	}

	public function getParamsMap($block) {
		$blocks = array(
			'default' => array(
				'General' => array(
					'include-headers-on-all-pages'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'square-images',
					'zoom-width',
					'zoom-height',
					'zoom-position',
					'zoom-align',
					'zoom-distance',
					'expand-size',
					'expand-position',
					'expand-align'
				),
				'Effects' => array(
					'expand-effect',
					'restore-effect',
					'expand-speed',
					'restore-speed',
					'expand-trigger',
					'expand-trigger-delay',
					'restore-trigger',
					'keep-thumbnail',
					'opacity',
					'opacity-reverse',
					'zoom-fade',
					'zoom-window-effect',
					'zoom-fade-in-speed',
					'zoom-fade-out-speed',
					'fps',
					'smoothing',
					'smoothing-speed',
					'pan-zoom'
				),
				'Multiple images' => array(
					'selector-max-width',
					'selector-max-height',
					'selectors-margin',
					'selectors-change',
					'selectors-class',
					'preload-selectors-small',
					'preload-selectors-big',
					'selectors-effect',
					'selectors-effect-speed',
					'selectors-mouseover-delay'
				),
				'Initialization' => array(
					'initialize-on',
					'click-to-activate',
					'click-to-deactivate',
					'show-loading',
					'loading-msg',
					'loading-opacity',
					'loading-position-x',
					'loading-position-y',
					'entire-image'
				),
				'Title and Caption' => array(
					'show-title',
					'show-caption',
					'caption-source',
					'caption-width',
					'caption-height',
					'caption-position',
					'caption-speed'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message',
					'right-click'
				),
				'Background' => array(
					'background-opacity',
					'background-color',
					'background-speed'
				),
				'Buttons' => array(
					'buttons',
					'buttons-display',
					'buttons-position'
				),
				'Zoom mode' => array(
					'always-show-zoom',
					'drag-mode',
					'move-on-click',
					'x',
					'y',
					'preserve-position',
					'fit-zoom-window'
				),
				'Expand mode' => array(
					'slideshow-effect',
					'slideshow-loop',
					'slideshow-speed',
					'z-index',
					'keyboard',
					'keyboard-ctrl'
				),
				'Hint' => array(
					'hint',
					'hint-text',
					'hint-position',
					'hint-opacity'
				)
			),
			'product' => array(
				'General' => array(
					'enable-effect',
					'template',
					'magicscroll'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'square-images',
					'zoom-width',
					'zoom-height',
					'zoom-position',
					'zoom-align',
					'zoom-distance',
					'expand-size',
					'expand-position',
					'expand-align'
				),
				'Effects' => array(
					'expand-effect',
					'restore-effect',
					'expand-speed',
					'restore-speed',
					'expand-trigger',
					'expand-trigger-delay',
					'restore-trigger',
					'keep-thumbnail',
					'opacity',
					'opacity-reverse',
					'zoom-fade',
					'zoom-window-effect',
					'zoom-fade-in-speed',
					'zoom-fade-out-speed',
					'fps',
					'smoothing',
					'smoothing-speed',
					'pan-zoom'
				),
				'Multiple images' => array(
					'selector-max-width',
					'selector-max-height',
					'use-individual-titles',
					'selectors-margin',
					'selectors-change',
					'selectors-class',
					'preload-selectors-small',
					'preload-selectors-big',
					'selectors-effect',
					'selectors-effect-speed',
					'selectors-mouseover-delay'
				),
				'Initialization' => array(
					'initialize-on',
					'click-to-activate',
					'click-to-deactivate',
					'show-loading',
					'loading-msg',
					'loading-opacity',
					'loading-position-x',
					'loading-position-y',
					'entire-image'
				),
				'Title and Caption' => array(
					'show-title',
					'show-caption',
					'caption-source',
					'caption-width',
					'caption-height',
					'caption-position',
					'caption-speed'
				),
				'Miscellaneous' => array(
					'option-associated-with-images',
					'show-associated-product-images',
					'load-associated-product-images',
					'ignore-magento-css',
					'show-message',
					'message',
					'right-click'
				),
				'Background' => array(
					'background-opacity',
					'background-color',
					'background-speed'
				),
				'Buttons' => array(
					'buttons',
					'buttons-display',
					'buttons-position'
				),
				'Zoom mode' => array(
					'always-show-zoom',
					'drag-mode',
					'move-on-click',
					'x',
					'y',
					'preserve-position',
					'fit-zoom-window'
				),
				'Expand mode' => array(
					'slideshow-effect',
					'slideshow-loop',
					'slideshow-speed',
					'z-index',
					'keyboard',
					'keyboard-ctrl'
				),
				'Hint' => array(
					'hint',
					'hint-text',
					'hint-position',
					'hint-opacity'
				),
				'Scroll' => array(
					'scroll-style',
					'show-image-title',
					'loop',
					'speed',
					'width',
					'height',
					'item-width',
					'item-height',
					'step',
					'items'
				),
				'Scroll Arrows' => array(
					'arrows',
					'arrows-opacity',
					'arrows-hover-opacity'
				),
				'Scroll Slider' => array(
					'slider-size',
					'slider'
				),
				'Scroll effect' => array(
					'duration'
				)
			),
			'category' => array(
				'General' => array(
					'enable-effect'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'square-images',
					'zoom-width',
					'zoom-height',
					'zoom-position',
					'zoom-align',
					'zoom-distance',
					'expand-size',
					'expand-position',
					'expand-align'
				),
				'Effects' => array(
					'expand-effect',
					'restore-effect',
					'expand-speed',
					'restore-speed',
					'expand-trigger',
					'expand-trigger-delay',
					'restore-trigger',
					'keep-thumbnail',
					'opacity',
					'opacity-reverse',
					'zoom-fade',
					'zoom-window-effect',
					'zoom-fade-in-speed',
					'zoom-fade-out-speed',
					'fps',
					'smoothing',
					'smoothing-speed',
					'pan-zoom'
				),
				'Multiple images' => array(
					'selector-max-width',
					'selector-max-height',
					'show-selectors-on-category-page',
					'selectors-margin',
					'selectors-change',
					'selectors-class',
					'preload-selectors-small',
					'preload-selectors-big',
					'selectors-effect',
					'selectors-effect-speed',
					'selectors-mouseover-delay'
				),
				'Initialization' => array(
					'initialize-on',
					'click-to-activate',
					'click-to-deactivate',
					'show-loading',
					'loading-msg',
					'loading-opacity',
					'loading-position-x',
					'loading-position-y',
					'entire-image'
				),
				'Title and Caption' => array(
					'show-title',
					'show-caption',
					'caption-source',
					'caption-width',
					'caption-height',
					'caption-position',
					'caption-speed'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message',
					'right-click'
				),
				'Background' => array(
					'background-opacity',
					'background-color',
					'background-speed'
				),
				'Buttons' => array(
					'buttons',
					'buttons-display',
					'buttons-position'
				),
				'Zoom mode' => array(
					'always-show-zoom',
					'drag-mode',
					'move-on-click',
					'x',
					'y',
					'preserve-position',
					'fit-zoom-window'
				),
				'Expand mode' => array(
					'slideshow-effect',
					'slideshow-loop',
					'slideshow-speed',
					'z-index',
					'keyboard',
					'keyboard-ctrl'
				),
				'Hint' => array(
					'hint',
					'hint-text',
					'hint-position',
					'hint-opacity'
				)
			),
			'newproductsblock' => array(
				'General' => array(
					'enable-effect'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'square-images',
					'zoom-width',
					'zoom-height',
					'zoom-position',
					'zoom-align',
					'zoom-distance',
					'expand-size',
					'expand-position',
					'expand-align'
				),
				'Effects' => array(
					'expand-effect',
					'restore-effect',
					'expand-speed',
					'restore-speed',
					'expand-trigger',
					'expand-trigger-delay',
					'restore-trigger',
					'keep-thumbnail',
					'opacity',
					'opacity-reverse',
					'zoom-fade',
					'zoom-window-effect',
					'zoom-fade-in-speed',
					'zoom-fade-out-speed',
					'fps',
					'smoothing',
					'smoothing-speed',
					'pan-zoom'
				),
				'Initialization' => array(
					'initialize-on',
					'click-to-activate',
					'click-to-deactivate',
					'show-loading',
					'loading-msg',
					'loading-opacity',
					'loading-position-x',
					'loading-position-y',
					'entire-image'
				),
				'Title and Caption' => array(
					'show-title',
					'show-caption',
					'caption-source',
					'caption-width',
					'caption-height',
					'caption-position',
					'caption-speed'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message',
					'right-click'
				),
				'Background' => array(
					'background-opacity',
					'background-color',
					'background-speed'
				),
				'Buttons' => array(
					'buttons',
					'buttons-display',
					'buttons-position'
				),
				'Zoom mode' => array(
					'always-show-zoom',
					'drag-mode',
					'move-on-click',
					'x',
					'y',
					'preserve-position',
					'fit-zoom-window'
				),
				'Expand mode' => array(
					'slideshow-effect',
					'slideshow-loop',
					'slideshow-speed',
					'z-index',
					'keyboard',
					'keyboard-ctrl'
				),
				'Hint' => array(
					'hint',
					'hint-text',
					'hint-position',
					'hint-opacity'
				)
			),
			'recentlyviewedproductsblock' => array(
				'General' => array(
					'enable-effect'
				),
				'Positioning and Geometry' => array(
					'thumb-max-width',
					'thumb-max-height',
					'square-images',
					'zoom-width',
					'zoom-height',
					'zoom-position',
					'zoom-align',
					'zoom-distance',
					'expand-size',
					'expand-position',
					'expand-align'
				),
				'Effects' => array(
					'expand-effect',
					'restore-effect',
					'expand-speed',
					'restore-speed',
					'expand-trigger',
					'expand-trigger-delay',
					'restore-trigger',
					'keep-thumbnail',
					'opacity',
					'opacity-reverse',
					'zoom-fade',
					'zoom-window-effect',
					'zoom-fade-in-speed',
					'zoom-fade-out-speed',
					'fps',
					'smoothing',
					'smoothing-speed',
					'pan-zoom'
				),
				'Initialization' => array(
					'initialize-on',
					'click-to-activate',
					'click-to-deactivate',
					'show-loading',
					'loading-msg',
					'loading-opacity',
					'loading-position-x',
					'loading-position-y',
					'entire-image'
				),
				'Title and Caption' => array(
					'show-title',
					'show-caption',
					'caption-source',
					'caption-width',
					'caption-height',
					'caption-position',
					'caption-speed'
				),
				'Miscellaneous' => array(
					'link-to-product-page',
					'show-message',
					'message',
					'right-click'
				),
				'Background' => array(
					'background-opacity',
					'background-color',
					'background-speed'
				),
				'Buttons' => array(
					'buttons',
					'buttons-display',
					'buttons-position'
				),
				'Zoom mode' => array(
					'always-show-zoom',
					'drag-mode',
					'move-on-click',
					'x',
					'y',
					'preserve-position',
					'fit-zoom-window'
				),
				'Expand mode' => array(
					'slideshow-effect',
					'slideshow-loop',
					'slideshow-speed',
					'z-index',
					'keyboard',
					'keyboard-ctrl'
				),
				'Hint' => array(
					'hint',
					'hint-text',
					'hint-position',
					'hint-opacity'
				)
			)
		);
		return $blocks[$block];
	}

}
