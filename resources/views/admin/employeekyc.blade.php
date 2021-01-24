@extends('admin.layout.app')


    <link rel="stylesheet" href="{{ url('/admin_theme/app-assets/css/crop/imgareaselect.css') }}">


@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Employee KYC Info</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Pneck Employee Management</a>
                </li>
               <!-- <li class="breadcrumb-item active"><a href="#">Add User</a> -->
                </li>
              </ol>
            </div>
          </div>
        </div>
        
      <div class="content-body">
        <!-- Form actions layout section start -->
        <section id="form-action-layouts">
          <div class="row match-height">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                 <!--  <h4 class="card-title" id="from-actions-top-left">Category Details</h4> -->
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                    <!--   <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                     <!--  <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">

                <div class="col-md-12 image_screen" style="display:none;">
                <h2> Please Drag the mouse pointer on image screen for crop this image </h2>
                <img id="previewimage" style="display:none;"/> 
                </div>
               

                  <div class="card-body">
                   
    <form action="{{route('admin.pneckemployee-uploadkyc')}}" method="post" runat="server" enctype="multipart/form-data">
                    {{csrf_field()}} 

            <input type="hidden" name="id" value="{{$user->id}}">
            <input type="hidden" name="url" value="my-profile"> 

       
            <input type="hidden" name="x1" value="" />
            <input type="hidden" name="y1" value="" />
            <input type="hidden" name="w" value="" />
            <input type="hidden" name="h" value="" />

    <div class="content-wrapper" style="padding: 0.2rem 2.2rem;">
        <div class="row match-height">

        <div class="col-xl-4 col-lg-12">
            <div class="card card-shadow" style="align-items: center;display: flex;justify-content: center;">
                <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">
                            @if($user->dl_file != '')
                            <img src="{{ $user->dl_file }}" id="blah"  class="img-border height-100"  alt="Card image">
                            @else
                            <img src="{{ url('/admin_theme/app-assets/images/driving_licence.jpg') }}" alt="logo" class="rounded-circle img-border height-100"  id="blah" style="background-color: linen;">
                            @endif
                        </a>
                </div>
                <div class="media-left pl-2 pt-2">
                    <h4 class="card-title" style="margin-bottom: 1.0rem !important;"><a href="#">{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</a></h4>
                </div>
                    <!-- h4 class="card-title" style="font-weight: 500;letter-spacing: 1px;color: #464855;"></h4> -->

                   

                        <div class="media-body" style="padding-left: 1.5rem !important;font-weight: 500;letter-spacing: 1px;color: #464855;margin-bottom: 1.0rem !important;">
                            {{ucfirst('Driving Licence')}}
                        </div>
                <div class="media-left" style="padding-top: 0.2rem !important;padding-left: 1.5rem !important;margin-bottom: 1.0rem !important;">
                    <label for="updatepic" class="btn btn-primary d-" style="background-color: #00c5dc !important;border-color: #00c5dc !important;padding: .75rem 2rem;border-radius:50px;">Upload Driving File</label>
                    <input type="file" class="image" id="updatepic" style="display: none" name="dl_file">

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12">
            <div class="card card-shadow" style="align-items: center;display: flex;justify-content: center;">
                <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">
                            @if($user->vehicle_file != '')
                            <img src="{{ $user->vehicle_file }}" id="vehicle"  class="img-border height-100"  alt="Card image">
                            @else
                            <img src="{{ url('/admin_theme/app-assets/images/delevery_image.jpg') }}" alt="logo" class="rounded-circle img-border height-100"  id="blah" style="background-color: linen;">
                            @endif
                        </a>
                </div>
                <div class="media-left pl-2 pt-2">
                    <h4 class="card-title" style="margin-bottom: 1.0rem !important;"><a href="#">{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</a></h4>
                </div>

                    <!-- h4 class="card-title" style="font-weight: 500;letter-spacing: 1px;color: #464855;"></h4> -->
                        <div class="media-body" style="padding-left: 1.5rem !important;font-weight: 500;letter-spacing: 1px;color: #464855;margin-bottom: 1.0rem !important;">
                            {{ucfirst('vehicle image')}}
                        </div>
                <div class="media-left" style="padding-top: 0.2rem !important;padding-left: 1.5rem !important;margin-bottom: 1.0rem !important;">
                    <label for="updatepic" class="btn btn-primary d-" style="background-color: #00c5dc !important;border-color: #00c5dc !important;padding: .75rem 2rem;border-radius:50px;">
                    <a href="{{ url('/admin/employeekyc/vehicle').'/'.$user->id }}">Upload Vehicle File</a>
                    </label>
                   

                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-12">
            <div class="card card-shadow" style="align-items: center;display: flex;justify-content: center;">
                <div class="media-left pl-2 pt-2">
                        <a href="#" class="profile-image">
                            @if($user->aadhar_image != '')
                            <img src="{{ $user->aadhar_image }}" id="aadhar"  class="img-border height-100"  alt="Card image">
                            @else
                            <img src="{{ url('/admin_theme/app-assets/images/aahdar_image.jpg') }}" alt="logo" class="rounded-circle img-border height-100"  id="blah" style="background-color: linen;">
                            @endif
                        </a>
                </div>
                <div class="media-left pl-2 pt-2">
                    <h4 class="card-title" style="margin-bottom: 1.0rem !important;"><a href="#">{{ucfirst($user->first_name)}} {{ucfirst($user->last_name)}}</a></h4>
                </div>

                <img id="aadhar_image_previewimage" style="display:none;"/>

                    <!-- h4 class="card-title" style="font-weight: 500;letter-spacing: 1px;color: #464855;"></h4> -->
                        <div class="media-body" style="padding-left: 1.5rem !important;font-weight: 500;letter-spacing: 1px;color: #464855;margin-bottom: 1.0rem !important;">
                            {{ucfirst('aadhar image')}}
                        </div>
                <div class="media-left" style="padding-top: 0.2rem !important;padding-left: 1.5rem !important;margin-bottom: 1.0rem !important;">
                    <label for="updatepic" class="btn btn-primary d-" style="background-color: #00c5dc !important;border-color: #00c5dc !important;padding: .75rem 2rem;border-radius:50px;">
                    <a href="{{ url('/admin/employeekyc/vehicle').'/'.$user->id }}">Upload Vehicle File</a>
                    </label>
                </div>
            </div>
        </div>
        </div>

        <div class="form-actions right">
                        <button type="button" class="btn btn-danger mr-1" onclick="history.go(-1);"><i class="ft-x"></i> Cancel</button>
                        <button type="submit" name="save" class="btn btn-success" value="Save"><i class="ft-check save-button-check"></i> Save</button>                        
                     </div>
        
    </div>
</div>
</form>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </section>
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <script src="{{ url('/admin_theme/app-assets/js/scripts/jquery.imgareaselect.min.js') }}"></script>

      <script>
        jQuery(function($) {
  
            var p = $("#previewimage");
            

           $(".image").on("change", function(){

            $('.image_screen').css('display','block');
 
                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.querySelector(".image").files[0]);
 
                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                };
            });
 
            $('#previewimage').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);            
                }
            });
        });
    </script>

    <!--  <script>
$(document).ready(function(){

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#blah").attr('src', e.target.result);
                $("#blahimage").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#updatepic").change(function(){
        readURL(this);
    });

    function readvehicleURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#vehicle").attr('src', e.target.result);
                $("#vehicleimage").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#vehicle").change(function(){
        readvehicleURL(this);
    });

   
});
</script> -->
      
@endsection