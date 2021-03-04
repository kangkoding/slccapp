<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Users <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Ip Address <?php echo form_error('ip_address') ?></label>
            <input type="text" class="form-control" name="ip_address" id="ip_address" placeholder="Ip Address" value="<?php echo $ip_address; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="text" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Salt <?php echo form_error('salt') ?></label>
            <input type="text" class="form-control" name="salt" id="salt" placeholder="Salt" value="<?php echo $salt; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Activation Code <?php echo form_error('activation_code') ?></label>
            <input type="text" class="form-control" name="activation_code" id="activation_code" placeholder="Activation Code" value="<?php echo $activation_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Forgotten Password Code <?php echo form_error('forgotten_password_code') ?></label>
            <input type="text" class="form-control" name="forgotten_password_code" id="forgotten_password_code" placeholder="Forgotten Password Code" value="<?php echo $forgotten_password_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Forgotten Password Time <?php echo form_error('forgotten_password_time') ?></label>
            <input type="text" class="form-control" name="forgotten_password_time" id="forgotten_password_time" placeholder="Forgotten Password Time" value="<?php echo $forgotten_password_time; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Remember Code <?php echo form_error('remember_code') ?></label>
            <input type="text" class="form-control" name="remember_code" id="remember_code" placeholder="Remember Code" value="<?php echo $remember_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Created On <?php echo form_error('created_on') ?></label>
            <input type="text" class="form-control" name="created_on" id="created_on" placeholder="Created On" value="<?php echo $created_on; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Last Login <?php echo form_error('last_login') ?></label>
            <input type="text" class="form-control" name="last_login" id="last_login" placeholder="Last Login" value="<?php echo $last_login; ?>" />
        </div>
	    <div class="form-group">
            <label for="tinyint">Active <?php echo form_error('active') ?></label>
            <input type="text" class="form-control" name="active" id="active" placeholder="Active" value="<?php echo $active; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Full Name <?php echo form_error('full_name') ?></label>
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Company <?php echo form_error('company') ?></label>
            <input type="text" class="form-control" name="company" id="company" placeholder="Company" value="<?php echo $company; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Phone <?php echo form_error('phone') ?></label>
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $phone; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Origin <?php echo form_error('origin') ?></label>
            <input type="text" class="form-control" name="origin" id="origin" placeholder="Origin" value="<?php echo $origin; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Birth Date <?php echo form_error('birth_date') ?></label>
            <input type="text" class="form-control" name="birth_date" id="birth_date" placeholder="Birth Date" value="<?php echo $birth_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Id Number <?php echo form_error('id_number') ?></label>
            <input type="text" class="form-control" name="id_number" id="id_number" placeholder="Id Number" value="<?php echo $id_number; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Gender <?php echo form_error('gender') ?></label>
            <input type="text" class="form-control" name="gender" id="gender" placeholder="Gender" value="<?php echo $gender; ?>" />
        </div>
	    <div class="form-group">
            <label for="address">Address <?php echo form_error('address') ?></label>
            <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address"><?php echo $address; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">City Id <?php echo form_error('city_id') ?></label>
            <input type="text" class="form-control" name="city_id" id="city_id" placeholder="City Id" value="<?php echo $city_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Postal Code <?php echo form_error('postal_code') ?></label>
            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" value="<?php echo $postal_code; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Mobile Number <?php echo form_error('mobile_number') ?></label>
            <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="<?php echo $mobile_number; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Country <?php echo form_error('country') ?></label>
            <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="<?php echo $country; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Marriage Status <?php echo form_error('marriage_status') ?></label>
            <input type="text" class="form-control" name="marriage_status" id="marriage_status" placeholder="Marriage Status" value="<?php echo $marriage_status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Religion <?php echo form_error('religion') ?></label>
            <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion" value="<?php echo $religion; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kat Pendidikan <?php echo form_error('id_kat_pendidikan') ?></label>
            <input type="text" class="form-control" name="id_kat_pendidikan" id="id_kat_pendidikan" placeholder="Id Kat Pendidikan" value="<?php echo $id_kat_pendidikan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nim <?php echo form_error('nim') ?></label>
            <input type="text" class="form-control" name="nim" id="nim" placeholder="Nim" value="<?php echo $nim; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ipk <?php echo form_error('ipk') ?></label>
            <input type="text" class="form-control" name="ipk" id="ipk" placeholder="Ipk" value="<?php echo $ipk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Bidang <?php echo form_error('id_bidang') ?></label>
            <input type="text" class="form-control" name="id_bidang" id="id_bidang" placeholder="Id Bidang" value="<?php echo $id_bidang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Ket Disabilitas <?php echo form_error('ket_disabilitas') ?></label>
            <input type="text" class="form-control" name="ket_disabilitas" id="ket_disabilitas" placeholder="Ket Disabilitas" value="<?php echo $ket_disabilitas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Birth Place <?php echo form_error('birth_place') ?></label>
            <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Birth Place" value="<?php echo $birth_place; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>