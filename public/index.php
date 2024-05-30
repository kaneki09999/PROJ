<?php
use Config\Database;
require dirname(__DIR__).'/vendor/autoload.php';

$conn = ((new Database)->connect());
$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sample Project</title>
</head>
<body style="background-color: #f5f5f5;">



<!-- INSERT Modal -->

<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5 w-100 text-center" id="exampleModalLabel" style="color:green;">INSERT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="http://localhost/PROJ/app/requests/addrequest.php" method="post">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="firstName" aria-describedby="firstNameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="updateLastName" class="form-label">Middle Name</label>
                        <input type="text" name="middle_name" class="form-control" id="updateLastName" aria-describedby="lastNameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" id="lastName" aria-describedby="lastNameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" class="form-control" id="age" aria-describedby="ageHelp">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="address" aria-describedby="addressHelp">
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="contact" aria-describedby="contactHelp">
                    </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="background-color: green; border: px solid black;">Submit</button>
                </div>

                </form>
            </div>
        </div>
    </div>
</div>


<br>

<div class="container mt-4 p-4 rounded" style="background-color: #C3C3C3 ; border:3px solid black; box-shadow: 10px 10px 15px rgba(0, 0, 0, 10);">
<div class="container text-center">
    <table class="table mx-auto table-secondary">

   
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal" style="background-color: green; border: 2px solid black; border-radius: 5px; float: right; margin-bottom: 5px;">
                INSERT
            </button>
        
</div>
        <thead>
   
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Firstname</th>
                <th scope="col">Middlename</th>
                <th scope="col">Lastname</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Contact</th>
                <th scope="col">Action</th>
        
            </tr>
            
        <tbody>
           
        </div>  
        <?php
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['middle_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td>

                <!--UPDATE BUTTON -->
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#update_<?php echo $row['id']; ?>" style="background-color: #FF8F00; border: 1px solid black; border-radius: 5px;">
                    <i class="fa-regular fa-pen-to-square"></i>
                    </button>
                <!--DELETE BUTTON -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="background-color: #DA0707; border: 1px solid black; border-radius: 5px; margin-left: 5px;">
                    <i class="fa-regular fa-trash-can"></i>
                    </button>
                </div>

                <!-- UPDATE Modal -->
                <div class="modal fade" id="update_<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 w-100 text-center" id="updateModalLabel" style="color: #FF9B00;">UPDATE</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="text-align:left;">
                                <form method="post" action="http://localhost/proj/app/requests/updaterequest.php">
                                    
                                        <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $row['id']; ?>">
                                    <div class="mb-3">
                                        <label for="updateFirstName" class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" id="updateFirstName" aria-describedby="firstNameHelp" value="<?php echo $row['first_name']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateMiddleName" class="form-label">Middle Name</label>
                                        <input type="text" name="middle_name" class="form-control" id="updateLastName" aria-describedby="middleNameHelp" value="<?php echo $row['middle_name']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateLastName" class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" id="updateLastName" aria-describedby="lastNameHelp" value="<?php echo $row['last_name']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateAge" class="form-label">Age</label>
                                        <input type="text" name="age" class="form-control" id="updateAge" aria-describedby="ageHelp" value="<?php echo $row['age']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateEmail" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="updateEmail" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateAddress" class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" id="updateAddress" aria-describedby="addressHelp" value="<?php echo $row['address']; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="updateContact" class="form-label">Contact</label>
                                        <input type="text" name="contact" class="form-control" id="updateContact" aria-describedby="contactHelp" value="<?php echo $row['contact']; ?>">
                                    </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-warning" style="border: 2px solid black;">Update</button>
                                </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DELETE Modal -->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 w-100 text-center" id="deleteModalLabel" style="color: red;">DELETE</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="deleteId" class="form-label">Are you sure you want to delete this?</label>
                                        <input type="hidden" class="form-control" id="deleteId" aria-describedby="deleteIdHelp">
                                    </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                    </td>


                    
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
