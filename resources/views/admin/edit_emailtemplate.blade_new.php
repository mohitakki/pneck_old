@extends('admin.layout.app')
@section('css')
<style>
   .email-preview h2 {
   font-size: 21px;
   color: #111426;
   /* flex: 4; */
   text-align: center;
   margin-bottom: 40px;
   font-weight: 600;
   margin-top: 0px;
   padding-top: 0px;
   }
   .email-preview{
   background: #e2edff;
   padding-top: 30px;
   padding-bottom: 30px
   }
   .inventory {
   background: white;
   padding-top: 41px;
   padding-left: 20px;
   padding-right: 20px;
   padding-bottom: 41px;
   }
   form label{
   font-size: 17px;
   color: #042e6f;
   margin-bottom: 10px;
   margin-top: 10px
   }
   form input{
   height: 50px!important
   }
   form select.form-control{
   height: 50px!important;
   border-radius: 0px!important
   }
   form textarea{
   height: 150px!important;
   background-color: #fff;
   border: 1px solid #ccd9ed!important;
   border-radius: 5px!important
   }
   form{
   margin-right: 20px
   }
   .form-left p{
   font-size: 15px;
   color: #111426;
   margin-bottom: 20px;
   }
</style>
@endsection
@section('content')
<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
   <h3 class="content-header-title mb-0 d-inline-block">Email Template Edit</h3>
   <div class="row breadcrumbs-top d-inline-block">
      <div class="breadcrumb-wrapper col-12">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="#">Email Template Management</a>
            </li>
            <li class="breadcrumb-item active"><a href="#">Edit Email Template</a>
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
                  <div class="card-body">
                     <form action="{{route('admin.email-template-update')}}" method="post">
                        {{csrf_field()}}         
                        <div class="form-body">
                           <h4 class="form-section"><i class="ft-user"></i>Email Template Info</h4>
                           <div class="">
                            <div class="">
                           <div class="portlet-body">
                            <div class="row">
                              <div class="col-md-6">
                                 <div class="form-left">
                                    <p>We’ve created a template to promote your online business.</p>
                                    <div>
                                    </div>
                     <form action="{{route('admin.email-template-update')}}" method="post">
                     <div class="form-group m-form__group">
                                <label for="projectinput2">User Type</label>
                                  <select class="form-control" id="for_user" required="" name="for_user">
                                    <option value="">Select The User Type</option>
                                    @foreach($usertypes as $usertype)
                                    <option value="{{$usertype->id}}" @if($data->for_user == $usertype->id) selected @endif>{{$usertype->user_type_name}}</option>
                                    @endforeach
                                  </select>
                     </div>

                      <div class="form-group m-form__group">
                                <label for="projectinput2">Email For</label>
                                  <select class="form-control" id="email_for" required="" name="email_for">
                                    <option value="1" @if($data->email_for == '1') selected @endif>Registration</option>
                                    <option value="2" @if($data->email_for == '2') selected @endif>Forgot Password</option>
                                    <option value="3" @if($data->email_for == '3') selected @endif>Reset Password</option>
                                    <option value="4" @if($data->email_for == '4') selected @endif>Veriy Email Address</option>
                                  </select>
                      </div>

                     <div class="form-group m-form__group ">
                             <label for="projectinput2">Email Heading</label>

                             <input type="hidden" name="id" value="{{$data->id}}"/>

                             <input type="text" id="email_subject" name="email_heading" class="form-control m-input" required autocomplete="off" value="{{$data->email_heading}}"/>
                     </div>
                     <div class="form-group m-form__group">
                             <label for="exampleInputEmail1"> Email Subject</label>
                             
                             <input type="text" name="email_subject" class="form-control m-input"  value="{{$data->email_subject}}" >
                     </div>
                     <div class="form-group m-form__group">
                            <label for="exampleInputEmail1"> Email Body</label>

                            <textarea id="email_description" name="email_body" class="form-control m-input"   rows="3" required autocomplete="off" >{{$data->email_body}}</textarea>
                     </div>
                     <button class="pull-left exportcsv btn btn-success" >Create Email Template </button>
                     </form>
                     </div>
                     </div>
                    
                     <div class="col-md-6">
                     <div class="email-preview">
                     <h2>Email Template Preview</h2>
                     <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                     <table align="center" border="0" cellpadding="0" cellspacing="0" width="480" style="box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.05)">
                     <tr>
                     <td align="left" bgcolor="#0f439b" style="padding: 10px 0 10px 16px;">
                     <img src="{{URL::asset('/public/admin_logos/935312Logo(1).png')}}" alt="Creating Email Magic" style="display: block;" width="100"/>
                     </td>
                     </tr>
                     <tr>
                     <td style="background: #fff;text-align: center;
                        padding-top: 15px;
                        padding-bottom: 15px;color: #2474f9!important;font-size: 18px;font-weight: 500" id="subject">
                     Welcome To Moshoppa
                     </td>
                     </tr>
                     <tr>
                     <td >
                     <img src="{{URL::asset('public/admin_theme\assets/email_banner.jpg')}}">
                     </td>
                     </tr>
                     <tr>
                     <td>
                     <table bgcolor="#fff" width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #f0f0f0;border-bottom:0px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-top:0px;background: #fff">
                     <tbody>
                     <tr height="16px">
                     <td width="32px" rowspan="3"></td>
                     <td></td>
                     <td width="32px" rowspan="3"></td>
                     </tr>
                     <tr>
                     <td>
                     <table border="0" cellspacing="0" cellpadding="0" border-bottom:"0">
                     <tbody>
                     <tr>
                     <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#a3a0a0;line-height:1.5;padding-bottom:4px;color: #000;padding-top:20px;padding-bottom:10px;font-weight:700"><span id="title">Hi</span> JohnSmith,</td>
                     </tr>
                     <tr>
                     <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5;padding:4px 0;color: #042e6f">
                     <span id="description"> Your Moshoppa Subscriber Account Johnsmith@gmail.com was just loged in to please activate your account by this email verifaction link .</span>
                     </td>
                     </tr>
                     <tr>
                     <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5;padding:14px 0;color: #042e6f">
                     <b>Please Activate Your Account by this link</b>
                     <br><a href="http://www.moshoppadev.com/shopper/activate/BJTvyk571m29OzDaLBZL249L3xD9sFyaW2om7hLO5lR3T7KtP68Vzq2GAHl0" style="text-decoration:none;color:#ff9c1d" target="_blank" >Activate Your Moshoppa Subscriber Account</a>.
                     </td>
                     </tr>
                     </tbody>
                     </table>
                     </td>
                     </tr>
                     <tr height="32px"></tr>
                     </tbody>
                     </table>
                     </td>
                     </tr>
                     <tr>
                     <td>
                     <table bgcolor="#f8f8f8" width="100%" align="center" style="padding-bottom: 20px;background:#f8f8f8;margin-bottom:0px ">
                     <tr>
                     <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:13px;color:#202020;line-height:1.5;padding-top:28px;text-align: center;font-weight: 600">The Moshoppa Accounts team</td>
                     </tr>
                     <tr align="center">
                     <td>
                     <table style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:12px;color:#b9b9b9;line-height:1.5;text-align: center;padding-bottom: 30px;margin-bottom: 30px;padding:10px">
                     <tbody>
                     <tr>
                     <td style="padding: 10px;padding-left: 20px;padding-right: 20px">*The location is approximate and determined by the IP address it was coming from.
                     This email can't receive replies. To give us feedback on this alert, <a style="text-decoration:none;color:#2677fe" href="#">click here</a>.
                     For more information, visit the <a style="text-decoration:none;color:#2677fe" href="#">Moshoppa Accounts Help Center</a>
                     </td>
                     </tr>
                     </tbody>
                     </table>
                     </td>
                     </tr>
                     </table>  
                     </td>
                     </tr>
                     </table>
                     </td>
                     </div>
                     </div>
                   </div>
                     <div class="clearfix"></div>
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
@section('js')              
<script>
   $(document).ready(function(){
      $("#email_title").keyup(function(){
        var title = $("#email_title").val();
        $("#title").text(title)
      })
      $("#email_description").keyup(function(){
        var title = $("#email_description").val();
        $("#description").text(title)
      })
      $("#email_subject").keyup(function(){
        var title = $(this).val();
        $("#subject").text(title)
      })
     
     
   })
</script>
<script>
   $(document).ready(function(){
        var title = $("#email_title").val();
        $("#title").text(title)
        var title = $("#email_description").val();
        $("#description").text(title)
        var title = $("#email_subject").val();
        $("#subject").text(title)
     
   })
</script>
@endsection
@endsection