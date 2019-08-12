@extends('layouts.app')

@section('content')


<body background="assets/image/hình nền.jpg">
    <!-- <div class="container py "> -->
    <div class="row justify-content-center p-5 ">
        <div class="col-md-3 ">
            <div class="asks-first ">
                <div class="asks-first-circle car">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class="asks-first-info">
                    <h4>An Toàn - Nhanh chóng</h4>
                    <p>An toàn nhanh chóng tiện lợi- đáp ứng được mọi yêu cầu của
                        khách hàng. và luôn là người tin cậy của bạn.</p>
                </div>
            </div>
            <br>
            <div class="asks-first2 ">
                <div class="asks-first-circle car">
                    <i class="fa fa-hourglass-half" aria-hidden="true"></i>
                </div>
                <div class="asks-first-info">
                    <h4>Phương pháp tìm kiếm an toàn</h4>
                    <p> Giao diện thân thiện tương tác nhanh chóng, và luôn đem lại
                        chất lượng tốt nhất cho bạn.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header text-center my-2">
                    <h1>BẠN MUỐN?</h1>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card text-center">
                <div class="bounce "><span class="letter"><img src='./assets/image/logo.png' style="height:80px" class="img"></span><span class="letter">B</span><span class="letter">A</span><span class="letter">N</span><span class="letter">T</span><span class="letter">R</span><span class="letter">O</span></div>
                <h4>An Toàn - Nhanh chóng</h4>
                <h4>Phương pháp tìm kiếm an toàn </h4>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-between">
                <div class="col-md-6 col-ms-12 text-center py-5">
                    <a class="card-link a" href="{{ url('/') }}">
                        Tìm phòng trọ
                    </a>
                </div>
                <div class="col-md-6 col-ms-12 text-center py-5">
                    <div class=" ">
                        <a class="card-link a" href="">
                            Cho thuê phòng</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection