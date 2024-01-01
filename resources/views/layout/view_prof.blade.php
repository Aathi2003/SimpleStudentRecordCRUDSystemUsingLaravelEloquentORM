<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <style>
           .outline{
            width: 220px;
            height: 220px;
            border : 10px solid green
           }
           .btmline{
            width: 800px;
            border: 1.5px solid gray
           }
           .labels,.values{
            width: 300px;
           }
           #per_info{
            width: 650px;
            background:rgb(255, 241, 241);
            border: 3px solid rgb(124, 221, 137);
           }
           .back-btn{
            text-decoration: none;
            color: snow;
           }
        </style>
    </head>

    <body>
        <header>
            <div class="container-fluid w-100 d-flex flex-column justify-content-center align-items-center" style="height: 40vh">
                <div class="outline rounded-circle d-flex justify-content-center align-items-center">
               <img src="./picture/{{$view_data->image}}" width="180px" height="180px" class="rounded-circle" alt="proflogo">
            </div>
            <div class="fs-3 fw-semibold">{{$view_data->name}}</div>
            <span class="btmline mt-3"></span>
            </div>
        </header>
        <main class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-row flex-wrap justify-content-center align-items-center rounded" id="per_info">
                <div class="labels d-flex flex-column justify-content-center align-items-center">
                 <div class="fs-5 fw-medium py-5">Email</div>
                 <div class="fs-5 fw-medium py-5">Phone</div>
                 <div class="fs-5 fw-medium py-5">Age</div>
                 <div class="fs-5 fw-medium py-5">Address</div>
                </div>
                <div class="values d-flex flex-column">
                 <div class="fs-5 fw-medium py-5">{{$view_data->email}}</div>
                 <div class="fs-5 fw-medium py-5">{{$view_data->mobile}}</div>
                 <div class="fs-5 fw-medium py-5">{{$view_data->age}}</div>
                 <div class="fs-5 fw-medium py-5">{{$view_data->address}}</div>
                </div>
            </div>

        </main>
        <footer class="d-flex flex-column justify-content-center align-items-center my-5">
            <a href="{{url('/view')}}" role="button" class="back-btn bg-warning px-5 py-3 rounded">Back</a>
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
