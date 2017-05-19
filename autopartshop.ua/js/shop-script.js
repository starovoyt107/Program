// Функция прокрутки новостей сайта с использоанием плагина jCarouselLite
$(function() {
    $("#newsticker").jCarouselLite({
        vertical: true,
        hoverPause:true,
        btnPrev: "#news-prev",
  		btnNext: "#news-next",
        visible: 3,
        auto:2000,
        speed:800
    });

$("#style-grid").click(function(){
		$("#block-product-grid").show();
		$("#block-product-list").hide();
		$("#style-grid").attr("src","/images/icon-grid-active.png");
		$("#style-list").attr("src","/images/icon-list.png");
		$.cookie('select_style', 'grid');
});

$("#style-list").click(function(){
		$("#block-product-grid").hide();
		$("#block-product-list").show();
		$("#style-list").attr("src","/images/icon-list-active.png");
		$("#style-grid").attr("src","/images/icon-grid.png");
		$.cookie('select_style', 'list');
});

if($.cookie('select_style') == 'grid'){
	$("#block-product-grid").show();
	$("#block-product-list").hide();	
	$("#style-grid").attr("src","/images/icon-grid-active.png");
	$("#style-list").attr("src","/images/icon-list.png");
} else {
	$("#block-product-grid").hide();
	$("#block-product-list").show();
	$("#style-list").attr("src","/images/icon-list-active.png");
	$("#style-grid").attr("src","/images/icon-grid.png");
}

$("#select-sort").click(function(){
		$("#sorting-list").slideToggle(200);
});

$("#block-category > ul > li > a").click(function(){
               	        
            if ($(this).attr("class") != "active"){
			$("#block-category > ul > li > ul").slideUp(400);
            $(this).next().slideToggle(400);
            $("#block-category > ul > li > a").removeClass("active");
            $(this).addClass("active");
			$.cookie("select_cat", $(this).attr("id"));
			} else
	                {
	                    $("#block-category > ul > li > a").removeClass("active");
	                    $("#block-category > ul > li > ul").slideUp(400);
	                    $.cookie("select_cat", "");   
	                }                                  
});

if ($.cookie("select_cat") != "")
{
$("#block-category > ul > li > #"+$.cookie("select_cat")).addClass("active").next().show();
} 

});﻿