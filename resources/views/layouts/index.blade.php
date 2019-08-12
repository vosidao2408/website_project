@extends('layouts.app')

@section('content')

<body background="assets/image/hình nền.jpg">
    <div class="container py ">
        <div class="row justify-content-center ">
            <div class="col-md-12 ">
                <div class="card ">
                    <div class="card-header text-center my-2">
                        <h1>BẠN MUỐN?</h1>
                    </div>
                </div>
            </div>
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
</body>
@endsection