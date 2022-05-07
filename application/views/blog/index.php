<!DOCTYPE html>
<html lang="vi-VN">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Polar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- stylesheets -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://polar.gbjsolution.com/assets/css/bootstrap.min.css?v=4be9e56b95">
        <link rel="stylesheet" type="text/css" href="<?=CSS_URL?>blog.css?v=<?=date('Ymdhis')?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://polar.gbjsolution.com/assets/js/bootstrap.min.js?v=4be9e56b95"></script>
        <style id="gh-members-styles">
            .gh-post-upgrade-cta-content,
            .gh-post-upgrade-cta {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                text-align: center;
                width: 100%;
                color: #ffffff;
                font-size: 16px;
            }

            .gh-post-upgrade-cta-content {
                border-radius: 8px;
                padding: 40px 4vw;
            }

            .gh-post-upgrade-cta h2 {
                color: #ffffff;
                font-size: 28px;
                letter-spacing: -0.2px;
                margin: 0;
                padding: 0;
            }

            .gh-post-upgrade-cta p {
                margin: 20px 0 0;
                padding: 0;
            }

            .gh-post-upgrade-cta small {
                font-size: 16px;
                letter-spacing: -0.2px;
            }

            .gh-post-upgrade-cta a {
                color: #ffffff;
                cursor: pointer;
                font-weight: 500;
                box-shadow: none;
                text-decoration: underline;
            }

            .gh-post-upgrade-cta a:hover {
                color: #ffffff;
                opacity: 0.8;
                box-shadow: none;
                text-decoration: underline;
            }

            .gh-post-upgrade-cta a.gh-btn {
                display: block;
                background: #ffffff;
                text-decoration: none;
                margin: 28px 0 0;
                padding: 8px 18px;
                border-radius: 4px;
                font-size: 16px;
                font-weight: 600;
            }

            .gh-post-upgrade-cta a.gh-btn:hover {
                opacity: 0.92;
            }
        </style>
        <style type="text/css">
            nav .media {
                margin-top: 0;
            }
        </style>
        <style>:root {--ghost-accent-color: #ff6b6b;}</style>
        <style type="text/css">.medium-zoom-overlay{bottom:0;left:0;opacity:0;position:fixed;right:0;top:0;transition:opacity .3s;will-change:opacity}.medium-zoom--opened .medium-zoom-overlay{cursor:pointer;cursor:zoom-out;opacity:1}.medium-zoom-image{cursor:pointer;cursor:zoom-in;transition:transform .3s cubic-bezier(.2,0,.2,1)}.medium-zoom-image--hidden{visibility:hidden}.medium-zoom-image--opened{cursor:pointer;cursor:zoom-out;position:relative;will-change:transform}</style><style type="text/css"></style><style id="fit-vids-style">.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>
    </head>
	<body class="home-template has-fixed-navbar">					
        <header class="site-header fixed" id="main-navbar">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <!-- start logo -->
                        <a class="logo image-logo" href="<?=site_url('blog')?>"><img src="https://polar.gbjsolution.com/content/images/2017/05/polar-logo.png" alt="Polar"></a>
                        <!-- end logo -->
                    </div>
                    <nav class="main-menu hidden-sm hidden-xs" id="main-menu">
                        <ul>
                            <li class="home current-menu-item"><a href="<?=site_url('blog')?>">Home</a></li>
                            <li class="style-guide"><a href="#">Style Guide</a></li>
                            <li class="tag-archive"><a href="#">Tag Archive</a></li>
                            <li class="author-archive"><a href="#">Author Archive</a></li>
                            <li class="about"><a href="#">About</a></li>
                            <li class="contact"><a href="#">Contact</a></li>
                            <li class="error-page"><a href="#">Error Page</a></li>
                        </ul>
                    </nav>
                    <div class="nav-right pull-right align-right">
                        <ul class="members-menu hidden-sm hidden-xs" id="members-menu">
                            <li class="nav-item member-link">
                                <a class="btn btn-sm" href="#">Sign in</a>
                            </li>
                            <li class="nav-item member-link">
                                <a class="btn btn-sm btn-primary" href="#">Subscribe</a>
                            </li>
                        </ul>
                        <span class="search-toggle" id="search-button" data-toggle="modal" data-target="#searchmodal"><i class="fa fa-search align-center"></i></span>
                        <span class="mobile-menu-toggle hidden-md hidden-lg" id="nav-toggle-button"><i class="fa fa-bars align-center"></i></span>
                    </div>
                    <script>
                        $('#nav-toggle-button').click(function(){
                            $('body').addClass('mobile-menu-opened');
                        });
                        $(document).on('click','#backdrop', function(){
                            $('body').removeClass('mobile-menu-opened');
                        });
                    </script>
                    <nav class="mobile-menu visible-sm visible-xs" id="mobile-menu">
                        <ul>
                            <li class="home current-menu-item"><a href="<?=site_url('blog')?>">Home</a></li>
                            <li class="style-guide"><a href="#">Style Guide</a></li>
                            <li class="tag-archive"><a href="#">Tag Archive</a></li>
                            <li class="author-archive"><a href="#">Author Archive</a></li>
                            <li class="about"><a href="#">About</a></li>
                            <li class="contact"><a href="#">Contact</a></li>
                            <li class="error-page"><a href="#">Error Page</a></li>
                        </ul>
                        <ul class="members-menu" id="members-menu">
                            <li class="nav-item member-link">
                                <a class="btn btn-sm" href="#">Sign in</a>
                            </li>
                            <li class="nav-item member-link">
                                <a class="btn btn-sm btn-primary" href="#">Subscribe</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="backdrop hidden-md hidden-lg" id="backdrop">
                        <span class="menu-close align-center"><i class="fa fa-arrow-left"></i></span>
                    </div>
                </div>
            </div>
            <div class="modal" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title align-center" id="myModalLabel">Search</h4>
                    </div>
                    <div class="modal-body">
                        <form id="search-form">
                            <div class="input-group url-wrap">
                                
                                <input type="text" id="search-input" class="form-control" spellcheck="false" placeholder="Type to Search ...">
                                <!-- <span class="input-group-addon" id=""><i class="fa fa-search"></i></span> -->
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div id="search-counter" class="info align-center"></div>
                        <div id="search-results"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
        </header>
		<section class="cover cover-home has-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/cover-image.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="cover-content-wrap align-center">
                            <h1 class="intro-title">Thoughts, stories and ideas.</h1>
                            <p class="intro-description">
                                Minimal and modern theme for Ghost. Use it for personal blog or multi-author blog / magazine.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="main-content-area">
            <div class="container post-listing">
                <div class="row is-flex">
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/fishing-with-dog.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="/tag/lifestyle/">Lifestyle</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">I like fishing because it is always the great way of relaxing</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="/author/biswajit/" rel="author">
                                            <img class="avatar" src="//www.gravatar.com/avatar/021e64775176cc4c7018e5e867f17de2?s=250&amp;d=mm&amp;r=x" alt="avatar">
                                            <span class="name">Biswajit Saha</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 15:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/grand-canyon.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="#">Travel</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">My Memorable story of trip to grand canyon National Park</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="#" rel="author">
                                            <img class="avatar" src="https://polar.gbjsolution.com/content/images/2018/04/Surabhi-Gupta-1.jpg" alt="avatar">
                                            <span class="name">Surabhi Gupta</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 15:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/starry-night.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="#">Adventure</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">Camping in an abandoned house under the starry night at hill top</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="#" rel="author">
                                            <img class="avatar" src="//www.gravatar.com/avatar/021e64775176cc4c7018e5e867f17de2?s=250&amp;d=mm&amp;r=x" alt="avatar">
                                            <span class="name">Biswajit Saha</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 15:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/camp-fire.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="#">Lifestyle</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">Some amazing similarities between people around the world</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="#" rel="author">
                                            <img class="avatar" src="//www.gravatar.com/avatar/021e64775176cc4c7018e5e867f17de2?s=250&amp;d=mm&amp;r=x" alt="avatar">
                                            <span class="name">Biswajit Saha</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 15:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/hill-road.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="#">Travel</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">A perfect road map for travelling asian countries</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="#" rel="author">
                                            <img class="avatar" src="https://polar.gbjsolution.com/content/images/2018/04/Apurba-Talukdar.jpg" alt="avatar">
                                            <span class="name">Apurba Talukdar</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 06:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xs-12">
                        <article class="post post-card">
                            <a href="<?=site_url('blog/chi-tiet')?>" class="permalink">
                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/girl-listening.jpg)"></div>
                            </a>
                            <div class="content-wrap">
                                <div class="entry-header align-center">
                                    <span class="category"><a href="#">Music</a></span>
                                    <h2 class="title h4"><a href="<?=site_url('blog/chi-tiet')?>" rel="bookmark">Mind refreshing song by Rabindranath Tagore</a></h2>
                                </div>
                                <div class="entry-footer clearfix">
                                    <div class="author">
                                        <a href="#" rel="author">
                                            <img class="avatar" src="//www.gravatar.com/avatar/021e64775176cc4c7018e5e867f17de2?s=250&amp;d=mm&amp;r=x" alt="avatar">
                                            <span class="name">Biswajit Saha</span>
                                        </a>
                                    </div>
                                    <div class="published-date">
                                        <time class="time" datetime="2017-05-14 06:05:00">May 14, 2017</time>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <!-- start pagination -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagination-wrap align-center clearfix" role="navigation">
                            <span class="page-number">Page 1 of 2</span>
                            <a class="older-posts btn btn-default btn-sm" href="#"><span>Older  Articles</span> <i class="fa fa-long-arrow-right fa-fw"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end pagination -->	
            </div>
        </div>
		<footer class="site-footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- start recent post widget -->
                            <div class="widget">
                                <h4 class="widget-title h6">Recent Post</h4>
                                <div class="content recent-post">
                                    <div class="recent-single-post clearfix have-image">
                                        <a href="#">
                                                <div class="post-thumb pull-left" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/fishing-with-dog.jpg);"></div>
                                        </a>
                                        <div class="post-info">
                                            <h4 class="post-title"><a href="#">I like fishing because it is always the great way of relaxing</a></h4>
                                            <div class="date"><a href="#">May 14, 2017</a></div>
                                        </div>
                                    </div>
                                    <div class="recent-single-post clearfix have-image">
                                        <a href="#">
                                                <div class="post-thumb pull-left" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/grand-canyon.jpg);"></div>
                                        </a>
                                        <div class="post-info">
                                            <h4 class="post-title"><a href="#">My Memorable story of trip to grand canyon National Park</a></h4>
                                            <div class="date"><a href="#">May 14, 2017</a></div>
                                        </div>
                                    </div>
                                    <div class="recent-single-post clearfix have-image">
                                        <a href="#">
                                                <div class="post-thumb pull-left" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/starry-night.jpg);"></div>
                                        </a>
                                        <div class="post-info">
                                            <h4 class="post-title"><a href="#">Camping in an abandoned house under the starry night at hill top</a></h4>
                                            <div class="date"><a href="#">May 14, 2017</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end widget -->
                        </div>
                        <div class="col-sm-4">
                                                <!-- start tag widget -->
                            <div class="widget">
                                <h4 class="widget-title h6">Tag Cloud</h4>
                                <div class="content tagcloud">
                                    <a href="#">Adventure</a><a href="#">Getting Started</a><a href="/tag/lifestyle/">Lifestyle</a><a href="/tag/music/">Music</a><a href="/tag/nature/">Nature</a><a href="#">Travel</a><a href="/tag/video/">Video</a>
                                </div>
                            </div>
                            <!-- end tag widget -->                    <div class="widget">
                                <h4 class="widget-title h6">Subscribe to Polar</h4>
                                <div class="content tagcloud">
                                    <section class="gh-subscribe">
                                        <p>Get the latest posts delivered right to your inbox.</p>
                                        <form data-members-form="subscribe" class="sign-up-form">
                                            <div class="form-group">
                                                <input data-members-email="" type="email" class="form-control" name="email" placeholder="Enter your email..." required="" autocomplete="off">
                                                <button class="btn btn-primary" type="submit"><span>Subscribe</span></button>
                                            </div>
                                            <div class="error-box text-center">
                                                <div class="message-loading">
                                                        <span class="icon"></span>Please wait...
                                                    </div>
                                                <div class="message-success">
                                                    <span class="icon"></span><strong>Great!</strong> Check your inbox and click the link to complete sign in
                                                </div>
                                                <div class="message-error">
                                                    <span class="icon"></span><strong>Error!</strong> Please enter a valid email address!
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                                                <!-- start tag widget -->
                            <div class="widget">
                                <h4 class="widget-title h6">Text Widget</h4>
                                <div class="content about">
                                    <p>
                                        It's a suitable place for adding small info about your site. Here you can add any text or html like this <strong>Bold Text</strong> or anything else.
                                    </p>
                                    <p>
                                        All widgets in this footer are reorderable. An email subscription form widget is also available within the theme. Which you can use in place of this text widget.
                                    </p>
                                </div>
                            </div>
                            <!-- end tag widget -->                    <!-- start tag widget -->
                            <div class="widget">
                                <h4 class="widget-title h6">Navigation</h4>
                                <div class="content navigation-secondary">
                                    <nav>
                                        <a href="#">Style Guide</a>
                                        <a href="#">Tag Archive</a>
                                        <a href="#">Author Archive</a>
                                        <a href="#">About</a>
                                    </nav>
                                </div>
                            </div>
                            <!-- end tag widget -->                
                        </div>                  
                    </div>                 
                </div>                 
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-wrap clearfix">
                        <div class="social-links-wrap">
                            <ul class="social-links">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://polar.gbjsolution.com/rss/"><i class="fa fa-rss"></i></a></li>
                            </ul>                
                        </div>
                        <div class="copyright-info">
                            © 2021 <a href="#">Polar</a>. All right Reserved.
                            Powered by <a href="#">Ghost</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
	</body>
</html>
