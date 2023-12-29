// Product Page Bottom Slider

jQuery("#influencers-slider").owlCarousel({
    loop:true,
    margin:0,
    items:1,
    nav:true,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    smartSpeed: 1000,
    dots:false,
    responsive : {
0 : {
    items:2,
    margin:0,
},
480 : {
    items:2,
    margin:0,
},
990 : {
    items:3,

}
}
});





// Gallery Js

jQuery(document).ready(function(){
   
    jQuery('.js-gallery').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: '<span class="gallery-arrow mod-prev"><i class="fa-solid fa-angle-left"></i></span>',
      nextArrow: '<span class="gallery-arrow mod-next"><i class="fa-solid fa-angle-right"></i></span>'
    });
    
    jQuery('.js-gallery').slickLightbox({
      src: 'src',
      itemSelector: '.js-gallery-popup img',
      background: 'rgba(0, 0, 0, .7)'
    });
  });
  
  
  //chart js
  $(function(){
    var chart = document.getElementById("js-countries-chart");
    if (chart != null) {
      var ctx = chart.getContext('2d');
      var gradient = ctx.createLinearGradient(0, 0, 0, 400);
      gradient.addColorStop(0, 'rgba(228, 46, 4, 1)');   
      gradient.addColorStop(1, 'rgba(228, 46, 4, 0)');
      new Chart(ctx, {
        type: 'bar',
        data: {
          datasets: [{
            label: 'Reviews',
            data: topCountriesChartData.data,
            borderColor: '#e42e04',
            borderWidth: 1,
            backgroundColor: gradient
          }],
  
          labels: topCountriesChartData.labels
        },
        options: {
          maintainAspectRatio: false,
  
          plugins: {
            legend: {display: false},
          },
  
          scales: {
            x: {
                          grid: {
                              // display: false
                          }
                      },
            y: {
                          grid: {
                              // display: false
                          },
                          ticks: {
                              callback: function(val, index) {
                                  return Number.isInteger(val) ? val : "";
                              },
                stepSize: 1
                          }
                      }
          }
        }
      });
    }
    
  });