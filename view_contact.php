<link rel="stylesheet" href="css/style2.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" /> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<?php
session_start();
include("connection.php");
$sql = "SELECT * FROM contact_list";
$result = $conn->query($sql);

$filepath = 'http://localhost/contact_us_form/uploads/';
?>

<div class="container">
    <div class="row align-items-center">
        <div class="container" style="padding: 10px; margin-top: 20px; border: 2px solid #0000; border-radius: 2px">
            <?php
            if (isset($_SESSION["success_message"])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION["success_message"];
                    echo " HURRAY!!!" ?>
                </div>
            <?php } ?>
        </div>

        <div class="row">
            <div class="col-md-10">
                <h3 style="text-align: center; color: #d08c23; ">Contact List</h3>
            </div>
            <div class="col-md-2">
                <a class="btn btn-primary" href="index.php">Add New Contact</a>
            </div>
        </div>
        <!-- <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a
                                aria-current="page"
                                href="#"
                                class="router-link-active router-link-exact-active nav-link active"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title=""
                                data-bs-original-title="List"
                                aria-label="List"
                            >
                                <i class="bx bx-list-ul"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Grid" aria-label="Grid"><i class="bx bx-grid-alt"></i></a>
                        </li>
                    </ul>
                </div>
                <div>
                    <a href="#" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-primary"><i class="bx bx-plus me-1"></i> Add New</a>
                </div>
                <div class="dropdown">
                    <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="table-responsive">
                    <table id="example" class="table project-list-table table-nowrap align-middle table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">SL.</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Comment</th>
                                <th scope="col">File</th>
                                <th scope="col">Date</th>
                                <th scope="col" style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            if ($result->num_rows > 0) {
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                            ?>

                                    <tr id="contactRow-<?php echo $row['id']; ?>" class="contact-row" data-id="<?php echo $row['id']; ?>">

                                        <td><?php echo $count ?></td>
                                        <!-- <td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-sm rounded-circle me-2" /><a href="#" class="text-body">Simon Ryles</a></td> -->
                                        <td class="user-name"><?php echo $row["first_Name"] . " " . $row["last_Name"] ?></td>
                                        <td class="user-email"><?php echo $row["email"] ?></td>
                                        <td class="user-comment"><?php echo $row["comment"] ?></td>
                                        <td style="text-align=center;width=50;height=50;" class="user-file"><?php
                                                                                                            $filename = $row['user_file'];
                                                                                                            $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
                                                                                                            if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif'])) {
                                                                                                                echo "<img src='" . $filepath . $row['user_file'] . "' style='width:50px; height:50px;' class='popup-image'>";
                                                                                                            } else {
                                                                                                                echo "<a href='" . $filepath . "' download>" . $row["user_file"] . "</a>";
                                                                                                            }

                                                                                                            ?></td>

                                        <td class="user-date"><?php echo $row["date_created"] ?></td>


                                        <td>
                                            <!-- <ul class="list-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-2 text-primary"><i class="bx bx-pencil font-size-18"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                        </li>
                                    </ul> -->
                                            <input type="submit" class="btn btn-success btn-sm edit_contact" name="update" value="EDIT" data-contact-id="<?php echo $row["id"]; ?>" />
                                            <button type="button" class="btn btn-danger btn-sm delete-contact-btn" data-id="<?php echo $row["id"]; ?>" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">DELETE</button>
                                        </td>
                                    </tr>
                            <?php
                                    $count++;
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row g-0 align-items-center pb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-end">
                <ul class="pagination mb-sm-0">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div> -->
</div>

<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="editContactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContactModalLabel">Edit Contact</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editContactForm">
                    <div class="mb-3">
                        <label for="contactFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="contactFirstName" name="contact_first_name">
                    </div>
                    <div class="mb-3">
                        <label for="contactLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="contactLastName" name="contact_Last_name">
                    </div>
                    <div class="mb-3">
                        <label for="contactComment" class="form-label">Comment</label>
                        <!-- <input type="text" class="form-control" id="contactFirstName" name="contact_first_name"> -->
                        <textarea class="form-control" rows="3" id="contactComment" name="contact_comment"></textarea>
                    </div>
                    <input type="hidden" id="contact_id" name="contact_id" value="">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this Contact?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="popupImage" class="img-fluid">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
        $('.alert-success').delay(3000).fadeOut('slow');
        var contactIdToDelete;

        $('.edit_contact').on('click', function() {
            var contactId = $(this).data('contact-id');
            $.ajax({
                url: 'ajax_getcontactdata.php',
                type: 'GET',
                data: {
                    id: contactId
                },
                success: function(data) {
                    console.log(data);
                    var contactData = JSON.parse(data);

                    $('#contactFirstName').val(contactData.contact_first_name);
                    $('#contactLastName').val(contactData.contact_Last_name);
                    $('#contactComment').val(contactData.contact_comment);

                    //Show the Modal
                    $('#editContactModal').modal('show');
                    $('#editContactModal #contact_id').val(contactData.id);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });

        $('#saveChanges').on('click', function() {
            var contactId = $('#editContactModal #contact_id').val();
            console.log(contactId);
            var formData = $("#editContactForm").serialize();

            $.ajax({
                type: "POST",
                url: "ajax_update_contact.php",
                data: formData,
                success: function(response) {
                    var result = JSON.parse(response);

                    if (result.status === 'success') {
                        var contactId = $('#contact_id').val();
                        var firstName = $('#ContactFirstName').val();
                        var lastName = $('#ContactlastName').val();
                        var contactComment = $('#contactComment').val();

                        var row = $('contactRow-' + contactId);
                        row.find('.user-name').text(firstName);
                        row.find('.user-comment').text(contactComment);

                        $('#editContactModal').modal('hide');

                        alert('Product Update Successfully!');
                    } else {
                        alert('Failed to Update: ' + result.message);
                    }
                },
                error: function() {
                    console.log("Error Submitting Form Data.");
                }
            });
        });

        $(document).on('click', '.delete-contact-btn', function() {
            contactIdToDelete = $(this).data('id');
        });

        $('#confirmDeleteButton').on('click', function() {

            $.ajax({
                url: 'ajax_delete_contact.php',
                type: 'POST',
                data: {
                    contact_id: contactIdToDelete
                },
                success: function(response) {
                    try {
                        var result = JSON.parse(response);

                        if (result.status === 'success') {
                            $('#contactRow-' + contactIdToDelete).remove();

                            $('#confirmDeleteModal').modal('hide');

                            alert('Contact deleted Successfully!');
                        } else {
                            alert('Failed to Delete Contact: ' + result.message);
                        }
                    } catch (e) {
                        console.error('Error Parsing JSON: ', e);
                    }

                },
                error: function(xhr, status, error) {
                    alert('Error deleting Contact: ' + error);
                }
            });

        });

        $('.popup-image').on('click', function() {
            var imageUrl = $(this).attr('src'); 
            $('#popupImage').attr('src', imageUrl); 

            $('#imageModal').modal('show');
        });
    });
</script>