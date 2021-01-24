<?php $__env->startSection('content'); ?>

<style>
#container {
    height: 400px; 
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}
</style>
<div class="row">

<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.dbmlist')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="warning"><?php echo $userDBM;?> </h3>
                            <h6>Pneck DBM</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.distributorlist')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info"><?php echo $userDistributor;?> </h3>
                            <h6>Pneck Distributor</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.agentlist')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?php echo $userAgent;?> </h3>
                            <h6>Pneck Agent</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Driver tab -->

<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.agentlist')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?php echo $userAgent;?> </h3>
                            <h6>Pneck Drivers</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Driver tab   -->
 
<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <!-- <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.pneckusers')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?php echo $userCount;?> </h3>
                            <h6>Pneck Users</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div> -->
    </div>
<?php } ?>

<?php if(Auth::user()->id == 1) {?>

<div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.pneckusers')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="success"><?php echo $userCount;?> </h3>
                            <h6>Pneck Users</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
<?php } ?>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.pneckemployee')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="info"><?php echo $EmployeeCount;?></h3>
                            <h6>Pneck Employee</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow info font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.pneckvendors')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="warning"><?php echo $VendorCount; ?></h3>
                            <h6>Pneck Vendors</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="danger">99.89 %</h3>
                            <h6>User's Feedback</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow danger font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php if(Auth::user()->id != 1 && $agentCount != '') {?>

    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card pull-up">
            <div class="card-content">
            <a href="<?php echo e(route('admin.agentlist')); ?>">
                <div class="card-body">
                    <div class="media d-flex">
                        <div class="media-body text-left">
                            <h3 class="warning"><?php echo $agentCount; ?></h3>
                            <h6>Assign Agent</h6>
                        </div>
                        <div>
                            <i class="icon-user-follow warning font-large-2 float-right"></i>
                        </div>
                    </div>
                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div> </a>
            </div>
        </div>
    </div>

<?php } ?>

</div> 

<!--/ eCommerce statistic -->

<!--Recent Orders & Monthly Sales -->
<?php if(Auth::user()->id == 1) {?>
<div class="row match-height">
    <div class="col-xl-12 col-lg-12">
           <div class="card"> 
                <div class="card-content ">
                    <div id="cost-revenue" class="height-10 position-relative"></div>
                </div>
                <div class="card-footer">
                    <div class="row mt-1">
                        <div class="col-3 text-center">
                        <i class="font-large-2 float-left">
                        <img src="<?php echo e(url('/admin_theme/app-assets/images/logo/delevery_boy.png')); ?>"/>
                        </i>
                            <h6 class="text-muted">Total Success Rides</h6>
                            <h2 class="block font-weight-normal"><?php echo $totalSuccessRides;?></h2>
                            
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                        </div>
                        <div class="col-3 text-center">
                        <i class="font-large-2 float-left">
                        <img src="<?php echo e(url('/admin_theme/app-assets/images/logo/delevery_boy.png')); ?>"/>
                        </i>
                            <h6 class="text-muted">Total Failed Rides</h6>
                            <h2 class="block font-weight-normal"><?php echo $totalFailRides;?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>                       
                        <div class="col-3 text-center">
                        <i class="font-large-2 float-left">
                        <img src="<?php echo e(url('/admin_theme/app-assets/images/logo/cod.png')); ?>"/>
                        </i>
                            <h6 class="text-muted">Total COD Rides</h6>
                            <h2 class="block font-weight-normal"><?php echo $totalCOD;?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="col-3 text-center">
                        <i class="font-large-2 float-left">
                        <img src="<?php echo e(url('/admin_theme/app-assets/images/logo/rs.png')); ?>"/>
                        </i>
                            <h6 class="text-muted">Total Booking Charge Earning</h6>
                            <h2 class="block font-weight-normal"><?php echo $totalEarning;?></h2>
                            <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div> 
                    </div>
                </div>
             </div> 
        </div>
<?php } ?>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body sales-growth-chart">
                   <!-- <div id="monthly-sales" class="height-250"></div> -->

                   <figure class="highcharts-figure">
                    <div id="container"></div>
                    
                    <!-- <p class="highcharts-description">
                        Chart with buttons to modify options, showing how options can be changed
                        on the fly. This flexibility allows for more dynamic charts.
                    </p> -->

                   <!-- <button id="plain">Plain</button>
                    <button id="inverted">Inverted</button>
                    <button id="polar">Polar</button> -->
                </figure>

                </div>
            </div>
            <div class="card-footer">
                <div class="chart-title mb-1 text-center">
                    <h6>Total monthly Sales.</h6>
                </div>
                <div class="chart-stats text-center">
                    <a href="#" class="btn btn-sm btn-danger box-shadow-2 mr-1">Statistics <i class="ft-bar-chart"></i></a> <span class="text-muted"></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Recent Orders & Monthly Sales -->

<!-- Products sell and New Orders -->
<!--  <div class="row match-height">
    <div class="col-xl-12 col-12" id="ecommerceChartView">
        <div class="card card-shadow">
          <div class="card-header card-header-transparent py-20">
            <div class="btn-group dropdown">
              <a href="#" class="text-body dropdown-toggle blue-grey-700" data-toggle="dropdown">PRODUCTS SALES</a>
              <div class="dropdown-menu animate" role="menu">
                <a class="dropdown-item" href="#" role="menuitem">Sales</a>
                <a class="dropdown-item" href="#" role="menuitem">Total sales</a>
                <a class="dropdown-item" href="#" role="menuitem">profit</a>
              </div>
            </div>
            <ul class="nav nav-pills nav-pills-rounded chart-action float-right btn-group" role="group">
              <li class="nav-item"><a class="active nav-link" data-toggle="tab" href="#scoreLineToDay">Day</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToWeek">Week</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#scoreLineToMonth">Month</a></li>
            </ul>
          </div>
          <div class="widget-content tab-content bg-white p-20">
            <div class="ct-chart tab-pane active scoreLineShadow" id="scoreLineToDay"></div>
            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToWeek"></div>
            <div class="ct-chart tab-pane scoreLineShadow" id="scoreLineToMonth"></div>
          </div>
        </div>
    </div>
   <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">New Orders</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="new-orders" class="media-list position-relative">
                    <div class="table-responsive">
                        <table id="new-orders-table" class="table table-hover table-xl mb-0">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Product</th>
                                    <th class="border-top-0">Customers</th>
                                    <th class="border-top-0">Total</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate">iPhone X</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">                                               
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="John Doe"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-19.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Katherine Nichols"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-18.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joseph Weaver"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-17.png')); ?>" alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">                                            
                                                <span class="badge badge-info">+4 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$8999</td>                                
                                </tr>
                                <tr>
                                    <td class="text-truncate">Pixel 2</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">                                               
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Scott"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-16.png')); ?>" alt="Avatar">
                                            </li>

                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Charles Miller"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-15.png')); ?>" alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$5550</td>                                
                                </tr>
                                <tr>
                                    <td class="text-truncate">OnePlus</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">                                               
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Christine Ramos"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-11.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Thomas Brewer"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-10.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Alice Chapman"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-9.png')); ?>" alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">                                            
                                                <span class="badge badge-info">+3 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$9000</td>                                
                                </tr>
                                <tr>
                                    <td class="text-truncate">Galaxy</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">                                               
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Ryan Schneider"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-14.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Tiffany Oliver"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-13.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Joan Reid"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-12.png')); ?>" alt="Avatar">
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$7500</td>                                
                                </tr>                            
                                <tr>
                                    <td class="text-truncate">Moto Z2</td>
                                    <td class="text-truncate p-1">
                                        <ul class="list-unstyled users-list m-0">                                               
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-8.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-7.png')); ?>" alt="Avatar">
                                            </li>
                                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones"  class="avatar avatar-sm pull-up">
                                                <img class="media-object rounded-circle" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-6.png')); ?>" alt="Avatar">
                                            </li>
                                            <li class="avatar avatar-sm">                                            
                                                <span class="badge badge-info">+1 more</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-truncate">$8500</td>                                
                                </tr>                                                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div> -->
<!--/ Products sell and New Orders -->

<!-- Recent Transactions -->
<!-- <div class="row">
    <div id="recent-transactions" class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Transactions</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a class="btn btn-sm btn-danger box-shadow-2 round btn-min-width pull-right" href="invoice-summary.html" target="_blank">Invoice Summary</a></li>
                    </ul>
                </div>
            </div>            
            <div class="card-content">                
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover table-xl mb-0">
                        <thead>
                            <tr>
                                <th class="border-top-0">Status</th>                                
                                <th class="border-top-0">Invoice#</th>
                                <th class="border-top-0">Customers Mobile</th>
                             
                                <th class="border-top-0">Categories</th>
                                <th class="border-top-0">Shipping</th>
                                <th class="border-top-0">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o success font-medium-1 mr-1"></i> Paid</td>
                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                        <img class="box-shadow-2" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-4.png')); ?>" alt="avatar">
                                    </span>
                                    <span>Elizabeth W.</span>
                                </td>
                               <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">                                               
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-1.jpg')); ?>" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-2.jpg')); ?>" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Rebecca Jones" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-4.jpg')); ?>" alt="Avatar">
                                        </li>
                                        <li class="avatar avatar-sm">                                            
                                            <span class="badge badge-info">+1 more</span>
                                        </li>
                                    </ul>
                                </td> 
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-danger round">Food</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                       
                                    </div>
                                </td>
                                <td class="text-truncate">$ 1200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o danger font-medium-1 mr-1"></i> Declined</td>
                                <td class="text-truncate"><a href="#">INV-001002</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                        <img class="box-shadow-2" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-5.png')); ?>" alt="avatar">
                                    </span>
                                    <span>Doris R.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">                                               
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-5.jpg')); ?>" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-6.jpg')); ?>" alt="Avatar">
                                        </li>                                        
                                        <li class="avatar avatar-sm">                                            
                                            <span class="badge badge-info">+2 more</span>
                                        </li>
                                    </ul>
                                </td> 
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-warning round">Electronics</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>   
                                    </div>
                                </td>
                                <td class="text-truncate">$ 1850.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate"><i class="la la-dot-circle-o warning font-medium-1 mr-1"></i> Pending</td>
                                <td class="text-truncate"><a href="#">INV-001003</a></td>
                                <td class="text-truncate">
                                    <span class="avatar avatar-xs">
                                        <img class="box-shadow-2" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-6.png')); ?>" alt="avatar">
                                    </span>
                                    <span>Megan S.</span>
                                </td>
                                <td class="text-truncate p-1">
                                    <ul class="list-unstyled users-list m-0">                                               
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Kimberly Simmons" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-2.jpg')); ?>" alt="Avatar">
                                        </li>
                                        <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Willie Torres" class="avatar avatar-sm pull-up">
                                            <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="<?php echo e(url('/admin_theme/app-assets/images/portfolio/portfolio-5.jpg')); ?>" alt="Avatar">
                                        </li>
                                    </ul>
                                </td> 
                                <td>
                                    <button type="button" class="btn btn-sm btn-outline-success round">Groceries</button>
                                </td>
                                <td>
                                    <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                    
                                    </div>
                                </td>
                                <td class="text-truncate">$ 3200.00</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!--/ Recent Transactions -->



<!-- Basic Horizontal Timeline -->
 <!-- <div class="row match-height">
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Card</h4>
            </div>
            <div class="card-content">
                <img class="img-fluid" src="<?php echo e(url('/admin_theme/app-assets/images/carousel/05.jpg')); ?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-left">3 hours ago</span>
                <span class="float-right">
                    <a href="#" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                  </span>
            </div>
        </div>
    </div>
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Horizontal Timeline</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="card-text">
                        <section class="cd-horizontal-timeline">
                            <div class="timeline">
                                <div class="events-wrapper">
                                    <div class="events">
                                        <ol>
                                            <li><a href="#0" data-date="16/01/2015" class="selected">16 Jan</a></li>
                                            <li><a href="#0" data-date="28/02/2015">28 Feb</a></li>
                                            <li><a href="#0" data-date="20/04/2015">20 Mar</a></li>
                                            <li><a href="#0" data-date="20/05/2015">20 May</a></li>
                                            <li><a href="#0" data-date="09/07/2015">09 Jul</a></li>
                                            <li><a href="#0" data-date="30/08/2015">30 Aug</a></li>
                                            <li><a href="#0" data-date="15/09/2015">15 Sep</a></li>
                                        </ol>
                                        <span class="filling-line" aria-hidden="true"></span>
                                    </div>
                                    
                                </div>
                               
                                <ul class="cd-timeline-navigation">
                                    <li><a href="#0" class="prev inactive">Prev</a></li>
                                    <li><a href="#0" class="next">Next</a></li>
                                </ul>
                               
                            </div>
                           
                            <div class="events-content">
                                <ol>
                                    <li class="selected" data-date="16/01/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-5.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="28/02/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-6.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/04/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-7.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/05/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-8.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="09/07/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-9.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="30/08/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-6.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="15/09/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="<?php echo e(url('/admin_theme/app-assets/images/portrait/small/avatar-s-7.png')); ?>" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                </ol>
                            </div>
                           
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div> -->
<!--/ Basic Horizontal Timeline -->
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/highcharts.js')); ?>" type="text/javascript"></script>
<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
<script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/highcharts-more.js')); ?>" type="text/javascript"></script>
<!-- <script src="https://code.highcharts.com/highcharts-more.js"></script> -->
<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
<script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/exporting.js')); ?>" type="text/javascript"></script>
<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->
<script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/export-data.js')); ?>" type="text/javascript"></script>
<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<script src="<?php echo e(url('/admin_theme/app-assets/js/scripts/accessibility.js')); ?>" type="text/javascript"></script>

<script>
var chart = Highcharts.chart('container', {

title: {
    text: 'Pneck Sales'
},

subtitle: {
    text: 'Monthly/Yearly'
},

xAxis: {
    //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    categories: [<?php echo $month;?>]
},

series: [{
    type: 'column',
    colorByPoint: true,
    data: [<?php echo $monthsales;?>],
    showInLegend: false
}]

});


$('#plain').click(function () {
chart.update({
    chart: {
        inverted: false,
        polar: false
    },
    subtitle: {
        text: 'Plain'
    }
});
});

$('#inverted').click(function () {
chart.update({
    chart: {
        inverted: true,
        polar: false
    },
    subtitle: {
        text: 'Inverted'
    }
});
});

$('#polar').click(function () {
chart.update({
    chart: {
        inverted: false,
        polar: true
    },
    subtitle: {
        text: 'Polar'
    }
});
});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pneck_backend\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>