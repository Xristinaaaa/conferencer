<?php
use models\Category;
use models\Country;
use models\City;

$countries = Country::fetchAll();
$cities = City::fetchAll();
$categories = Category::fetchAll();
?>
<div class="modal fade" id="createConference" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center form-title">Create new conference</h4>
      </div>
      <div class="modal-body">
        <div class="login-box-body">
            <form role="form" action="/conferencer/app/controllers/createConference.php" method="POST" id="user-create-conference-form" data-toggle="validator">
                <div class="form-group">
                    <input class="form-control" type="text" name="confName" required placeholder="Name.." id="conf-name">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <select required class="form-control" name="category" id="category-drop-down" >
                        <option value="">Choose category</option>
                        <?php foreach($categories as &$category) { ?>     
                            <option value="<?= $category->getName() ?>"><?= $category->getName() ?></option>
                        <?php } ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <select class="form-control" name="country" id="country-drop-down">
                    <option selected="" disabled="">Choose country</option>
                        <?php foreach($countries as &$country) { ?>     
                            <option value="<?= $country->getName() ?>" id="<?= $country->getId() ?>"><?= $country->getName() ?></option>
                        <?php } ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <select class="form-control" name="city" id="city-drop-down">|
                        <option selected="" disabled="" style="display: none;">Choose city</option>
                        <?php foreach($cities as &$city) { ?>     
                            <option value="<?= $city->getName() ?>" country="<?= $city->getCountryId() ?>"><?= $city->getName() ?></option>
                        <?php } ?>
                    </select>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="confLocation" placeholder="Location or Address.." id="conf-location">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <textarea class="form-control" type="text" name="confDescription" placeholder="Description..." id="conf-description"></textarea>
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <input class="form-control datepicker" type="text" name="startDateOfConf" placeholder="Start date..." required id="startDateOfConf">
                     <span class="error"></span>
                </div>
                <div class="form-group">
                    <input class="form-control datepicker" type="text" name="endDateOfConf" placeholder="End date..." required id="endDateOfConf">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="confLecturer" placeholder="Lecturer.." id="conf-Lecturer">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="confCapacity" placeholder="Capacity.." id="conf-capacity">
                    <span class="error"></span>
                </div>
                <div class="form-group">
                    <div class="input-group"> 
                        <span class="input-group-addon">$</span>
                        <input type="number" value="50" name="confPrice" min="0" step="1" class="form-control currency" id="conf-price" />
                        <span class="error"></span>
                    </div> 
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="confCoverUrl" placeholder="Cover Url.."  id="form-coverUrl">
                    <span class="error"></span>
                </div>
                <button class="btn btn-green text-center" type="submit" id="create-conf-button">Create Event</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>