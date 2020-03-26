/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Search
4. Init Menu
5. Init Isotope


******************************/

$(document).ready(function()
{
	"use strict";

	/*

	1. Vars and Inits

	*/


	var header = $('.header');
	var hambActive = false;
	var menuActive = false;

	setHeader();

	$(window).on('resize', function()
	{
		setHeader();
	});

	$(document).on('scroll', function()
	{
		setHeader();
	});

	initSearch();
	initMenu();
	initIsotope();


    showData()

    $('#search').keyup( function () {

        showData()

    })

    $("#sort").change(function () {

        showData()

    })

    console.log(window.location.href.split('category/')[1]);

	function showData(){

	    var sort    = $('#sort').val()
        var search  = $('#search').val()

        $.ajax({

            url: window.location,
            method: "post",
            dataType: "json",
            data:{
              sort:  sort,
              search: search,
              _token: $("input[name='_token']").val()
            },
            success: function(data){
                console.log(data)
                var count = 0;
                let html = ''
                for(let d of data[0][0]){
                    count++
                    html+=`<div class="product col-lg-3" >
                            <div class="product_image"><img src="/images/${d.image}" alt=""></div>`

                    if(d.actionId != 4){
                        html+= `<div class="product_extra ${d.class}"><a href="/product/${d.id}">${d.name}</a></div>`
                    }

                    html+=`<div class="product_content">
                                <div class="product_title"><a href="/product/${d.id}">${d.title}</a></div>
                                <div class="product_price">$${d.price}</div>
                            </div>
                        </div>`
                }

                $('#products').html(html)
                $('#count').html(count)
                showPagination(data[0][1].length)
            }
        })

    }

    function showPagination(number){
        var i;
        var counter = 1
        var html = ''
        for(i = 0; i <= number; i+=8){
            html +=`<li><a href='#' class='offset' data-id="${i}">${counter++}</a></li>`
        }

        $('#pag').html(html)

    }

    $(document).on('click', '.offset', function(e){

        e.preventDefault()
        var sort    = $('#sort').val()
        var search  = $('#search').val()
        var offset    = $(this).data('id')

        $.ajax({

            url: window.location,
            method: "post",
            dataType: "json",
            data:{
                sort:  sort,
                search: search,
                offset: offset,
                _token: $("input[name='_token']").val()
            },
            success: function(data){
                console.log(data)
                var count = 0;
                let html = ''
                for(let d of data[0][0]){
                    count++
                    html+=`<div class="product col-lg-3" >
                            <div class="product_image"><img src="/images/${d.image}" alt=""></div>`

                    if(d.actionId != 4){
                        html+= `<div class="product_extra ${d.class}"><a href="/product/${d.id}">${d.name}</a></div>`
                    }

                    html+=`<div class="product_content">
                                <div class="product_title"><a href="/product/${d.id}">${d.title}</a></div>
                                <div class="product_price">$${d.price}</div>
                            </div>
                        </div>`
                }

                $('#products').html(html)
                $('#count').html(count)
                showPagination(data[0][1].length)
            }
        })
    })




	/*

	2. Set Header

	*/

	function setHeader()
	{
		if($(window).scrollTop() > 100)
		{
			header.addClass('scrolled');
		}
		else
		{
			header.removeClass('scrolled');
		}
	}

	/*

	3. Init Search

	*/

	function initSearch()
	{
		if($('.search').length && $('.search_panel').length)
		{
			var search = $('.search');
			var panel = $('.search_panel');

			search.on('click', function()
			{
				panel.toggleClass('active');
			});
		}
	}

	/*

	4. Init Menu

	*/

	function initMenu()
	{
		if($('.hamburger').length)
		{
			var hamb = $('.hamburger');

			hamb.on('click', function(event)
			{
				event.stopPropagation();

				if(!menuActive)
				{
					openMenu();

					$(document).one('click', function cls(e)
					{
						if($(e.target).hasClass('menu_mm'))
						{
							$(document).one('click', cls);
						}
						else
						{
							closeMenu();
						}
					});
				}
				else
				{
					$('.menu').removeClass('active');
					menuActive = false;
				}
			});

			//Handle page menu
			if($('.page_menu_item').length)
			{
				var items = $('.page_menu_item');
				items.each(function()
				{
					var item = $(this);

					item.on('click', function(evt)
					{
						if(item.hasClass('has-children'))
						{
							evt.preventDefault();
							evt.stopPropagation();
							var subItem = item.find('> ul');
						    if(subItem.hasClass('active'))
						    {
						    	subItem.toggleClass('active');
								TweenMax.to(subItem, 0.3, {height:0});
						    }
						    else
						    {
						    	subItem.toggleClass('active');
						    	TweenMax.set(subItem, {height:"auto"});
								TweenMax.from(subItem, 0.3, {height:0});
						    }
						}
						else
						{
							evt.stopPropagation();
						}
					});
				});
			}
		}
	}

	function openMenu()
	{
		var fs = $('.menu');
		fs.addClass('active');
		hambActive = true;
		menuActive = true;
	}

	function closeMenu()
	{
		var fs = $('.menu');
		fs.removeClass('active');
		hambActive = false;
		menuActive = false;
	}

	/*

	5. Init Isotope

	*/

	function initIsotope()
	{
		var sortingButtons = $('.product_sorting_btn');
		var sortNums = $('.num_sorting_btn');

		if($('.product_grid').length)
		{
			var grid = $('.product_grid').isotope({
				itemSelector: '.product',
				layoutMode: 'fitRows',
				fitRows:
				{
					gutter: 30
				},
	            getSortData:
	            {
	            	price: function(itemElement)
	            	{
	            		var priceEle = $(itemElement).find('.product_price').text().replace( '$', '' );
	            		return parseFloat(priceEle);
	            	},
	            	name: '.product_name',
	            	stars: function(itemElement)
	            	{
	            		var starsEle = $(itemElement).find('.rating');
	            		var stars = starsEle.attr("data-rating");
	            		return stars;
	            	}
	            },
	            animationOptions:
	            {
	                duration: 750,
	                easing: 'linear',
	                queue: false
	            }
	        });

	        // Sort based on the value from the sorting_type dropdown
	        sortingButtons.each(function()
	        {
	        	$(this).on('click', function()
	        	{
	        		var parent = $(this).parent().parent().find('.sorting_text');
		        		parent.text($(this).text());
		        		var option = $(this).attr('data-isotope-option');
		        		option = JSON.parse( option );
	    				grid.isotope( option );
	        	});
	        });
		}
	}

});
