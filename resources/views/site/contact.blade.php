@extends('main.mainsite')
@section('site')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <span class="brand-text font-weight-light">AdminLTE Contact Page</span>
        </a>
    </div>
</nav>
<!-- /.navbar -->

<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Contact Us </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5><i class="fas fa-map-marker-alt"></i> Address</h5>
                            <p>1234 Main Street, City, Country</p>
                            <h5><i class="fas fa-phone"></i> Phone</h5>
                            <p>+1 234 567 890</p>
                            <h5><i class="fas fa-envelope"></i> Email</h5>
                            <p>contact@example.com</p>
                        </div>
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Write your message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>

@endsection
