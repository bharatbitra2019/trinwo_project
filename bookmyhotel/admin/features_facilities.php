<?php 
    require('admin_components/essentials.php');
    require('admin_components/db_config.php');
    adminLogin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features and Facilities Settings</title>
    <?php require('admin_components/link.php')?>
</head>
<body class="bg-light">

<?php require('admin_components/header.php')?>

<div class="container-fluid" id="main-content">
    <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h3 class="mb-4">Features & Facilities</h3>

            <!-- feature -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Features</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#features-section">
                        <i class="bi bi-person-plus"></i>Add
                        </button>
                    </div>
                    
                    <div class="table-responsive-md" style="height: 250px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="features_data">
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>
            
            <!-- facilitites -->
            <div class="card border-0 shadow mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title m-0">Facilitites</h5>
                        <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#facilities-section">
                        <i class="bi bi-person-plus"></i>Add
                        </button>
                    </div>
                    
                    <div class="table-responsive-md" style="height: 250px; overflow-y: scroll;">
                        <table class="table table-hover border">
                            <thead>
                                <tr class="bg-dark text-light">
                                <th scope="col">No</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Name</th>
                                <th class="width: 400px" scope="col">Description</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="facilities_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>              
        </div>
    </div>
</div>

            <!-- Features modal-->
            <div class="modal fade" id="features-section" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form id="features_section_form">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Add Feature</h5>
                        </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label  class="form-label fw-sbold">Name</label>
                        <input type="text" name="feature_name" class="form-control shadow-none" required>
                        </div>

                    </div>
                        <div class="modal-footer">
                        <button type="reset"  class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <!-- Facilities modal-->
            <div class="modal fade" id="facilities-section" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <form id="facilities_section_form">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title">Add Facility</h5>
                        </div>
                    <div class="modal-body">
                        <div class="mb-3">
                        <label  class="form-label fw-sbold">Name</label>
                        <input type="text" name="facility_name" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                        <label  class="form-label fw-bold">Facility Icon (Only SVG's are allowed)</label>
                        <input type="file" name="facility_icon" accept=".svg" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea name="facility_description" class="form-control shadow-none mb-3"  rows="5"></textarea>                
                        </div>
                    </div>
                        <div class="modal-footer">
                        <button type="reset" class="btn text-secondary shadow-none" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow-none">Submit</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

<?php require('admin_components/scripts.php')?>

<script>
    let features_section_form = document.getElementById('features_section_form');
    let facilities_section_form = document.getElementById('facilities_section_form');

    features_section_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_feature();
    });

    function add_feature() {
        let data = new FormData();
        data.append('name',features_section_form.elements['feature_name'].value);
        data.append('add_feature','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);

        xhr.onload = function() {
            console.log(this.responseText);
            var myModal = document.getElementById('features-section');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if(this.responseText == 1) {
                alert('success','New Feature added Succesfully!');
                features_section_form.elements['feature_name'].value='';
                get_features_data();
            }
            else {
                alert('error','Server Down!');
                
            }

        }
        xhr.send(data);
    }

    function get_features_data() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('features_data').innerHTML = this.responseText;
        }

        xhr.send('get_features_data');

    }

    function del_feature_data(val) {

        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function() {

            if(this.responseText == 1) {
                alert('success','Feature removed Succesfully!');
                get_features_data();
            }
            else if(this.responseText == 'room_added') {
                alert('error','Feature is already added in room');
            }

            else {
                alert('error','Server Down!');
            }
        }
        xhr.send('del_feature_data='+val);
    }

    facilities_section_form.addEventListener('submit',function(e){
        e.preventDefault();
        add_facility();
    });

    function add_facility() {
        let data = new FormData();
        data.append('name',facilities_section_form.elements['facility_name'].value);
        data.append('icon',facilities_section_form.elements['facility_icon'].files[0]);
        data.append('description',facilities_section_form.elements['facility_description'].value);
        data.append('add_facility','');

        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);

        xhr.onload = function() {
            console.log(this.responseText);
            var myModal = document.getElementById('facilities-section');
            var modal = bootstrap.Modal.getInstance(myModal);
            modal.hide();

            if(this.responseText == 'inv_img') {
                alert('error','Only SVG images are allowed!');
            }
            else if(this.responseText == 'inv_size') {
                alert('error','Icon Size should be less than 1MB!');
            }

            else if(this.responseText == 'upd_failed') {
                alert('error','Server Down. Icon upload failed!');
            }
            else {
                alert('success','New Facility added Succesfully!');
                facilities_section_form.reset();
                get_facilities_data();
            }

        }
        xhr.send(data);
    }

    function get_facilities_data() {
        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function() {
            document.getElementById('facilities_data').innerHTML = this.responseText;
        }
        xhr.send('get_facilities_data');
    }

    function del_facility_data(val) {

        let xhr = new XMLHttpRequest();
        xhr.open("POST","admin_ajax/features_facilities_crud.php",true);
        xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');

        xhr.onload = function() {

            if(this.responseText == 1) {
                alert('success','Facility removed Succesfully!');
                get_facilities_data();
            }
            else if(this.responseText == 'room_added') {
                alert('error','Facility is already added in room');
            }

            else {
                alert('error','Server Down!');
            }
        }
        xhr.send('del_facility_data='+val);
    }


    window.onload = function() {
        get_features_data();
        get_facilities_data();
    }

</script>

</body>
</html>