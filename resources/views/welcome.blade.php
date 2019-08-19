<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:300|Mali:300|Roboto+Slab:700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
        <link href="{{ asset('css/brands.css') }}" rel="stylesheet">   
        <link href="{{ asset('css/solid.css') }}" rel="stylesheet">
        <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/brands.js') }}"></script>
    <script src="{{ asset('js/solid.js') }}"></script>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1552863045-991883e6f59b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=889&q=80');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }
        #text {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .text-bait {
            font-family: 'Mali', cursive;
        }
        .modal-wrapper {
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(41, 171, 164, 0.8);
            visibility: hidden;
            opacity: 0;
            transition: all 0.25s ease-in-out;
        }
        .modal-wrapper.open {
            opacity: 1;
            visibility: visible;
        }
        .modal {
            width: 600px;
            height: 250px;
            display: block;
            margin: 50% 0 0 -300px;
            position: relative;
            top: 50%;
            left: 50%;
            background: #fff;
            opacity: 0;
            transition: all 0.5s ease-in-out;
            border: 2px solid #ff9933;
            border-radius: 10px;
        }
        .modal-wrapper.open .modal {
            margin-top: -200px;
            opacity: 1;
        }
        .head-modal {
            width: 100%;
            height: 40px;
            padding: 6px 10px;
            overflow: hidden;
            background: #ff9933;
        }
        .btn-mod {
          background-color: #ff9933;
          font-family: 'Roboto Slab', serif;
        }
        .btn-mod:hover {
          background-color: #ffb366;
        }
        .btn-close {
            font-size: 20px;
            display: block;
            float: right;
            color: #fff;
        }
        .btn-close:hover {
          color: #fff;
        }
        .content {
            padding: 5%;
        }
        .question {
            color: #ff9933;
            font-family: 'Roboto Slab', serif;
        }
        .button {
            color: #ff9933;
            font-size: 20px;
            font-family: 'Fira Sans Condensed', sans-serif;
            border: 2px solid #ff9933;
            border-radius: 8px;
            padding: 3px 5px 4px 5px;
        }
        .button:hover {
          color : white;
          background: #ff9933;
          text-decoration: none!important;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-end m-3">
        <a class="text-white lead" style="text-decoration:none" href="">Contact Us</a>
    </div>
    <div class="lead text-white" id="text">
        <p class="text-center text-bait">Bạn đang khá vất vả trong việc tìm trọ?</p>
        <p class="text-center text-bait">Bạn muốn cho thuê trọ nhưng lại chẳng biết nơi nào thích hợp và uy tín để đăng tin cho
            thuê?</p>
        <p class="text-center text-bait">Đến với chúng tôi để được giải quyết những vấn đề trên?</p>
        <a class="btn " href="#">click me</a>
        <button class="mx-auto d-block btn btn-mod btn-lg trigger" type="button">Bắt Đầu Nào</button>
    </div>

    <div class="modal-wrapper">
      <div class="modal">
        <div class="head-modal">
          <a class="btn-close trigger" href="#">
              <i class="fas fa-times"></i>
          </a>
        </div>
        <div class="content">
            <h3 class="text-center question">Chúng Tôi Có Thể Giúp Gì Cho Bạn?</h3>
            <div class="mt-5 d-flex justify-content-around">
              <a class="button" href="{{asset('home')}}">Đăng Tin Cho Thuê</a>
              <a class="button" href="{{asset('/index')}}">Giúp Bạn Tìm Trọ</a>
            </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script>
      $( document ).ready(function() {
  $('.trigger').on('click', function() {
     $('.modal-wrapper').toggleClass('open');
    $('.page-wrapper').toggleClass('blur-it');
     return false;
  });
});
    </script>
</body>

</html>