// const $ = jQuery;
//
// function open_categories( button ) {
// 	const targetDiv = document.getElementsByClassName( 'fl-module-sidebar' )[ 0 ].getElementsByTagName( 'ul' )[ 0 ];
// 	if ( targetDiv.style.display == 'block' ) {
// 		targetDiv.style.display = 'none';
// 	} else {
// 		targetDiv.style.display = 'block';
// 	}
// }
//
// function open_orders( button ) {
// 	const targetDiv = document.getElementsByClassName( 'sort-buttons-new-block' )[ 0 ];
// 	if ( targetDiv.style.display == 'block' ) {
// 		targetDiv.style.display = 'none';
// 	} else {
// 		targetDiv.style.display = 'block';
// 	}
// }
//
// window.onload = function() {
// 	const allImages = document.getElementsByClassName( 'fl-post-image' );
// 	for ( var i = 0, len = allImages.length; i < len; i++ ) {
// 		const imageLink = allImages[ i ].getElementsByTagName( 'a' )[ 0 ];
// 		if ( imageLink.innerHTML == '' ) {
// 			imageLink.innerHTML = '<img width="500" height="500" src="https://www.productmafia.com/wp-content/uploads/2018/08/cyber-security-1915626_640.png" class=" wp-post-image" alt="" itemprop="image" sizes="(max-width: 500px) 100vw, 500px">';
// 			/*imageLink.innerHTML = '<img width="500" height="500" src="https://www.productmafia.com/wp-content/uploads/2019/08/PLATINUM-MEMBERSHIP-REQUIRED.png" class=" wp-post-image" alt="" itemprop="image" sizes="(max-width: 500px) 100vw, 500px">' - #180552 - jec*/
// 		}
// 	}
// 	const allButtons = document.getElementsByClassName( 'uabb-creative-button' );
// 	for ( var i = 0, len = allButtons.length; i < len; i++ ) {
// 		const spanLink = allButtons[ i ].getElementsByClassName( 'uabb-creative-button-text' )[ 0 ];
// 		if ( spanLink.innerText == 'Join Now! It\'s Free' ) {
// 			spanLink.innerText = 'Join Now! From $10';
// 			allButtons[ i ].setAttribute( 'href', 'https://www.productmafia.com/pricing' );
// 		}
// 	}
// };
//
// jQuery( document ).ready( function( $ ) {
// 	// init Isotope
// 	/*$('.filters-select, .mafia_sorting').hide();
// 	$('#filter-pr').hide();*/
// 	$( window ).load( function() {
// 		$( '.filters-select, .mafia_sorting' ).fadeIn();
// 		$( '#filter-pr' ).fadeIn();
//
// 		const getUrlParameter = function getUrlParameter( sParam ) {
// 			let sPageURL = window.location.search.substring( 1 ),
// 				sURLVariables = sPageURL.split( '&' ),
// 				sParameterName,
// 				i;
//
// 			for ( i = 0; i < sURLVariables.length; i++ ) {
// 				sParameterName = sURLVariables[ i ].split( '=' );
//
// 				if ( sParameterName[ 0 ] === sParam ) {
// 					return sParameterName[ 1 ] === undefined ? true : decodeURIComponent( sParameterName[ 1 ] );
// 				}
// 			}
// 		};
//
// 		const $grid = $( '#mafia_masonry' ).isotope( {
// 			itemSelector: '.mafia_isotope',
// 			layoutMode: 'fitRows',
// 			masonry: {
// 			},
// 			getSortData: {
// 				orders: '[data-orders] parseInt',
// 				engagement: '[data-engagement_likes] parseFloat',
// 				selling_price: '[data-selling_price] parseFloat',
// 				selling_price_asc: '[data-selling_price] parseFloat',
// 				profit_margin: '[data-profit_margin] parseFloat',
// 				profit_margin_us: '[data-profit_margin_us] parseFloat',
// 				date: '[data-date_published] parseInt',
// 			},
// 		} );
//
// 		const param_product_type = getUrlParameter( 'product_type' );
// 		const param_category = getUrlParameter( 'prod_cat' );
//
// 		if ( typeof param_product_type !== 'undefined' && typeof param_category !== 'undefined' ) {
// 			var filters = {
// 				product_type: ( param_product_type === true ) ? '.product_type-all' : param_product_type,
// 				category: ( param_category === true ) ? '.category-all' : param_category,
// 			};
// 		} else {
// 			var filters = {};
// 		}
//
// 		$( 'select[data-filter-group="product_type"]' ).on( 'change', function() {
// 			let newVal = $( this ).val();
//
// 			newVal = newVal.replace( '.', '' );
// 			$( '#filter_product_type' ).val( newVal );
// 		} );
//
// 		$( 'select[data-filter-group="category"]' ).on( 'change', function() {
// 			let newVal = $( this ).val();
// 			newVal = newVal.replace( '.category-', '' );
// 			$( '#filter_category' ).val( newVal );
// 		} );
//
// 		// flatten object by concatting values
// 		function concatValues( obj ) {
// 			let value = '';
// 			for ( const prop in obj ) {
// 			  value += obj[ prop ];
// 			}
// 			return value;
// 		}
//
// 		$( '.mafia_sorting' ).on( 'change', function() {
// 			const sortValue = $( this ).val();
//
// 			if ( sortValue == 'selling_price_asc' ) {
// 				$grid.isotope( { sortBy: sortValue, sortAscending: true } );
// 			} else if ( sortValue == 'profit_margin' ) {
// 				const shippingFrom = $( '.b-switch__switch' ).attr( 'data-option' );
// 				$grid.isotope( { sortBy: shippingFrom == 'China' ? 'profit_margin' : 'profit_margin_us', sortAscending: false } );
// 			} else {
// 				$grid.isotope( { sortBy: sortValue, sortAscending: false } );
// 			}
// 		} );
// 	} );
// } );
//
// // Single product page: copy fb ad description to clipboard
// $( function() {
// 	$( '.b-fb-ad-links__link--copy' ).click( function( e ) {
// 		const $this = $( this );
//
// 		navigator.clipboard.writeText( $this.data( 'description' ) ).then( function() {
// 			const $notification = $this.parent().find( '.b-notification' );
// 			$notification.find( '.b-notification__success' ).show();
// 			$notification.find( '.b-notification__failure' ).hide();
// 			$notification.show();
// 			setTimeout( function() {
// 				$notification.hide();
// 			}, 2000 );
// 		  }, function() {
// 			const $notification = $this.parent().find( '.b-notification' );
// 			$notification.find( '.b-notification__success' ).hide();
// 			$notification.find( '.b-notification__failure' ).show();
// 			$notification.show();
// 			setTimeout( function() {
// 				$notification.hide();
// 			}, 2000 );
// 		} );
// 	} );
// } );
//
// // Update profile
// $( function() {
// 	$( '.mafia-update-profile-form' ).on( 'submit', function( event ) {
// 		event.preventDefault();
//
// 		const $this = $( this );
// 		const $btn = $this.find( '.btn' );
// 		const $notification = $this.find( '.b-notification' );
//
// 		$btn.css( 'width', $btn.outerWidth() );
// 		$btn.attr( 'data-initial-text', $btn.text() );
// 		$btn.text( 'PROCESSING...' );
//
// 		const data = {
// 			action: 'update_profile',
// 			first_name: $this.find( "input[name='first_name']" ).val(),
// 			last_name: $this.find( "input[name='last_name']" ).val(),
// 			display_name: $this.find( "input[name='display_name']" ).val(),
// 			user_email: $this.find( "input[name='user_email']" ).val(),
// 		};
//
// 		$.ajax( {
// 			type: 'POST',
// 			url: wpAjax.url,
// 			data,
// 			success( response ) {
// 				console.log( response );
// 				$btn.text( $btn.attr( 'data-initial-text' ) );
// 				$notification.find( '.b-notification__success' ).show();
// 				$notification.find( '.b-notification__failure' ).hide();
// 				$notification.show();
// 				setTimeout( function() {
// 					$notification.hide();
// 				}, 3000 );
// 			},
// 			error( response ) {
// 				console.log( 'ajax error' );
// 				$btn.text( $btn.attr( 'data-initial-text' ) );
// 				$notification.find( '.b-notification__success' ).hide();
// 				$notification.find( '.b-notification__failure' ).show();
// 				$notification.show();
// 				setTimeout( function() {
// 					$notification.hide();
// 				}, 3000 );
// 			},
// 		} );
// 	} );
// } );
//
// // Shipping from switch
// $( function() {
// 	$( '#js-ship-from-switch' ).change( function() {
// 		const $this = $( this );
// 		const $option = $this.find( 'option:selected' );
// 		const selectedOption = $option.val();
// 		console.log( selectedOption );
//
// 		document.cookie = `shipping_from=${ selectedOption };  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
//
// 		$( '.js-shipping-from-switchable' ).each( function() {
// 			const $this = $( this );
// 			const otherOption = $this.attr( 'data-other-option' );
// 			$this.attr( 'data-other-option', $this.text() );
// 			$this.text( otherOption );
//
// 			const otherOptionUsdBase = $this.attr( 'data-other-option-usd-base' );
// 			$this.attr( 'data-other-option-usd-base', $this.attr( 'data-usd-base' ) );
// 			$this.attr( 'data-usd-base', otherOptionUsdBase );
// 		} );
// 	} );
// } );
//
// // Currency selector
// $( function() {
// 	const formatPrice = function( price, currency, currencySymbol ) {
// 		if ( isNaN( price ) || price === '' ) {
// 			return 'NA';
// 		}
// 		const formatted = ( price < 1000
// 			? price.toLocaleString( 'en-US', { maximumFractionDigits: 2, minimumFractionDigits: 2 } )
// 			: price.toLocaleString( 'en-US', { maximumFractionDigits: 0 } ) );
// 		return currencySymbol + formatted + ' ' + currency;
// 	};
//
// 	$( '#js-currency-selector' ).change( function() {
// 		const $this = $( this );
// 		const $option = $this.find( 'option:selected' );
//
// 		const $prevOption = $this.find( 'option.js-text-changed' );
// 		$prevOption.text( $prevOption.text().replace( 'Currency: ', '' ) );
// 		$prevOption.removeClass( 'js-text-changed' );
// 		$option.text( 'Currency: ' + $option.text() );
// 		$option.addClass( 'js-text-changed' );
//
// 		const currencyCode = $option.attr( 'data-currency-code' );
// 		const exchangeRate = parseFloat( $option.attr( 'data-exchange-rate' ) );
// 		const currencySymbol = $option.attr( 'data-symbol' );
//
// 		document.cookie = `currency=${ currencyCode };  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
// 		document.cookie = `exchange_rate=${ exchangeRate };  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
// 		document.cookie = `currency_symbol=${ currencySymbol };  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
//
// 		$( '.js-currency-convertible' ).each( function() {
// 			const $this = $( this );
// 			const noCurrencyCode = $this.hasClass( 'js-no-currency-code' );
// 			const onlyCurrencyCode = $this.hasClass( 'js-only-currency-code' );
//
// 			const currencyCodeOverride = noCurrencyCode ? '' : currencyCode;
//
// 			const converted = parseFloat( $this.attr( 'data-usd-base' ) ) * exchangeRate;
// 			$this.text( onlyCurrencyCode ? currencyCodeOverride : formatPrice( converted, currencyCodeOverride, currencySymbol ) );
//
// 			const otherOptionUsdBase = $this.attr( 'data-other-option-usd-base' );
// 			if ( otherOptionUsdBase !== undefined ) {
// 				const otherOptionConverted = parseFloat( otherOptionUsdBase ) * exchangeRate;
// 				$this.attr( 'data-other-option', formatPrice( otherOptionConverted, currencyCodeOverride, currencySymbol ) );
// 			}
// 		} );
// 	} );
// } );
//
// // Top countries chart
// $( function() {
// 	const chart = document.getElementById( 'js-countries-chart' );
// 	if ( chart != null ) {
// 		const ctx = chart.getContext( '2d' );
// 		const gradient = ctx.createLinearGradient( 0, 0, 0, 400 );
// 		gradient.addColorStop( 0, 'rgba(228, 46, 4, 1)' );
// 		gradient.addColorStop( 1, 'rgba(228, 46, 4, 0)' );
// 		new Chart( ctx, {
// 			type: 'bar',
// 			data: {
// 				datasets: [ {
// 					label: 'Reviews',
// 					data: topCountriesChartData.data,
// 					borderColor: '#e42e04',
// 					borderWidth: 1,
// 					backgroundColor: gradient,
// 				} ],
//
// 				labels: topCountriesChartData.labels,
// 			},
// 			options: {
// 				maintainAspectRatio: false,
//
// 				plugins: {
// 					legend: { display: false },
// 				},
//
// 				scales: {
// 					x: {
// 						grid: {
// 							// display: false
// 						},
// 					},
// 					y: {
// 						grid: {
// 							// display: false
// 						},
// 						ticks: {
// 							callback( val, index ) {
// 								return Number.isInteger( val ) ? val : '';
// 							},
// 							stepSize: 1,
// 						},
// 					},
// 				},
// 			},
// 		} );
// 	}
// } );
//
// // Preload images
// window.addEventListener( 'load', function() {
// 	$( '.js-preload' ).each( function() {
// 		$( this ).attr( 'src', $( this ).attr( 'data-src' ) );
// 	} );
// } );
//
// // Filters
// $( function() {
// 	const methods = {
// 		resetCustomSelect( $el ) {
// 			const min = $el.data( 'min' );
// 			const max = $el.data( 'max' );
// 			this.setCustomSelectText( $el, min, max );
// 			$el.find( '.b-custom-select__control' ).slider( 'values', [ min, max ] );
// 			if ( $el.data( 'initial-option-text' ) != undefined ) {
// 				$el.find( 'option' ).text( $el.data( 'initial-option-text' ) );
// 			}
// 		},
// 		setCustomSelectText( $el, lower, upper ) {
// 			const max = $el.data( 'max' );
// 			$el.find( '.b-custom-select__control-text' ).text( 'From ' + lower + ' to ' + upper + ( upper == max ? '+' : '' ) );
// 		},
// 		resetSelect( $el ) {
// 			$el.val( '' );
// 		},
// 		resetDateSelect( $el ) {
// 			const today = new Date();
// 			$el.data( 'daterangepicker' ).setStartDate( today );
// 			$el.data( 'daterangepicker' ).setEndDate( today );
// 			if ( $el.data( 'initial-option-text' ) != undefined ) {
// 				$el.find( 'option' ).text( $el.data( 'initial-option-text' ) );
// 			}
// 		},
//
// 		setAppliedFilterBoxValuesForSlider( $el, $customSelectEl, lowerValue, upperValue, min, max ) {
// 			const formatLargeQuantity = function( quantity ) {
// 				if ( quantity >= 1000000 ) {
// 					return ( Math.round( quantity / 100000 ) / 10 ) + 'M';
// 				} // round to single decimal
// 				if ( quantity >= 1000 ) {
// 					return Math.floor( quantity / 1000 ) + 'K';
// 				}
// 				return quantity;
// 			};
// 			$el.find( '.b-applied-filter-box__lower-value' ).text( formatLargeQuantity( lowerValue ) );
// 			$el.find( '.b-applied-filter-box__upper-value' ).text( upperValue == max ? '+' : ' to ' + formatLargeQuantity( upperValue ) );
// 			const $option = $customSelectEl.find( 'option' );
// 			const disabled = ( lowerValue == min && upperValue == max );
// 			if ( disabled ) {
// 				$el.hide();
// 				if ( $customSelectEl.data( 'initial-option-text' ) != undefined ) {
// 					$option.text( $customSelectEl.data( 'initial-option-text' ) );
// 				}
// 			} else {
// 				$el.show();
// 				if ( $customSelectEl.data( 'initial-option-text' ) == undefined ) {
// 					$customSelectEl.attr( 'data-initial-option-text', $option.text() );
// 				}
// 				$option.text( $el.text() );
// 			}
// 		},
// 		setAppliedFilterBoxValuesForDateSelect( $el, $customSelectEl, from, to ) {
// 			const fromText = from;
// 			const toText = ( from == to ? '' : ' to ' + to );
// 			$el.find( '.b-applied-filter-box__lower-value' ).text( fromText );
// 			$el.find( '.b-applied-filter-box__upper-value' ).text( toText );
// 			$el.show();
// 			const $option = $customSelectEl.find( 'option' );
// 			if ( $customSelectEl.data( 'initial-option-text' ) == undefined ) {
// 				$customSelectEl.attr( 'data-initial-option-text', $option.text() );
// 			}
// 			$option.text( fromText + toText );
// 		},
// 		setAppliedFilterBoxValueForSelect( $el, newText, newVal ) {
// 			$el.find( '.b-applied-filter-box__value' ).text( newText );
// 			if ( newVal == '' || newVal == undefined ||
// 			/*temporary hack, needs fix*/ newVal == '.category-all' ) {
// 				$el.hide();
// 			} else {
// 				$el.show();
// 			}
// 		},
// 		updateAppliedFiltersRowVisibility( $row ) {
// 			let anyAppliedFilters = false;
// 			$row.children().each( function() {
// 				if ( $( this ).css( 'display' ) != 'none' ) {
// 					anyAppliedFilters = true;
// 				}
// 			} );
// 			const displayProp = anyAppliedFilters ? 'flex' : 'none';
// 			$row.css( 'display', displayProp );
// 			$row.prev().css( 'display', displayProp );
// 		},
//
// 		updateHiddenFormFieldsForSlider( $parentEl, lower, upper ) {
// 			for ( let i = 0; i <= 1; i++ ) {
// 				const param = ( i == 0 ? lower : upper );
// 				const $field = $parentEl.children().eq( i );
// 				$field.val( param );
// 				if ( param == '' ) {
// 					$field.attr( 'disabled', 'disabled' );
// 				} else {
// 					$field.removeAttr( 'disabled' );
// 				}
// 			}
// 		},
// 		updateHiddenFormFieldsForDateSelect( $parentEl, from, to ) {
// 			for ( let i = 0; i <= 1; i++ ) {
// 				const param = ( i == 0 ? from : to );
// 				const $field = $parentEl.children().eq( i );
// 				$field.val( param );
// 				if ( param == '' ) {
// 					$field.attr( 'disabled', 'disabled' );
// 				} else {
// 					$field.removeAttr( 'disabled' );
// 				}
// 			}
// 		},
// 		updateHiddenFormFieldForSelect( $el, newVal ) {
// 			$el.val( newVal );
// 			if ( newVal == '' ) {
// 				$el.attr( 'disabled', 'disabled' );
// 			} else {
// 				$el.removeAttr( 'disabled' );
// 			}
// 		},
// 	};
//
// 	$( document ).mousedown( function() {
// 		$( '.b-custom-select__dropdown' ).hide();
// 	} );
// 	$( '.b-custom-select' ).each( function() {
// 		const $this = $( this );
// 		const $control = $this.find( '.b-custom-select__control' );
// 		const thisId = $this.data( 'id' );
// 		const $appliedFilterBox = $this.closest( '.b-filters' ).find( `.b-applied-filter-box[data-id=${ thisId }]` );
// 		const $appliedFiltersRow = $this.closest( '.b-filters' ).find( '.b-filters__applied-row' );
// 		const $hiddenFormFieldsParent = $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `div[data-id=${ thisId }]` );
// 		const min = $this.data( 'min' );
// 		const max = $this.data( 'max' );
// 		const lower = ( ( $this.data( 'lower' ) != undefined && $this.data( 'lower' ) != '' ) ? $this.data( 'lower' ) : min );
// 		const upper = ( ( $this.data( 'upper' ) != undefined && $this.data( 'upper' ) != '' ) ? $this.data( 'upper' ) : max );
//
// 		// Slider
// 		$control.slider( {
// 			range: true,
// 			min,
// 			max,
// 			values: [ lower, upper ],
// 			slide( event, ui ) {
// 				const newMin = ui.values[ 0 ],
// 					newMax = ui.values[ 1 ];
// 				methods.setCustomSelectText( $this, newMin, newMax );
// 				methods.setAppliedFilterBoxValuesForSlider( $appliedFilterBox, $this, newMin, newMax, min, max );
// 				methods.updateAppliedFiltersRowVisibility( $appliedFiltersRow );
// 				methods.updateHiddenFormFieldsForSlider( $hiddenFormFieldsParent, newMin != min ? newMin : '', newMax != max ? newMax : '' );
// 			},
// 		} );
// 		methods.setCustomSelectText( $this, lower, upper );
// 		methods.setAppliedFilterBoxValuesForSlider( $appliedFilterBox, $this, lower, upper, min, max );
// 		methods.updateAppliedFiltersRowVisibility( $appliedFiltersRow );
// 		methods.updateHiddenFormFieldsForSlider( $hiddenFormFieldsParent, lower != min ? lower : '', upper != max ? upper : '' );
//
// 		// Open dropdown
// 		const $dropdown = $this.find( '.b-custom-select__dropdown' );
// 		$this.mousedown( function( event ) {
// 			const isClosed = ( $dropdown.css( 'display' ) == 'none' );
// 			$( '.b-custom-select__dropdown' ).hide();
// 			$( '.daterangepicker' ).hide();
// 			if ( isClosed ) {
// 				$this.find( '.b-custom-select__dropdown' ).show();
// 			}
// 			event.stopPropagation();
// 		} );
// 		$dropdown.mousedown( function( event ) {
// 			event.stopPropagation();
// 		} );
// 	} );
//
// 	$( '.b-applied-filter-box' ).each( function() {
// 		const $this = $( this );
// 		const thisId = $this.data( 'id' );
// 		const $appliedFiltersRow = $this.closest( '.b-filters' ).find( '.b-filters__applied-row' );
//
// 		// Only one of the below selectors will be not empty
// 		const $customSelect = $this.closest( '.b-filters' ).find( `.b-custom-select[data-id=${ thisId }]` ),
// 			$dateSelect = $this.closest( '.b-filters' ).find( `.b-date-select[data-id=${ thisId }]` ),
// 			$select = $this.closest( '.b-filters' ).find( `.b-select[data-id=${ thisId }]` );
//
// 		$this.click( function() {
// 			$this.hide();
// 			methods.updateAppliedFiltersRowVisibility( $appliedFiltersRow );
//
// 			if ( $customSelect.length != 0 ) {
// 				methods.resetCustomSelect( $customSelect );
// 				methods.updateHiddenFormFieldsForSlider( $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `div[data-id=${ thisId }]` ), '', '' );
// 			} else if ( $dateSelect.length != 0 ) {
// 				methods.resetDateSelect( $dateSelect );
// 				methods.updateHiddenFormFieldsForDateSelect( $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `div[data-id=${ thisId }]` ), '', '' );
// 			} else if ( $select.length != 0 ) {
// 				methods.resetSelect( $select );
// 				methods.updateHiddenFormFieldForSelect( $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `[data-id=${ thisId }]` ), '' );
// 			}
// 		} );
// 	} );
//
// 	$( '.b-select' ).each( function() {
// 		const $this = $( this );
// 		const thisId = $this.data( 'id' );
// 		if ( ! thisId ) {
// 			return;
// 		}
// 		const $appliedFilterBox = $this.closest( '.b-filters' ).find( `.b-applied-filter-box[data-id=${ thisId }]` );
// 		const $appliedFiltersRow = $this.closest( '.b-filters' ).find( '.b-filters__applied-row' );
// 		const $hiddenFormField = $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `input[data-id=${ thisId }]` );
// 		const handleChange = function() {
// 			const val = $this.val();
// 			const text = $this.find( 'option:selected' ).text();
// 			methods.setAppliedFilterBoxValueForSelect( $appliedFilterBox, text, val );
// 			methods.updateAppliedFiltersRowVisibility( $appliedFiltersRow );
// 			methods.updateHiddenFormFieldForSelect( $hiddenFormField, val );
// 		};
// 		$this.change( handleChange );
// 		handleChange();
// 	} );
//
// 	$( '.b-date-select' ).each( function() {
// 		const $this = $( this );
// 		const thisId = $this.data( 'id' );
// 		const $appliedFilterBox = $this.closest( '.b-filters' ).find( `.b-applied-filter-box[data-id=${ thisId }]` );
// 		const $appliedFiltersRow = $this.closest( '.b-filters' ).find( '.b-filters__applied-row' );
// 		const $hiddenFormField = $this.closest( '.b-filters' ).find( '.b-filters__form' ).find( `div[data-id=${ thisId }]` );
// 		const handleChange = function( from, to ) {
// 			methods.setAppliedFilterBoxValuesForDateSelect( $appliedFilterBox, $this, from, to );
// 			methods.updateAppliedFiltersRowVisibility( $appliedFiltersRow );
// 			methods.updateHiddenFormFieldsForDateSelect( $hiddenFormField, from, to );
// 		};
// 		$this.daterangepicker( {
// 			autoApply: true,
// 			maxDate: new Date(),
// 		} );
// 		$this.on( 'apply.daterangepicker', function( ev, picker ) {
// 			const from = picker.startDate.format( 'YYYY-MM-DD' );
// 			const to = picker.endDate.format( 'YYYY-MM-DD' );
// 			handleChange( from, to );
// 		} );
// 		const from = $this.data( 'from' );
// 		const to = $this.data( 'to' );
// 		if ( from != '' && to != '' ) {
// 			$this.data( 'daterangepicker' ).setStartDate( new Date( from ) );
// 			$this.data( 'daterangepicker' ).setEndDate( new Date( to ) );
// 			handleChange( from, to );
// 		}
// 	} );
//
// 	$( '.mafia_sorting' ).each( function() {
// 		const $this = $( this );
// 		const thisId = $this.data( 'id' );
// 		const $hiddenFormField = $( '.b-filters' ).find( '.b-filters__form' ).find( `input[data-id=${ thisId }]` );
// 		const handleChange = function() {
// 			const val = $this.val();
// 			methods.updateHiddenFormFieldForSelect( $hiddenFormField, val );
// 		};
// 		$this.change( handleChange );
// 		handleChange();
// 	} );
//
// 	$( '.filters-toggle' ).click( function() {
// 		const $this = $( this );
// 		$this.toggleClass( 'state-shown' ).toggleClass( 'state-hidden' );
// 		$( '.b-filters' ).toggleClass( 'b-filters--shown' ).toggleClass( 'b-filters--hidden' );
// 	} );
// } );
