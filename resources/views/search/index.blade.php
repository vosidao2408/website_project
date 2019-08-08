<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body style="background-color:#F0FFFF;">
    <h3 class="text-center mt-3 ">Welcome to Bantro.vn</h3>
    <div class="container-fluid mt-3 " >
      <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          <div class="row">
            <div class="col-12">
            <form action="{{route('search')}}" method="get">
              <div class="input-group">
                  <input type="search" name="search" class="form-control" placeholder="Input Address Or District To Search"/>
                  <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary">Click To Search</button>
                  </span>
              </div>
                  
              </form>
                   
              </div> 
            </div>
              <div class="row">
                  <div class="col-12">
                    @foreach($articles as $row)
                    <div class="box-sizing border my-3 bg-light">
                      <a class="" href="#" style="text-decoration: none">
                      <div class="m-2 d-flex">
                      <img src="{{$row->user->image_path}}" class="rounded-circle bg-primary" alt="" style="width:30px;height:30px ">
                      <span class="mx-2 mt-1 text-capitalize text-primary"><strong>{{$row->user->name}}</strong></span>
                      </div>                              
                            <div class="ml-4 text-dark overflow-hidden">{!!$row->content!!}</div>
                          <p class="ml-4 text-muted"><small>Address: {{$row->address}}</small></p>
                        </a>
                     </div>
                    @endforeach
                    @if (session('status'))
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title text-warning">Data Not Found</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            
                            <!-- Modal body -->
                            <div class="modal-body">
                                <p class="text-success">Data Not Found, Please Input Another Address Or District To Search</p>
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                      
                     
                     @endif 
                  </div>
              </div>
            </div>
            
          
        <div class="d-flex justify-content-center align-items-center">{!! $articles->links() !!}</div>
       
       
        <div class="col-2"></div>
        </div>       

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script>
    $('#myModal').modal('show')
   </script>
