@include('front.header')
<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Category: {{ $singleCategory->name }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="row">
                <div class="case-item-wrap">
                    @if($singleCategory->posts()->count() > 0)
                    @foreach($singleCategory->posts()->get() as $post)
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="case-item">
                            <div class="case-item__thumb">
                                <img src="{{ $post->feature_image }}" alt="{{ $post->title }}">
                            </div>
                            <h6 class="case-item__title"><a href="{{ route('post.single',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h6>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h2>Category {{ $singleCategory->name }} Has No Posts Yet</h2>
                    @endif
                </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>
            <!-- Sidebar-->

            @include('front.tags')

            <!-- End Sidebar-->

        </main>
    </div>
</div>

@include('front.newslatter')

@include('front.footer')