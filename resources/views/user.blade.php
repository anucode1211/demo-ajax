<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Ajax Validation Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <style type="text/css">
        .container > div {
            padding: 10px;
        }
    </style>
</head>
<body>
<br><br><div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
      <div class="card">
          <div class="card-header">
           Register Form
          </div>       

  
  <div class="card-body">
       
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
       
   <form action="{{ route('my.form') }}" method="POST">
    
        {{ csrf_field() }}
        <div class="form-group" >
            <label>Name :</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
             <span class="text-danger" id="nameError"></span>
        </div>    
        <div class="form-group">
            <strong>Email :</strong>
            <input type="text" name="email" class="form-control" placeholder="Email">
             <span class="text-danger" id="emailError"></span>
       </div>
        <div class="form-group" style="display: flex;">
            <label for="gender" style="margin-right:20px;">Gender :</label>
            <div class="form-check" style="margin-right: 40px;">
              <input type="radio" class="form-check-input"  name="gender" value="option1">Male
              <label class="form-check-label" for="gender"></label>
            </div>
            <div class="form-check">
              <input type="radio" class="form-check-input" id="radio2" name="gender" value="option2">Female
              <label class="form-check-label" for="gender"></label>
            </div>
             <span class="text-danger" id="genderError"></span>
        </div>
        <div class="form-group">
            <label for="month">Qualification :</label>
            <select class="form-select">
            <option value="">--- Select Qualification ---</option>
              <option>Non-Graduate</option>
              <option>UG</option>
              <option>PG</option>
              <option>PhD</option>
            </select>
        </div>
        <div class="form-group" style="display: flex; justify-content: left; ">
            <label for="hobbies" style="margin-right:20px;">Hobbies :</label>
            <div class="form-check" style="margin-right:20px;">
              <input type="checkbox" class="form-check-input" id="check1" name="hobbies" value="something">
              <label class="form-check-label" for="check2">Sports</label>
            </div>
            <div class="form-check" style="margin-right:20px;">
              <input type="checkbox" class="form-check-input" id="check2" name="hobbies" value="something">
              <label class="form-check-label" for="check2" >Reading</label>
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="check3" name="hobbies" value="something">
              <label class="form-check-label" for="check2" style="margin-right:20px;">Music</label>
            </div>
             <div class="form-check">
              <input type="checkbox" class="form-check-input" id="check3" name="hobbies" value="something">
              <label class="form-check-label" for="check2">Others</label>
            </div>
             <span class="text-danger" id="hobbiesError"></span>
        </div>
        <div class="form-group" style="display: flex; justify-content: center;">
            <button class="btn btn-success btn-submit">Submit</button>
        </div>
    </form>
</div>
</div>

<script type="text/javascript">
       
    $(document).ready(function() {

        $(".btn-submit").click(function(e){
          
            e.preventDefault();
       
            var _token = $("input[name='_token']").val();
            var name = $("input[name='name']").val();
            var email = $("input[name='email']").val();
            var gender = $("input[name='gender']:checked").val();
            var hobbies = $("input[name='hobbies']:checked").val();
           
            
       
            $.ajax({
                url: "{{ route('my.form') }}",
                type:'POST',
                data: {_token:_token, name:name, email:email, gender:gender, hobbies:hobbies},
                success: function(data) {
                    if($.isEmptyObject(data.error)){
                        alert(data.success);
                        $(".print-error-msg").css({
                            display:"none"
                        });
                    }else{
                        printErrorMsg(data.error);
                    }
                }
            });
       
        }); 
       
        function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
    });


</script>
</body>
</html>