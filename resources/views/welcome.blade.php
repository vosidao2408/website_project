<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        #center{
            position: fixed;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
       body{
           background-image: url('https://images.unsplash.com/photo-1552863045-991883e6f59b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=889&q=80');
           background-repeat: no-repeat;
           background-attachment: fixed;
           background-size: cover;
           background-position: center;
       }
       #text{
           position:fixed;
           top:30%;
           left:22%;
       }
    </style>
</head>
  <body>
      <div class="d-flex justify-content-end m-3">
          <a class="text-white lead" style="text-decoration:none" href="">Contact Us</a>
      </div>
      <div class="text-center lead text-white" id="text">
         <p>Bạn đang khá vất vả trong việc tìm trọ?</p>
         <p>Bạn muốn cho thuê trọ nhưng lại chẳng biết nơi nào thích hợp và uy tín để đăng tin cho thuê?</p>
         <p>Đến với chúng tôi để được giải quyết những vấn đề trên?</p> 
      </div>
      <button id="center" class="btn btn-warning btn-lg" type="button" data-toggle="modal" data-target="#exampleModal">Bắt Đầu Nào</button>

      <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
              <div class="modal-content bg-success">
                <div class="modal-body">
                  <h3 class="text-center text-white">Chúng Tôi Có Thể Giúp Gì Cho Bạn?</h3>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                <a href="{{route('home')}}" role="button" class="btn btn-warning">Đăng Tin Cho Thuê</a>
                <a href="{{asset('/index')}}" role="button" class="btn btn-warning">Giúp Bạn Tìm Trọ</a>
                </div>
              </div>
            </div>
          </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>