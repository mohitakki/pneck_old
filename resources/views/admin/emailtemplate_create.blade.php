@extends('admin.layout.app')
@section('css')

@endsection

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Email Template Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Email Template Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Email Template</a>
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
                   
                    <form action="{{route('admin.email-template-submit')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Email Template Info</h4>
                        <div class="row">
                          
                          <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">User Type</label>
                                  <select class="form-control" id="for_user" required="" name="for_user">
                                    <option value="">Select The User Type</option>
                                    @foreach($usertypes as $usertype)
                                    <option value="{{$usertype->id}}">{{$usertype->user_type_name}}</option>
                                    @endforeach
                                  </select>
                               
                          </div> 
                          
                           <div class="form-group col-md-6 mb-2">

                              <label for="projectinput2">Email For</label>
                                  <select class="form-control" id="email_for" required="" name="email_for">
                                    <option value="">Select The Email Type</option>
                                    <option value="1">Registration</option>
                                    <option value="2">Forgot Password</option>
                                    <option value="3">Reset Password</option>
                                    <option value="4">Veriy Email Address</option>
                                  </select>
                               
                          </div>

                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Email Heading</label>

                             <input type="text" id="email_heading" name="email_heading" class="form-control" required autocomplete="off" value=""/>
                          </div>

                          <div class="form-group col-md-6 mb-2">
                              <label for="projectinput2">Email Subject</label>                            
          
                              <input type="text" id="Email Subject" name="email_subject" class="form-control" required autocomplete="off" value=""/>

                          </div>

                          <div class="form-group col-md-12 mb-2">
                            <label for="projectinput3">Email Body</label>

                              <!-- <textarea id="email_body" name="email_body" class="tinymce tinymce-classic" required autocomplete="off" ></textarea> -->
              					<div class="form-group">
                            <div class="row" style="margin-bottom: 20px">
                                  <div class="col-md-2">
                                    <select class="form-control" required=""> 
                                     	<option value="">Select The User Type</option>
                                    	@foreach($usertypes as $usertype)
                                    	<option value="{{$usertype->id}}">{{$usertype->user_type_name}}</option>
                                    	@endforeach
                                	</select>
                                  </div>
                                  <div class="col-md-2">
                                        <select class="form-control" id="datatables" onchange="myFunction()">
                                        <option value="">Select The Database Table</option>
                                    	@foreach($tables as $table)
                                    	<option value="{{$table->Tables_in_apwac268_adminpanel}}">{{$table->Tables_in_apwac268_adminpanel}}</option>
                                    	@endforeach</select>
                                  </div>
                                  <div class="col-md-2" id="all_column">
                                        <select class="form-control">
                                        	<option value="">Select The Table Column</option>
                                        </select>
                                  </div>
                                  <div class="col-md-2">
                                        <input type="text" class="form-control" value="" id="getinputval">
                                </div>
                          </div>  
                              <textarea name="email_body">                     
                              </textarea>
                      </div>
                          <!-- </div> -->

                         <!--  <section id="custom-toolbar">

				<div class="card-header">
					<h4 class="card-title">Custom Toolbar</h4>
					
					<a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
        			<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show">
					<div class="card-body">
						
						<form class="form-horizontal" action="#">
							<div class="form-group">
								<select class="forn-group"><option>vaibhav</option><option>vaibhav</option><option>vaibhav</option></select>
								<select class="forn-group"><option>Tyagi</option></select>
								<input type="text" class="forn-group" value="{value}" id="getinputval">
								<textarea>                     
                </textarea>
							</div>
						</form>
					</div>
				</div>
			
</section> -->

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

@section('js')
<style>
  #mceu_30-body{
    position: absolute;
    right: 0;
    top: -61px;
        
  }   
  #mceu_30-body button{
    color: #fff;
    border-color: #168dee !important;
    background-color: #1e9ff2 !important;
    border: none!important;
        color: #fff;
    border-color: #168dee !important;
    background-color: #1e9ff2 !important;
    height: 37px;
    width: 136px;
    border-radius: 3px;
  }
</style>
  <script >
$(document).ready(function(){
    tinymce.init({
             selector: 'textarea',
       plugins: [
                "advlist autolink lists link charmap print preview anchor textcolor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime table contextmenu paste textcolor"
            ],
            block_formats: 'Paragraph=p;Header 1=h1;Header 2=h2;Header 3=h3', 
            font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
            height: 500,
      insert_button_items: 'image link | inserttable',
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | forecolor backcolor | Insert | fontselect | fontsizeselect | blockselect | styleselect",
  
 style_formats: [
    {title: 'Bold text', inline: 'b'},
    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
    {title: 'Example 1', inline: 'span', classes: 'example1'},
    {title: 'Example 2', inline: 'span', classes: 'example2'},
    {title: 'Table styles'},
    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
  ],      
  menubar: false,
    content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'],
  
  setup: function(editor) {
       editor.addButton('Insert', {
      type: 'Button',
      text: 'Insert',
      icon: false,
       onclick: function() {
          var gettextval = document.getElementById("getinputval").value;
          editor.insertContent('' + gettextval + '');
        }
    })
//    editor.addButton('mybutton', {
//      type: 'menubutton',
//      text: 'My button',
//      icon: false,
//      menu: [{
//        text: 'Menu item 1',
//        onclick: function() {
//          editor.insertContent('&nbsp;<strong>Menu item 1 text inserted here!</strong>&nbsp;');
//        }
//      }, {
//        text: 'Menu item 2',
//        menu: [{
//          text: 'Submenu item 1',
//          onclick: function() {
//            editor.insertContent('&nbsp;<em>Submenu item 1 text inserted here!</em>&nbsp;');
//          }
//        }]
//      }]
//    })
//     editor.addButton('seconf', {
//      type: 'menubutton',
//      text: 'seconf',
//      icon: false,
//      menu: [{
//        text: 'Menu item 1',
//        onclick: function() {
//          editor.insertContent('&nbsp;<strong>Menu item 1 text inserted here!</strong>&nbsp;');
//        }
//      }, {
//        text: 'Menu item 2',
//        menu: [{
//          text: 'Submenu item 1',
//          onclick: function() {
//            editor.insertContent('&nbsp;<em>Submenu item 1 text inserted here!</em>&nbsp;');
//          }
//        }]
//      }]
//    });
   
  }
});

});
  </script>
  <script>
  	function myFunction() {
  	var  datatable  = document.getElementById("datatables").value;
  	
  	$.ajax({
                  type:"POST",
                  url:"{{route('admin.columntables')}}",
                  data:{"_token": "{{ csrf_token() }}","table":datatable},
                  success:function(data)
                  {
                  	console.log(data);
                    $('#all_column').html(data);
                  },
                  error:function(data){alert("Error : "+data.responseText);}

    });
}
  </script>
<script>
  	function choosevalue() {
  	var  tablevalue  = document.getElementById("tablevalue").value;
  	var  datatable  = document.getElementById("datatables").value;
  	console.log(tablevalue);
  	var perfectvalue1=  "{{$" + datatable + '.' +tablevalue + "}"  + "}" ;

  	console.log(perfectvalue1);
  	
  	document.getElementById("getinputval").value=perfectvalue1; 	
}
  </script>
@endsection
@endsection