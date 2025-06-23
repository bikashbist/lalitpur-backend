<!doctype html>
<html lang="en">


@include('users.layout.head')

<body>
    @include('users.layout.header')

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer__logo d-flex gap-3 align-items-center mb-lg-4 mb-3">
                <div class="footer__logo-img">

                <img src="{{asset('tourism/images/cropped-logo.png')}}" alt="">

                </div>
                <div class="footer__logo-text">


                    <h4>पर्यटन कार्यालय ललितपुर</h4>


                    <p>पुल्चोक, ललितपुर</p>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-section">
                        <h6>ललितपुर महानगरपालिका</h6>
                        <ul>
                            <li>पुल्चोक, ललितपुर</li>
                            <li>बागमती प्रदेश, नेपाल</li>
                            <li>Email: info@lalitpur.gov.np</li>
                            <li>Phone: +977-01-5523421, 5523422</li>
                            <li>Fax: +977-01-5523423</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-section">
                        <h6>महत्वपूर्ण लिंक</h6>
                        <ul>
                            <li><a href="#">नेपाल सरकार</a></li>
                            <li><a href="#">बागमती प्रदेश सरकार</a></li>
                            <li><a href="#">युनेस्को नेपाल</a></li>
                            <li><a href="#">पुरातत्व विभाग</a></li>
                            <li><a href="#">स्थानीय विकास मन्त्रालय</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-section">
                        <h6>फेसबुक पेज</h6>
                        <ul>
                            <li><a href="#">ललितपुर महानगरपालिका</a></li>
                        </ul>
                        <h6 class="mt-3">सम्बन्धित लिंक</h6>
                        <ul>
                            <li><a href="#">सूचना</a></li>
                            <li><a href="#">प्रकाशन</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-section">
                        <h6>सेवा तथा सुविधा</h6>
                        <ul>
                            <li><a href="#">नागरिक सेवा</a></li>
                            <li><a href="#">आवेदन फाराम</a></li>
                            <li><a href="#">नियमावली</a></li>
                            <li><a href="#">सिटिजन चार्टर</a></li>
                            <li><a href="#">अन्तिम अद्यावधिक: जुन ४, २०२५</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>कपिराइट © २०२५, ललितपुर महानगरपालिका. सर्वाधिकार सुरक्षित. | <a href="#" class="text-white">गोपनीयता
                        नीति</a> | <a href="#" class="text-white">अन्तिम अद्यावधिक: जुन ४, २०२५</a></p>
                <p>ललितपुर: कला र संस्कृतिको नगर, युनेस्को विश्व सम्पदा स्थल</p>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        // Initialize Fancybox
        Fancybox.bind("[data-fancybox]", {
            // Options can go here
        });
    </script>
    <script>
        // Initialize Bootstrap tabs
        var triggerTabList = [].slice.call(document.querySelectorAll('#newsTabs a'))
        triggerTabList.forEach(function (triggerEl) {
            var tabTrigger = new bootstrap.Tab(triggerEl)
            triggerEl.addEventListener('click', function (event) {
                event.preventDefault()
                tabTrigger.show()
            })
        })

        // News ticker animation
        const ticker = document.querySelector('.ticker-content');
        if (ticker) {
            ticker.style.animationDuration = '30s';
        }

        $(document).ready(function () {
            $("#heroCarousel").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                nav: true,
                dots: true,
                navText: ['<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>'
                ],
                responsive: {
                    0: {
                        nav: false
                    },
                    768: {
                        nav: true
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            var owl = $(".owl-carousel");
            owl.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                margin: 10,
                nav: true,
                navText: ['<button class="btn btn-nav">&lt;</button>',
                    '<button class="btn btn-nav">&gt;</button>'
                ],
                dots: false
            });
        });
    </script>

    <script>
        // This ensures dropdowns work on touch devices
        document.addEventListener('DOMContentLoaded', function () {
            var dropdowns = document.querySelectorAll('.dropdown');

            dropdowns.forEach(function (dropdown) {
                dropdown.addEventListener('mouseenter', function () {
                    this.classList.add('show');
                    this.querySelector('.dropdown-menu').classList.add('show');
                });

                dropdown.addEventListener('mouseleave', function () {
                    this.classList.remove('show');
                    this.querySelector('.dropdown-menu').classList.remove('show');
                });
            });
        });
    </script>
    

</body>

</html>
