@extends('layouts.app')
@section('title', 'Beranda')

@section('hero')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2>Welcome to</h2>
                    <h2><span>Citarum Water Guardian</span></h2>
                    <p>Sistem monitoring kualitas Air Sungai Citarum berdasarkan 4 parameter yaitu pH, Turbidity, Temperature, dan TDS.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                        <a href="{{ route('beranda') }}#about" class="btn-get-started">Get Started</a>
                        <a href="{{ route('monitoring') }}" class="btn-get-started">Monitoring</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ ('assets/landing') }}/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

        <div class="icon-boxes position-relative">
            <div class="container position-relative">
                <div class="row gy-4 mt-5">

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-activity"></i></div>
                            <h4 class="title"><a class="stretched-link">Data pH</a></h4>
                        </div>
                    </div><!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-thermometer-half"></i></div>
                            <h4 class="title"><a class="stretched-link">Data Temperature</a></h4>
                        </div>
                    </div><!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-bar-chart"></i></div>
                            <h4 class="title"><a class="stretched-link">Data Turbidity</a></h4>
                        </div>
                    </div><!--End Icon Box -->

                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-data-fill"></i></div>
                            <h4 class="title"><a class="stretched-link">Data TDS</a></h4>
                        </div>
                    </div><!--End Icon Box -->

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

@section('content')

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p>Sistem Monitoring Air Sungai Citarum</p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-6">
                    <img src="{{ asset('sungai_citarum.jpeg') }}" class="img-fluid rounded-4 mb-2" alt="Sungai Citarum">
                    <p class="text-secondary">Sungai Citarum (Foto: ANTARA FOTO/RAISAN AL FARISI)</small>
                </div>
                <div class="col-lg-6">
                    <div class="content ps-0 ps-lg-5">
                        <p>
                            Citarum Water Guardian adalah sebuah sistem inovatif yang telah dirancang dan dikembangkan dengan tujuan utama untuk memantau kualitas air Sungai Citarum secara real-time. Sistem ini memanfaatkan teknologi Arduino R4 Wifi dengan beberapa sensor yaitu:
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i> Sensor pH</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sensor Temperature</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sensor Turbidity</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sensor TDS</li>
                        </ul>
                        <p>
                            Citarum Water Guardian bukan hanya sekadar alat pemantauan, tetapi juga merupakan investasi dalam keberlanjutan dan perlindungan ekosistem Sungai Citarum, serta peningkatan kesadaran masyarakat tentang pentingnya menjaga sumber daya air yang sangat berharga ini. Sistem ini juga membantu program
                            <a href="https://citarumharum.jabarprov.go.id/">Citarum Harum</a> dari Pemrov Jawa Barat.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="services" class="services sections-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Our Benefits</h2>
                <p>Beberapa manfaat dan fungsi utama dari sistem Citarum Water Guardian</p>
            </div>
            <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <h3>Pemantauan Kualitas Air</h3>
                        <p>Sistem ini mampu memberikan data secara real-time tentang kualitas air Sungai Citarum. Hal ini memungkinkan pengambilan tindakan segera ketika terdeteksi perubahan signifikan dalam parameter air, seperti peningkatan tingkat polusi.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <h3>Peringatan Dini</h3>
                        <p>itarum Water Guardian dapat memberikan peringatan dini jika terjadi pencemaran atau peningkatan tingkat polusi dalam sungai. Ini memungkinkan pihak berwenang untuk merespons cepat dan mengidentifikasi sumber pencemaran.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <h3>Pengelolaan SDA</h3>
                        <p>Dengan pemahaman yang lebih baik tentang kualitas air Sungai Citarum, pengelolaan sumber daya air dapat ditingkatkan. Hal ini berkontribusi pada upaya pelestarian lingkungan dan pengelolaan yang berkelanjutan.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>
                        <h3>Data untuk Riset</h3>
                        <p>Data yang dikumpulkan oleh Citarum Water Guardian dapat digunakan untuk penelitian ilmiah dan pemahaman yang lebih dalam tentang ekosistem Sungai Citarum. Ini dapat membantu ilmuwan dan peneliti dalam upaya konservasi dan pemulihan ekosistem.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <h3>Keterlibatan Masyarakat</h3>
                        <p>Dengan akses publik ke data kualitas air yang transparan, masyarakat juga dapat berperan dalam pemantauan dan pelestarian Sungai Citarum. Masyarakat dapat lebih sadar akan pentingnya menjaga lingkungan dan ikut serta dalam upaya menjaga kualitas air sungai.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <h3>Pembelajaran & Pendidikan</h3>
                        <p>Citarum Water Guardian juga dapat digunakan dalam konteks pendidikan dan pembelajaran. Ini memberikan kesempatan bagi siswa dan masyarakat umum untuk memahami pentingnya kualitas air dan dampaknya pada lingkungan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Testimonials</h2>
                <p>Beberapa testimoni dari responden terkait Sistem Citarum Water Guardian</p>
            </div>
            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('ava.png') }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Yogi Harta</h3>
                                        <h4>Cijerah</h4>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Sistem monitoring ini bagus karena memang beberapa dari masyarakat Bandung masih memanfaatkan sungai Citarum ini. Dengan adanya sistem monitoring ini, setidaknya sungai Citarum jadi lebih diperhatikan dan itu juga bagus jika memang ingin meningkatkan kualitas air nya.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('ava.png') }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Dila Indra</h3>
                                        <h4>Sukamiskin</h4>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Sangat bagus ketika ada pergerakan seperti ini karena pastinya akan mempermudah kita dalam mengetahui keadaan air. Tentunya untuk mengetahui kualitas air dan menjadi tahu apakah kualitas air berbahaya atau tidak. Dan jika kualitas air baik maka seharusnya masyarakat pun akan termotivasi untuk menjaga kualitas air di sungai Citarum.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('ava.png') }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Satria Rajendra</h3>
                                        <h4>Taman Cibaduyut Indah</h4>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Manfaat yang didapatkan dari menggunakan alat ini sangat nyata yaitu mampu membantu mengontrol kualitas air sungai Citarum. Menurut saya, penggunaan alat berbasis Arduino untuk memonitor kualitas air Sungai Citarum memiliki manfaat konkret yang sangat berharga dalam menjaga kualitas air di sungai Citarum ini.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('ava.png') }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Imtiyaz Irbatunnisa</h3>
                                        <h4>Gegerkalong</h4>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Dapat sangat membantu petugas Citarum Harum untuk memaksimalkan maintenance kualitas air sungainya karena menggunakan sistem monitoring ini. Monitoring yang dilakukan secara berkala terhadap sungai Citarum dapat membantu mengetahui kapan terjadinya penurunan kualitas air sungai sehingga dapat dilakukan tindakan preventif dengan cepat sebelum kerusakan air terjadi.
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-item">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('ava.png') }}" class="testimonial-img flex-shrink-0" alt="">
                                    <div>
                                        <h3>Tiara Nur Azizah</h3>
                                        <h4>Setiabudi</h4>
                                    </div>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    Menurut saya, salah satu manfaat konkret dari penggunaan sistem monitoring ini adalah dapat membantu mewujudkan program Citarum Harum. Selain itu, saya pikir sistem monitoring ini juga dapat meningkatkan kesadaran masyarakat mengenai kualitas air sungai Citarum
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <section id="team" class="team sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Our Team</h2>
            </div>

            <div class="row gy-4">

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-1.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">Dr. Eka Cahya Prima, S.Pd., M.T.</h4>
                        <span>Pembimbing</span>
                        <div class="social">
                            <a href="https://www.instagram.com" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-2.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">Winata Tegar Saputra</h4>
                        <span>Ketua</span>
                        <div class="social">
                            <a href="https://www.instagram.com/winatategar/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-3.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">Nady Artan Destanto</h4>
                        <span>Anggota</span>
                        <div class="social">
                            <a href="https://www.instagram.com/nady.artan/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-4.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">M. Cahyana Bintang F.</h4>
                        <span>Anggota</span>
                        <div class="social">
                            <a href="https://www.instagram.com/nady.artan/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-5.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">Azzhara Siti Hadjar</h4>
                        <span>Anggota</span>
                        <div class="social">
                            <a href="https://www.instagram.com/azzahraasth/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-xl-2 col-md-6 d-flex mx-auto" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <img src="{{ ('assets/landing') }}/img/team/team-6.jpg" class="img-fluid" alt="">
                        <h4 class="mb-2">Muhammad Fahru Rozi</h4>
                        <span>Anggota</span>
                        <div class="social">
                            <a href="https://www.instagram.com/_muhammadfahru/" target="_blank"><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>
    </section>

    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="content px-xl-5">
                        <h3>Frequently Asked <strong>Questions</strong></h3>
                        <p>
                            Dirancang untuk memberikan jawaban-jawaban yang sudah siap dan informatif untuk pertanyaan-pertanyaan yang paling umum.
                        </p>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                                    <span class="num">1.</span>
                                    Apa saja parameter yang digunakan?
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Sistem ini memanfaatkan teknologi untuk mengukur dan merekam parameter-parameter kritis seperti pH, kekeruhan (turbidity), suhu, dan total dissolved solids (TDS).
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                                    <span class="num">2.</span>
                                    Apa standar air sungai bersih?
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Suhu = 22°C – 28°C<br>
                                    pH = 6.5 - 7.5<br>
                                    TDS = maksimum 500 PPM<br>
                                    Turbidity = 5-25 NTU<br>
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                                    <span class="num">3.</span>
                                    Apa standar air sungai tercemar di alat ini?
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Bersih (semua parameter sesuai standar)</li>
                                        <li>Tercemar kecil (satu ga sesuai parameter)</li>
                                        <li>Tercemar sedang (dua-tiga ga sesuai parameter)</li>
                                        <li>Tercemar berat (semua ga sesuai parameter)</li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                                    <span class="num">4.</span>
                                    Apakah data dari sistem ini bisa diakses siapa saja?
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Bisa, data nya akan tersedia untuk masyarakat luas melalui website ini.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                                    <span class="num">5.</span>
                                    Apakah data dari sistem ini realtime?
                                </button>
                            </h3>
                            <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Ya, data yang ditampilkan pada website ini adalah data realtime yang dikirim oleh sensor yang terpasang.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                    </div>

                </div>
            </div>

        </div>
    </section>

    <section id="contact" class="contact sections-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Feedback</h2>
                <p>Kami sangat menghargai masukan dan komentar dari Anda, dan kami berusaha untuk terus memperbaiki sistem kami berdasarkan umpan balik.</p>
            </div>

            <div class="row gx-lg-0 gy-4">

                <div class="col-lg-4">

                    <div class="info-container d-flex flex-column align-items-center justify-content-center">
                        <div class="info-item d-flex">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h4>Location</h4>
                                <p>Jl. Dr. Setiabudi No.229, Jawa Barat 40154</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h4>Email</h4>
                                <p>citarumwaterguardian@gmail.com </p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-instagram flex-shrink-0"></i>
                            <div>
                                <h4>Instagram</h4>
                                <p>citarumwaterguardian</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex">
                            <i class="bi bi-globe2 flex-shrink-0"></i>
                            <div>
                                <h4>Website</h4>
                                <p>citarumwaterguardian.com</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>

                </div>

                <div class="col-lg-8">
                    <form action="{{ route('feedback.store') }}" method="POST" class="php-email-form">
                        @method('POST')
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                        </div>
                        <div class="text-center"><button type="submit">Kirim</button></div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section>

@endsection
