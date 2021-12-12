@extends('layouts.publicBase')
@section('content')
<style>

body{
    background-color: #f8f8f8;
}

.post-card{
    box-shadow: 1px 1px 5px 0 rgb(1 1 1 / 5%);
    border-radius: 1rem;
    transition: transform 250ms ease, box-shadow 250ms ease, color 250ms ease;
}

.nav-shadow-lg{
    box-shadow: 0px 2px 4px rgb(46 41 51 / 8%), 0px 5px 10px rgb(71 63 79 / 16%);

}
.pagination-card{
    box-shadow: 1px 1px 5px 0 rgb(1 1 1 / 5%);
    border-radius: 1rem;
    transition: transform 250ms ease, box-shadow 250ms ease, color 250ms ease;
}
.img-rounded{
    border-radius: 0.5rem;
}
.post-card:hover{
    transform: translateY(-0.25rem);
    box-shadow: 0px 2px 4px rgb(46 41 51 / 8%), 0px 5px 10px rgb(71 63 79 / 16%);
}
.btn-cat{
    background-color: #e2e8f0;
    color: #718096;
    border-radius: 10px!important;
    padding: 5px 12px;
    transition: transform 250ms ease, box-shadow 250ms ease, color 250ms ease;

}


</style>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-9 mx-auto mb-5">
            <div class="" style="top: 100px; z-index: inherit;">
                <div class="recent ps-3 mb-5  text-theme" style="border-left: 5px solid lightgrey;">
                    <h4>Contact Us</h4>
                </div>
                <div class="row row-cols-sm-1 row-cols-md-4 row-cols-lg-4 row-cols-1 my-4 g-2">
                    <div class="col">
                        <div class="card border-0 post-card pb-0">
                            <div class="card-body pt-3 pb-0">
                                <div class="d-flex ">
                                    <span class="p-3 rounded btn-cat" style="height: 50px;"><i class="fa fa-phone-alt"></i></span>
                                    <div class="ms-3">
                                        <h5>Phone</h5>
                                        <p class="text-theme small" style="margin-top: -6px;">+91 7992298382</p>
                                        <a href="tel:+917992298382" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 post-card pb-0">
                            <div class="card-body pt-3 pb-0">
                                <div class="d-flex ">
                                    <span class="p-3 rounded btn-cat pt-2" style="height: 50px;"><i class="fab mt-2 fa-whatsapp"></i></span>
                                    <div class="ms-3">
                                        <h5>Whatsapp</h5>
                                        <p class="text-theme small" style="margin-top: -6px;">+91 7992298382</p>
                                        <a href="https://api.whatsapp.com/send?phone=+917992298382&amp;text=Hello!" target="_blank" class=" stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 post-card pb-0">
                            <div class="card-body pt-3 pb-0">
                                <div class="d-flex ">
                                    <span class="p-3 rounded btn-cat" style="height: 50px;"><i class="fa fa-envelope"></i></span>
                                    <div class="ms-3">
                                        <h5>Email</h5>
                                        <p class="text-theme small" style="margin-top: -6px;">ceo@indianewslive.co.in</p>
                                        <a href="mailto:+91ceo@indianewslive.co.in" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card border-0 post-card pb-0">
                            <div class="card-body pt-3 pb-0">
                                <div class="d-flex ">
                                    <span class="p-3 rounded btn-cat" style="height: 50px;"><i class="fa fa-location-arrow"></i></span>
                                    <div class="ms-3">
                                        <h5>Location</h5>
                                        <p class="text-theme small" style="margin-top: -6px;">Bigrahpur mod, Near Mithapur Bypass Rd, Patna, Bihar 800001</p>
                                        <a href="http://maps.google.com/?qBigrahpur mod, Near Mithapur Bypass Rd, Patna, Bihar 800001" target="_blank" class="stretched-link"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-0  post-card mb-4">
                    <div class="card-body pt-5">
                        <form action="https://indianewslive.co.in/page/contact-us" method="post">
                            <input type="hidden" name="_token" value="ZxfgdlYbBCEBglSkV4U9hwIn5q8VtjzKFjkHVTZE">                            <div class="row">
                                <div class="mb-3 col-lg">
                                    <label for="name" class="text-theme fw-bold">Name  <span class="text-danger">*</span>: </label>
                                    <input type="text" name="name" class="form-control " id="name" spellcheck="false" data-ms-editor="true">
                                </div>
                                <div class="mb-3 col-lg">
                                    <label for="company_name" class="text-theme fw-bold">Company Name : </label>
                                    <input type="text" name="company_name" class="form-control " id="company_name" spellcheck="false" data-ms-editor="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-lg">
                                    <label for="email" class="text-theme fw-bold">Email  <span class="text-danger">*</span>: </label>
                                    <input type="email" name="email" class="form-control " id="email">
                                </div>
                                <div class="mb-3 col-lg">
                                    <label for="phone" class="text-theme fw-bold">Phone  <span class="text-danger">*</span>: </label>
                                    <input type="number" name="phone" class="form-control " id="phone">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="text-theme fw-bold">Your Message <span class="text-danger">*</span></label>
                                <textarea name="message" id="message" cols="30" rows="9" class="form-control shadow-none " spellcheck="false" data-ms-editor="true"></textarea>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-cat float-end">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
