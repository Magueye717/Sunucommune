<section class="our-team text-center   mt-50">
        <div class="container-xl projet">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                    <div class="section-title text-center">
                        <a href="{{ route('portail.team')}}"> 
                        <h7 style="font-size: 25px;"> <span>Cabinet du <span>Maire</span></span></h7>
                        </a>
                        <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        
                        <p style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ab
                            fugiat iure numquam, consectetur adipisicing elit. Odio ab fugiat iure numquam, recusandae
                            amet excepturi at quaerat similique ratione consectetur adipisicing elit. Odio ab fugiat
                            iure numquam, recusandae amet excepturi at quaerat similique ratione recusandae amet
                            excepturi at quaerat similique ratione quod molestiae pariatur, cupiditate quis illum
                            aliquam debitis? </p>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-7 col-md-8">
                    <div class="our-team-inner three-item-carousel mb-0 ">
                        <div class="our-team-box">
                            <div class="team-img">
                            <img src="assets/images/team/team-1.png" style="display: inline;" alt="Team Member">
                            </div>
                            <h3>Stephen Banach</h3>
                            <span>Managing Director</span>
                            <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                            <div class="social-style-one">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
<section class="our-team text-center   mt-50">
    <div class="container-xl projet">
        <div class="row">
            <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                <div class="section-title text-center">
                    <h7 style="font-size: 25px; "> <span>Secretariat <span>Municipale</span></span></h7>
                    <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
    
                    <p style="font-size: 14px;">
                        @foreach ($equipeMunicipales->where('libelle', 'Secretariat municipale') as $equipe)
                        {{ $equipe->description }}
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xl-9 col-lg-7 col-md-8">
                <div class="our-team-inner three-item-carousel mb-0 ">

                    @foreach($membreCabinets as $membreCabinet)
                @if($membreCabinet->equipeMunicipale->libelle==='Secretariat municipale')
                    <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our-team text-center   mt-50">
    <div class="container-xl projet">
        <div class="row">
            <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                <div class="section-title text-center">
                    <h7 style="font-size: 25px; "> <span>Conseil <span>Municipale</span></span></h7>
                    <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        
                    <p style="font-size: 14px;">
                        @foreach ($equipeMunicipales->where('libelle', 'Conseil Municipal') as $equipe)
                        {{ $equipe->description }}
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="col-xl-9 col-lg-7 col-md-8">
                <div class="our-team-inner three-item-carousel mb-0 ">
                    @foreach($membreCabinets as $membreCabinet)
                @if($membreCabinet->equipeMunicipale->libelle==='Conseil Municipal')
                    <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-1.png" alt="Team Member">
                        </div>
                        <h3>Stephen Banach</h3>
                        <span>Managing Director</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-3.png" alt="Team Member">
                        </div>
                        <h3>Courtney M. Smith</h3>
                        <span>Area Officer</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-4.png" alt="Team Member">
                        </div>
                        <h3>Kenneth Hatchett</h3>
                        <span>Technician</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="our-team text-center  rmb-90 mt-50">
        <div class="container-xl projet">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                    <div class="section-title text-center">
                        <h7 style="font-size: 25px; "> <span>Secretariat <span>Municipale</span></span></h7>
                        <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        
                        <p style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ab
                            fugiat iure numquam, consectetur adipisicing elit. Odio ab fugiat iure numquam, recusandae
                            amet excepturi at quaerat similique ratione consectetur adipisicing elit. Odio ab fugiat
                            iure numquam, recusandae amet excepturi at quaerat similique ratione recusandae amet
                            excepturi at quaerat similique ratione quod molestiae pariatur, cupiditate quis illum
                            aliquam debitis? </p>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-7 col-md-8">
                    <div class="our-team-inner three-item-carousel">
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-1.png" style="display: inline;" alt="Team Member">
                        </div>
                        <h3>Stephen Banach</h3>
                        <span>Managing Director</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-3.png" alt="Team Member">
                        </div>
                        <h3>Courtney M. Smith</h3>
                        <span>Area Officer</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-4.png" alt="Team Member">
                        </div>
                        <h3>Kenneth Hatchett</h3>
                        <span>Technician</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-1.png" alt="Team Member">
                        </div>
                        <h3>Stephen Banach</h3>
                        <span>Managing Director</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-3.png" alt="Team Member">
                        </div>
                        <h3>Courtney M. Smith</h3>
                        <span>Area Officer</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-4.png" alt="Team Member">
                        </div>
                        <h3>Kenneth Hatchett</h3>
                        <span>Technician</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="our-team text-center  rmb-90 mt-50">
        <div class="container-xl projet">
            <div class="row">
                <div class="col-xl-3 col-lg-5 col-md-4 mt-50">
                    <div class="section-title text-center">
                        <h7 style="font-size: 25px; "><span>Conseil <span>Municipale</span></span></h7>
                        <ul class="divider"><img src="assets/images/Sep.png" alt=""></ul>
        
                        <p style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ab
                            fugiat iure numquam, consectetur adipisicing elit. Odio ab fugiat iure numquam, recusandae
                            amet excepturi at quaerat similique ratione consectetur adipisicing elit. Odio ab fugiat
                            iure numquam, recusandae amet excepturi at quaerat similique ratione recusandae amet
                            excepturi at quaerat similique ratione quod molestiae pariatur, cupiditate quis illum
                            aliquam debitis? </p>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-7 col-md-8">
                    <div class="our-team-inner three-item-carousel">
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-1.png" style="display: inline;" alt="Team Member">
                        </div>
                        <h3>Stephen Banach</h3>
                        <span>Managing Director</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-3.png" alt="Team Member">
                        </div>
                        <h3>Courtney M. Smith</h3>
                        <span>Area Officer</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-4.png" alt="Team Member">
                        </div>
                        <h3>Kenneth Hatchett</h3>
                        <span>Technician</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-1.png" alt="Team Member">
                        </div>
                        <h3>Stephen Banach</h3>
                        <span>Managing Director</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-2.png" alt="Team Member">
                        </div>
                        <h3>Harvey R. Ham</h3>
                        <span>Manager</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-3.png" alt="Team Member">
                        </div>
                        <h3>Courtney M. Smith</h3>
                        <span>Area Officer</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                        <div class="our-team-box">
                        <div class="team-img">
                        <img src="assets/images/team/team-4.png" alt="Team Member">
                        </div>
                        <h3>Kenneth Hatchett</h3>
                        <span>Technician</span>
                        <p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper</p>
                        <div class="social-style-one">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-google"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
