








const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')

// function toggleSidebar(){
//   sidebar.classList.toggle('close')
//   toggleButton.classList.toggle('rotate')

//   closeAllSubMenus()
// }

function toggleSubMenu(button){

  if(!button.nextElementSibling.classList.contains('show')){
    closeAllSubMenus()
  }

  button.nextElementSibling.classList.toggle('show')
  button.classList.toggle('rotate')

  if(sidebar.classList.contains('close')){
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')
  }
}

function closeAllSubMenus(){
  Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
    ul.classList.remove('show')
    ul.previousElementSibling.classList.remove('rotate')
  })
}















$(document).ready(function(){
var button_clicked = 0;
var scrolled_down = 0;
	

var limit = 15;
var start = 0;
var filter_on;

filter_on = $("#filter_on").attr("filter_on");


var action = "inactive";
var key = $("#key_id").attr("key");
var key_source = $("#key_id").attr("key_source");
// alert(key);
// alert(key_source);




  function load_data(limit, start, key, key_source, filter_on){

    $.ajax({
        url: "/include/fetch_shop_items.php",
        method:"POST",
        data:{"limit":limit,"start":start,"key":key,"key_source":key_source, "filter_on":filter_on},
        cache:false,
        dataType:"html",
        success:function(data){
         
            $('.container').append(data);
            if(data == ""){
               $("#load_data_message").html("<p>-- The End --</p><p><a style='color:blue;text-decoration:none;' href='/dating.php'>Try another criteria</a></p>");
              action = "active";
            }else{
              $("#load_data_message").html("<p style='font-weight:bold'>Scroll Up To Load More ....</p>");
              action = "inactive";
            }
        }
    })

  }

  load_data(limit, start,key, key_source, filter_on);

  if(action == "inactive" && button_clicked == 1 && scrolled_down == 1){
    action = "active";
    load_data(limit, start,key, key_source, filter_on);
  }



  $(window).scroll(function(){
    
    if($(window).scrollTop() + $(window).height() > $(".container").height() && action == "inactive"){
        
      action = "active";
      start = start + limit;
      setTimeout(function(){
        load_data(limit, start, key, key_source, filter_on);
      },1000);
    }

  });



//   $(window).on('scroll', function () {
//         if ($(window).scrollTop() >= $('.container').offset().top + $('.container').outerHeight() - window.innerHeight && action == "inactive" && button_clicked == 1) {
// 			scrolled_down = 1;
            
// 			action = "active";
// 			start = start + limit;
// 			setTimeout(function(){
// 				load_data(limit, start, key, key_source, filter_on);
// 			},1000);
//         }
//     }); 








// $(".list_item").click(function(){
//     start = 0;
//     $('.container').html("");
//     key = $(this).attr("key");
//     key_source = $(this).attr("key_source");
//     $(".list_item").removeClass("selected_cat2");
//     $(".list_item_check").removeClass("selected_check");

//     $(this).append("<svg class='list_item_check selected_check' xmlns='http://www.w3.org/2000/svg' height='34px' viewBox='0 -960 960 960' width='34px' fill='#75FB4C'><path d='M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z'/></svg>");


//     $(this).addClass("selected_cat2");
//     load_data(limit, start,key,key_source, filter_on);

// });

var previousScroll = 0;
$(window).scroll(function(event){
   var scroll = $(this).scrollTop();
   if (scroll > previousScroll){
       // downscroll code
       $("#sidebar").addClass("hideSidebar");
   } else {
      // upscroll code
      $("#sidebar").removeClass("hideSidebar");
   }
   previousScroll = scroll;
});



	//sending form data
// 	$('#filter_item').on('submit',function(event){
//         event.preventDefault();
//         var form_data = $(this).serialize();
//         $.ajax({
//            url:"/include/fetch_shop_items.php",
//            method:"POST",
//            data:form_data,
//            dataType:"html",
//            success:function(data){
//                 $(window).scrollTop(0);
//                 start = 0;
//                 $('.container').html("");
//                 $('.container').html(data);
//                 // alert(data);
//                 //load_data(limit, start,key,key_source, filter_on);
//            }
//         })
//    });

$("#filter_item").submit(function(e) {
    e.preventDefault();
    start = 0;
    filter_on  = 1;
    $("#filter_set").css("display","block");

    $(".slides_container").css("display","none");
    $(".similar_items").css("display","none");
    $(".subcategory_2").css("display","flex");
    $(".breadcrumb_links").css("display","none");
    $(".header_item").css("display","none");
    var formData = new FormData(this); // Get form data
    var jsonData = {
      start: start,
      limit: limit,
      filter_on: filter_on,
      key: key,
      key_source: key_source
    }; // Define JSON data
  
    formData.append("json_data", JSON.stringify(jsonData)); // Append JSON to form data
    
    $.ajax({
      type: "POST",
      url: "/include/fetch_shop_items.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
                $(window).scrollTop(0);
                start = 0;
                $('.container').html("");
                $('.container').html(data);
               
                // load_data(limit, start,key,key_source, filter_on);


      },
      error: function(error) {
        console.error("Error:", error);
      }
    });
  });













  $(".search-form").submit(function(e) {
    $("#filter_set").css("display","block");
    $(".slides_container").css("display","none");
    $(".similar_items").css("display","none");
    $(".subcategory_2").css("display","flex");
    $(".breadcrumb_links").css("display","none");
    $(".header_item").css("display","none");
    
    e.preventDefault();
    start = 0;
    filter_on  = 2;
   
    var formData = new FormData(this); // Get form data
    var jsonData = {
      start: start,
      limit: limit,
      filter_on: filter_on,
      key: key,
      key_source: key_source
    }; // Define JSON data
  
    formData.append("json_data_search", JSON.stringify(jsonData)); // Append JSON to form data
    
    $.ajax({
      type: "POST",
      url: "/include/fetch_shop_items.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function(data) {
       
                
                start = 0;
                $('.container').html("");

                $('.container').html(data);
                

                // load_data(limit, start,key,key_source, filter_on);


      },
      error: function(error) {
        console.error("Error:", error);
      }
    });
  });














    
    const close_filter = document.querySelector(".close_filter");
    const background_cover = document.querySelector(".background_cover");
    const filter_item = document.querySelector(".filter_item");
    const filter_icon = document.querySelector(".filter_icon");
    const btnApply = document.querySelector(".btnApply");
    
    close_filter.addEventListener("click", () => {
        background_cover.classList.add("close_filter_dialog");
        filter_item.classList.add("close_filter_dialog");
        $('.background_cover').fadeOut('slow');
        $('.filter_item').fadeOut('slow');
      });

      btnApply.addEventListener("click", () => {
        // background_cover.classList.add("close_filter_dialog");
        // filter_item.classList.add("close_filter_dialog");
        $('.background_cover').addClass('close_filter_dialog');
        $('.filter_item').addClass('close_filter_dialog');
      });



      filter_icon.addEventListener("click", () => {
       
        $('.background_cover').css('display','block');
        $('.filter_item').css('display','block');

        $('.background_cover').removeClass('close_filter_dialog');
        $('.filter_item').removeClass('close_filter_dialog');
      });






   
      
});




window.onscroll = function() { toggleScrollButton(); };

function toggleScrollButton() {
  const btn = document.getElementById("scrollTopBtn");
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    btn.style.display = "block";
  } else {
    btn.style.display = "none";
  }
}

function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' });
}