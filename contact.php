<?php include "inc/header.php" ?>
<?php include "inc/header-top.php" ?>
<?php /*include "inc/news_mq_s.php"*/ ?>
<?php include "inc/menu.php" ?>

<section id="contentSection">
<div class="row">
  <div class="col-lg-6">

<form name="myform" class="well form-horizontal" action=" " method="post"  id="contact_form" novalidate="">
<fieldset>

<!-- Form Name -->
<legend>Contact Us Today!</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">Name <span style="color: red;" title="This Name Field is Required.">*</span></label>
  <div class="col-md-6 inputGroupContainer">
      
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input  name="first_name" placeholder="Name" class="form-control"  type="text" ng-model="user.first_name" ng-required="true">
  </div>
   <p ng-show="myform.first_name.$invalid && myform.first_name.$touched" class="text-danger">You must fill out your first name.</p>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label">E-Mail <span style="color: red;" title="This E-Mail Field is Required.">*</span></label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="email" ng-model="user.email" ng-required="true">
    </div>
    <p ng-show="myform.email.$invalid && myform.email.$touched" class="text-danger">You must fill out your Email Address.</p>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone <span style="color: red;" title="This Phone Field is Required.">*</span></label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text" ng-model="user.phone" ng-minlength="11"  ng-required="true">
    </div>
    <p ng-show="myform.phone.$invalid && myform.phone.$touched" class="text-danger">Phone Number must be at 11 Characters.</p>
  </div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Address</label>  
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
  <input name="address" placeholder="Address" class="form-control" type="text" ng-model="user.address">
    </div>
  </div>
</div>

<!-- Text area -->
  
<div class="form-group">
  <label class="col-md-4 control-label">Description</label>
    <div class="col-md-6 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
          <textarea class="form-control" name="comment" placeholder="Project Description" ng-model="user.comment"></textarea>
  </div>
  </div>
</div>

<!-- Success message -->


<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-6">
    <button type="submit" class="btn btn-theme" >Send <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>
</div>
<div class="col-lg-6">
  <?php 
  $gmaps = '<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3736489.7218514383!2d90.21589792292741!3d23.857125486636733!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1506502314230" width="100%" height="425" frameborder="0" style="border:0" allowfullscreen></iframe>';
  if ($gmaps) {
    echo $gmaps;
  }else{
    echo "Our Address: 30/A, Naya Paltan, Dhaka - 1000";
  }
  ?>
</div>
</div>
<!-- /.row -->
</section>
<?php include 'inc/footer.php'; ?>