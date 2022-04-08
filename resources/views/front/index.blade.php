@extends('layout.front-master')
@section('title', 'Lance Master | Home Page')

@section('content')

    <div id="carousalTop" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($banners as $key => $banner)
                <li data-target="#carousalTop" data-slide-to="{{$key}}" class=" @if($key == 0) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($banners as $key => $banner)
                <div class="carousel-item @if ($key == 0) active @endif " >
                    <img src="{{ asset($banner->image) }}" style="width: 100% !important" class="w-100 d-block" alt="...">
                </div>    
            @endforeach
        </div>
    </div>

    <div class="videos-row row justify-content-md-center">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Recommended For You</h2>
            </div>
            <div class="slick-slider">
                <div class="row video-row">
                    @foreach ($recommendedVideos as $video)
                        <div class="col-3 video-box">
                            <div class="boxImg">
                                @php
                                    // if($video->continueWatches->first()){
                                    //     $v_time = round($video->continueWatches->first()->time);
                                    // }
                                    // else{
                                    //     $v_time = 0;
                                    // }
                                @endphp
                                <img width="100%" height="150" src="{{ asset($video->thumbnail) }}" data-href="{{ URL::to('/video', $video->id) }}"
                                     class="video-list clickable" />
                                {{-- <video controls width='100%' id="recommendedVideoPlayer{{ $video->id }}" height='200px' onclick="playVideo(this.id);">
                                    <source src="{{ asset($video->video_path) }}">
                                </video> --}}
                               
                            </div> 
                            <div class="pt-3 video-content">
                                   <a class="image-link-cover">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt="">
                                    </div>
                                   </a>
                                    <div class="details mt-1">
                                        <div class="video-details">
                                            {{-- <h3>{{ $video->title }}</h3>
                                             --}}
                                             <div class="title-cover">
                                                <h3 class="title">Mix - Ayra Starr - Bloody Samaritan (Performance Video)</h3>
                                             </div>
                                            <div class="channel">
                                                <div class="channel-inner">
                                                    <a href="{{ route('channel.index', $video->user->id) }}" class="color-white">
                                                        <span class="text-capitalize">{{ $video->user->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-auto">
                                            {{ $video->views->count() }} Views
                                        </p>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="videos-row row justify-content-md-center">
        <div class="col-lg-12">
            <div class="heading"   style="text-de: 2px solid white">
                <h2>News</h2>
            </div>
            <div class="slick-slider" >
                <div class="row">
                    @foreach ($newsVideos as $video)
                    <div class="col-3 video-box">
                            <div class="boxImg">
                                @php
                                    // if($video->continueWatches->first()){
                                    //     $v_time = round($video->continueWatches->first()->time);
                                    // }
                                    // else{
                                    //     $v_time = 0;
                                    // }
                                @endphp
                                <img width="100%" height="150" src="{{ asset($video->thumbnail) }}" data-href="{{ URL::to('/video', $video->id) }}"
                                     class="video-list clickable" />
                                {{-- <video controls width='100%' id="recommendedVideoPlayer{{ $video->id }}" height='200px' onclick="playVideo(this.id);">
                                    <source src="{{ asset($video->video_path) }}">
                                </video> --}}
                               
                            </div> 
                            <div class="pt-3 video-content">
                                   <a class="image-link-cover">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt="">
                                    </div>
                                   </a>
                                    <div class="details mt-1">
                                        <div class="video-details">
                                            
                                             <div class="title-cover">
                                                 <h3>{{ $video->title }}</h3>
                                             </div>
                                            <div class="channel">
                                                <div class="channel-inner">
                                                    <a href="{{ route('channel.index', $video->user->id) }}" class="color-white">
                                                        <span class="text-capitalize">{{ $video->user->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-auto">
                                            {{ $video->views->count() }} Views
                                        </p>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
        </div>
        </div>
    </div>

    @if(count($watchlistVideos) > 0)
    <div class="videos-row row justify-content-md-center">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Watch List</h2>
            </div>
            <div class="slick-slider">
                <div class="row">
                    @foreach ($watchlistVideos as $video)
                    <div class="col-3 video-box">
                            <div class="boxImg">
                                @php
                                    // if($video->continueWatches->first()){
                                    //     $v_time = round($video->continueWatches->first()->time);
                                    // }
                                    // else{
                                    //     $v_time = 0;
                                    // }
                                @endphp
                                <img width="100%" height="150" src="{{ asset($video->thumbnail) }}" data-href="{{ URL::to('/video', $video->id) }}"
                                     class="video-list clickable" />
                                {{-- <video controls width='100%' id="recommendedVideoPlayer{{ $video->id }}" height='200px' onclick="playVideo(this.id);">
                                    <source src="{{ asset($video->video_path) }}">
                                </video> --}}
                               
                            </div> 
                            <div class="pt-3 video-content">
                                   <a class="image-link-cover">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt="">
                                    </div>
                                   </a>
                                    <div class="details mt-1">
                                        <div class="video-details">
                                            
                                             <div class="title-cover">
                                               <h3>{{ $video->title }}</h3>
                                             </div>
                                            <div class="channel">
                                                <div class="channel-inner">
                                                    <a href="{{ route('channel.index', $video->user->id) }}" class="color-white">
                                                        <span class="text-capitalize">{{ $video->user->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-auto">
                                            {{ $video->views->count() }} Views
                                        </p>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(count($contWatchesVideos) > 0)
    <div class="videos-row row justify-content-md-center">
        <div class="col-lg-12">
            <div class="heading">
                <h2>Continue Watching</h2>
            </div>
            <div class="slick-slider">
                <div class="row">
                    @foreach ($contWatchesVideos as $video)
                    <div class="col-3 video-box">
                            <div class="boxImg">
                                @php
                                    // if($video->continueWatches->first()){
                                    //     $v_time = round($video->continueWatches->first()->time);
                                    // }
                                    // else{
                                    //     $v_time = 0;
                                    // }
                                @endphp
                                <img width="100%" height="150" src="{{ asset($video->thumbnail) }}" data-href="{{ URL::to('/video', $video->id) }}"
                                     class="video-list clickable" />
                                {{-- <video controls width='100%' id="recommendedVideoPlayer{{ $video->id }}" height='200px' onclick="playVideo(this.id);">
                                    <source src="{{ asset($video->video_path) }}">
                                </video> --}}
                               
                            </div> 
                            <div class="pt-3 video-content">
                                   <a class="image-link-cover">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt="">
                                    </div>
                                   </a>
                                    <div class="details mt-1">
                                        <div class="video-details">
                                            <h3>{{ $video->title }}</h3>
                                            <div class="channel">
                                                <div class="channel-inner">
                                                    <a href="{{ route('channel.index', $video->user->id) }}" class="color-white">
                                                        <span class="text-capitalize">{{ $video->user->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-auto">
                                            {{ $video->views->count() }} Views
                                        </p>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
        </div>
        </div>
    </div>
    @endif  
    <div class="videos-row row justify-content-md-center">
        <div class="col-lg-12">
            <div class="heading"   style="text-de: 2px solid white">
                <h2>Trending</h2>
            </div>
            <div class="slick-slider" >
                <div class="row">
                    @foreach ($trendingVideos as $video)
                    <div class="col-3 video-box">
                            <div class="boxImg">
                                @php
                                    // if($video->continueWatches->first()){
                                    //     $v_time = round($video->continueWatches->first()->time);
                                    // }
                                    // else{
                                    //     $v_time = 0;
                                    // }
                                @endphp
                                <img width="100%" height="150" src="{{ asset($video->thumbnail) }}" data-href="{{ URL::to('/video', $video->id) }}"
                                     class="video-list clickable" />
                                {{-- <video controls width='100%' id="recommendedVideoPlayer{{ $video->id }}" height='200px' onclick="playVideo(this.id);">
                                    <source src="{{ asset($video->video_path) }}">
                                </video> --}}
                               
                            </div> 
                            <div class="pt-3 video-content">
                                   <a class="image-link-cover">
                                    <div class="profile-pic">
                                        <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt="">
                                    </div>
                                   </a>
                                    <div class="details mt-1">
                                        <div class="video-details">
                                            <h3>{{ $video->title }}</h3>

                                            <div class="channel">
                                                <div class="channel-inner">
                                                    <a href="{{ route('channel.index', $video->user->id) }}" class="color-white">
                                                        <span class="text-capitalize">{{ $video->user->name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="ml-auto">
                                            {{ $video->views->count() }} Views
                                        </p>
                                    </div>
                                </div>
                        </div>
                    @endforeach
                </div>
        </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
    $( function() {
        $('.slick-track').addClass('float-left');
    });
    </script>
@endpush