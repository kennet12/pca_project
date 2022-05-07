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
		<div class="main-content-area single-post">
            <article>
                <div class="post-head" style="background-image:url(https://polar.gbjsolution.com/content/images/2017/05/grand-canyon.jpg);">
                    <div class="container align-center">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <span class="category">
                                    <a href="/tag/travel/">Travel</a>
                                </span>
                                <h1 class="title">My Memorable story of trip to grand canyon National Park</h1>
                                
                                <div class="post-meta">
                                    <a class="author" href="/author/surabhi/" rel="author">
                                        <span class="name">Surabhi Gupta</span>
                                    </a>
                                    <time class="time" datetime="2017-05-14 15:05:00" itemprop="datePublished">May 14, 2017</time>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-offset-1 col-md-10">
                            <div class="post-content">
                                <p>Cras in lectus laoreet, dignissim sapien sed, placerat nibh. Suspendisse mauris mi, vehicula eu dui non, consequat porttitor tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam lacus augue, volutpat ac velit posuere, bibendum ultrices mauris. Aliquam facilisis nisl ac euismod egestas.</p><h3 id="vestibulum-at-pretium-augue">Vestibulum at pretium augue</h3><ul><li>Donec varius volutpat aliquam. Proin maximus nulla vitae risus convallis venenatis.</li><li>Nam quis nibh ut erat posuere fringilla eu id nisl. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li></ul><p>Praesent viverra varius nisi euismod aliquam. Etiam interdum rhoncus quam, eget auctor sem maximus a. Praesent rhoncus pulvinar tincidunt. Vestibulum eu velit eget turpis tincidunt pharetra non quis nulla.</p>
                                <div class="post-upgrade-cta-box text-center">
                                    <h2 class=" cta-title">This post is for subscribers only</h2>
                                    <a class="btn btn-primary" href="https://polar.gbjsolution.com/signup/">Subscribe now</a>
                                    <p class="sign-in-cta"><small>Already have an account? <a href="https://polar.gbjsolution.com/signin/">Sign in</a></small></p>
                                </div>
                            </div>
                            <div class="share-wrap clearfix align-center">
                                <div class="share-text h5">Share this article</div>
                                <ul class="share-links">
                                    <!-- facebook -->
                                    <li>
                                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://polar.gbjsolution.com/my-memorable-story-of-trip-to-grand-canyon-national-park/" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" title="Share on Facebook"><i class="fab fa-facebook-f"></i>Facebook</a>
                                    </li>
                                    <!-- twitter -->
                                    <li>
                                        <a class="twitter" href="https://twitter.com/share?text=My%20Memorable%20story%20of%20trip%20to%20grand%20canyon%20National%20Park&amp;url=https://polar.gbjsolution.com/my-memorable-story-of-trip-to-grand-canyon-national-park/" onclick="window.open(this.href, 'twitter-share', 'width=580,height=296');return false;" title="Share on Twitter"><i class="fab fa-twitter"></i>Twitter</a>
                                    </li>
                                    <!-- linkedin -->
                                    <li>
                                        <a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://polar.gbjsolution.com/my-memorable-story-of-trip-to-grand-canyon-national-park/&amp;title=My%20Memorable%20story%20of%20trip%20to%20grand%20canyon%20National%20Park" onclick="window.open(this.href, 'linkedin-share', 'width=580,height=296');return false;" title="Share on Linkedin"><i class="fab fa-linkedin"></i>Linkedin</a>
                                    </li>
                                    <!-- pinterest -->
                                    <li>
                                        <a class="pinterest" href="http://pinterest.com/pin/create/button/?url=https://polar.gbjsolution.com/my-memorable-story-of-trip-to-grand-canyon-national-park/&amp;description=My%20Memorable%20story%20of%20trip%20to%20grand%20canyon%20National%20Park" onclick="window.open(this.href, 'linkedin-share', 'width=580,height=296');return false;" title="Share on Pinterest"><i class="fab fa-pinterest"></i>Pinterest</a>
                                    </li>
                                </ul>
                            </div>						
                            <div class="about-author-wrap">
                                <!-- start about the author -->
                                <div class="about-author clearfix">
                                    <a href="/author/surabhi/" title="Surabhi Gupta"><img src="https://polar.gbjsolution.com/content/images/2018/04/Surabhi-Gupta-1.jpg" alt="Author image" class="avatar pull-left"></a>
                                    <div class="details">
                                        <h4 class="author h4">About <a href="/author/surabhi/">Surabhi Gupta</a></h4>
                                        <div class="bio">
                                            Developer at GBJ solution. I love to travel, make new friends. I prefer tea over coffee.
                                        </div>
                                        <ul class="meta-info">
                                            <li><a href="https://twitter.com/gbjsolution" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="https://www.facebook.com/gbjsolution" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="website"><a href="http://gbjsolution.com" target="_blank"><i class="far fa-globe"></i></a></li>
                                            <li class="location"><i class="far fa-map-marker"></i>India</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- end about the author -->						
                            </div>
                            <div class="subscribe-box-wrap">
                                <div class="subscribe">
                                    <h3 class="subscribe-title align-center">Subscribe to Polar</h3>
                                    <p class="align-center">Get the latest posts delivered right to your inbox.</p>
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
                                    <div class="subscribe-rss align-center">or subscribe via <a href="https://polar.gbjsolution.com/rss/">RSS FEED</a></div>
                                </div>
                            </div>
                            <div class="prev-next-wrap has-next has-prev">
                                <div class="row is-flex">
                                    <div class="col-sm-6 col-xs-12">
                                        <article class="post post-card">
                                            <div class="prev-next-link align-center">
                                                <a class="" href="https://polar.gbjsolution.com/camping-in-an-abandoned-house-under-the-starry-night-at-hill-top/">Previous Post</a>
                                            </div>
                                            <a href="https://polar.gbjsolution.com/camping-in-an-abandoned-house-under-the-starry-night-at-hill-top/" class="permalink">
                                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/starry-night.jpg)"></div>
                                            </a>
                                            <div class="content-wrap">
                                                <div class="entry-header align-center">
                                                    <span class="category"><a href="/tag/adventure/">Adventure</a></span>
                                                    <h3 class="title h4"><a href="https://polar.gbjsolution.com/camping-in-an-abandoned-house-under-the-starry-night-at-hill-top/" rel="bookmark">Camping in an abandoned house under the starry night at hill top</a></h3>
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
                                    <div class="col-sm-6 col-xs-12">
                                        <article class="post post-card">
                                            <div class="prev-next-link align-center">
                                                <a class="" href="https://polar.gbjsolution.com/i-like-fishing-because-it-is-always-the-great-way-of-relaxing/">Next Post</a>
                                            </div>
                                            <a href="https://polar.gbjsolution.com/i-like-fishing-because-it-is-always-the-great-way-of-relaxing/" class="permalink">
                                                <div class="featured-image" style="background-image: url(https://polar.gbjsolution.com/content/images/2017/05/fishing-with-dog.jpg)"></div>
                                            </a>
                                            <div class="content-wrap">
                                                <div class="entry-header align-center">
                                                    <span class="category"><a href="/tag/lifestyle/">Lifestyle</a></span>
                                                    <h3 class="title h4"><a href="https://polar.gbjsolution.com/i-like-fishing-because-it-is-always-the-great-way-of-relaxing/" rel="bookmark">I like fishing because it is always the great way of relaxing</a></h3>
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
                                </div>
                            </div>						
                            <div class="comment-wrap">
                                <!-- start disqus comment -->
                                <div class="comment-container">
                                    <div id="disqus_thread"></div>
                                    <script type="text/javascript">
                                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                                        var disqus_shortname = disqus_shortname; // required: replace example with your forum shortname

                                        /* * * DON'T EDIT BELOW THIS LINE * * */
                                        (function() {
                                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                </div>
                            <!-- end disqus comment -->
                            </div>
                        </div>
                    </div>
                </div>
            </article>
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
