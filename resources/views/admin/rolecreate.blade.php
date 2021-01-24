@extends('admin.layout.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin_theme/app-assets/css/pages/users.min.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/admin_theme/assets/css/style.css') }}">
<!-- <style type="text/css">
    .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}

.plus_class { 
  font-weight: bolder;
}
  </style> -->

<style>
        
         .selectmenu{
         border-style: solid;
         border-width: 1px;
         border-color: rgb(230, 230, 230);
         border-radius: 4px;
         background-color: rgb(255, 255, 255);
         overflow: hidden
         }
         .menus-heading{
         background-color: rgb(247, 247, 247);
         padding-left: 26px;
         font-size: 14px;
         color: #858585;
         padding-top: 20px;
         padding-bottom: 20px
         }
         .menus-heading h2{
         padding: 0px;
         margin: 0px;
         }
         .menus-accordian{
         background: white
         }
         .first-parent{
         border-top: 1px solid rgb(230, 230, 230);
         padding: 20px 0px;
         padding-left: 27px
         }
         .first-parent .select-box{
         }
         .first-parent h3{
         padding: 0px;
         margin: 0px
         }
         .select-box{
         border-style: solid;
         border-width: 1px;
         border-color: rgb(255, 189, 199);
         border-radius: 4px;
         background-color: rgb(255, 245, 247);
         width: 29px;
         height: 29px;
         display: inline-block;
         text-align: center;
         color: #e9223f;
         font-size: 20px;
         cursor: pointer;
         line-height: 29px
         }
         .first-parent h3{
         font-size: 14px;
         color: #181818;
         display: inline-block;
         margin-left: 20px;
         font-weight: 500
         }
         .parentlist{
         list-style: none;
         padding-left: 0px;
         margin: 0px;
         }
         .subcategory{
         list-style: none;
         padding-top: 40px;
         position: relative;
         margin-left: 15px;
         padding-left: 0px;
         display: none
         }
         .subcategory li{
         margin-bottom: 20px;
         font-size: 14px
         }
         .subcategory:before{
         content: "";
         display: block;
         width: 0;
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         border-left: 3px dotted #aeaeae;
         transition: all 0.5s ease
         /*      display: none*/
         }
         .secondli{
         position: relative;
         padding-left: 48px;
         }
         .thirdlilist{
         position: relative;
         padding-left: 48px
         }
         .secondli:before{
         content: "";
         display: block;
         width: 38px;
         height: 0;
         border-top: 3px dotted #aeaeae;
         margin-top: -1px;
         position: absolute;
         top: 1em;
         left: 0px;
         }
         .thirdlilist:before{
         content: "";
         display: block;
         width: 38px;
         height: 0;
         border-top: 3px dotted #aeaeae;
         margin-top: -1px;
         position: absolute;
         top: 1em;
         left: 0px;
         }
         .secondli:last-child:before {
         background: #fff5f7;
         height: auto;
         top: 1em;
         bottom: 0;
         }
         .thirdlilist:last-child:before {
         background: #fff5f7;
         height: auto;
         top: 1em;
         bottom: 0;
         }
         .thirdli{
         list-style: none;
         position: relative;
         margin-left: 15px;
         padding-left: 0px;
         padding-top: 25px;
         display: none
         }
         .thirdli:before{
         content: "";
         display: block;
         width: 0;
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         border-left: 3px dotted #aeaeae;
         }
         .changedesign{
         background: #fff5f7;
         transition: all 0.5s ease
         }
         /* Customize the label (the container) */
         .container-check {
         display: block;
         position: relative;
         /*padding-top: 6px;*/
         cursor: pointer;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         font-weight: none;
         font-weight: 100;
         font-size: 15px;
         padding-left: 33px;
         color: #181818;
         }
         .container-check:after{
         content: "";
         display: table;
         clear: both
         }
         .thirdlilist:after{
         content: "";
         display: table;
         clear: both
         }
         /* Hide the browser's default checkbox */
         .container-check input {
         position: absolute;
         opacity: 0;
         cursor: pointer;
         height: 0;
         width: 0;
         }
         /* Create a custom checkbox */
         .checkmark {
         position: absolute;
         top: 0;
         left: 0;
         border-style: solid;
         border-width: 1px;
         border-color: rgb(255, 189, 199);
         border-radius: 4px;
         background-color: rgb(255, 245, 247);
         width: 29px;
         height: 29px;
         display: inline-block;
         text-align: center;
         color: #e9223f;
         font-size: 20px;
         cursor: pointer;
         }
         /* On mouse-over, add a grey background color */
         .container-check:hover input ~ .checkmark {
         border-style: solid;
         border-width: 1px;
         border-color: rgb(255, 189, 199);
         border-radius: 4px;
         background-color: rgb(255, 245, 247);
         width: 29px;
         height: 29px;
         display: inline-block;
         text-align: center;
         color: #e9223f;
         font-size: 20px;
         cursor: pointer;
         }
         /* When the checkbox is checked, add a blue background */
         .container-check input:checked ~ .checkmark {
         border-style: solid;
         border-width: 1px;
         border-color: rgb(255, 189, 199);
         border-radius: 4px;
         background-color: rgb(255, 245, 247);
         width: 29px;
         height: 29px;
         display: inline-block;
         text-align: center;
         color: #e9223f;
         font-size: 20px;
         cursor: pointer;
         }
         /* Create the checkmark/indicator (hidden when not checked) */
         .checkmark:after {
         content: "";
         position: absolute;
         display: none;
         }
         /* Show the checkmark when checked */
         .container-check input:checked ~ .checkmark:after {
         display: block;
         }
         /* Style the checkmark/indicator */
         .container-check .checkmark:after {
         left: 11px;
         top: 8px;
         width: 5px;
         height: 10px;
         border: solid #e9223f;
         border-width: 0 2px 2px 0;
         -webkit-transform: rotate(45deg);
         -ms-transform: rotate(45deg);
         transform: rotate(45deg);
         }
      </style>

@endsection

@section('content')
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">Role Create</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Role Management</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Add Role</a>
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
                   
                    <form action="{{route('admin.role-submit')}}" method="post">
                    {{csrf_field()}}         
                     
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i>Role Info</h4>
                        <div class="row">
                          
                          <div class="form-group col-md-6 mb-2">
                            <label for="projectinput2">Role Name</label>

                             <input type="text" id="FirstName" name="role_name" class="form-control" required autocomplete="off" value=""/>
                          </div>
                        </div>
                         <!-- <div class="row">

                          <div class="form-group col-md-6 mb-2" id="list">
                            <label for="projectinput3">Menus</label>
                            <div id="response"> </div>

                            <ul id="tree1">

                            @foreach($menus as $menu)
                               @if($menu->menu_parent == '0')
                                <li class="column"> <input  type="checkbox" id="{{$menu->id}}" name="checkboxlist[]" value="{{$menu->id}}"><a href="#">{{$menu->menu_name}}</a>
                                     @if(count($menu->sub_menus) != '0')
                                      <ul class="firstul">
                                       @foreach($menu->sub_menus as $submenu)
                               
                                        <li class="secondli"><span><input  type="checkbox" id="{{$submenu->id}}" name="checkboxlist[]" value="{{$submenu->id}}">{{$submenu->menu_name}}</span>
                                          @if(count($submenu->sub_menus) != '0')
                                          <ul>                   
                                                  @foreach($submenu->sub_menus as $subsubmenu)
                                                  <li><span><input type="checkbox"  id="{{$subsubmenu->id}}" name="checkboxlist[]" value="{{$subsubmenu->id}}">{{$subsubmenu->menu_name}}</span>
                                                  </li>
                                                  @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                       @endforeach
                                      </ul>
                                     @endif 
                                </li>
                               @endif
                            @endforeach
                              
                            </ul>
                          </div>



                        </div> -->

      <div class="row">
         <div class="form-group col-md-12 mb-2">
            <div class="selectmenu">
               <div class="menus-heading">
                  <h2>Menus</h2>
               </div>
               <div class="menus-accordian">
                  <div class="">
                     <ul class="parentlist">
                      @foreach($menus as $menu)
                         @if($menu->menu_parent == '0')
                          <li class="first-parent">
                            <span class="select-box firstselect">+</span>
                              <h3>{{$menu->menu_name}}</h3>
                                <input type="checkbox" hidden value="settings">
                                  @if(count($menu->sub_menus) != '0')
                                    <ul class="subcategory">
                                        @foreach($menu->sub_menus as $submenu)
                                          <!--second li--> 
                                          <li class="secondli">
                                             
                                            @if(count($submenu->sub_menus) != '0')
                                             <span class="select-box secondselect">+</span>
                                             <h3>{{$submenu->menu_name}}</h3>
                                             <input type="checkbox" hidden value="settings">
                                                 
                                                 <ul class="thirdli">
                                                    @foreach($submenu->sub_menus as $subsubmenu)
                                                    <li class="thirdlilist">
                                                       <label class="container-check">
                                                          <h3>{{$subsubmenu->menu_name}}</h3>
                                                          <input type="checkbox"  id="{{$subsubmenu->id}}" name="checkboxlist[]" value="{{$subsubmenu->id}}">
                                                          <span class="checkmark"></span>
                                                       </label>
                                                    </li>
                                                    @endforeach
                                                 </ul>
                                            @else
                                              
                                                       <label class="container-check">
                                                          <h3>{{$submenu->menu_name}}</h3>
                                                          <input type="checkbox" id="{{$submenu->id}}" name="checkboxlist[]" value="{{$submenu->id}}">
                                                          <span class="checkmark"></span>
                                                       </label>
                                                    
                                            @endif

                                          </li>
                                        @endforeach
                                     </ul>
                                  @endif
                          </li>
                        @endif
                      @endforeach
                     </ul>
                  </div>
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
@section('js')
<script>
         $(document).ready(function(){
          
          $(".first-parent .firstselect").click(function(){
           $(this).parent().toggleClass("changedesign");
           //change plus sign
           var gettext =  $(this).parent().find(".select-box").first().text();
          
           if(gettext == "+"){
           $(this).parent().find(".select-box").first().text("-");
            }
           else{
             $(this).parent().find(".select-box").first().text("+");
           }
           $(this).parent().find(".subcategory").fadeToggle();
           
         
          })
            $(".secondli .secondselect").click(function(){
            $(this).parent().find(".thirdli").fadeToggle();
            var secondtext = $(this).text();
            if(secondtext == "+"){
              $(this).text("-");
            }
            else{
              $(this).text("+");
            }
           })
         }) 
      </script>


<!-- <script>

//////////////////////////////////////////////////////////////menu

    $.fn.extend({

    treed: function (o) {

      var openedClass = 'la la-minus';

      var closedClass = 'la la-plus';      

      if (typeof o != 'undefined'){

        if (typeof o.openedClass != 'undefined'){

        openedClass = o.openedClass;

        }

        if (typeof o.closedClass != 'undefined'){

        closedClass = o.closedClass;

        }

      };

        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon plus_class " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews

//////////////////////////////////////////////////////////////active deactive menu

$('#tree1').treed();
    $('input[type=checkbox]').click(function(){
    if(this.checked){ // if checked - check all parent checkboxes
        $(this).parents('li').children('input[name=checkboxlist]:checked').prop('checked',true);
        var searchIDs = $("input[name=checkboxlist]:checked").map(function(){
            return $(this).val();
      }).get();
    }
    else
    {
        var delIds = $("input[name=checkboxlist]:checked:not(:checked)").map(function(){
        return $(this).val();
        }).get(); //
    }
    // children checkboxes depend on current checkbox
    $(this).parent().find('input[type=checkbox]').prop('checked',this.checked); 
});

    </script> -->
@endsection
@endsection