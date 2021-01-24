
@extends('admin.layout.app')

@section('content')

    <link rel="stylesheet" type="text/css" href="{{url('/admin_theme/assets/css/invoice.min.css')}}">
    
 
  


    <!-- BEGIN: Content-->
    
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-12 col-12 mb-12 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Invoice Details</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Invoice</a>
                  </li>
                  
                </ol>
              </div>
            </div>
          </div>
         
          <div class="content-header-right col-md-12 col-12">
            <div class="btn-group float-md-right"> </div>
          </div>   
          <div class="row"><hr/></div>
        </div>
        <div class="content-body"><section class="card">
  <div id="invoice-template" class="card-body p-12">
    <!-- Invoice Company Details -->
    <div id="invoice-company-details" class="row">
      <div class="col-sm-6 col-12 text-center text-sm-left">
        <div class="media row">
          
            <img src="{{ 'https://pneck.in/front_theme/images/logo-white.png' }}" alt="company logo" class="mb-1 mb-sm-0" />
        
          <div class="col-12 col-sm-9 col-xl-10">
            <div class="media-body">
              <ul class="ml-2 px-0 list-unstyled">
                <li class="text-bold-800">CALL PNECK SERVICE PVT.LTD.</li>
                <li>102,KIRATPUR,</li>
                <li>BIJNOR,</li>
                <li>UTTAR PRADESH,</li>
                <li>INDIA</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-12 text-center text-sm-right">
        <h2>INVOICE</h2>
        <p class="pb-sm-3"># INV-<?php echo $users->order_number;?></p>
        <ul class="px-0 list-unstyled">
          <!-- <li>Balance Due</li>
          <li class="lead text-bold-800"></li> -->
        </ul>
      </div>
    </div>
    <!-- Invoice Company Details -->

    <!-- Invoice Customer Details -->
    <div id="invoice-customer-details" class="row pt-2">
      <div class="col-12 text-center text-sm-left">
        <p class="text-muted">Bill To</p>
      </div>
      <div class="col-sm-6 col-12 text-center text-sm-left">
        <ul class="px-0 list-unstyled">
          <li class="text-bold-800">Customer Name: <?php echo $users->cust_firstName.' '.$users->cust_lastName;?></li>
          <li><?php echo $customeraddress;?></li>
          
        </ul>
      </div>
      <div class="col-sm-6 col-12 text-center text-sm-right">
        <p><span class="text-muted">Invoice Date :</span> {{date('d M, Y (h:i A)', strtotime($users->booking_complete_at))}}</p>
        <p><span class="text-muted">Terms :</span>Digital Receipt</p>
        <p><span class="text-muted">Due Date :</span> {{date('d M, Y (h:i A)', strtotime($users->booking_complete_at))}}</p>
      </div>
    </div>
    <!-- Invoice Customer Details -->

    <!-- Invoice Items Details -->
    <div id="invoice-items-details" class="pt-2">
      <div class="row">
        <div class="table-responsive col-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Item & Description</th>
               <!-- <th class="text-right">Rate</th>
                <th class="text-right">Hours</th> -->
                <th class="text-right">Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>
                  <p><?php echo $users->order_info;?></p>
                  <p class="text-muted">
                  </p>
                </td>
               <!-- <td class="text-right">$20.00/hr</td>
                <td class="text-right">120</td> -->
                <td class="text-right"><?php echo number_format((float)$users->pay_amount, 2, '.', '');?></td>
              </tr>
              
             
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-7 col-12 text-center text-sm-left">
          <p class="lead">Payment Methods: Cash On Delivery(COD)</p>
         <!-- <div class="row"> 
            <div class="col-sm-8">
              <div class="table-responsive">
                <table class="table table-borderless table-sm">
                  <tbody>
                    <tr>
                      <td>Bank name:</td>
                      <td class="text-right">ABC Bank, USA</td>
                    </tr>
                    <tr>
                      <td>Acc name:</td>
                      <td class="text-right">Amanda Orton</td>
                    </tr>
                    <tr>
                      <td>IBAN:</td>
                      <td class="text-right">FGS165461646546AA</td>
                    </tr>
                    <tr>
                      <td>SWIFT code:</td>
                      <td class="text-right">BTNPP34</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div> 
          </div> -->
        </div> 
        <div class="col-sm-5 col-12">
          <p class="lead">Total due</p>
          <div class="table-responsive">
            <table class="table">
              <tbody>
                <tr>
                  <td>Sub Total</td>
                  <td class="text-right"><?php echo number_format((float)$users->pay_amount, 2, '.', '');?></td>
                </tr>
                <tr>
                  <td>GST (18%)</td>
                  <td class="text-right"><?php echo number_format((float)$GSTamount, 2, '.', '');?></td>
                </tr>
                <tr>
                  <td class="text-bold-800">Total</td>
                  <td class="text-bold-800 text-right"><?php echo number_format((float)$grandTotal, 2, '.', '');?></td>
                </tr>
                <!-- <tr>
                  <td>Payment Made</td>
                  <td class="pink text-right">(-) $4,688.00</td>
                </tr> -->
               <!-- <tr class="bg-grey bg-lighten-4">
                  <td class="text-bold-800">Balance Due</td>
                  <td class="text-bold-800 text-right">$12,000.00</td>
                </tr> -->
              </tbody>
            </table>
          </div>
          <div class="text-center">
            <p class="mb-0 mt-1">Authorized person</p>
            <img src="../../../app-assets/images/pages/signature-scan.png" alt="signature" class="height-100" />
            <h6>Mohammad Badaruddin</h6>
            <p class="text-muted">Managing Director</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Invoice Footer -->
    <div id="invoice-footer">
      <div class="row">
        <div class="col-sm-7 col-12 text-center text-sm-left">
          <h6>Pneck Terms & Condition</h6>
          <p>This is Digitaly Inovice Generated By Computer.</p>
          <p>This invoice will not be involve any type of legal activities.</p>
        </div>
        <div class="col-sm-5 col-12 text-center">
          <button type="button" class="btn btn-info btn-print btn-lg my-1"><i class="la la-paper-plane-o mr-50"></i>
            Print
            Invoice</button>
        </div>
      </div>
    </div>
    <!-- Invoice Footer -->

  </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-danger box-shadow-3" href="#"><i class="ft-settings font-medium-3 spinner white"></i></a><div class="customizer-content p-2">
	<h4 class="text-uppercase mb-0">Theme Customizer</h4>
	<hr>
	<p>Customize & Preview in Real Time</p>
	<h5 class="mt-1 mb-1 text-bold-500">Menu Color Options</h5>
	<div class="form-group">
		<!-- Outline Button group -->
		<div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
			<button type="button" class="btn btn-outline-info" data-sidebar="menu-light">Light Menu</button>
			<button type="button" class="btn btn-outline-info" data-sidebar="menu-dark">Dark Menu</button>
		</div>
	</div>
	<hr>
	<h5 class="mt-1 text-bold-500">Layout Options</h5>
	<ul class="nav nav-tabs nav-underline nav-justified layout-options">
		<li class="nav-item">
			<a class="nav-link layouts active" id="baseIcon-tab21" data-toggle="tab" aria-controls="tabIcon21" href="#tabIcon21" aria-expanded="true">Layouts</a>
		</li>
		<li class="nav-item">
			<a class="nav-link navigation" id="baseIcon-tab22" data-toggle="tab" aria-controls="tabIcon22" href="#tabIcon22" aria-expanded="false">Navigation</a>
		</li>
		<li class="nav-item">
			<a class="nav-link navbar" id="baseIcon-tab23" data-toggle="tab" aria-controls="tabIcon23" href="#tabIcon23" aria-expanded="false">Navbar</a>
		</li>
	</ul>
	<div class="tab-content px-1 pt-1">
		<div role="tabpanel" class="tab-pane active" id="tabIcon21" aria-expanded="true" aria-labelledby="baseIcon-tab21">
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="collapsed-sidebar" id="collapsed-sidebar">
				<label class="custom-control-label" for="collapsed-sidebar">Collapsed Menu</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="fixed-layout" id="fixed-layout">
				<label class="custom-control-label" for="fixed-layout">Fixed Layout</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
				<label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="static-layout" id="static-layout">
				<label class="custom-control-label" for="static-layout">Static Layout</label>
			</div>
		</div>
		<div class="tab-pane" id="tabIcon22" aria-labelledby="baseIcon-tab22">
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="native-scroll" id="native-scroll">
				<label class="custom-control-label" for="native-scroll">Native Scroll</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="right-side-icons" id="right-side-icons">
				<label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="bordered-navigation" id="bordered-navigation">
				<label class="custom-control-label" for="bordered-navigation">Bordered Navigation</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="flipped-navigation" id="flipped-navigation">
				<label class="custom-control-label" for="flipped-navigation">Flipped Navigation</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="collapsible-navigation" id="collapsible-navigation">
				<label class="custom-control-label" for="collapsible-navigation">Collapsible Navigation</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="static-navigation" id="static-navigation">
				<label class="custom-control-label" for="static-navigation">Static Navigation</label>
			</div>
		</div>
		<div class="tab-pane" id="tabIcon23" aria-labelledby="baseIcon-tab23">
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="brand-center" id="brand-center">
				<label class="custom-control-label" for="brand-center">Brand Center</label>
			</div>
			<div class="custom-control custom-checkbox mb-1">
				<input type="checkbox" class="custom-control-input" name="navbar-static-top" id="navbar-static-top">
				<label class="custom-control-label" for="navbar-static-top">Static Top</label>
			</div>
		</div>
	</div>
	<hr>
	<h5 class="mt-1 text-bold-500">Navigation Color Options</h5>
	<ul class="nav nav-tabs nav-underline nav-justified color-options">
		<li class="nav-item w-100">
			<a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1" href="#clrOpt1" aria-expanded="false">Semi Light</a>
		</li>
		<li class="nav-item  w-100">
			<a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="#clrOpt2" aria-expanded="false">Semi Dark</a>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="#clrOpt3" aria-expanded="false">Dark</a>
		</li>
		<li class="nav-item">
			<a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="#clrOpt4" aria-expanded="true">Light</a>
		</li>
	</ul>
	<div class="tab-content px-1 pt-1">
		<div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true" aria-labelledby="color-opt-1">
			<div class="row">
				<div class="col-6">
					<h6>Solid</h6>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="default">
						<label class="custom-control-label" for="default">Default</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="primary">
						<label class="custom-control-label" for="primary">Primary</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="danger">
						<label class="custom-control-label" for="danger">Danger</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-success" id="success">
						<label class="custom-control-label" for="success">Success</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="blue">
						<label class="custom-control-label" for="blue">Blue</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="cyan">
						<label class="custom-control-label" for="cyan">Cyan</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="pink">
						<label class="custom-control-label" for="pink">Pink</label>
					</div>
				</div>
				<div class="col-6">
					<h6>Gradient</h6>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" checked class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue">
						<label class="custom-control-label" for="bg-gradient-x-grey-blue">Default</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary">
						<label class="custom-control-label" for="bg-gradient-x-primary">Primary</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger">
						<label class="custom-control-label" for="bg-gradient-x-danger">Danger</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success">
						<label class="custom-control-label" for="bg-gradient-x-success">Success</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue">
						<label class="custom-control-label" for="bg-gradient-x-blue">Blue</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan">
						<label class="custom-control-label" for="bg-gradient-x-cyan">Cyan</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink">
						<label class="custom-control-label" for="bg-gradient-x-pink">Pink</label>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" checked class="custom-control-input bg-default" data-bg="bg-default" id="opt-default">
				<label class="custom-control-label" for="opt-default">Default</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="opt-primary">
				<label class="custom-control-label" for="opt-primary">Primary</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="opt-danger">
				<label class="custom-control-label" for="opt-danger">Danger</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="opt-success">
				<label class="custom-control-label" for="opt-success">Success</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="opt-blue">
				<label class="custom-control-label" for="opt-blue">Blue</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="opt-cyan">
				<label class="custom-control-label" for="opt-cyan">Cyan</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-sdark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="opt-pink">
				<label class="custom-control-label" for="opt-pink">Pink</label>
			</div>
		</div>
		<div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
			<div class="row">
				<div class="col-6">
					<h3>Solid</h3>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="solid-blue-grey">
						<label class="custom-control-label" for="solid-blue-grey">Default</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="solid-primary">
						<label class="custom-control-label" for="solid-primary">Primary</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="solid-danger">
						<label class="custom-control-label" for="solid-danger">Danger</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="solid-success">
						<label class="custom-control-label" for="solid-success">Success</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="solid-blue">
						<label class="custom-control-label" for="solid-blue">Blue</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="solid-cyan">
						<label class="custom-control-label" for="solid-cyan">Cyan</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="solid-pink">
						<label class="custom-control-label" for="solid-pink">Pink</label>
					</div>
				</div>

				<div class="col-6">
					<h3>Gradient</h3>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue1">
						<label class="custom-control-label" for="bg-gradient-x-grey-blue1">Default</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary1">
						<label class="custom-control-label" for="bg-gradient-x-primary1">Primary</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger1">
						<label class="custom-control-label" for="bg-gradient-x-danger1">Danger</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success1">
						<label class="custom-control-label" for="bg-gradient-x-success1">Success</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue1">
						<label class="custom-control-label" for="bg-gradient-x-blue1">Blue</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan1">
						<label class="custom-control-label" for="bg-gradient-x-cyan1">Cyan</label>
					</div>
					<div class="custom-control custom-radio mb-1">
						<input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink1">
						<label class="custom-control-label" for="bg-gradient-x-pink1">Pink</label>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey bg-lighten-4" id="light-blue-grey">
				<label class="custom-control-label" for="light-blue-grey">Default</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-primary" data-bg="bg-primary bg-lighten-4" id="light-primary">
				<label class="custom-control-label" for="light-primary">Primary</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-danger" data-bg="bg-danger bg-lighten-4" id="light-danger">
				<label class="custom-control-label" for="light-danger">Danger</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-success" data-bg="bg-success bg-lighten-4" id="light-success">
				<label class="custom-control-label" for="light-success">Success</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-blue" data-bg="bg-blue bg-lighten-4" id="light-blue">
				<label class="custom-control-label" for="light-blue">Blue</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan bg-lighten-4" id="light-cyan">
				<label class="custom-control-label" for="light-cyan">Cyan</label>
			</div>
			<div class="custom-control custom-radio mb-1">
				<input type="radio" name="nav-light-clr" class="custom-control-input bg-pink" data-bg="bg-pink bg-lighten-4" id="light-pink">
				<label class="custom-control-label" for="light-pink">Pink</label>
			</div>
		</div>
	</div>
</div>
    </div>
    <!-- End: Customizer-->

    
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Page JS-->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

    <script>
    $(document).ready((function(){$(".btn-print").click((function(){window.print()}))}));
    </script>

   <!-- <script src="../../../app-assets/js/scripts/pages/invoice-template.min.js"></script> -->
    <!-- END: Page JS-->
    @endsection