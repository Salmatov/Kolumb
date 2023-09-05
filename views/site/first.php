<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<form method="post" action="form/add">
    <div class="form-group">
        <label for="partnerName">Name</label>
        <input type="text" class="form-control" id="partnerName" aria-describedby="NameHelp" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="partnerAddress">Address</label>
        <input type="text" class="form-control" id="partnerAddress" aria-describedby="AddressHelp" placeholder="Enter Address">
    </div>
    <div class="form-group">
        <label for="partnerPhone">Phone</label>
        <input type="text" class="form-control" id="partnerPhone" aria-describedby="PhoneHelp" placeholder="Enter Phone">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>