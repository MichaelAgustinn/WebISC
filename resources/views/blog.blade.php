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
                        <li><a href="{{ route('landingpage.index') }}">Home</a></li>
                        <li class="current">Blog</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">

                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">

                        <div class="container">

                            <div class="row gy-4">

                                @foreach ($blogs as $blog)
                                    <div class="col-12">
                                        <article>

                                            <div class="post-img">
                                                <img src="{{ asset($blog->first_image) }}" class="img-fluid" alt="">
                                            </div>

                                            <h2 class="title">
                                                <a href="blog-details.html">{{ $blog->title }}</a>
                                            </h2>

                                            <div class="meta-top">
                                                <ul>
                                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                            href="blog-details.html">{{ $blog->user->name }}</a></li>
                                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                                            href="blog-details.html"><time
                                                                datetime="2022-01-01">{{ $blog->created_at->format('l, d F Y') }}</time></a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="content">
                                                <p>
                                                    {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 100) }}
                                                </p>

                                                <div class="read-more">
                                                    <a href="{{ route('blog.detail', $blog->slug) }}">Read More</a>
                                                </div>
                                            </div>

                                        </article>
                                    </div><!-- End post list item -->
                                @endforeach


                            </div><!-- End blog posts list -->

                        </div>

                    </section><!-- /Blog Posts Section -->

                    <!-- Blog Pagination Section -->
                    <section id="blog-pagination" class="blog-pagination section">

                        <div class="container">
                            <div class="d-flex justify-content-center">
                                <ul>
                                    {{-- Tombol Previous --}}
                                    @if ($blogs->onFirstPage())
                                        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                                    @else
                                        <li><a href="{{ $blogs->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a>
                                        </li>
                                    @endif

                                    {{-- Nomor halaman --}}
                                    @php
                                        $start = max($blogs->currentPage() - 1, 1);
                                        $end = min($blogs->currentPage() + 2, $blogs->lastPage());
                                    @endphp

                                    @for ($i = $start; $i <= $end; $i++)
                                        <li>
                                            <a href="{{ $blogs->url($i) }}"
                                                class="{{ $i == $blogs->currentPage() ? 'active' : '' }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    {{-- Tampilkan "..." jika halaman belum sampai akhir --}}
                                    @if ($end < $blogs->lastPage() - 1)
                                        <li>...</li>
                                    @endif

                                    {{-- Tampilkan link ke halaman terakhir --}}
                                    @if ($end < $blogs->lastPage())
                                        <li><a href="{{ $blogs->url($blogs->lastPage()) }}">{{ $blogs->lastPage() }}</a>
                                        </li>
                                    @endif

                                    {{-- Tombol Next --}}
                                    @if ($blogs->hasMorePages())
                                        <li><a href="{{ $blogs->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a>
                                        </li>
                                    @else
                                        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>


                    </section><!-- /Blog Pagination Section -->

                </div>

                <div class="col-lg-4 sidebar">

                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form onsubmit="return false;">
                                <input type="text" id="searchBlog" placeholder="Search...">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div>
                        <div id="searchResults" class="recent-posts-widget widget-item"></div>



                        <!--/Search Widget -->

                        <!-- Categories Widget -->
                        {{-- <div class="categories-widget widget-item">

                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>

                        </div><!--/Categories Widget --> --}}

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">

                            <h3 class="widget-title">Recent Posts</h3>


                            @foreach ($recent as $data)
                                <div class="post-item">
                                    {{-- <img src="{{ asset($blog->first_image) }}" class="flex-shrink-0" alt=""> --}}
                                    {{-- <p>asd</p> --}}
                                    <img src="{{ asset($data->first_image) }}" class="flex-shrink-0" alt=""
                                        style="max-width: 50px; max-height: 50px; object-fit: cover;">

                                    <div>
                                        <h4><a href="{{ route('blog.detail', $data->slug) }}">{{ $data->title }}</a>
                                        </h4>
                                        <time datetime="2020-01-01">{{ $data->created_at->format('d-m-Y') }}</time>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach

                        </div><!--/Recent Posts Widget -->

                        {{-- <!-- Tags Widget -->
                        <div class="tags-widget widget-item">

                            <h3 class="widget-title">Tags</h3>
                            <ul>
                                <li><a href="#">App</a></li>
                                <li><a href="#">IT</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Mac</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Office</a></li>
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Studio</a></li>
                                <li><a href="#">Smart</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>

                        </div><!--/Tags Widget --> --}}

                    </div>

                </div>

            </div>
        </div>

    </main>
    <script>
        document.getElementById('searchBlog').addEventListener('keyup', function() {
            let q = this.value;

            fetch(`/blogs/search?q=${q}`)
                .then(res => res.json())
                .then(data => {
                    let results = document.getElementById('searchResults');
                    results.innerHTML = '';

                    data.forEach(blog => {
                        results.innerHTML += `
                    <div class="post-item">
                        <img src="{{ asset($data->first_image) }}" class="flex-shrink-0" alt=""
                             style="max-width: 50px; max-height: 50px; object-fit: cover;">
                        <div>
                            <h4><a href="/blog/${blog.slug}">${blog.title}</a></h4>
                            <time datetime="${blog.created_at}">
                                ${new Date(blog.created_at).toLocaleDateString('id-ID')}
                            </time>
                        </div>
                    </div>
                `;
                    });
                });
        });
    </script>
@endsection
