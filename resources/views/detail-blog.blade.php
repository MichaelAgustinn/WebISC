@extends('layoutLanding.master')
@section('content')
    <main class="main">

        <!-- Page Title -->
        <div class="page-title">
            <div class="heading">
            </div>
            <nav class="breadcrumbs">
                <div class="container">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('blog.index') }}">Blog</a></li>
                        <li class="current">{{ $data->title }}</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">

                                {{-- Featured Image (optional, if using separate image column later) --}}
                                {{-- <div class="post-img">
                                <img src="{{ asset('storage/' . $data->image_path) }}" class="img-fluid" alt="">
                            </div> --}}

                                <h2 class="title">{{ $data->title }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i>
                                            <a href="#">{{ $data->user->name ?? 'Unknown' }}</a>
                                        </li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                            <a href="#"><time
                                                    datetime="{{ $data->created_at }}">{{ $data->created_at->format('M d, Y') }}</time></a>
                                        </li>
                                    </ul>
                                </div><!-- End meta top -->

                                <div class="content">
                                    {!! $data->description !!}
                                </div><!-- End post content -->

                                <div class="meta-bottom">
                                    <i class="bi bi-folder"></i>
                                    <ul class="cats">
                                        <li><a href="#">Uncategorized</a></li>
                                    </ul>
                                </div><!-- End meta bottom -->

                            </article>
                        </div>
                    </section><!-- /Blog Details Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="">
                                <input type="text">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!--/Search Widget -->

                        <!-- Recent Posts Widget -->
                        {{-- Placeholder, bisa diisi dengan query recent posts --}}
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Recent Posts</h3>
                            {{-- Loop recent posts --}}
                        </div><!--/Recent Posts Widget -->

                    </div>

                </div>

            </div>
        </div>

    </main>
@endsection
