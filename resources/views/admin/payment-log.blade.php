@extends('admin.layout.app')

@section('content')

        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          
          <!-- <h3 class="content-header-title mb-0 d-inline-block">Backend Data List</h3>-->
           <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Logs</li>
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
                  <h4 class="card-title">Payment Logs</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <!-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> -->
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>

            <div class="table-responsive scroll-container">
              <div class="card-content collapse show" >
                <div class="card-body card-dashboard">

                 <table  class="table table-striped table-bordered zero-configuration">
                      <thead>
                         <th style="text-align: center;"> Plan Name </th>
                         <th style="text-align: center;"> Product Name </th>
                         <th style="text-align: center;"> Payment Mode </th>
                         <th style="text-align: center;"> Subscription Type </th>
                         <th style="text-align: center;"> Status </th>
                         <th style="text-align: center;">Transactions Id </th>
                         <th style="text-align: center;"> Created At </th>
                         </thead>
                      <tbody>
                      @foreach($data as $row)
                      <tr style="text-align:center">
                        <td>{{ucfirst($row->plan_name)}}</td>
                        <td>{{$row->product_name}}</td>
                        <td>{{$row->pay_mode}}</td>
                        <td>{{$row->subscriptions_type}}</td>
                        <td>{{$row->status}}</td>
                        <td>{{$row->transactions_id}}</td>
                        <td>{{date('d M, Y h:i', strtotime($row->created_at))}}
                        </td>
                      </tr>
                      @endforeach
                      </tbody>

                 </table>
                </div>
              </div> 
            </div>
          </div>
         </div>
        </div>
      </section>
    </div>
<!--/ Column selectors table -->
@endsection