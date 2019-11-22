/*
 * poposliders - v1.0.0 - 2015-06-10
 * http://po-po.github.io/
 *
 * Copyright (c) 2015 popo;
 * Licensed under the MIT license
 */
(function($) {
    $.fn.poposlides = function(options) {

        var settings = $.extend({
            auto:true,             
            nav:true,              
            playspeed:3500,         
            fadespeed:0,         
            loop:true,             
            pagination:true,       
			pagecenter:true,       
            prev:".prev",          
            next:".next"           
            }, options);

        return this.each(function() {

            var $this = $(this),
                slide = $this.children(),
                index = 0;
                len = slide.length-1,
                slideWidth = $this.width(),
                prev = settings.prev,
                next = settings.next;

            
			if(!navigator.userAgent.match(/mobile/i)){
				slide.fadeOut(settings.fadespeed).css({
					"z-index":"0"
				});
				slide.eq(index).fadeIn(settings.fadespeed).css({
					"z-index":"9"
				});
			}else{
				slide.css({
					"opacity":"0",
					"z-index":"0"
				});
				slide.eq(index).css({
					"opacity":"1",
					"z-index":"9"
				});
			};
            

            slideFadeIn = function(){
				if(!navigator.userAgent.match(/mobile/i)){
					slide.fadeOut(settings.fadespeed).css({
						"z-index":"0"
					});
					slide.eq(index).fadeIn(settings.fadespeed).css({
						"z-index":"9"
					});
				}else{
					slide.css({
						"opacity":"0",
						"z-index":"0",
						"-webkit-transition": settings.fadespeed/1000+"s"
					});
					slide.eq(index).css({
						"opacity":"1",
						"z-index":"9",
						"-webkit-transition": settings.fadespeed/1000+"s"
					});
				};
            };

            
            slideAdd = function() {
            	if(settings.loop){
					index == len?index=0:index++;
				}else{
					index == len?index=len:index++;
				};
        		slideFadeIn();
            };

            
            slideMinus = function() {
            	if(settings.loop){
					index == 0?index=len:index--;
				}else{
					index == 0?index=0:index--;
				};
        		slideFadeIn();
            };

            
            pagnation = function(){
            	var $paginationBox = $("<ul class='pagination'></ul>");
            	var paginationStr ="";
				for(var i=1;i<=len+1;i++){
					paginationStr +="<li><a href='javascript:void(0)'>"+ i +"</a>";
				}
				$paginationBox.append(paginationStr);
				$this.after($paginationBox);

				$(".pagination li a").eq(index).addClass("active");

            };

           
            pageActive = function(){
				$(".pagination li a").removeAttr("class")
            	$(".pagination li a").eq(index).addClass("active");
			}

			
            if(settings.nav) {
				var navStr = "<a href='javascript:void(0)' class="+ prev.substring(1) +"></a>" +
							 "<a href='javascript:void(0)' class="+ next.substring(1) +"></a>";
				$this.after(navStr);

                $(next).click(function(){
                	slideAdd();
                });

                $(prev).click(function(){
                	slideMinus();
                })
			};

		
			if(settings.pagination) {
				pagnation();
				$(prev).click(function(){ pageActive();});
				$(next).click(function(){ pageActive();});

                $(".pagination li").click(function(){
                	var idx = $(this).index()-1;
                	index = idx;
                	slideAdd();
                	pageActive();
                });
			};

		
			if(settings.pagecenter){
				var pw = $(".pagination").width();
				$(".pagination").css({
					"position":"absolute",
					"left":"50%",
					"bottom":"5px",
					"margin-left":-pw/2,
					"z-index": "99"
				})
			};

		
			if(settings.auto){
		        var play = setInterval(function(){
		        	slideAdd();
		        	pageActive();
		        },settings.playspeed);
		        $this.nextAll().hover(function () {
		            clearInterval(play);
		        },
		        function(){
		        	play = setInterval(function(){
		        		slideAdd();
		        		pageActive();
		        	},settings.playspeed);
		        });
            };

        });
    };

})(jQuery);