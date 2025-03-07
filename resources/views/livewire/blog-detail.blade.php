<div>
    <div id="inner">
        <section>
            <div class="hero behind-header">
                <div style="background-image: url('{{ asset('storage/'.$post->banner) }}');" class="bg faded"></div>
                <div class="vbottom">
                    <div class="container">
                        <div class="grid mb-md">
                            <div class="col-1">{{ $post->post_at->format('d / m / Y') }}</div>
                            <div class="col-6">
                                <div class="label">By {{ $post->author->name }}</div>
                                <h1 class="animatedText">{{ $post->title }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="mb-xl content post">
            <div class="container">
                <div class="grid">
                    <div class="col-6 col-offset-1">
                        @if($post->is_using_builder)
                        @blocks($post->body_json)
                        @else
                        {!! $post->body_html !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!--
        <section class="comments mb-xl">
            <div class="container">
                <div class="grid">
                    <div class="col-4 col-offset-1">
                        <h4>Comments</h4>
                        <h3>What people said about this article</h3>
                        <ul class="comments">
                            <li class="comment">
                                <div class="author">
                                    <figure class="author-avatar"><img src="images/journal/avatar-01.png"></figure>
                                    <div class="comment-info">
                                        <div class="author-name">Soraya</div>
                                        <div class="comment-date">June 21 2016</div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <p>Many people sign up for affiliate programs with the hopes of making some serious money. They advertise a few places and then wait for the money to start pouring in. When it doesn’t, they blame it on the program and quit.</p>
                                </div>
                                <ul class="comments">
                                    <li class="comment">
                                        <div class="author">
                                            <figure class="author-avatar"><img src="images/journal/avatar-02.png"></figure>
                                            <div class="comment-info">
                                                <div class="author-name">Kaj</div>
                                                <div class="comment-date">June 23 2016</div>
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <p>There is such a lot of talk going around about branding, but what exactly is your brand and how do you use it to help you reach more people and market your products or services? Your brand is the core of your marketing, the central theme around your products and services.</p>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="comment">
                                <div class="author">
                                    <figure class="author-avatar"><img src="images/journal/avatar-03.png"></figure>
                                    <div class="comment-info">
                                        <div class="author-name">Ian</div>
                                        <div class="comment-date">June 24 2016</div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <p>Computers have become ubiquitous in almost every facet of our lives. At work, desk jockeys spend hours in front of their desktops, while delivery people scan bar codes with handhelds and workers in the field stay in touch.</p>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="author">
                                    <figure class="author-avatar"><img src="images/journal/avatar-04.png"></figure>
                                    <div class="comment-info">
                                        <div class="author-name">Lenny</div>
                                        <div class="comment-date">June 25 2016</div>
                                    </div>
                                </div>
                                <div class="comment-body">
                                    <p>If you’re having trouble getting motivated or if you haven’t even got off the starting block yet, this article could change your life!</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="comment-form">
            <form class="container default-form">
                <div class="grid">
                    <div class="col-4 col-offset-1">
                        <h3>Leave a comment</h3>
                    </div>
                </div>
                <div class="grid">
                    <div class="col-2 col-offset-1">
                        <label>What's your name? *</label>
                        <input required type="text" name="name" class="form-control">
                    </div>
                    <div class="col-2">
                        <label>Email address *</label>
                        <input required type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="grid">
                    <div class="col-4 col-offset-1">
                        <label>Tell us what's up!</label>
                        <textarea required name="message" class="form-control"></textarea>
                    </div>
                </div>
                <div class="grid">
                    <div class="col-1 col-offset-1">
                        <input id="send" type="submit" value="Place comment" class="btn btn-default">
                    </div>
                    <div class="col-3"><span>* These fields are required</span></div>
                </div>
            </form>
        </section>
        -->

        <section class="prev-next-container mb-xl">
            <div class="container">
                <div class="grid content">
                    <div class="col-4">
                        @if($prev)
                        <div class="vcenter link-container"><a href="{{ route('blog_detail', ['slug' => $prev->slug]) }}" class="prev-link">
                                <div class="project-title">{{ $prev->title }}</div>
                                <div class="link-title">Previous</div>
                            </a></div>
                        @else
                        &nbsp;
                        @endif
                    </div>
                    <div class="col-4">
                        @if($next)
                        <div class="vcenter link-container text-right"><a href="{{ route('blog_detail', ['slug' => $next->slug]) }}" class="next-link">
                                <div class="project-title">{{ $next->title }}</div>
                                <div class="link-title">Next</div>
                            </a></div>
                        @else
                        &nbsp;
                        @endif
                    </div>
                </div>
            </div>
        </section>

    </div>
    <x-footer />
</div>