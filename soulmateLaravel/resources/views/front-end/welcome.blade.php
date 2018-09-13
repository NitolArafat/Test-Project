@extends('front-end.master')
@section('main_content')


<!-- custom html -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="profile-img">
                    <img src="data:image/jpeg;base64,{{ Auth::user()->persion_picture }}" class="img-responsive" alt=""/>
                </div>
                <!-- Profile Image -->
            </div>
            <div class="span8">
                <div class="name-wrapper">
                    <h1 class="name">{{ Auth::user()->name }}  {{Auth::user()->id}}</h1>
                    <span>{{ Auth::user()->email }}</span>
                </div>
                <p>
                    Hey {{ Auth::user()->name }} !!, Find your SOULMATE, enjoy you life
                </p>


                <div class="row">
                    <div class="span2">
                        <div class="personal-details">
                            <strong>{{ Auth::user()->date_of_birth }}</strong>
                            <small>BIRTH</small>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="personal-details">
                            <strong>{{ Auth::user()->gender==1 ? 'Male' : 'Femail'}}</strong>
                            <small>Gender</small>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="personal-details">
                            <strong>ENGLISH <span>(NATIVE)</span>, FRENCH <span>(INTERMEDIATE)</span></strong>
                            <small>LANGUAGE</small>
                        </div>
                    </div>
                </div>

                <ul class="social-icon">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-slack" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="main">
    <div class="main-inner">
        <div class="container">
            <div class="row">

                <div class="span6">

                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-file"></i>
                            <h3> This Person Likes You</h3>
                        </div>
                         @foreach($notice_like_requests as $like_request)
                        <!-- /widget-header -->
                        <div class="widget-content">
                            <ul class="messages_layout">
                                <li class="from_user left"> <a href="#" class="avatar"><img style="height: 100px;width: 200px" src="data:image/jpeg;base64,{{ $like_request->persion_picture }}" class="img-responsive" alt=""/></a>
                                    <div class="message_wrap"style="margin-left: 135px;"> <span class="arrow"></span>
                                        <div class="info"> <a class="name">{{$like_request->name}} </a> <span class="time">1 hour ago</span>
                                            <div class="options_arrow">
                                                <div class="dropdown pull-right"> 
                                                     <a href="{{route('person-detail',['request_id'=>Auth::user()->id ,'response_id'=>$like_request->request_person_id])}}" class="btn btn-info">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text">
                                        <p class="news-item-preview">  Email : {{ $like_request->email }}</p>
                                        <p class="news-item-preview"> Gender : {{ $like_request->gender==1? 'Male' : 'Femail' }}</p>
                                        <p class="news-item-preview">  Date of Birth : {{ $like_request->date_of_birth }} </p>  
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /widget-content -->
                        @endforeach
                    </div>
                    <!-- /widget -->
                    <!-- /widget -->
                    <div class="widget">
                        <div class="widget-header"> <i class="icon-file"></i>
                            <h3> Friend List</h3>
                        </div>
 
                    </div>
                    <!-- /widget -->
                    
                    
                </div>
                <!-- /span6 -->
                <div class="span6">
                    <div class="widget widget-nopad">
                        <div class="widget-header"> <i class="icon-list-alt"></i>
                            <h3> Find Friends</h3>
                        </div>
                        <!-- /widget-header -->
                        <div class="widget-content">
                            @foreach($users as $user)
                            @if($user->id!= Auth::user()->id )
                            <ul class="news-items">


                                <li>

                                    <div class="news-item-date"> <span class="news-item-day">  <img style="height: 100px;width: 200px" src="data:image/jpeg;base64,{{ $user->persion_picture }}" class="img-responsive" alt=""/></span> </div>
                                    <div class="news-item-detail"> <a  class="news-item-title" target="_blank">{{ $user->name }}</a>
                                        <p class="news-item-preview">  Email : {{ $user->email }}</p>
                                        <p class="news-item-preview"> Gender : {{ $user->gender==1? 'Male' : 'Femail' }}</p>
                                        <p class="news-item-preview">  Date of Birth : {{ $user->date_of_birth }} </p>
                                        <p>
                                            <a href="{{route('person-detail',['request_id'=>Auth::user()->id ,'response_id'=>$user->id])}}" class="btn btn-info">View Details</a>
                                         
                                        <hr>
                                    </div>

                                </li>   

                            </ul>
                            @endif
                            @endforeach
                        </div>
                        <!-- /widget-content -->
                    </div>
                    <!-- /widget -->
                </div>
                <!-- /span6 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>


@endsection