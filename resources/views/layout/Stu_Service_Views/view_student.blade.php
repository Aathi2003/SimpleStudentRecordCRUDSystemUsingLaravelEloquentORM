@extends('layout.layout')
@section('main')

<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    table,td,th{
        border: solid;
        text-align: center;
    }
    th{
        padding: 2rem;
    }
    #edibtn{
        border: none;
        background: none
    }
    #alert_done{
        display: none;
    }
    .stu_lis_tit{
        background-color:rgb(160, 229, 191);
    }
    #stu_tit_nme{
        font-family:sans-serif;
    }

</style>


<div class="container">
    <div class="stu_lis_tit mt-5">

        <h1 class="text-center" id="stu_tit_nme">Students Records</h1>

    </div>
    @if (session('delete'))

       <div class="alert alert-danger " role="alert">
         {{session('delete')}}
       </div>

    @endif

    <div class="alert alert-warning text-center" id="alert_done" role="alert">
        <h6 class="text-center" id="mod_info"><strong>Warning : </strong></h6>
     </div>

    <table class="w-100 mb-3">
        <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>phone</th>
        <th>email</th>
        <th>address</th>
        <th>photos</th>
        <th colspan="2">Operations</th>
        </tr>

            @foreach ($alldatas as $data)
                   <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->age}}</td>
                    <td>{{$data->mobile}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->address}}</td>
                    <td><img src="picture\{{$data->image}}" width="70px" height="120px" alt="{{$data->name}}"></td>
                    <td><button  data-bs-toggle="modal" data-bs-target="#editModal" onclick="edibtn('{{$data->email}}')" id="edibtn"><img src="icons\edit.svg" width="30px" height="30px" alt="edit"></button></td>
                    <td><a href="{{url('/trash')}}?email={{$data->email}}"><img src="icons\delete.svg" width="30px" height="30px" alt="delete"></a></td>
                   </tr>

            @endforeach
    </table>
    {{$alldatas->links()}}
</div>



<!-- Modal -->

<div class="modal fade" id="editModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center" id="exampleModalLabel">Edit Student Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

    <form id="form" method="POST" enctype="multipart/form-data">
      <div class="row">
         <div class="col-lg-6 col-sm-12">
     <label for="name">Student name</label>
     <input type="text" name="name" id="name" class="form-control py-3 " required>
        </div>
        <div class="col-lg-6 col-sm-12">
     <label for="age">Student Age</label>
     <input type="text" name="age" id="age" class="form-control py-3 " required>
       </div>
      </div>
      <div class="row mt-lg-3">
         <div class="col-lg-6 col-sm-12">
     <label for="mobile">Mobile</label>
     <input type="text" name="mobile" id="mobile" class="form-control py-3 " required>
        </div>
        <div class="col-lg-6 col-sm-12 ">
     <label for="email">Email</label>
     <input type="text" name="email" id="email" class="form-control py-3 " disabled required>
       </div>
       <div class="row mt-lg-3 mx-auto">
         <label for="address">Address</label>
         <textarea type="text" name="address" id="address" class="form-control py-3 " required></textarea>
        </div>
       <div class="row mt-lg-3 mx-auto">
         <label for="image">Upload image</label>
         <input type="file" name="image" id="image" class="form-control py-3 " required>
        </div>
      </div>
      @csrf
      <input type="submit" name="submit" value="Save Changes" role="button" class="bg-warning rounded mt-5 text-white p-2 fs-5" style="border: none;">
    </form>

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    <script src="{!!url('asset\js\jQuery 3.7.1.js')!!}"></script>
    <script>
          $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
          });
    </script>

    <script src="{!!url('asset\js\edit_form.js')!!}"></script>

</div>

@endsection
