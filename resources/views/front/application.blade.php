@extends('front.layout.auth')

@section('content')       
    


    <!-- contact-form -->
    <div class="content">
        <div class="container">
            <div class="row">

               
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    <div align="center"><h1> Application Form </h1></div>
            </div>
         
           <hr/> <hr/>

                <div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-12">
                <form action="{{ route('application')}}" method="post" enctype="multipart/form-data">
                    @csrf                      
                    <div class="contact-form">
                            <div class="row">
                              
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="name" placeholder="Full Name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="file" name="image" placeholder="Photo" class="form-control" required>
                                    </div>
                                </div>
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="father_name" placeholder="Father's Name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <select class="form-control wide" name="state_id" required id="state">
                                            <option value="">Select State</option>
                                            @foreach ($state as $rows) 
                                                <option value="{{ $rows->id }}">
                                                {{ ucfirst($rows->name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 cities">                                    
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <select class="form-control city" name="city_id" required id="cities">
                                        <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>   

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">                                    
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <textarea name="postal_address" placeholder="Postal Address" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <textarea name="permanent_address" placeholder="Permanent Address" class="form-control" required></textarea>
                                    </div>
                                </div>
                                

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                   
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="mobile" placeholder="Mobile No" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="office_no" placeholder="Office Phone No" class="form-control" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="landline_no" placeholder="Landline No" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="dob" placeholder="Date of Birth(dd/mm/yy)" class="form-control datepicker" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="email" placeholder="Email Addrss" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="qualification" placeholder="Qualifications" class="form-control" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="present_employer" placeholder="Present Employer" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="current_position" placeholder="Current Position"  class="form-control" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="applyied_for" placeholder="Experience in position being applied for" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="company_experience" placeholder="Company Experience" class="form-control" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="total_experience" placeholder="Total Experience" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="notice_period" placeholder="Notice Period (Duration)" class="form-control" required>
                                    </div>
                                </div>

                                 <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="present_salary" placeholder="Present Salary" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 ">
                                    <!-- Text input-->
                                    <div class="form-group service-form-group">
                                        <label class="control-label sr-only" for="name"></label>
                                        <input type="text" name="expected_salary" placeholder="Expected Salary" class="form-control" required>
                                    </div>
                                </div>
                               
                                <!--button -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <button type="submit" name="singlebutton" class="btn btn-default">submit</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.form -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.contact-form -->

   <!--  <div id="map"></div> -->

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 <script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
    });
 </script>

  @section('script')



  <script type="text/javascript">
  
$('#state').change(function(){
  var sid = $(this).val();
  if(sid){
  $.ajax({
     type:"get",
     //data: {"_token": "{{ csrf_token() }}"},
     url:"{{ url('/getCities')}}/"+sid, //Please see the note at the end of the post**
     success:function(res)
     {      
          if(res)
          {
               $('.cities').find("div").show();             
               $("#cities").css('display','block');
               $('.nice-select.form-control.city').css('display','none');
               
              
              $.each(res,function(key,value){
                  $("#cities").append('<option value="'+key+'">'+value+'</option>');
              });
          }
     }

  });
  }
}); 

    
    </script>
  
   
    
    @endsection
