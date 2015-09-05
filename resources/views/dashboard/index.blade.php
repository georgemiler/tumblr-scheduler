@extends('layouts/main')

@section('title', 'Home')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        Welcome!
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Most Recent Likes</div>
                    <div class="panel-body">
                        @foreach ($recentLikes as $like)
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a href="{{ $like->post_url }}" rel="external" target="_blank">{{ $like->blog_name }}</a>
                                        @if (!empty($like->trail))
                                            <i class="glyphicon glyphicon-retweet"></i>
                                            <a href="http://{{ $like->trail[0]->blog->name }}.tumblr.com" rel="external" target="_blank">{{ $like->trail[0]->blog->name }}</a>
                                        @endif
                                    </div>
                                    <div class="panel-body">
                                        <div class="thumbnail">
                                            @if (!empty($like->photos))
                                                <a href="#">
                                                    @foreach($like->photos as $photo)
                                                        <img src="{{ $photo->original_size->url }}" />
                                                    @endforeach
                                                </a>
                                            @endif
                                        </div>
                                        <div class="caption">
                                            <?php var_dump($like); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
