@php
$popups_blanks=DB::table('pop_ups')->where('popup_for','0')->get();
 $datas = !empty($request)?$request->session()->all():'';
            // dd($popups_blanks);
@endphp

@if(!empty($popups))
@foreach($popups as $popup)
@if($popup->popup_type == '1')
<script>
  $('a.check').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    check(url);
  });

  function check(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, check it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup->popup_title}}", 
      text: "{{$popup->popup_message}}", 
      type: "success",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>

@elseif($popup->popup_type == '2')
<script>
  $('a.uncheck').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    uncheck(url);
  });

  function uncheck(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, uncheck it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup->popup_title}}", 
      text: "{{$popup->popup_message}}", 
      type: "warning",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>


@elseif($popup->popup_type == '3')
<script>
  $('a.delete').click(function(e) {

    e.preventDefault();
    var url = $(this).attr("data-url");
    console.log(url);
    deletepop(url);
  });

  function deletepop(url) {
    // console.log(url);
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, delete it12!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup->popup_title}}", 
      text: "{{$popup->popup_message}}", 
      type: "error",
      
    }, function(isConfirm) {
        console.log('yes', isConfirm);

      $.ajax({
        url: url,
      success: function(data){
        
        // console.log(data);
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
 
  </script>
@elseif($popup->popup_type == '4')
<script>
  $('a.set').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    defaultpop(url);
  });

  function defaultpop(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, default it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup->popup_title}}", 
      text: "{{$popup->popup_message}}", 
      type: "success",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>
@endif

@php
$id[]=$popup->popup_type;
@endphp
@endforeach
@endif

@if(empty($id))
@php
$id = [];
@endphp
@else
@endif


@foreach($popups_blanks as $popup_blank)
@if(!in_array($popup_blank->popup_type, $id))
@if($popup_blank->popup_type == '1')
<script>
  $('a.check').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    check(url);
  });

  function check(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, check it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup_blank->popup_title}}", 
      text: "{{$popup_blank->popup_message}}", 
      type: "success",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>

@elseif($popup_blank->popup_type == '2')
<script>
  $('a.uncheck').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    uncheck(url);
  });

  function uncheck(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, uncheck it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup_blank->popup_title}}", 
      text: "{{$popup_blank->popup_message}}", 
      type: "warning",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>
@elseif($popup_blank->popup_type == '3')
<script>
  $('a.delete').click(function(e) {
    e.preventDefault();
    var url = $(this).attr("data-url");
    console.log(url);
    deletepop(url);
  });

  function deletepop(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, delete it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup_blank->popup_title}}", 
      text: "{{$popup_blank->popup_message}}", 
      type: "error",
      
    }, function(isConfirm) {
      if(isConfirm)
        $.ajax({
          url: url,
        success: function(data){
          console.log(data);
          location.reload();
        },
        error: function(data){
          swal("Oops", "We couldn't connect to the server!", "error");
        },
        });
    });
  }
  </script>
@elseif($popup_blank->popup_type == '4')
<script>
  $('a.set').click(function() {
    var url = $(this).attr("data-url");
    console.log(url);
    defaultpop(url);
  });

  function defaultpop(url) {
    swal({
      showCancelButton: true,
      showConfirmButton: true,
      closeOnConfirm: true,
      confirmButtonText: "Yes, default it!",
      confirmButtonColor: '#d32f2f !important',
      title: "{{$popup_blank->popup_title}}", 
      text: "{{$popup_blank->popup_message}}", 
      type: "success",
      
    }, function() {
      $.ajax({
        url: url,
      success: function(data){
        location.reload();
      },
      error: function(data){
        swal("Oops", "We couldn't connect to the server!", "error");
      },
      });
    });
  }
  </script>

@endif
@endif
@endforeach
