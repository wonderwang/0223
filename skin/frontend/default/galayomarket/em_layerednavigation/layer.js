/*
 * Extend string class
 */
String.prototype.getQueryString = function() {
	var parts = this.split('?');
	if (typeof parts[1]=='undefined')
		return '';
	return parts[1];
}

/*
 * EM Layer
 *
 * class for layered navigation
 * Depends on library: prototype, jquery.address
 */
var EM_LayeredNavigation = Class.create();
EM_LayeredNavigation.prototype = {
	initialize: function(options) {
		this.endpoint = options.endpoint;
		this.category = options.category;
		this.enableAjax = options.ajax;
		this.layer = '.block-layered-nav';
		this.products = '.category-products';
		this.selectors = [
			this.layer + ' a',                  // layer link
			this.layer + ' input',              // radio, checkbox
			this.layer + ' select',             // select
			this.products + ' .view-mode a',    // view mode (grid/list)
			this.products + ' .sort-by a',      // sort direction
			this.products + ' .limiter select', // limiter
			this.products + ' .sort-by select', // sort by
			this.products + ' .pages a'         // pagination
		];

		this.setupState(options.reqUri);
		this.setupEvent();
	},
	
	setupEvent: function() {
		var self = this;
		// perform update on input change
		$$(this.selectors.join(',')).each(function(s,i) {
			switch (s.tagName) {
				case 'A':
					s.href = self.replaceUrl(s.href);
					$(s).observe('click', function (event) {
						event.preventDefault();
						self.update(this.href);
					});
					break;
				case 'SELECT':
					$(s).select('option').each(function (o, idx) {
						o.value = self.replaceUrl(o.value);
					});
					
					s.onchange = function () {
						self.update(this.value);
					}
					break;
				case 'INPUT':
					s.value = self.replaceUrl(s.value);
					$(s).observe('click', function (event) {
						self.update(this.value);
					});
					break;
			}
		});
	},
	
	replaceUrl: function(url) {
		var query = url.getQueryString();
		var base = document.URL.replace(/\?.*/, '');
		return base + '?' + query;
	},
	
	update: function(url) {
		var baseUrl = this.endpoint + 'id/' + this.category + '/';
		var ajaxUrl = baseUrl;
		var query = url.getQueryString();
		if (query!='')
			ajaxUrl += '?' + query;
		
		if (!this.enableAjax) {
			window.location = url;
			return;
		}
		
		$('loading-mask').show();
		var self = this;
		new Ajax.Request(ajaxUrl,  {
			onSuccess: function (data) {
				var response = data.responseJSON;
				$$('meta[name="robots"]').first().setAttribute('content',response.robots);
				self.prepareBlock();
                if($$('.block-layered-nav').length != 0){
				    $$(self.layer).first().replace(response.layer);
                }
				$$(self.products).first().replace(response.products);
				if(response.cat_title && ($$('.category-title').length > 0))
					$$('.category-title').first().innerHTML = '<h1>' + response.cat_title + '</h1>';
				if(response.breadcrumbs && ($$('.breadcrumbs').length > 0))
					$$('.breadcrumbs').first().replace(response.breadcrumbs);
				if(response.cat_desc && ($$('.category-description').length > 0))	
					$$('.category-description').first().innerHTML = response.cat_desc;
				self.setState(query);	// set query string
				self.prevQuery = query;
				self.setupEvent();                
                window.afterLayerUpdate();
				$('loading-mask').hide();
                window.EM.tools.decorateProductsGrid('.category-products .products-grid', {
            		width: PRODUCTSGRID_ITEM_WIDTH,
                    spacing: PRODUCTSGRID_ITEM_SPACING
            	});
                
                qs({
        			itemClass: '.products-grid li.item, .products-list li.item, li.item .cate_product, .product-upsell-slideshow li.item, .mini-products-list li.item, #crosssell-products-list li.item', //selector for each items in catalog product list,use to insert quickshop image
        			aClass: 'a.product-image', //selector for each a tag in product items,give us href for one product
        			imgClass: '.product-image img' //class for quickshop href
        		});
			}
		});
	},

	afterUpdate: function () {},
    
    setupState: function(reqUri) {
	if (jQuery.browser.msie) return;
		var arr = reqUri.split('?');
		var state = arr[0];
		this.prevQuery = typeof arr[1]!=='undefined' ? arr[1] : '';
		jQuery.address.state(state);
		jQuery.address.externalChange(this.onStateChange.bind(this));
	},
	
	setState: function(query) {
		if (jQuery.browser.msie) return;
		jQuery.address.queryString(query);
	},
	
	onStateChange: function(event) {
		if (event.queryString==this.prevQuery)
			return;
		var query = event.queryString;
		jQuery.address.queryString(query);
		this.update('?'+query);
	},
	
	prepareBlock: function() {
		// add products block if not exists
		if (!$$(this.products).length || $$('.block-layered-nav').length != 0) {
			var className = this.products.replace('.', '');
			$$('.col-main').first().insert({ bottom: '<div class="'+className+'"></div>' });
			
			// remove block note-msg (fix bug empty product count)
			$$('.note-msg').each(function (e) {
				e.remove();
			});
		}        
	}
};
