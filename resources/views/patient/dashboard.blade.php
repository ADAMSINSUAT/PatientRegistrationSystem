<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Patient Registration System</title>

    <!-- Custom fonts for this template -->
    <link href="sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <div class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">

                </div>
                <div class="sidebar-brand-text mx-3">Patient Registration System</div>
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-error" role="alert">
                        {{session('error')}}
                    </div>
                @endif

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div style="display:flex; justify-content:space-between; align-items:center">
                        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                        <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#addpatientModal">Add Patient</button>
                    </div>
                </div>

                <!--Add Patient Modal -->
                <div class="modal fade" id="addpatientModal" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="addpatientModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addpatientModalLabel">Add Patient Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('patient.store')}}">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="First" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Second" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                                            required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Third" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Fourth" class="form-label">Birthdate</label>
                                        <input class="form-control" type="date" id="birthdate" name="birthdate"
                                            required />
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Fifth" class="form-label">Age</label>
                                        <!-- <p class="form-control" name="age" id="age" required></p> -->
                                        <input type="text" class="form-control" name="age" id="age" required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Sixth" class="form-label">Gender</label>
                                        <select class="form-control" id="gender"
                                            aria-label="Floating label select example" name="gender" required autofocus>
                                            <option selected>Female</option>
                                            <option selected>Male</option>
                                        </select>
                                    </div>
                                    <center>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Add Patient Details Modal -->
                <div class="modal fade" id="addpatientDetailsModal" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="addpatientDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addpatientDetailsModalLabel">Add Patient Diagnosis Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('patientdetails.store')}}">
                                    @csrf
                                    <input id="patients_id" name="patients_id" value="" hidden>
                                    <div class="row mb-3">
                                        <label for="consultation_type" class="form-label">Consultation Type</label>
                                        <select id="consultation_type" class="form-control" name="consultation_type"
                                            required>
                                            <option value="">Select Consultation type</option>
                                            <option value="Tubercolosis">Tubercolosis</option>
                                            <option value="Prenatal">Prenatal</option>
                                            <option value="Postnatal">Postnatal</option>
                                            <option value="Fireworks">Fireworks</option>
                                            <option value="Animal Bite">Animal Bite</option>
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="chief_complaint" class="form-label">Chief Complaint</label>
                                        <input type="text" class="form-control" name="chief_complaint"
                                            id="chief_complaint" required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="physician" class="form-label">Physician</label>
                                        <select id="physician" class="form-control" name="physician" required>
                                            <option value="">Select Physician</option>
                                        </select>
                                    </div>
                                    <center>
                                        <button id="savepatientdetail" type="submit"
                                            class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--View Patient History Modal -->
                <div class="modal fade" id="viewpatientDetailsModal" data-backdrop="static" tabindex="-1" role="dialog"
                    aria-labelledby="viewpatientDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewpatientDetailsModalLabel">Patient Diagnosis History
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p id="nopatientdiagnosis" hidden>This patient has no diagnosis yet</p>
                                <table class="table table-bordered" id="patientdetailsTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Consultation Type</th>
                                            <th>Chief Complaint</th>
                                            <th>Physician Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="patientdetailsTableBody">
                                        <!-- Data will be injected here -->
                                    </tbody>
                                </table>

                                <center>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Update Patient Details Modal -->
                <div class="modal fade" id="updatepatientDetailsModal" data-backdrop="static" tabindex="-1"
                    role="dialog" aria-labelledby="updatepatientDetailsModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updatepatientDetailsModalLabel">Update Patient Diagnosis
                                    Form
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('patientdetails.update')}}">
                                    @csrf
                                    <input class="form-control" id="updatepatientdetails_id"
                                        name="updatepatientdetails_id" value="" hidden>
                                    <div class="row mb-3">
                                        <label for="update_consultation_type" class="form-label">Consultation
                                            Type</label>
                                        <select id="update_consultation_type" class="form-control"
                                            name="update_consultation_type" required>
                                            <option value="">Select Consultation type</option>
                                            <option value="Tubercolosis">Tubercolosis</option>
                                            <option value="Prenatal">Prenatal</option>
                                            <option value="Postnatal">Postnatal</option>
                                            <option value="Fireworks">Fireworks</option>
                                            <option value="Animal Bite">Animal Bite</option>
                                        </select>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="update_chief_complaint" class="form-label">Chief
                                            Complaint</label>
                                        <input type="text" class="form-control" name="update_chief_complaint"
                                            id="update_chief_complaint" value="" required>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="update_physician" class="form-label">Physician</label>
                                        <select id="update_physician" class="form-control" name="update_physician"
                                            required>
                                            <option value="">Select Physician</option>
                                        </select>
                                    </div>
                                    <center>
                                        <button id="updatepatientdetail" type="submit"
                                            class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#viewpatientDetailsModal" data-dismiss="modal">Close</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Confirm Delete Patient Details Modal -->
                <div class="modal fade" id="deletepatientDetailsConfirmModal" data-backdrop="static" tabindex="-1"
                    role="dialog" aria-labelledby="deletepatientDetailsConfirmModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deletepatientDetailsConfirmModalLabel">Delete this patient
                                    diagnosis record?
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="delete_patient_details_form" method="POST" action="">
                                    @csrf
                                    @method('DELETE')
                                    <center>
                                        <button id="deletepatientdetails" type="submit"
                                            class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-secondary" data-toggle="modal"
                                            data-target="#viewpatientDetailsModal" data-dismiss="modal">Cancel</button>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Patient DataTable -->
                @if (count($patients) > 0)
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="patientTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Birthdate</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($patients as $key => $patient)
                                            <tr>
                                                <td>{{ $patient->last_name }}, {{ $patient->first_name }}
                                                    {{ $patient->middle_name }}
                                                </td>
                                                <td>{{ $patient->age }}</td>
                                                <td>{{ $patient->gender }}</td>
                                                <td>{{ $patient->birthdate }}</td>
                                                <td><button style="width:100%" type="button" id="addpatientDetails"
                                                        class="btn btn-primary mb-2" data-toggle="modal"
                                                        data-target="#addpatientDetailsModal" value={{ $patient->id }}>Add
                                                        Diagnosis</button>
                                                    <button style="width:100%" type="button" id="viewpatientDetails"
                                                        class="btn btn-primary mb-2" data-toggle="modal"
                                                        data-target="#viewpatientDetailsModal" value={{ $patient->id }}>View
                                                        Diagnosis</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @else
                    <p>No patient registered</p>
                @endif
            </div>
            <!-- /.container-fluid -->

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Patient Registration System 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sbadmin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="sbadmin/js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function () {
            $("#birthdate").on("change", function () {
                let birthdate = $(this).val();
                if (!birthdate) {
                    $("#age").text("Please select a date");
                    return;
                }

                let birthDateObj = new Date(birthdate);
                let today = new Date();

                let age = today.getFullYear() - birthDateObj.getFullYear();
                let monthDiff = today.getMonth() - birthDateObj.getMonth();
                let dayDiff = today.getDate() - birthDateObj.getDate();

                // Adjust age if the birthday hasn't occurred this year yet
                if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                    age--;
                }

                $("#age").val(age);
            });
        });

        $("#addpatientDetails").on("click", function (e) {
            e.preventDefault();

            $("#patients_id").val($(this).val());

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/physicians",
                success: function (response) {
                    $("#physician").empty().append('<option value="">Select Physician</option>');
                    $.each(response.message, function (index, physician) {
                        $("#physician").append('<option value="' + physician.id + '">' + physician.name + '</option>');
                    });
                },
                error: function () {
                    alert("Error fetching physicians");
                }
            });
        })

        // $("#savepatientdetail").on("click", function(e){
        //     e.preventDefault();
        //     console.log($("#patient_id").val());
        // });

        $("#viewpatientDetails").on("click", function (e) {
            // new DataTable('#patientdetailsTable', {
            //     info: true,
            //     ordering: false,
            //     paging: false,
            //     searching: false,
            // });

            patientID = $(this).val();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/patientdetails/get/" + patientID,
                success: function (response) {

                    if (response.status == "success") {
                        let tableBody = $('#patientdetailsTableBody');
                        tableBody.empty(); // Clear old data

                        tableBody.append(`
                        <tr>
                            <td>${response.message.consultation_type}</td>
                            <td>${response.message.chief_complaint}</td>
                            <td>${response.message.physician}</td>
                            
                            <td><button style="width:100%" type="button" id="updatepatientDetails" value="${response.message.id}"
                            class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#updatepatientDetailsModal" data-dismiss="modal">Edit Diagnosis</button>
                            <button style="width:100%" type="button" id="deletepatientDetailsConfirm" value="${response.message.id}"
                            class="btn btn-primary mb-2" data-toggle="modal"
                            data-target="#deletepatientDetailsConfirmModal" data-dismiss="modal">Delete Diagnosis</button></td>
                        </tr>
                    `);

                        $("#updatepatientDetails").on("click", function (e) {
                            e.preventDefault();
                            $("#updatepatientdetails_id").val(response.message.id);
                            $("#update_chief_complaint").val(response.message.chief_complaint);
                            // $("#update_consultation_type_value").text(response.message.consultation_type);

                            let dropdown = $('#update_consultation_type');
                            let matchedValue = null;

                            let exists = false;

                            let item = response.message.consultation_type;

                            // Check if any existing option has the same value
                            dropdown.find('option').each(function () {
                                if ($(this).val() === item) {
                                    exists = true;
                                    matchedValue = item; // Save matched value to select it later
                                    return false; // Break loop
                                }
                            });

                            // // Add the new option only if it doesn’t already exist
                            // if (!exists) {
                            //     dropdown.append(`<option value="${item}">${item}</option>`);
                            // }

                            // If a match was found, set it as the selected option
                            if (matchedValue) {
                                dropdown.val(matchedValue);
                            }

                            // Insert physician value into dropdown
                            $("#update_physician").empty().append('<option value="">Select Physician</option>');
                            $.each(response.message.physicians, function (index, physician) {
                                $("#update_physician").append('<option value="' + physician.name + '">' + physician.name + '</option>');

                                let physician_dropdown = $('#update_physician');
                                let physician_matchedValue = null;

                                let physician_exists = false;

                                let physician_item = response.message.physician;

                                // Check if any existing option has the same value
                                physician_dropdown.find('option').each(function () {
                                    if ($(this).val() === physician_item) {
                                        physician_exists = true;
                                        physician_matchedValue = physician_item; // Save matched value to select it later
                                        return false; // Break loop
                                    }
                                });

                                if (physician_matchedValue) {
                                    physician_dropdown.val(physician_item);
                                }
                            });
                        });

                        $("#deletepatientDetailsConfirm").on("click", function () {
                            $("#deletepatientdetails_id").val(response.message.id);
                        });

                        $("#deletepatientdetails").on('click', function () {
                            let patientdetailsID = response.message.id;
                            $('#delete_patient_details_form').attr('action', '/patientdetails/delete/' + patientdetailsID);
                        });
                    } else {
                        $('#nopatientdiagnosis').removeAttr('hidden');
                    }
                },
                error: function (response) {
                    alert("Error: " + response.message);
                }
            });
        })

    </script>
</body>

</html>