var itemsArray = []

$('.uabb-blog-post-content').each(function (key, value) {
    var productLink = $(this).find('.fl-post-image > a').attr('href')
    var productImage = $(this).find('.fl-post-image img').attr('src')
    var productTitle = $(this).find('.fl-post-title').text()
    var productReactions = $(this).find('.textcount').first().text()
    var productCategory = $(this).find('.sp-btn').text()
    if (productTitle == 'Pro Members Only') {

    } else if (productCategory.indexOf('Special Product') != -1) {
        console.log('SPECIAL')
    }

    else {
        $('.headerProductVisible').append(`<div class="headerProductItem rounded-2xl w-[342px] h-[428px] text-white">
    <div
        class="headerProductItemImage w-full h-[342px] bg-[url('`+ productImage + `')] bg-cover rounded-t-2xl">
    </div>
    <div class="text-[15px] text-center p-[10px] bg-white text-black font-semibold border-b-[1px] mbText">`+ productTitle + `</div>
    <div class="rounded-b-2xl p-[7px] bg-white flex items-center">
        <p class="text-black mx-auto flex items-center text-[14px]"><img class="h-[40px] mr-2"
                src="https://www.productmafia.com/wp-content/themes/bb-theme-child/images/reactions.svg" alt="Reactions"> `+ productReactions + `+</p>
    </div>
</div>`)
    }
})

$('.testLogin').click(function(){
    $('.authPopup').toggleClass('popupHidden')
})

$(document).ready(function () {
    var blockH = document.querySelector('.headerProductVisible').offsetHeight;
    document.querySelector('.headerProductVisible').setAttribute('style', 'height: ' + 840 + 'px');

    document.querySelector('.headerProductVisibleMask button').addEventListener("click", e => {
        document.querySelector('.headerProductVisible').setAttribute('style', 'height: ' + blockH + 'px')

        setTimeout(() => {
            document.querySelector('.headerProductVisible').setAttribute('style', 'height: auto')
        }, 500);

        document.querySelector('.headerProductVisibleMask').setAttribute('style', 'display: none')
    })
});


// Shipping from switch
$(function(){

	$("#js-ship-from-switch").change(function(){
		var $this = $(this);
		var $option = $this.find("option:selected");
		var selectedOption = $option.val();
		console.log(selectedOption);

        document.cookie = `shipping_from=${selectedOption};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;

		$(".js-shipping-from-switchable").each(function(){
			var $this = $(this);
			var otherOption = $this.attr("data-other-option");
			$this.attr("data-other-option", $this.text());
			$this.text(otherOption);

			var otherOptionUsdBase = $this.attr("data-other-option-usd-base");
			$this.attr("data-other-option-usd-base", $this.attr("data-usd-base"));
			$this.attr("data-usd-base", otherOptionUsdBase);
		});
	});
    
});





// Currency selector
$(function(){
   
	var formatPrice = function(price, currency, currencySymbol) {
		if (isNaN(price) || price === "") return "NA";
		var formatted = ( price < 1000 ? 
			price.toLocaleString('en-US', {maximumFractionDigits: 2, minimumFractionDigits: 2}) : 
			price.toLocaleString('en-US', {maximumFractionDigits: 0}) );
		return currencySymbol + formatted + " " + currency;
	}



    
	$("#js-currency-selector").change(function(){
        
		var $this = $(this);
		var $option = $this.find("option:selected");

		var $prevOption = $this.find("option.js-text-changed");
		$prevOption.text($prevOption.text().replace("Currency: ", ""));
		$prevOption.removeClass("js-text-changed");
		$option.text("Currency: " + $option.text());
		$option.addClass("js-text-changed");

		var currencyCode = $option.attr("data-currency-code");
		var exchangeRate = parseFloat($option.attr("data-exchange-rate"));
		var currencySymbol = $option.attr("data-symbol");
        

        document.cookie = `currency=${currencyCode};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
        document.cookie = `exchange_rate=${exchangeRate};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;
        document.cookie = `currency_symbol=${currencySymbol};  expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/`;

		$(".js-currency-convertible").each(function(){
			var $this = $(this);
			var noCurrencyCode = $this.hasClass("js-no-currency-code");
			var onlyCurrencyCode = $this.hasClass("js-only-currency-code");

			var currencyCodeOverride = noCurrencyCode ? "" : currencyCode;

			var converted = parseFloat($this.attr("data-usd-base")) * exchangeRate;



			$this.text(onlyCurrencyCode ? currencyCodeOverride : formatPrice(converted, currencyCodeOverride, currencySymbol));

			var otherOptionUsdBase = $this.attr("data-other-option-usd-base");
			if (otherOptionUsdBase !== undefined) {
				var otherOptionConverted = parseFloat(otherOptionUsdBase) * exchangeRate;
				$this.attr("data-other-option", formatPrice(otherOptionConverted, currencyCodeOverride, currencySymbol));
			}
		});
	});
	
});


  

//set cookie 


(function($){
    function setCookie(key, value) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (364 * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + '; path=/';  
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }
    // var niche = getCookie('niche'); console.log(niche);
    // if (niche != null){ $('.niche').css('display','none'); }
    // $('#sidebar-search-form input[type=submit],#gform_submit_button_9').click(function(){
    //     setCookie('niche','1');
    //     console.log(niche);
    // });
}(jQuery));