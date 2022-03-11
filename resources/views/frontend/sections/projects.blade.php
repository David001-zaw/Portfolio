

    <!-- ========== Projects Section ========== -->
    <section class="projects" id="projects">
        <div class="main-title title-left projects__title" data-content="Projects">
            <div class="main-title__number">
                <p>03</p>
            </div>
            <div class="main-title__text">
                <p class="main-title__text-short">My Works</p>
                <p class="main-title__text-long">Some of my past projects</p>
            </div>
        </div>
        <div class="projects__intro intro">
            <h1>"DO what you Love and Love what you DO. This is what I do and I was born to do this. <img src="frontend/images/gif/Clap.gif" alt="Clap" width="30px" height="30px"> "</h1>
            <span>Zaw Hlaing Win</span>
        </div>
        <div class="projects__container">

            {{-- <div class="projects__bgText">
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
                <span>2022</span>
            </div> --}}


            {{-- <div class="project-item">
                <div class="project_content">
                    <div class="project__img">
                        <img src="frontend/images/project1.png" alt="">
                    </div>
                    <div class="project">
                        <h1 class="project__main-title">Uni Mangement System</h1>
                        <p class="project__sub-title">Check it out!</p>
                        <a href="#" class="project__name line-btn">DPC Hospility Website</a>
                        <br>
                        <p class="project__sub-title">Coder &rarr;</p>
                        <p class="project__coder">David Parker(Founder of DPC)</p>
                        <br>
                        <p class="project__sub-title">Overview &rarr;</p>
                        <p class="project__overview">Worth Metroplex, it was great to branch out and project with a client in Houston. This was a complete redesign of the the client’s site, which hadn't been redesigned in nearly a decade. It features a clean, corporate, and modern design that is fully responsive for mobile devices. I exclusively used flexbox for layout on this one. I also reprojected much of the existing content to fit the new site’s design. Finally, I delivered a custom theme in WordPress so the client could easily alter content.</p>
                        <br>
                        <p class="project__sub-title">Project Skills &rarr;</p>
                        <div class="project__skills">
                            <p>Custom Website Design</p>
                            <p>HTML5/CSS</p>
                            <p>Content strategy and writing</p>
                        </div>
                    </div>
                </div>

                @if (Auth::check())
                <div class="action-btns">
                    <a href="#" class="main-btn"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="main-btn"><i class="fa fa-trash"></i> Delete</a>
                </div>
                @endif
            </div>

            <div class="project-item">
                <div class="project_content">
                    <div class="project__img">
                        <img src="frontend/images/project2.png" alt="">
                    </div>
                    <div class="project">
                        <h1 class="project__main-title">Kylo Music App</h1>
                        <p class="project__sub-title">Check it out!</p>
                        <a href="#" class="project__name line-btn">Billy Can Can Website</a>
                        <br>
                        <p class="project__sub-title">Coder &rarr;</p>
                        <p class="project__coder">Billy Can Can (Completed 2018)</p>
                        <br>
                        <p class="project__sub-title">Overview &rarr;</p>
                        <p class="project__overview">I built the WordPress theme for this amazing restaurant in the Victory Park area of Dallas, TX. It was recently ranked as D Magazine’s 50 best restaurants in Dallas! The website design itself was completed by the amazing design firm Thunderwing based out in California and includes Open Table integration.</p>
                        <br>
                        <p class="project__sub-title">Project Skills &rarr;</p>
                        <div class="project__skills">
                            <p>WordPress Custom Theme Development</p>
                            <p>HTML5/CSS</p>
                            <p>Bootstrap 4</p>
                        </div>
                    </div>
                </div>
                @if (Auth::check())
                <div class="action-btns">
                    <a href="#" class="main-btn"><i class="fa fa-edit"></i> Edit</a>
                    <a href="#" class="main-btn"><i class="fa fa-trash"></i> Delete</a>
                </div>
                @endif
            </div> --}}

            {{-- @if (count($porjects) >= 0)
                @foreach ($projects as $project)

                @endforeach
            @endif --}}

            @forelse ($projects as $project)
                <div class="project-item">
                    <div class="project_content">
                        <div class="project__img">
                            <img src="{{ asset('frontend/images/projects/'.$project->image_path) }}" alt="" width="100%">
                        </div>
                        <div class="project">
                            <h1 class="project__main-title">{{ $project->title }}</h1>
                            <p class="project__sub-title">Check it out!</p>
                            <a href="{{ $project->project_link }}" class="project__name line-btn">{{ $project->title }}</a>
                            <br>
                            <p class="project__sub-title">Coder &rarr;</p>
                            <p class="project__coder">{{ $project->coder }}</p>
                            <br>
                            <p class="project__sub-title">Overview &rarr;</p>
                            <p class="project__overview">{{ $project->overview }}</p>
                            <br>
                            <p class="project__sub-title">Project Skills &rarr;</p>
                            <div class="project__skills">
                                @foreach ($project->tags as $tag)
                                    <p>{{ $tag->name }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                    <div class="action-btns">
                        <a href="{{ route('projects.edit', $project->id) }}" class="main-btn"><i class="fa fa-edit"></i> Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="main-btn" type="submit"><i class="fa fa-trash"></i> Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            @empty
                <marquee behavior="" direction="right" scrollamount="12">
                    <div class="no-items">
                        <h1>No Project Here!</h1>
                    </div>
                </marquee>
            @endforelse

            <div class="more-project-btn" style="text-align: center;">
                <a href="#" class="main-btn">
                    More Projects
                    &rarr;
                </a>
            </div>
        </div>
    </section>
