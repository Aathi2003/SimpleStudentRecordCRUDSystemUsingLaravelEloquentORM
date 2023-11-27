@extends('layout.layout')
@section('main')

<section class="add_stu">
    <div class="container vh-100 w-50 d-flex flex-column justify-content-center align-items-center">
     <div class="add_stu_title">
        <h2>Add New Student</h2>
     </div>
     <div class="form_content container">

           @if (session('done'))

           <div class="alert alert-success " role="alert">
              {{session('done')}}
           </div>

           @endif


          @if (session('warn'))

          <div class="alert alert-warning" role="alert">
            {{session('warn')}}
          </div>

          @endif

        <form  method="POST" action="{{url('/add')}}" enctype="multipart/form-data">
             <div class="row">
                <div class="col-lg-6 col-sm-12">
            <label for="name">Student name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control py-3 @error('name') is-invalid @enderror" required>
               </div>
               <div class="col-lg-6 col-sm-12">
            <label for="age">Student Age</label>
            <input type="text" name="age" value="{{old('age')}}" class="form-control py-3 @error('age') is-invalid @enderror" required>
              </div>
             </div>
             <div class="row mt-lg-3">
                <div class="col-lg-6 col-sm-12">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" value="{{old('mobile')}}" class="form-control py-3 @error('mobile') is-invalid @enderror" required>
               </div>
               <div class="col-lg-6 col-sm-12 ">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{old('email')}}" class="form-control py-3 @error('email') is-invalid @enderror" required>
              </div>
              <div class="row mt-lg-3 mx-auto">
                <label for="address">Address</label>
                <textarea type="text" name="address" value="{{old('address')}}" class="form-control py-3 @error('Address') is-invalid @enderror" required></textarea>
               </div>
              <div class="row mt-lg-3 mx-auto">
                <label for="image">Upload image</label>
                <input type="file" name="image" value="{{old('image')}}" class="form-control py-3 @error('image') is-invalid @enderror" required>
               </div>
             </div>
             @csrf
             <input type="submit" name="submit" value="Add student" role="button" class="bg-success rounded mt-5 text-white p-2 fs-5" style="border: none;">
        </form>
     </div>
    </div>

</section>

@endsection
