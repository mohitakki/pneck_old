@extends('admin.layout.app')
@section('css')
<style>
.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0;}

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

@media only screen and (min-width: 700px) {

    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }

}

.dd-hover > .dd-handle { background: #2ea8e5 !important; }


.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }

#load { height: 100%; width: 100%; }
        #load {
            position    : fixed;
            z-index     : 99; /* or higher if necessary */
            top         : 0;
            left        : 0;
            overflow    : hidden;
            text-indent : 100%;
            font-size   : 0;
            opacity     : 0.6;
            background  : #E0E0E0  url(<?php echo url('/loading.gif'); ?>) center no-repeat;
        }

        .del-button{
            cursor:pointer;
            text-decoration:none;
        }

        .edit-button{
            cursor:pointer;
            text-decoration:none;
        }

        .span-right{
            float:right;
        }

</style>
@endsection
@section('content')
 <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">  
          <h3 class="content-header-title mb-0 d-inline-block">Menu Sequence Change</h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Menus</li>
              </ol>
            </div>
          </div>
        </div>
      <div class="content-body">
        
        <!-- Column selectors table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Menu Sequence</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>

            <div style="margin:10px 30px 10px ;">
                <div id="load"></div>
                    <div class="cf nestable-lists">
                       <div class="dd" id="nestable">
                       <?php

                          $ref   = [];
                          $items = [];

                          foreach($menus as $menu) 
                          {
                            if($role == '1')
                            {
                              $thisRef = &$ref[$menu->id];
                              $thisRef['id'] = $menu->id;

                              $thisRef['parent'] = $menu->menu_parent;
                              $thisRef['label'] = $menu->menu_name;
                               if($menu->menu_parent == 0) 
                               {
                                    $items[$menu->id] = &$thisRef;
                               } else {
                                    $ref[$menu->menu_parent]['child'][$menu->id] = &$thisRef;
                               }
                            }
                            else
                            {
                              $thisRef = &$ref[$menu->menu_id];
                              $thisRef['id'] = $menu->menu_id;
                              $thisRef['parent'] = $menu->menu_parent;
                              $thisRef['label'] = $menu->menu_name;
                             if($menu->menu_parent == 0) 
                             {
                                  $items[$menu->menu_id] = &$thisRef;
                             } else {
                                  $ref[$menu->menu_parent]['child'][$menu->menu_id] = &$thisRef;
                             }
                            }


                          }
                        ?>

                            <?php 
                            function get_menu($items,$class = 'dd-list') {

                                $html = "<ol class=\"".$class."\" id=\"menu-id\">";
                                foreach($items as $key=>$value) {

                                    $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                                <div class="dd-handle dd3-handle">Drag</div>
                                                <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label'].'</span> 
                                                    <span class="span-right"><span id="link_show'.$value['id'].'"></span> 
                                                        <a class="edit-button" id="'.$value['id'].'" label="'.$value['label'].' ></a>
                                                        <a class="del-button" id="'.$value['id'].'"></a></span> 
                                                </div>';
                                    if(array_key_exists('child',$value)) {
                                        $html .= get_menu($value['child'],'child');
                                    }
                                        $html .= "</li>";
                                }
                                $html .= "</ol>";

                                return $html;

                            }
                             
                            print get_menu($items);

                            ?>
                      </div>
                  </div>
                <input type="hidden" id="nestable-output">
              </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<!--/ Column selectors table -->


@section('js')
<script src="{{ url('/admin_theme/jquery.nestable.js') }}"></script>

<script>

$(document).ready(function()
{
    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));

    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });


});
</script>

<script>
  $(document).ready(function(){
    $("#load").hide();
    $("#submit").click(function(){
       $("#load").show();

       var dataString = { 
              label : $("#label").val(),
              link : $("#link").val(),
              id : $("#id").val(),
              "_token": "{{ csrf_token() }}"
            };


        $.ajax({
            type: "POST",
            url: "{{ route('admin.sequencesorting-store')}}",
            data: dataString,
            dataType: "json",
            cache : false,
            success: function(data){
              if(data.type == 'add'){
                 $("#menu-id").append(data.menu);
              } else if(data.type == 'edit'){
                 $('#label_show'+data.id).html(data.label);
                 $('#link_show'+data.id).html(data.link);
              }
              $('#label').val('');
              $('#link').val('');
              $('#id').val('');
              $("#load").hide();
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

    $('.dd').on('change', function() {      
          var dataString = { 
              data : $("#nestable-output").val(),
              "_token": "{{ csrf_token() }}",
            };

        $.ajax({
            type: "POST",           
            url: "{{route('admin.sequencesorting-store')}}",
            data: dataString,
            cache : false,
            success: function(data){
                location.reload();
            } ,error: function(xhr, status, error) {
              alert(error);
            },
        });
    });

  });

</script>

@endsection

@endsection
