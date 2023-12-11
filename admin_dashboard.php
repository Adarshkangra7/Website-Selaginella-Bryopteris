<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('db.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title>Hospital Admin Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS imports -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <style>
        /* CSS styling for the hospital admin dashboard */

        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            color: #707070;
            background-color: #f2f2f2;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            padding: 15px 20px;
        }

        .navbar-brand {
            font-size: 24px;
            color: #333;
            font-weight: 600;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            width: 230px;
            padding: 20px;
            background-color: #fff;
            border-right: 1px solid #e6e6e6;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .sidebar:hover {
            width: 250px;
        }

        .sidebar-heading {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        .sidebar-menu {
            padding: 0;
            margin: 0;
            list-style-type: none;
        }

        .sidebar-menu-item {
            margin-bottom: 10px;
        }

        .sidebar-link {
            display: block;
            padding: 8px 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            color: #333;
        }

        .sidebar-link:hover {
            background-color: #e0e0e0;
        }

        .sidebar-logout {
            display: block;
            padding: 8px 10px;
            background-color: #f3f3f3;
            border-radius: 5px;
            color: #333;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .sidebar-logout:hover {
            background-color: #dc3545;
            color: #fff;
        }

        /* Content */
        .content {
            margin-top: 70px;
            margin-left: 230px;
            padding: 20px;
        }

        .table-container {
            width: 100%;
            background-color: white;
            margin-top: 30px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border: 1px solid #e6e6e6;
            border-radius: 5px;
            padding: 20px;
        }

        .table-heading {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .data-table {
            width: 100%;
        }

        .data-table tr th {
            font-weight: 500;
            text-transform: uppercase;
            font-size: 14px;
            color: #333;
        }

        .data-table tr td {
            font-weight: 400;
            font-size: 14px;
            color: #333;
        }

        .data-table tr td:last-child {
            text-align: right;
        }

        .delete-button {
            padding: 5px 10px;
            background-color: #dc3545;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        .update-button {
            padding: 5px 10px;
            background-color: #17a2b8;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }

        .rupee {
          font-weight: 600;
          color: #333;
        }

        .table-responsive {
          overflow-x: auto;
        }

        .sidebar-menu a.sidebar-link {
  display: block;
  padding: 10px;
  background-color: #3498db; /* Blue */
  color: #fff; /* White */
  text-decoration: none;
}

.sidebar-menu a.sidebar-link:hover {
  background-color: #2980b9; /* Dark blue */
}
        table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-family: Arial, sans-serif;
  background-color: #fff;
  color: #333;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  font-weight: bold;
  background-color: #eee;
}
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  font-family: Arial, sans-serif;
  background-color: #fff;
  color: #333;
}

th,
td {
  padding: 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  font-weight: bold;
  background-color: lightseagreen; /* blue color */
  color: #fff; /* white text color */
}

        /* Media queries */
        @media(max-width:768px) {
            .content {
                margin-left: 0;
                padding-top: 70px;
            }

            .sidebar {
                display: none;
            }
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md fixed-top">
        <a class="navbar-brand" href="#">Hospital Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text">
                        Logged in as <strong>Admin</strong>
                    </span>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <!--<h2 class="sidebar-heading">Admin Dashboard Tables</h2>-->
        <ul class="sidebar-menu">
            <li class="sidebar-menu-item">
                <a href="#patient-table" class="sidebar-link">Patient</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#doctor-table" class="sidebar-link">Doctor</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#medicine-table" class="sidebar-link">Medicines</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#medicine-order-table" class="sidebar-link">Medicines Order</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#appointment-table" class="sidebar-link">Doctor's Appointments</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#labtest-table" class="sidebar-link">Lab Tests</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#contact-table" class="sidebar-link">Contact Us</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="#ambulance-table" class="sidebar-link">Ambulance Requested</a>
            </li>
            <li class="sidebar-menu-item">
                <a href="logout.php" class="sidebar-logout">Logout</a>
            </li>
        </ul>
    </div>

    <!-- Page content -->
    <div class="content">
        
   

        <!-- Patient table container -->
        <div id="patient-table" class="table-container">
            <h2 class="table-heading">Patients</h2>
            <div class="table-responsive">
              <table class="data-table">
                  <thead>
                      <tr>
                          <th>Patient ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Age</th>
                          <th>Gender</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result1)) {
    ?>
    <tr>
        <td> <?php echo $row['patient_id']; ?> </td>
        <td> <?php echo $row['first_name']; ?> </td>
        <td> <?php echo $row['last_name']; ?> </td>
        <td> <?php echo $row['age']; ?> </td>
        <td> <?php echo $row['gender']; ?> </td>
        <td> <?php echo $row['email']; ?> </td>
        <td> <?php echo $row['phone_number']; ?> </td>
        <td> <?php echo $row['address']; ?> </td>
        <td><a href="edit_patient.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete_patient.php?id=<?php echo $row['patient_id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
</div>
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#addPatientModal">Add new patient</button>
</div>

    <!-- Modal window for adding a new patient -->
<div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog" aria-labelledby="addPatientModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h5 class="modal-title" id="addPatientModalLabel">Add New Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="add_patient.php" method="post">
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
          </div>
          <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

        <!-- Doctor table container -->
        <div id="doctor-table" class="table-container">
            <h2 class="table-heading">Doctor</h2>
            <div class="table-responsive">
              <table class="data-table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Gender</th>
                          <th>Speciality</th>
                          <th>Experience</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                            while ($row = mysqli_fetch_assoc($result2)) {
                                ?>
                                <tr>
                                    <td> <?php echo $row['doctor_id']; ?> </td>
                                    <td> <?php echo $row['first_name']; ?> </td>
                                    <td> <?php echo $row['last_name']; ?> </td>
                                    <td> <?php echo $row['gender']; ?> </td>
                                    <td> <?php echo $row['speciality']; ?> </td>
                                    <td> <?php echo $row['years_of_experience']; ?> </td>
                                    <td> <?php echo $row['phone_number']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <?php echo $row['address']; ?> </td>
                                    <td><a href="edit_doctor.php?id=<?php echo $row['doctor_id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="delete_doctor.php?id=<?php echo $row['doctor_id']; ?>" class="btn btn-danger">Delete</a></td>

                                </tr>
                                <?php
                            }
                            ?>
                  </tbody>
              </table>
            </div>
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#addDoctorModal">Add new Doctor</button>
        </div>

     <!-- Modal window for adding a new Doctor -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form action="add_doctor.php" method="post">
          <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
          </div>
          <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
          </div>
          <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
              <option value="">Select Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div class="form-group">
            <label for="speciality">Speciality:</label>
            <input type="text" class="form-control" id="speciality" name="speciality" required>
          </div>
          <div class="form-group">
            <label for="years">Years of Experience:</label>
            <input type="number" class="form-control" id="years" name="years" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>    
      
       <!-- Medicine table container -->
<div id="medicine-table" class="table-container">
    <h2 class="table-heading">Medicines</h2>
    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Medicine ID</th>
                    <th>Medicine Name</th>
                    <th>Manufacturer</th>
                    <th>Expiry Date</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?php
                            while ($row = mysqli_fetch_assoc($result3)) {
                                ?>
                                <tr>
                                    <td> <?php echo $row['medicine_id']; ?> </td>
                                    <td> <?php echo $row['medicine_name']; ?> </td>
                                    <td> <?php echo $row['manufacturer']; ?> </td>
                                    <td> <?php echo $row['expiry_date']; ?> </td>
                                    <td> <?php echo $row['price']; ?> </td>
                                    <td> <?php echo $row['quantity']; ?> </td>
                                    <td><a href="edit_medicine.php?id=<?php echo $row['medicine_id']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="delete_medicine.php?id=<?php echo $row['medicine_id']; ?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                                <?php
                            }
                            ?>


            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#addMedicineModal">Add Medicine</button>
</div>





<script>
    // add medicine functionality
    const addMedicineModal = document.getElementById('addMedicineModal');
    const addMedicineBtn = document.querySelector('#addMedicineModal .btn-primary');
    addMedicineBtn.addEventListener('click', (e) => {
        e.preventDefault();
        const medicineName = document.querySelector('#addMedicineModal #medicine-name').value;
        const medicinePrice = document.querySelector('#addMedicineModal #medicine-price').value;
        const medicineQuantity = document.querySelector('#addMedicineModal #medicine-quantity').value;
        const medicineStock = document.querySelector('#addMedicineModal #medicine-stock').value;

        const medicineTable = document.querySelector('#medicine-table tbody');
        const newMedicineRow = `
            <tr>
                <td>${medicineTable.rows.length+1}</td>
                <td>${medicineName}</td>
                <td><span class="rupee">₹</span>${medicinePrice}</td>
                <td>${medicineQuantity}</td>
                <td>${medicineStock}</td>
                <td>
                    <button type="button" class="delete-button btn btn-danger btn-sm mb-1"
                            data-toggle="modal" data-target="#deleteMedicineModal${medicineTable.rows.length+1}">Delete</button>
                </td>
            </tr>
        `;
        medicineTable.innerHTML += newMedicineRow;

        // clear modal after adding a new medicine
        document.querySelector('#addMedicineModal form').reset();

        alert("New Medicine Added Successfully!");
        addMedicineModal.style.display = 'none';
    });

    // delete medicine functionality
    function deleteMedicine(id){
        const deleteMedicineModal = document.getElementById(`deleteMedicineModal${id}`);
        deleteMedicineModal.style.display = 'none';
        const medicineTable = document.querySelector('#medicine-table tbody');
        medicineTable.deleteRow(id-1);
        alert("Medicine Deleted Successfully!");
    }

    // update stock functionality
    const quantityInputs = document.querySelectorAll('#medicine-table tbody tr td:nth-child(4)');
    const stockCells = document.querySelectorAll('#medicine-table tbody tr td:nth-child(5)');
    quantityInputs.forEach((input, index) => {
        const stock = parseInt(stockCells[index].textContent);
        input.addEventListener('change', (e) => {
            const quantity = parseInt(input.textContent);
            if (quantity > stock) {
                input.textContent = stock;
                alert("Quantity cannot exceed stock!");
            } else {
                stockCells[index].textContent = stock - quantity;
            }
        });
    });
</script>


<!-- Medicines order container -->
       
<div id="medicine-order-table" class="table-container">
    <h2 class="table-heading">Medicine Order</h2>
    <div class="table-responsive">
        <table class="data-table">
        <thead>
                      <tr>
                          <th>Order ID</th>
                          <th>Cart Total</th>
                          <th>Gst Rate</th>
                          <th>Gst Amount</th>
                          <th>Total Amount</th>

                          <th>fullname</th>
                          <th>phone</th>
                          <th>fulladdress</th>
                          <th>city</th>
                          <th>statee</th>
                          <th>postalcode</th>


                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead> 
                  <tbody>
                  <?php
                            while ($row = mysqli_fetch_assoc($result9)) {
                                ?>
                                <tr>
                                    <td> <?php echo $row['orderid']; ?> </td>
                                    <td> <?php echo $row['cart_total']; ?> </td>
                                    <td> <?php echo $row['gst_rate']; ?> </td>
                                    <td> <?php echo $row['gst_amount']; ?> </td>
                                    <td> <?php echo $row['total_amount']; ?> </td>

                                    <td> <?php echo $row['fullname']; ?> </td>
                                    <td> <?php echo $row['phone']; ?> </td>
                                    <td> <?php echo $row['fulladdress']; ?> </td>
                                    <td> <?php echo $row['city']; ?> </td>
                                    <td> <?php echo $row['statee']; ?> </td>
                                    <td> <?php echo $row['postalcode']; ?> </td>

                                    <td><a href="edit_medicineOrder.php?id=<?php echo $row['orderid']; ?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="delete_medicineOrder.php?id=<?php echo $row['orderid']; ?>" class="btn btn-danger">Delete</a></td>

                                </tr>
                                <?php
                            }
                            ?>
                  </tbody>

              </table>
            </div>
        </div>

<!-- Add Medicine Modal -->
<div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addMedicineForm">
                    <div class="form-group">
                        <label for="medicineName">Medicine Name</label>
                        <input type="text" class="form-control" id="medicineName" name="medicineName">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity">
                    </div>
                    <div class="form-group">
                        <label for="totalPrice">Total Price in ₹</label>
                        <input type="number" class="form-control" id="totalPrice" name="totalPrice">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addMedicineBtn">Add Medicine</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Medicine Modal -->
<div class="modal fade" id="deleteMedicineModal" tabindex="-1" role="dialog" aria-labelledby="deleteMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteMedicineModalLabel">Delete Medicine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this medicine order?</p>
                <form id="deleteMedicineForm">
                    <input type="hidden" id="deleteMedicineId" name="deleteMedicineId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="deleteMedicineBtn">Delete Medicine</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Add Medicine form submit event
    $('#addMedicineForm').submit(function(e) {
        e.preventDefault();

        // Get form data
        var medicineName = $('#medicineName').val();
        var quantity = $('#quantity').val();
        var totalPrice = $('#totalPrice').val();

        // Add medicine data to table
        var newMedicineId = $('#medicine-order-table tbody tr').last().find('td:first').text();
        newMedicineId = parseInt(newMedicineId) + 1; // Auto-increment ID
        var newRow = '<tr><td>' + newMedicineId + '</td><td>' + (new Date()).toLocaleDateString() + '</td><td>Admin</td><td>' + medicineName + '</td><td>' + quantity + '</td><td><span class="rupee">₹</span> ' + totalPrice + '</td><td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteMedicineModal" data-id="' + newMedicineId + '">Delete</button></td></tr>';
        $('#medicine-order-table tbody').append(newRow);

        // Clear form fields
        $('#medicineName').val('');
        $('#quantity').val('');
        $('#totalPrice').val('');

        // Hide Add Medicine Modal
        $('#addMedicineModal').modal('hide');
    });

    // Delete Medicine button click event
    $('#deleteMedicineModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $('#deleteMedicineId').val(id);
    });

    // Delete Medicine form submit event
    $('#deleteMedicineBtn').click(function() {
        var id = $('#deleteMedicineId').val();
        $('#medicine-order-table tbody tr td:first-child').filter(function() {
            return $(this).text() == id;
        }).parent().remove();
        $('#deleteMedicineModal').modal('hide');
    });
</script>



       <!-- Doctor's Appointment table container -->
<div id="appointment-table" class="table-container">
    <h2 class="table-heading">Doctor's Appointments </h2>
    <div class="table-responsive">
        <table class="data-table">
        <thead>
                      <tr>
                          <th>bookingid</th>
                          <th>name</th>
                          <th>age</th>
                          <th>gender</th>
                          <th>contact</th>
                          <th>mail</th>
                          <th>specialist</th>
                          <th>doctor</th>
                          <th>Datee</th>
                          <th>Timee</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          
                      </tr>
                  </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result7)) {
    ?>
    <tr>
        <td> <?php echo $row['bookingid']; ?> </td>
        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['age']; ?> </td>
        <td> <?php echo $row['gender']; ?> </td>
        <td> <?php echo $row['contact']; ?> </td>
        <td> <?php echo $row['mail']; ?> </td>
        <td> <?php echo $row['specialist']; ?> </td>
        <td> <?php echo $row['doctor']; ?> </td>
        <td> <?php echo $row['datee']; ?> </td>
        <td> <?php echo $row['timee']; ?> </td>
        <td><a href="edit_appointment.php?id=<?php echo $row['bookingid']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete_appointment.php?id=<?php echo $row['bookingid']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
</div>
</div>

<!-- Add Appointment Modal -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAppointmentModalLabel">Add Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addAppointmentForm">
                    <div class="form-group">
                        <label for="patientName">Patient Name</label>
                        <input type="text" class="form-control" id="patientName" name="patientName">
                    </div>
                    <div class="form-group">
                        <label for="doctorName">Doctor Name</label>
                        <input type="text" class="form-control" id="doctorName" name="doctorName">
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="addAppointmentBtn">Add Appointment</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal 1-->
<div class="modal fade" id="cancelAppointmentModal1" tabindex="-1" role="dialog" aria-labelledby="cancelAppointmentModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelAppointmentModalLabel1">Cancel Appointment?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel the appointment with Dr. Jane Doe on April 14, 2022 at 2:30 PM?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    onclick="cancelAppointment(1)">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal 2-->
<div class="modal fade" id="cancelAppointmentModal2" tabindex="-1" role="dialog" aria-labelledby="cancelAppointmentModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelAppointmentModalLabel2">Cancel Appointment?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel the appointment with Dr. Robert Johnson on April 15, 2022 at 10:30 AM?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    onclick="cancelAppointment(2)">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal 3-->
<div class="modal fade" id="cancelAppointmentModal3" tabindex="-1" role="dialog" aria-labelledby="cancelAppointmentModalLabel3" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelAppointmentModalLabel3">Cancel Appointment?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel the appointment with Dr. Sara Kim on April 16, 2022 at 3:45 PM?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    onclick="cancelAppointment(3)">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Cancel Appointment Modal 4-->
<div class="modal fade" id="cancelAppointmentModal4" tabindex="-1" role="dialog" aria-labelledby="cancelAppointmentModalLabel4" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelAppointmentModalLabel4">Cancel Appointment?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel the appointment with Dr. John Smith on April 17, 2022 at 9:30 AM?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"
                    onclick="cancelAppointment(4)">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Add Appointment form submit event
    $('#addAppointmentForm').submit(function(e) {
        e.preventDefault();

        // Get form data
        var patientName = $('#patientName').val();
        var doctorName = $('#doctorName').val();
        var date = $('#date').val();
        var time = $('#time').val();

        // Add appointment data to table
        var newAppointmentId = $('#appointment-table tbody tr').last().find('td:first').text();
        newAppointmentId = parseInt(newAppointmentId) + 1; // Auto-increment ID
        var newRow = '<tr><td>' + newAppointmentId + '</td><td>' + patientName + '</td><td>' + doctorName + '</td><td>' + date + '</td><td>' + time + '</td><td>Pending</td><td><button type="button" class="btn btn-danger btn-sm mb-1" data-toggle="modal" data-target="#cancelAppointmentModal' + newAppointmentId + '" data-id="' + newAppointmentId + '">Cancel Appointment</button></td></tr>';
        $('#appointment-table tbody').append(newRow);

        // Clear form fields
        $('#patientName').val('');
        $('#doctorName').val('');
        $('#date').val('');
        $('#time').val('');

        // Hide Add Appointment Modal
        $('#addAppointmentModal').modal('hide');
    });

    // Cancel Appointment button click event
    $('[id^=cancelAppointmentModal]').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $(this).find('.modal-body p').text('Are you sure you want to cancel the appointment with ' + $('#appointment-table tbody tr:nth-child(' + id + ') td:nth-child(3)').text() + ' on ' + $('#appointment-table tbody tr:nth-child(' + id + ') td:nth-child(4)').text() + ' at ' + $('#appointment-table tbody tr:nth-child(' + id + ') td:nth-child(5)').text() + '?');
    });

    // Function to cancel appointment
    function cancelAppointment(id) {
        $('#appointment-table tbody tr:nth-child(' + id + ') td:nth-child(6)').text('Cancelled');
        $('#cancelAppointmentModal' + id).modal('hide');
    }
</script>


        <!-- Lab test table container -->
        <div id="labtest-table" class="table-container">
            <h2 class="table-heading">Lab Tests</h2>
            <div class="table-responsive">
              <table class="data-table">
              <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Gender</th>
                          <th>Age</th>
                          <th>Address</th>
                          <th>Test Type</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Created At</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result6)) {
    ?>
    <tr>
        <td> <?php echo $row['id']; ?> </td>
        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['email']; ?> </td>
        <td> <?php echo $row['phone']; ?> </td>
        <td> <?php echo $row['gender']; ?> </td>
        <td> <?php echo $row['age']; ?> </td>
        <td> <?php echo $row['address']; ?> </td>
        <td> <?php echo $row['test_type']; ?> </td>
        <td> <?php echo $row['date']; ?> </td>
        <td> <?php echo $row['time']; ?> </td>
        <td> <?php echo $row['created_at']; ?> </td>
        <td><a href="edit_labtest.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete_labtest.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
</div>
</div>


        <!-- Contact us table container -->
        <div id="contact-table" class="table-container">
            <h2 class="table-heading">Contact Us</h2>
            <div class="table-responsive">
              <table class="data-table">
              <thead>
                      <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subject</th>
                          <th>Message</th>
                          <th>Sent At</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result5)) {
    ?>
    <tr>
        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['email']; ?> </td>
        <td> <?php echo $row['subject']; ?> </td>
        <td> <?php echo $row['message']; ?> </td>
        <td> <?php echo $row['sent_at']; ?> </td>
        <td><a href="edit_contact.php?id=<?php echo $row['name']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete_contact.php?id=<?php echo $row['name']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
</div>
</div>

        <!-- Ambulance requested table container -->
        <div id="ambulance-table" class="table-container">
            <h2 class="table-heading">Ambulance Requested</h2>
            <div class="table-responsive">
              <table class="data-table">
              <thead>
                      <tr>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Location</th>
                          <th>Type</th>
                          <th>Comments</th>
                          <th>Requested At</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
    <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result4)) {
    ?>
    <tr>

        <td> <?php echo $row['name']; ?> </td>
        <td> <?php echo $row['contact']; ?> </td>
        <td> <?php echo $row['location']; ?> </td>
        <td> <?php echo $row['type']; ?> </td>
        <td> <?php echo $row['comments']; ?> </td>
        <td> <?php echo $row['requested_at']; ?> </td>
        <td><a href="edit_ambulanceRequest.php?id=<?php echo $row['contact']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete_ambulanceRequest.php?id=<?php echo $row['contact']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
    }
    ?>
</tbody>

</table>
</div>
       
</div>

       

    <!-- JavaScript imports -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // DataTable setup
        $(document).ready(function() {
            $('.data-table').DataTable();
        });
    </script>
</body>
</html>