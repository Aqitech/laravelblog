]@include('front.header')
<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $singlePost->title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->
<!-- Post Details -->
<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">
                    <div class="post-thumb">
                        <img src="{{ $singlePost->feature_image }}" alt="{{ $singlePost->title }}">
                    </div>
                    <div class="post__content">
                        <div class="post-additional-info">
                            <div class="post__author author vcard">
                                Posted by
                                <div class="post__author-name fn">
                                    <a href="#" class="post__author-link">{{ $singlePost->user->name }}</a>
                                </div>
                            </div>
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published" datetime="2016-03-20 12:00:00">
                                    {{ $singlePost->created_at->toFormattedDateString() }}
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                @foreach($singlePost->category()->get() as $category)
                                <a href="#">{{ $category->name }}</a>
                                @endforeach
                            </span>
                        </div>
                        <div class="post__content-info">
                            {!! $singlePost->content !!}
                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                    @foreach($singlePost->tags()->get() as $tag)
                                    <a href="#" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="socials">Share:
                        <a href="#" class="social__item">
                            <i class="seoicon-social-facebook"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-twitter"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-linkedin"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-google-plus"></i>
                        </a>
                        <a href="#" class="social__item">
                            <i class="seoicon-social-pinterest"></i>
                        </a>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset('front/img/blog-details-author.png') }}" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $singlePost->user->name }}</h5>
                            <p class="author-info">SEO Specialist</p>
                        </div>
                        <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                            nonummy nibh euismod.
                        </p>
                        <div class="socials">

                            <a href="#" class="social__item">
                                <img src="{{ asset('front/svg/circle-facebook.svg') }}" alt="facebook">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('front/svg/twitter.svg') }}" alt="twitter">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('front/svg/google.svg') }}" alt="google">
                            </a>

                            <a href="#" class="social__item">
                                <img src="{{ asset('front/svg/youtube.svg') }}" alt="youtube">
                            </a>

                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">
                    @if($prev)
                    <a href="{{ route('post.single',['slug' => $prev->slug]) }}" class="btn-prev-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ $prev->title }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif
                    @if($next)
                    <a href="{{ route('post.single',['slug' => $next->slug]) }}" class="btn-next-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{ $next->title }}</p>
                        </div>
                    </a>
                    @endif
                </div>
                <div class="row">
                    <div class="socials text-center">
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                </div>
                <div class="comments">
                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                    @include('front.discus')
                </div>
            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            @include('front.tags')

            <!-- End Sidebar-->

        </main>
    </div>
</div>

@include('front.newslatter')

@include('front.footer')