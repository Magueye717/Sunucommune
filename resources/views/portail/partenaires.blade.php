<div class="container-fluid">

    <div class="section-title text-center pb-45" style="margin-top: 10px;">
        <h1 class="title"> <span>Nos <span>Partenaires</span></span></h1>

        <ul class="divider"><img src="assets/images/Sep.png" alt=" "></ul>

    </div>



    <div class="row brand-active">

        @foreach($partenaires as $partenaire)
        <div class="col-lg-4 col-md-6">
            <div class="brand-item text-center">
                <img src="{{ isset($partenaire->logo) ? asset('storage/commune/partenaires/' . $partenaire->logo) : asset('themev1/images/default.png') }}" alt="ss" width="400px" height="200px">

            </div>
        </div>

        @endforeach

        @if($partenaires->count() <= 0)
            <div class="mx-auto text-center">
                <h4  style="color:#12BDE3;">Aucun Partenaire</h4>
                <img src="{{ asset('assets/images/noData/noData4.png') }}" alt="Service Image">
            </div>
         @endif
    </div>

</div>
