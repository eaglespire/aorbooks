{{--<div id="container">
    <div id="part1">
        <div id="companyinfo"> <a id="sitelink" href="#">BBbootstrap</a>
            <p id="title">Cool and Perfect Snippet code</p>
            <p id="detail">We create awesome code snippets that will help you in creating your own beautiful site. </p>
        </div>
        <div id="explore">
            <p id="txt1">Explore</p> <a class="link" href="#">Home</a> <a class="link" href="#">About</a> <a class="link" href="#">Snippet</a> <a class="link" href="#">Careers</a>
        </div>
        <div id="visit">
            <p id="txt2">Visit</p>
            <p class="text">Lincoln House </p>
            <p class="text">78 Bhulabhai Desai Road </p>
            <p class="text">Mumbai 400 026 </p>
            <p class="text">Phone: (22) 2363-3611 </p>
            <p class="text">Fax: (22) 2363-0350 </p>
        </div>
        <div id="legal">
            <p id="txt3">Legal</p> <a class="link1" href="#">Terms and Conditions</a> <a class="link1" href="#">Private Policy</a>
        </div>
        <div id="subscribe">
            <p id="txt4">Subscribe to US</p>
            <form> <input id="email" type="email" placeholder="Email"> </form> <a class="waves-effect waves-light btn">Subscribe</a>
            <p id="txt5">Connect With US</p> <i class="fab fa-facebook-square social fa-2x"></i> <i class="fab fa-linkedin social fa-2x"></i> <i class="fab fa-twitter-square social fa-2x"></i>
        </div>
    </div>
    <div id="part2">
        <p id="txt6"><i class="material-icons tiny"> copyright</i>copyright 2019 BBbootstrap - All right reserved</p>
    </div>
</div>--}}
<div style="background-color: #292929;">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-3">
                <div class="text-center">
                    <a  href="/" id="sitelink">{{ config('app.name') }}</a>
                    <div class="media">
                        <img src="{{ asset('storage/users/rene-descartess.JPG') }}" class="mr-3 rounded-circle" alt="..." width="64">
                        <div class="media-body">
                            <p id="detail">
                                The reading of all good books is like a conversation with the finest minds of past centuries.
                            </p>
                            <p id="title" class="font-italic mt-0">Rene Descartes</p>
                        </div>
                    </div>
                    {{--<p id="detail">
                        The most important decision we make is whether we believe we live in a friendly or hostile universe
                    </p>
                    <p id="title" class="font-italic">Albert Eistein</p>--}}


                </div>
            </div>
            <div class="col-md-2">
                <div class="text-center">
                    <p class="text-white font-weight-bold" style="font-size: 22px">Explore</p>
                    <a href="{{ url('/') }}" class="d-block  link1">Home</a>
                    <a href="#" class="d-block  link1">About</a>
                    <a href="{{ route('my-books') }}" class="d-block  link1">My Books</a>
                    @guest
                        <a href="{{ route('login') }}" class="d-block  link1">Login</a>
                    @endguest
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <p class="text-white font-weight-bold" style="font-size: 22px">Legal</p>
                    <a class="d-block link2"  href="{{ route('terms-and-conditions') }}">Terms and Conditions</a>
                    <a class="d-block link2" href="{{ route('privacy-policy') }}">Private Policy</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <p id="txt4">Subscribe to Our Newsletter</p>
                    <form class="">
                        <input class="form-control"  type="email" placeholder="Email">
                        <button class="btn btn-secondary mt-3" type="submit" disabled>Subscribe</button>
                    </form>
                    <p>Connect With US</p> <i class="fab fa-facebook-square social fa-2x"></i> <i class="fab fa-linkedin social fa-2x"></i> <i class="fab fa-twitter-square social fa-2x"></i>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: black;" class="p-2">
        <p class="text-center text-white m-2"><i class=""> &copy;copyright 2021 </i> {{ config('app.name') }} - All right reserved</p>
    </div>
</div>
