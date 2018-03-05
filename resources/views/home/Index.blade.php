
@extends('home.parent')
@section('content')        
            <section id="content">
                <div class="container c-alt">

                    <div class="row">
                    <form action="/micro" method="post">
                        <div class="col-md-8">
                            <div class="card wall-posting">
                                <div class="card-body card-padding">
                                    
                                        {{ csrf_field() }}
                                        <textarea class="wp-text" name="content" data-auto-size placeholder="写点什么..."></textarea>
                                        
                                        <div class="tab-content p-0">
                                            <div class="wp-media tab-pane" id="wpm-image">
                                                Images - Coming soon...
                                            </div>
                                        </div>
                                    

                                </div>
                                
                                <ul class="list-unstyled clearfix wpb-actions">
                                    <li class="wpba-attrs">
                                        <ul class="list-unstyled list-inline m-l-0 m-t-5">
                                            <li><a data-wpba="image" data-toggle="tab" href="" data-target="#wpm-image"><i class="zmdi zmdi-image"></i></a></li>
                                        </ul>
                                    </li>
                
                                    <li class="pull-right"><button  class="btn btn-primary btn-sm" type="submit">提交</button></li>
                                </ul>
                            </div>
                
                            <div class="card">
                                <div class="card-header">
                                    <div class="media">
                                        <div class="pull-left">
                                            <img class="lv-img" src="homes/img/profile-pics/1.jpg" alt="">
                                        </div>
                                        
                                        <div class="media-body m-t-5">
                                            <h2>Mallinda Hollaway <small>Posted on 31st Aug 2015 at 07:00</small></h2>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body card-padding">
                                    <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce eget dolor id justo luctus commodo vel pharetra nisi. Donec velit libero, gravida vel diam ut, lobortis mollis quam. Morbi posuere egestas posuere. Curabitur in dui sollicitudin, lacinia magna at, laoreet sapien. Integer vitae eros nulla.</p>
                                    
                                    <div class="wall-img-preview lightbox clearfix">
                                        <div class="wip-item" data-src="homes/img/headers/4.png" style="background-image: url(homes/img/headers/4.png);">
                                            <div class="lightbox-item"></div>
                                        </div>
                                    </div>
                                    
                                    <ul class="wall-attrs clearfix list-inline list-unstyled">
                                        <li class="wa-stats">
                                            <span><i class="zmdi zmdi-comments"></i> 36</span>
                                            <span class="active"><i class="zmdi zmdi-favorite"></i> 220</span>
                                        </li>
                                        
                                        <li class="wa-users">
                                            <a href=""><img src="homes/img/profile-pics/1.jpg" alt=""></a>
                                            <a href=""><img src="homes/img/profile-pics/2.jpg" alt=""></a>
                                            <a href=""><img src="homes/img/profile-pics/3.jpg" alt=""></a>
                                            <a href=""><img src="homes/img/profile-pics/5.jpg" alt=""></a>
                                        </li>
                                    </ul>    
                                </div>
                                
                                <div class="wall-comment-list">
                                    
                                    <!-- Comment Listing -->
                                    <div class="wcl-list">
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="homes/img/profile-pics/5.jpg" alt="" class="lv-img-sm">
                                            </a>
                                            
                                            <div class="pull-right p-0">
                                                <ul class="actions">
                                                    <li class="dropdown" dropdown="">
                                                        <a href="" dropdown-toggle="" aria-haspopup="true" aria-expanded="false">
                                                            <i class="zmdi zmdi-more-vert"></i>
                                                        </a>
                                        
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li>
                                                                <a href="">Report</a>
                                                            </li>
                                                            <li>
                                                                <a href="">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            
                                            <div class="media-body">
                                                <a href="" class="a-title">David Nathan</a> <small class="c-gray m-l-10">3 mins ago...</small>
                                                <p class="m-t-5 m-b-0">Maecenas dignissim in neque id commodo. Nam pretium a tortor a convallis. Curabitur in arcu quis nulla aliquam condimentum. Morbi eu cursus diam, vitae tristique dui.</p>
                                            </div>
                                        </div>
                                        
                                        <div class="media">
                                            <a href="" class="pull-left">
                                                <img src="homes/img/profile-pics/4.jpg" alt="" class="lv-img-sm">
                                            </a>
                     
                                            <div class="media-body">
                                                <a href="" class="a-title">Sam Anderson</a> <small class="c-gray m-l-10">3 mins ago...</small>
                                                <p class="m-t-5 m-b-0">Curabitur in arcu quis nulla aliquam condimentum.</p>
                                            </div>
                                            
                                            <ul class="actions">
                                                <li class="dropdown" dropdown="">
                                                    <a href="" dropdown-toggle="" aria-haspopup="true" aria-expanded="false">
                                                        <i class="zmdi zmdi-more-vert"></i>
                                                    </a>
                                    
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li>
                                                            <a href="">Report</a>
                                                        </li>
                                                        <li>
                                                            <a href="">Delete</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <!-- Comment form -->
                                    <div class="wcl-form">
                                        <div class="wc-comment">
                                            <div class="wcc-inner wcc-toggle">
                                                回复点什么吧...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        
                        <div class="col-md-4 hidden-sm">
                            <div class="card">
                                <div class="card-header">
                                    <h2>微博新鲜事</h2>
                                </div>
                                
                                <div class="card-body card-padding">
                                    Maecenas malesuada. Nam adipiscing. Etiam vitae tortor. Maecenas ullamcorper, dui et placerat feugiat, eros pede varius nisi, condimentum viverra felis nunc et lorem. <a data-ui-sref="pages.profile.profile-about" href=""><small>查看更多</small></a>
                                </div>
                            </div>
                            
                            <div class="card picture-list">
                                <div class="card-header">
                                    <h2>美图推荐 <small>Cras congue nec lorem eget posuere</small></h2>
                    
                                    <ul class="actions">
                                        <li class="dropdown action-show" dropdown>
                                            <a href="" dropdown-toggle>
                                                <i class="zmdi zmdi-more-vert"></i>
                                            </a>
                    
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="">Refresh</a>
                                                </li>
                                                <li>
                                                    <a href="">Manage Widgets</a>
                                                </li>
                                                <li>
                                                    <a href="">Widgets Settings</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                    
                                <div class="pl-body">
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/1.png" alt="">
                                        </a>
                                    </div>
                    
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/3.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/4.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/5.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/6.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/7.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/8.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/9.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <a href="">
                                            <img src="homes/img/headers/square/3.png" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
@endsection
            
