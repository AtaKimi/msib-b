@extends('layouts.guest')

@section('content')
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading font-family-open-sans ">
                        <h1 class="fw-bold">Contact Me</h1>
                        <span class="subheading">Have questions? I have answers.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p class="fs-5">Want to get in touch? Fill out the form below to send me a message and I will get back
                        to you as soon
                        as possible!</p>
                    <div class="my-5">
                        <form id="contactForm">
                            <div class="form-floating mb-2">
                                <input class="form-control border-0 border-bottom border-2 rounded-0" id="name"
                                    type="text" placeholder="Enter your name..." />
                                <label for="name" class="text-black-50 fs-4">Name</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control border-0 border-bottom border-2 rounded-0" id="email"
                                    type="email" placeholder="Enter your email..." />
                                <label for="email" class="text-black-50 fs-4">Email address</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control border-0 border-bottom border-2 rounded-0" id="phone"
                                    type="text" placeholder="Enter your email..." />
                                <label for="phone" class="text-black-50 fs-4">Phone number</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control border-0 border-bottom border-2 rounded-0" id="message"
                                    placeholder="Enter your message here..." style="height: 12rem"></textarea>
                                <label for="message" class="text-black-50 fs-4">Message</label>
                            </div>
                            <div class="mt-4">
                                <button class="btn bg-purple text-uppercase text-white fw-bold py-3 px-4" id="submitButton"
                                type="submit" style="background-color: #0085a1">Send</button>
                            </div>

                    </div>

                    </form>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
