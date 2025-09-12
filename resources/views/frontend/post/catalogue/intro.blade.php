@extends('frontend.homepage.layout')
@section('content')
    <div class="post-catalogue page-wrapper intro-wrapper">
        @include('frontend.component.breadcrumb', ['model' => $postCatalogue, 'breadcrumb' => $breadcrumb])
        <div class="uk-container uk-container-center">
            <div class="intro-container">
                <div class="detail-list">
                    @if(!is_null($posts))
                        @foreach($posts as $key => $val)
                            @if($key > 0) break; @endif
                            <div class="detail-wrapper">
                                <h1 class="post-title">{{ $val->languages->first()->pivot->name }}</h1>
                                <div class="description">
                                    {!! $val->languages->first()->pivot->description !!}
                                </div>
                                <div class="content">
                                    {!! $val->languages->first()->pivot->content !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

