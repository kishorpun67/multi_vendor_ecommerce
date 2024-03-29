<footer class="footer">
    <div class="container">
        <!-- Outer-Footer -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                For special offers and other discount information
            </h6>
            <h1>
                Subscribe to our Newsletter
            </h1>
            <p>
                Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.
            </p>
            <form class="newsletter-form" action="javascript:">
                <label class="sr-only" for="newsletter-field">Enter your Email</label>
                <input type="text" id="subscriber_name" name="subscriber_name" placeholder="Your Email Address" required>
                <button type="button" class="button" onclick="addSubscriber()">SUBMIT</button>
            </form>
        </div>
        <!-- Outer-Footer /- -->
        <!-- Mid-Footer -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPANY</h6>
                        <ul>
                            <li>
                                <a href="{{route('about')}}">About Us</a>
                            </li>
                            <li>
                                <a href="{{route('contact')}}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{route('faq')}}">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>ACCOUNT</h6>
                        <ul>
                            <li>
                                <a href="{{route('account')}}">My Account</a>
                            </li>
                   
                            <li>
                                <a href="{{route('orders')}}">My Orders</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Contact</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>Kishor Pun Magar</span>
                            </li>
                            <li>
                                <a href="tel:+111-222-333">
                                    <i class="fas fa-phone u-s-m-r-9"></i>
                                    <span>+111-222-333</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@sitemakers.in">
                                    <i class="fas fa-envelope u-s-m-r-9"></i>
                                    <span>
                                        kishorpun55@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mid-Footer /- -->
        <!-- Bottom-Footer -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; 2022
                <a  rel="nofollow" href="#">Multi Vendor e-commere</a> | All Right Reserved</p>
        </div>
    </div>
    <!-- Bottom-Footer /- -->
</footer>