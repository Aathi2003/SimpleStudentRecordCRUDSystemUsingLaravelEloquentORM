

    function edibtn($email){
        $(document).ready(function () {

        var mail= $email;

        //ajax request to get the data

        $.ajax({
            type: "get",
            url: "/updateget",
            data: {mail},
            dataType: "JSON",
            success: function (response) {

                //get data and feed to the modal form

                $("#name").val(response.data.name);
                $("#age").val(response.data.age);
                $("#mobile").val(response.data.mobile);
                $("#email").val(response.data.email);
                $("#address").val(response.data.address);

            }
        });

    });

}


$("#form").submit(function (e) {
    e.preventDefault();

    $(document).ready(function () {

        //send modified data to server side components
        //middleware(data validation)
        //controller(process the data and manage transactions with DB)

        var dataval=new FormData();
        dataval.append("name",$("#name").val());
        dataval.append("age",$("#age").val());
        dataval.append("mobile",$("#mobile").val());
        dataval.append("email",$("#email").val());
        dataval.append("address",$("#address").val());
        dataval.append("image",$('#image')[0].files[0],$('#image')[0].files[0].name);

        //ajax request to update the data

        $.ajax({
          type: "post",
          url: "/update",
          data:dataval,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function (response) {

            if(response.err != null){
                // implement on fail upload

                if(response.err.name){
                    $("#name").css('border', '1px solid red');
                    console.log(response.err.name);
                }
                if(response.err.age){
                    $("#age").css('border', '1px solid red');
                }
                if(response.err.mobile){
                    $("mobile").css('border', '1px solid red');
                }
                if(response.err.email){
                    $("#email").css('border', '1px solid red');
                }
                if(response.err.address){
                    $("#address").css('border', '1px solid red');
                }
                if(response.err.image){
                    $("#image").css('border', '1px solid red');
                }
            }

            if(response.success){
                // implement on successfull upload
                $("#alert_done").css("display","block");
                $("#mod_info").append(response.success);
                $("#editModal").modal('hide');

            }


          }
        });


  });


});



