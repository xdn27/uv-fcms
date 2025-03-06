<div>
    <div id="inner">
        <section class="mb-xl">
            <div class="container mb-md">
                <div class="grid">
                    <div class="col-3">
                        <h2 class="grid-title">Journal</h2>
                    </div>
                    <div class="col-5 text-right">
                        <nav id="filters">
                            <ul class="filters">
                                <li> <a href="#" data-filter="grid-item" class="active filter">All</a></li>
                                @foreach($categories as $category)
                                <li><a href="#" data-filter="{{$category->slug}}" class="filter">{{$category->title}}</a></li>
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="journal-grid" class="masonry-grid"><a href="journal-single.html" class="identity grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">17 / 01 / 17</div><img src="images/journal/thumb-05.png">
                        </div>
                        <div class="caption">
                            <div class="title">Be productive while relaxing</div>
                            <div class="subtitle">By Ian Vicknair</div>
                        </div>
                    </a><a href="journal-single.html" class="retouching grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">16 / 01 / 17</div><img src="images/journal/thumb-07.png">
                        </div>
                        <div class="caption">
                            <div class="title">The first 365 days of an Art Director</div>
                            <div class="subtitle">By Ian Vicknair</div>
                        </div>
                    </a><a href="journal-single.html" class="identity grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">15 / 01 / 17</div><img src="images/journal/thumb-06.png">
                        </div>
                        <div class="caption">
                            <div class="title">Definitive guide to finishing a project</div>
                            <div class="subtitle">By Michael Jordan</div>
                        </div>
                    </a><a href="journal-single.html" class="retouching grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">14 / 01 / 17</div><img src="images/journal/thumb-08.png">
                        </div>
                        <div class="caption">
                            <div class="title">Relax! It is not your fault</div>
                            <div class="subtitle">By Ian Vicknair</div>
                        </div>
                    </a><a href="journal-single.html" class="identity grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">13 / 01 / 17</div><img src="images/journal/thumb-02.png">
                        </div>
                        <div class="caption">
                            <div class="title">7 Signs of great design</div>
                            <div class="subtitle">By John Doe</div>
                        </div>
                    </a><a href="journal-single.html" class="retouching grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">12 / 01 / 17</div><img src="images/journal/thumb-03.png">
                        </div>
                        <div class="caption">
                            <div class="title">Rules for a perfect workflow</div>
                            <div class="subtitle">By Henry Peel</div>
                        </div>
                    </a><a href="journal-single.html" class="product-design grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">11 / 01 / 17</div><img src="images/journal/thumb-04.png">
                        </div>
                        <div class="caption">
                            <div class="title">The making of Peel in 3 days</div>
                            <div class="subtitle">By Ian Vicknair</div>
                        </div>
                    </a><a href="journal-single.html" class="retouching grid-item col-4">
                        <div class="thumb">
                            <div class="post-date">10 / 01 / 17</div><img src="images/journal/thumb-08.png">
                        </div>
                        <div class="caption">
                            <div class="title">Relax! It is not your fault</div>
                            <div class="subtitle">By Ian Vicknair</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <x-footer />
</div>