//Animation progress bar

 var functionProgress = function() {
   $(".progress").each(function(){

    var $bar = $(this).find(".bar");
    var $val = $(this).find("span");
    var perc = parseInt( $val.text(), 10);

    $({p:0}).animate({p:perc}, {
      duration: 1500,
      easing: "swing",
      step: function(p) {
        $bar.css({
          transform: "rotate("+ (45+(p*1.8)) +"deg)",

        });
        $val.text(p|0);
      }
    });
  });
}
$('#sectionAbout > .titre').on('inview', () => {
  functionProgress();
});

//zoom
  $('.tile')
    // tile mouse actions
    .on('mouseover', function(){
      $(this).children('.photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
    })
    .on('mouseout', function(){
      $(this).children('.photo').css({'transform': 'scale(1)'});
    })
    .on('mousemove', function(e){
      $(this).children('.photo').css({'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
    })
    // tiles set up
    .each(function(){
      $(this)
        // add a photo container
        .append('<div class="photo"></div>')
        // set up a background image for each tile based on data-image attribute
        .children('.photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
    })
//ouvrir Lien
function LinkBella(){
  window.open("site/LaBellaVita/index.html","_self")
}
function LinkPod(){
  window.open("site/PodCast/index.html","_self")
}
function LinkQui(){
  window.open("site/QuiQuoi/index.html","_self")
}
