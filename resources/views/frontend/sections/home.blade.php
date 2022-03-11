

<!-- ========== Home Section ========== -->
<section class="home" id="home">

    <!-- ========== Circles ========== -->
    <div class="circle circle-home-one">
        <img src="frontend/images/circle-small.png" alt="">
    </div>

    <div class="circle circle-home-two">
        <img src="frontend/images/circle-small.png" alt="">
    </div>

    <!-- ========== Quick Links ========== -->
    <nav class="quick-links">
        <ul>
            <li>
                <a href="#home" class="dot active" data-scroll="home">
                    <span>home</span>
                </a>
            </li>
            <li>
                <a href="#about" class="dot" data-scroll="about">
                    <span>about</span>
                </a>
            </li>
            <li>
                <a href="#skills" class="dot" data-scroll="skills">
                    <span>skills</span>
                </a>
            </li>
            <li>
                <a href="#projects" class="dot" data-scroll="projects">
                    <span>projects</span>
                </a>
            </li>
            <li>
                <a href="#blogs" class="dot" data-scroll="blogs">
                    <span>blogs</span>
                </a>
            </li>
            <li>
                <a href="#contact" class="dot" data-scroll="contact">
                    <span>contact</span>
                </a>
            </li>
        </ul>
    </nav>

    <div class="profile">
        <div class="profile__text">
            <p class="profile__text-intro sm-font">Hello I'm</p>
            <div class="profile__text-name">
                <h1><span id="name">Zaw Hlaing Win</span></h1>
            </div>
            <p class="profile__text-job"><span id="job">Aesthetic Web Developer with primary focus on "Laravel + Vuejs"</span></p>

            <div class="profile__text-btns">
                <a href="#projects" class="main-btn">
                    View Projects &rarr;
                </a>
                <a href="{{ route('cv-download') }}" class="main-btn">
                    Download CV &rarr;
                </a>
            </div>
        </div>
    </div>

    <div class="scroll-down">
        <a href="#about" class="scroll-down__link">
            <span class="scroll-down__mouse"></span>
            <span class="scroll-down__text sm-font">Scroll Down</span>
        </a>
    </div>
</section>
