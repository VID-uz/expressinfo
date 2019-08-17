$(document).ready(function(){
  $(".mobile_main_header_nav_btn").on("click", function(){
    $(".header_nav").fadeIn(300);
    $(".hidden_back").fadeIn(300);
  });
  $(".mob_menu_search_btn").on("click", function(){
    $(".mobile_search").fadeIn(300);
  });
  $(".mobile_search_close_btn").on("click", function(){
    $(".mobile_search").fadeOut(300);
    return false;
  });

  var emptyCells, i;

  $('.categories').each(function() {
    emptyCells = [];
    for (i = 0; i < $(this).find('.categories_item').length; i++) {
      emptyCells.push($('<div>', {
        class: 'categories_item categories_item_empty'
      }));
    }
    $(this).append(emptyCells);
  });

  // $('.categories_item').on('click', function(e) {
  //   if(!$(this).hasClass('disabled'))
  //   {
  //     $('.categories_item').not(this).removeClass('active');
  //     $(this).toggleClass('active');
  //     var top = $(this).position().top - $(window).scrollTop();
  //     var bottom = document.documentElement.clientHeight - (top + $(this).height());
  //     var left = $(this).position().left;
  //     var right = document.documentElement.clientWidth - (left + $(this).width());
  //     if(document.documentElement.clientHeight > document.documentElement.clientWidth)
  //     {
  //       if(top > bottom){
  //           $(this).find('.popover').addClass('inverse');
  //           $(this).find('.popover').removeClass('left');
  //           $(this).find('.popover').removeClass('right');
  //       }else{
  //           $(this).find('.popover').removeClass('inverse');
  //           $(this).find('.popover').removeClass('left');
  //           $(this).find('.popover').removeClass('right');
  //       }
  //       if(left > right){
  //           $(this).find('.popover').addClass('left');
  //           $(this).find('.popover').removeClass('right');
  //           $(this).find('.popover').removeClass('inverse');
  //       }else{
  //           $(this).find('.popover').addClass('right');
  //           $(this).find('.popover').removeClass('left');
  //           $(this).find('.popover').removeClass('inverse');
  //       }
  //     }else{
  //       if(left > right){
  //           $(this).find('.popover').addClass('left');
  //           $(this).find('.popover').removeClass('right');
  //           $(this).find('.popover').removeClass('inverse');
  //       }else{
  //           $(this).find('.popover').addClass('right');
  //           $(this).find('.popover').removeClass('left');
  //           $(this).find('.popover').removeClass('inverse');
  //       }
  //     }
  //   }
  // });

  $(document).on('click touchstart', function(event) {
    if (!$(event.target).closest('.categories_item').length) {
      $('.categories_item.active').removeClass('active');
    }
  });
  $( document ).resize(function() {
    if ($( document ).width() > 992) {
      $(".header_nav").css("display","flex");
    }else{
      $(".header_nav").css("display","none");
    }
  });
  $( ".hidden_back" ).click(function() {
    $(".hidden_back").fadeOut(300);
    $(".header_nav").fadeOut(300);
  });
  $( ".mob_nav_close" ).click(function() {
    $(".hidden_back").fadeOut(300);
    $(".header_nav").fadeOut(300);
  });
  $( ".mob_menu_button" ).click(function() {
    $(".hidden_back").fadeIn(300);
    $(".header_nav").fadeIn(300);
  });

  $(".input-group > input").on("focus",function(){
    $(this).parent().addClass("input-group-focus")
  }).blur(function(){
    $(this).parent().removeClass("input-group-focus")
  });
  $(".input-group > select").on("focus",function(){
    $(this).parent().addClass("input-group-focus")
  }).blur(function(){
    $(this).parent().removeClass("input-group-focus")
  });

  $(".category_second_level_info_btn").on("click", function(){
    if ($(this).parent().parent().parent().next().hasClass("categories_swipeable")) {
      $(this).text("Скрыть");
      $(this).parent().parent().parent().next().removeClass("categories_swipeable");
    }else{
      $(this).text("Все");
      $(this).parent().parent().parent().next().addClass("categories_swipeable");
    }
  });

  $(".mobile_main_links_inner_btn_contacts").on("click", function(){
    $("#contacts_popup").fadeIn(300);
    return false;
  });
  $("#contacts_popup").on("click", function(){
    $(this).fadeOut(300);
  });
  
//   $(".contacts_popup2").on("click", function(){
//     $('.form_popup').fadeOut(300);
//     $(".contacts_popup2").fadeOut(300);
//     return false;
//   });
  $(".contacts_popup_outer").on("click", function(){
    // console.log('clicked2');
  });

  $(document).mouseup(function (e) {
    if ($('.mobile_main_header_list').length) {
      var container = $(".mobile_main_header_list");
      if (container.has(e.target).length === 0){
          $(".mobile_main_header_list").removeClass("active");
      }
    }
  });

});