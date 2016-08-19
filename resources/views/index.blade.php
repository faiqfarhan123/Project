<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	
	<link rel="shortcut icon" type="image/png" href="HOME_DESIGN/favicon.ico" />
    <title>Ticket Manager</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="HOME_DESIGN/css/bootstrap.min.css" type="text/css">
    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="HOME_DESIGN/css/animate.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="HOME_DESIGN/css/creative.css" type="text/css">
	
	
	
	 <!-- google font links start -->
	  
	  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat+Alternates:400,700' rel='stylesheet' type='text/css'>
	<!-- google font end -->
	
	
	
	
	<!-- carousel -->
	
	<link rel="stylesheet" href="carousel/tinycarousel.css" type="text/css" media="screen"/>

	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <!-- <script src="carousel/jquery.tinycarousel.js"></script> -->
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#slider1').tinycarousel();
		});
	</script>
	
	<!-- footer -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
	
</head>


<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="Drawing.png" alt="">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right" style = "margin-left: 50px; margin-right: 20px; color: black;" >
                    <!-- <li>
                        <a class="page-scroll" href="#about">How it Works</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Pricing</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#portfolio">Events</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact Us</a>
                    </li>
					<li>
						<div class="vertical-line" style="height: 50px;" />
					</li> -->
					
					
						 <a class = "btn btn-link" style = "color: #f05f40; font-family: Raleway; font-size:17px; padding-top: 13px;"  href = "/signin"> Sign In </a>
						 <a class ="btn btn-default" style = "border-radius: 0; border: 1px; padding: 15px 15px 15px 15px; background-color: #f05f40; font-family: Raleway; color:white; " href = "/signin"> 
						 Create an Event 
						 </a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Book your Events here</h1>
                <hr>
               
                <a href="#portfolio" class="btn btn-primary btn-xl page-scroll">Browse Events</a>
            </div>
        </div>
    </header>

        <!-- <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">We've got what you need!</h2>
                    <hr class="light">
                    <p class="text-faded">Here you can get every event detail from around the world.</p>
                    <a href="#" class="btn btn-default btn-xl">Get Started!</a>
                </div>
            </div>
        </div> -->
		
    
    <?php
			$allEvents = DB::select('SELECT * FROM events ORDER BY created_at DESC LIMIT 9');
    ?>

    <section class="no-padding" id="portfolio">
		<div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    </br><h2 class="section-heading">Upcoming Events</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
		
		
        <div class="container-fluid">
            <div class="row no-gutter">
				
				
						@foreach($allEvents as $event)
<?php

$imageEncode = base64_encode($event->flyer);
$eventCategory = \App\EventCategory::find($event->event_category_id)->name;
$eventID = $event->id;
$eventHashTag = $event->hashtag;

echo <<<EOT

				<div class="col-lg-4 col-sm-6">
                    <a href="/showEvent/$eventID" class="portfolio-box">
                        <img src="data:image/jpeg;base64,$imageEncode" class="img-responsive" alt="" style= "width:100%; display: inline-block;">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
									$eventCategory
                                </div>
                                <div class="project-name">
                                    $eventHashTag
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
EOT;

?>

		@endforeach
	
            </div>
        </div>
        
        <?php
		
		if ($allEvents == null) {
			echo '<center><h3>EVENTS ARE COMING SOON!</h3></center><br />';
		}
		?>
		
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>Buy tickets and enjoy!</h2>
				
				<!-- link to all event page -->
                <a href="/search_event" class="btn btn-default btn-xl wow tada">Show more events!</a> 
            </div>
        </div>
    </aside>

    <!-- Footer -->
        <footer class="footer-distributed">

			<div class="footer-left">

				<h3>Ticket<span>Manager</span></h3>

				<p class="footer-links">
					<a href="#">Home</a>
				
					<a href="#">How it Works</a>
					
					<a href="#">Events</a>
					
					<a href="#">Pricing</a>
					
					<a href="#">About</a>
					
				</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"></i>
				<p><span>Timesquare</span> NY</p>
				</div>

				<div>
					<i class="fa fa-phone"></i>
					<p>+00 00 00 00</p>
				</div>

				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:support@company.com">support@company.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					We are web developers, email us for any queries.
				</p>

				<div class="footer-icons">

					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>

				</div>

			</div>

		</footer>
	
    <!-- jQuery -->
    <script src="HOME_DESIGN/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="HOME_DESIGN/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="HOME_DESIGN/js/jquery.easing.min.js"></script>
    <script src="HOME_DESIGN/js/jquery.fittext.js"></script>
    <script src="HOME_DESIGN/js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="HOME_DESIGN/js/creative.js"></script>



</body>

<script>
;(function(factory) {
    if(typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    }
    else if(typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    }
    else {
        factory(jQuery);
    }
}
(function($) {
    var pluginName = "tinycarousel"
    ,   defaults   =
        {
            start: 0
        ,   axis: "x"
		,	visibleItems : 4
		,	itemWidth: 210
        ,   buttons: true
        ,   bullets: false
        ,   interval: true
        ,   intervalTime: 3000
        ,   animation: true
        ,   animationTime: 1000
        ,   infinite: true
        }
    ;

    function Plugin($container, options) {
        /**
         * The options of the carousel extend with the defaults.
         *
         * @property options
         * @type Object
         * @default defaults
         */
        this.options = $.extend({}, defaults, options);

        /**
         * @property _defaults
         * @type Object
         * @private
         * @default defaults
         */
        this._defaults = defaults;

        /**
         * @property _name
         * @type String
         * @private
         * @final
         * @default 'tinycarousel'
         */
        this._name = pluginName;

        var self = this
        ,   $viewport = $container.find(".viewport:first")
        ,   $overview = $container.find(".overview:first")
        ,   $slides = null
        ,   $next = $container.find(".next:first")
        ,   $prev = $container.find(".prev:first")
        ,   $bullets = $container.find(".bullet")

        ,   viewportSize = 0
        ,   contentStyle = {}
        ,   slidesVisible = 0
        ,   slideSize = 0
        ,   slideIndex = 0

        ,   isHorizontal = this.options.axis === 'x'
        ,   sizeLabel = isHorizontal ? "Width" : "Height"
        ,   posiLabel = isHorizontal ? "left" : "top"
        ,   intervalTimer = null
        ;

        /**
         * The index of the current slide.
         *
         * @property slideCurrent
         * @type Number
         * @default 0
         */
        this.slideCurrent = 0;

        /**
         * The number of slides the carousel is currently aware of.
         *
         * @property slidesTotal
         * @type Number
         * @default 0
         */
        this.slidesTotal = 0;

        /**
         * If the interval is running the value will be true.
         *
         * @property intervalActive
         * @type Boolean
         * @default false
         */
        this.intervalActive = false;

        /**
         * @method _initialize
         * @private
         */
        function _initialize() {
            self.update();
            self.move(self.slideCurrent);

            _setEvents();

            return self;
        }

        /**
         * You can use this method to add new slides on the fly. Or to let the carousel recalculate itself.
         *
         * @method update
         * @chainable
         */
        this.update = function() {
            $overview.find(".mirrored").remove();

            $slides = $overview.children();
            viewportSize = $viewport[0]["offset" + sizeLabel];
            slideSize = $slides.first()["outer" + sizeLabel](true);
            self.slidesTotal = $slides.length;
            self.slideCurrent = self.options.start || 0;
            slidesVisible = Math.ceil(viewportSize / slideSize);

            $overview.append($slides.slice(0, slidesVisible).clone().addClass("mirrored"));
            $overview.css(sizeLabel.toLowerCase(), slideSize * (self.slidesTotal + slidesVisible));

            _setButtons();

            return self;
        };

        /**
         * @method _setEvents
         * @private
         */
        function _setEvents() {
            if(self.options.buttons) {
                $prev.click(function() {
                    self.move(--slideIndex);

                    return false;
                });

                $next.click(function() {
                    self.move(++slideIndex);

                    return false;
                });
            }

            $(window).resize(self.update);

            if(self.options.bullets) {
                $container.on("click", ".bullet", function() {
                    self.move(slideIndex = +$(this).attr("data-slide"));

                    return false;
                });
            }
        }


        /**
         * If the interval is stoped start it.
         *
         * @method start
         * @chainable
         */
        this.start = function() {
            if(self.options.interval) {
                clearTimeout(intervalTimer);

                self.intervalActive = true;

                intervalTimer = setTimeout(function() {
                    self.move(++slideIndex);

                }, self.options.intervalTime);
            }

            return self;
        };

        /**
         * If the interval is running stop it.
         *
         * @method start
         * @chainable
         */
        this.stop = function() {
            clearTimeout(intervalTimer);

            self.intervalActive = false;

            return self;
        };

        /**
         * Move to a specific slide.
         *
         * @method move
         * @chainable
         * @param {Number}  [index] The slide to move to.
         */
        this.move = function(index) {
            slideIndex = isNaN(index) ? self.slideCurrent : index;
            self.slideCurrent = slideIndex % self.slidesTotal;

            if(slideIndex < 0) {
                self.slideCurrent = slideIndex = self.slidesTotal - 1;
                $overview.css(posiLabel, -(self.slidesTotal) * slideSize);
            }

            if(slideIndex > self.slidesTotal) {
                self.slideCurrent = slideIndex = 1;
                $overview.css(posiLabel, 0);
            }
            contentStyle[posiLabel] = -slideIndex * slideSize;

            $overview.animate(
                contentStyle
            ,   {
                    queue : false
                ,   duration : self.options.animation ? self.options.animationTime : 0
                ,   always : function() {
                       /**
                        * The move event will trigger when the carousel slides to a new slide.
                        *
                        * @event move
                        */
                        $container.trigger("move", [$slides[self.slideCurrent], self.slideCurrent]);
                    }
                });

            _setButtons();
            self.start();

            return self;
        };

        /**
         * @method _setButtons
         * @private
         */
        function _setButtons() {
            if(self.options.buttons && !self.options.infinite) {
                $prev.toggleClass("disable", self.slideCurrent <= 0);
                $next.toggleClass("disable", self.slideCurrent >= self.slidesTotal - slidesVisible);
            }

            if(self.options.bullets) {
                $bullets.removeClass("active");
                $($bullets[self.slideCurrent]).addClass("active");
            }
        }

        return _initialize();
    }

    /**
    * @class tinycarousel
    * @constructor
    * @param {Object} options
        @param {Number}  [options.start=0] The slide to start with.
        @param {String}  [options.axis=x] Vertical or horizontal scroller? ( x || y ).
        @param {Boolean} [options.buttons=true] Show previous and next navigation buttons.
        @param {Boolean} [options.bullets=false] Is there a page number navigation present?
        @param {Boolean} [options.interval=false] Move to another block on intervals.
        @param {Number}  [options.intervalTime=3000] Interval time in milliseconds.
        @param {Boolean} [options.animate=true] False is instant, true is animate.
        @param {Number}  [options.animationTime=1000] How fast must the animation move in ms?
        @param {Boolean} [options.infinite=true] Infinite carousel.
    */
    $.fn[pluginName] = function(options) {
        return this.each(function() {
            if(!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin($(this), options));
            }
        });
    };
}));

</script>





<style>
body{
font-family: Raleway;
}

h1,h2,h3,h4{
font-family: Montserrat;
}
	
	</style>





</html>
