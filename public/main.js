$( function() {
    $( ".datepicker" ).datepicker();
    $('.saveEmployee').click(function(){

      var name= $('input[name=name]').val();
      var gender= $('select[name=gender]').val();
      var dob= $('input[name=dob]').val();
      var address= $('textarea[name=address]').val();
      var mobile= $('input[name=mobile]').val();
      var email= $('input[name=email]').val();
      var departments_id= $('select[name=departments_id]').val();
      var designations_id= $('select[name=designations_id]').val();
      var date_of_joining= $('input[name=date_of_joining]').val();
      var image= $('input[name=image').val();
      console.log(name);

       $.ajax({
         type:'POST',
         url:$('#newmodal').attr('save-action'),
         headers: {
          'X-CSRF-TOKEN': $('#newmodal').attr('token')
      },
         data:{
          'name' : name,
          'gender' : gender,
          'dob' : dob,
          'address' : address,
          'mobile' : mobile,
          'email' : email,
          'departments_id' : departments_id,
          'designations_id' : designations_id,
          'date_of_joining' : date_of_joining,
          'image' : image,

         },
         success:function(response){
          console.log(response);
         }
        });
    });

    $('select[name=department_id]').change(function(){
        var department_id = $(this).$val();
        console.log(department_id);
        if(department_id != ""){
          $.ajax({
            type:'POST',
            url:$('#newmodal').attr('fetch-designation'),
            headers: {
             'X-CSRF-TOKEN': $('#newmodal').attr('token')
         },
            data:{

             'departments_id' : departments_id,
            },
            datatype:"JSON",
            success:function(response){
            var optionHTML='';
           for (let  i= 0;  i < response.data.length; i++) {
            const element = response[i];
            optionHTML+='<option value='+element.id+'>'+element.name+'</option>';

             }

              $("select[name=designations_id]").html(optionHTML);
            }

          });

        }

    });
  } );
