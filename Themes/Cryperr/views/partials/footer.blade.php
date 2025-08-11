@php
    $footer_logo = setting('core::logo_footer') ? setting('core::logo_footer') : Theme::url('images/acuasafe/footer-logo.png');
    $site_description = setting('core::site-description') ? setting('core::site-description') : 'Cryperr Trading';
    $site_name = setting('core::site-name') ? setting('core::site-name') : 'Cryperr Trading';
@endphp
<footer class="main-footer">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-12.png') }});">
        </div>
        <div class="pattern-2" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-13.png') }});">
        </div>
        <div class="pattern-3" style="background-image: url({{ Theme::url('images/acuasafe/shape/shape-14.png') }});">
        </div>
    </div>
    <div class="auto-container">
        <div class="widget-section">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="{{ route('homepage') }}"><img style="max-width: 80%;" src="{{ $footer_logo }}"
                                    alt=""></a></figure>
                        <div class="schedule-box">
                            <h3> {{ $site_name }} </h3>
                            <ul class="list clearfix">
                                {!! nl2br(e($site_description)) !!}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget ml-70">
                        <div class="widget-title">
                            {{ __('footer.address') }}
                        </div>
                        <div class="widget-content">
                            <ul class="info-list clearfix">
                                @menu('footer_address', 'footer_menu')
                                {{-- <li><i class="fal fa-map-marker-alt"></i>Flat 20, Reynolds Neck, FV77 8WS</li>
                              <li><i class="fal fa-phone"></i>Call Us: <a href="tel:3336660001">333-666-0001</a></li>
                              <li><i class="fal fa-envelope-open-text"></i><a href="mailto:info@example.com">info@example.com</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 footer-column">
                    <div class="footer-widget links-widget ml-70">
                        <div class="widget-title">
                            {{ __('footer.terms') }}
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                @menu('footer_3', 'footer_menu')
                                {{-- <li><a href="index.html">About Company</a></li>
                            <li><a href="index.html">Services</a></li>
                            <li><a href="index.html">How It Works</a></li>
                            <li><a href="index.html">Our Blog</a></li>
                            <li><a href="index.html">Contact Us</a></li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                  <div class="footer-widget subscribe-widget">
                      <div class="widget-title">
                          <h4>Subscribe</h4>
                      </div>
                      <div class="widget-content">
                          <p>Lorem ipsum dolor sit amet, consect adipisicing elit sed do eiusmod.</p>
                          <div class="form-inner">
                              <form action="contact.html" method="post">
                                  <div class="form-group">
                                      <input type="email" name="email" placeholder="Your Email" required="">
                                      <button type="submit"><i class="far fa-long-arrow-alt-right"></i></button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div> --}}
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="bottom-inner">
                <div class="copyright">
                    <p><a href="#">{{ $site_name }}</a> &copy; 2024 All Right Reserved</p>
                </div>
                <ul class="social-links clearfix">
                    @if (themeOption('cryperr::facebook') != null)
                        <li><a href="{{ themeOption('cryperr::facebook') }}"><i class="fab fa-facebook-f"></i></a></li>
                    @endif
                    @if (themeOption('cryperr::twitter') != null)
                        <li><a href="{{ themeOption('cryperr::twitter') }}"><i class="fab fa-twitter"></i></a></li>
                    @endif
                </ul>
                <ul class="footer-nav clearfix">
                    @menu('footer_2', 'footer_menu')
                    {{-- <li><a href="index.html">Terms of Service</a></li>
                  <li><a href="index.html">Privacy Policy</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</footer>
