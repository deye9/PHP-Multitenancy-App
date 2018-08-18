@extends('tenants.layouts.landing')

@section('styles')
    <!-- <style>
        img {width:100%;}
    </style> -->
@stop

@section('content')

    <section class="py-5">

        <div class="container">

            <div class="row">

                <div class="col-md-8 py-5 border">

                    <h4 class="pb-4">Please fill with your details</h4>

                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="Full Name" name="Full Name" placeholder="Full Name" class="form-control" type="text">
                            </div>

                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input id="Mobile No." name="Mobile No." placeholder="Mobile No." class="form-control" required="required" type="text">
                            </div>
                            <div class="form-group col-md-6">

                                    <select id="inputState" class="form-control">
                                        <option selected>Choose ...</option>
                                        <option> New Buyer</option>
                                        <option> Auction</option>
                                        <option> Complaint</option>
                                        <option> Feedback</option>
                                    </select>
                            </div>
                            <div class="form-group col-md-12">
                                    <textarea id="comment" name="comment" cols="40" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <div class="form-group">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                    <label class="form-check-label" for="invalidCheck2">
                                        <small>By clicking Submit, you agree to our Terms & Conditions, Visitor Agreement and Privacy Policy.</small>
                                    </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-row">
                            <button type="button" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4 py-5 border bg-primary text-white text-center ">
                    <div class=" ">
                        <div class="card-body">
                            <img src="http://www.ansonika.com/mavia/img/registration_bg.svg" style="width:30%">
                            <h2 class="py-3">Registration</h2>
                            <p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
