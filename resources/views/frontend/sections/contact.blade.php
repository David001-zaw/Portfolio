

<!-- ========== Contact Section ========== -->
<section class="contact" id="contact">
    <div class="main-title title-left contact__title" data-content="Contact">
        <div class="main-title__number">
            <p>05</p>
        </div>
        <div class="main-title__text">
            <p class="main-title__text-short">Get in Touch</p>
            <p class="main-title__text-long">How to contact me</p>
        </div>
    </div>
    <div class="contact__intro intro">
        <h1>နည်းပညာနဲ့ ပတ်သက်ပြီး ဆွေးနွေးချင်လျှင် ဆက်သွယ်နိုင်ပါတယ်။ <img src="frontend/images/gif/Phone.gif" alt="Phone" width="30" height="30"> </h1>
        <p>Don't like forms? Send me an <a href="mailto:davidzaw1111@gmail.com" class="line-btn">email 📧</a>.</p>
    </div>
    <div class="contact__container">
        <div class="contact-info">
            <div>
                <h2 class="contact-info__title">Contact Info</h2>
                <ul class="contact-info__list">
                    <li class="contact-info__list__item">
                        <span><img src="frontend/images/location.png" alt=""></span>
                        <span>
                            No.(15), ZabuTheingi Street, BoKanNyut, Thingangyun
                            <br>
                            Yangon, Myanmar(Burma) <br>
                            90017
                        </span>
                    </li>
                    <li class="contact-info__list__item">
                        <span><img src="frontend/images/mail.png" alt=""></span>
                        <span>davidzaw1111@gmail.com</span>
                    </li>
                    <li class="contact-info__list__item">
                        <span><img src="frontend/images/call.png" alt=""></span>
                        <span>09-789288363</span>
                    </li>
                </ul>
            </div>
            <ul class="contact-info__social__list">
                <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-github"></i></a></li>
                <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="contact-info__social__list__item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
        <div class="contact-form">
            <h2 class="contact-form__title">Feel free to drop me a line <img src="frontend/images/gif/Email.gif" alt="Email" width="50" height="50"></h2>
            <form action="{{ route('send.email') }}" method="POST" class="contact-form__box" autocomplete="off">
                @csrf

                @if (session('error'))
                    <div class="alert error input-box w100">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert success input-box w100">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <div class="input-box w50">
                    <input type="text" required class="input-box__item" name="name" value="{{ old('name') }}">
                    <label>Name</label>
                    <span class="focus-border"></span>
                </div>
                <div class="input-box w50">
                    <input type="text" required class="input-box__item" name="email" value="{{ old('email') }}">
                    <label>Email</label>
                    <span class="focus-border"></span>
                </div>
                <div class="input-box w100">
                    <input type="text" required class="input-box__item" name="subject" value="{{ old('subject') }}">
                    <label>Subject</label>
                    <span class="focus-border"></span>
                </div>
                <div class="input-box w100">
                    <textarea class="input-box__item" required name="message">{{ old('message') }}</textarea>
                    <label>Message</label>
                    <span class="focus-border"></span>
                </div>
                <button type="submit" class="main-btn">Send Message &rarr;</button>
            </form>
        </div>
    </div>
</section>
