//Tooltip

$("#tooltip-close").click(function(){
    $(".tooltip-box").fadeOut(350);
  });
  
  $(".tooltip-show").click(function(){
    $(".tooltip-box").fadeToggle(350);
  });