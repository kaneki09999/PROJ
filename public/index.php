<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sample Project</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal" style="background-color: green; border: 3px solid black; border-radius: 5px;">
                INSERT
            </button>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" style="background-color: orange; border: 3px solid black; border-radius: 5px;">
                UPDATE
            </button>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" style="background-color: red; border: 3px solid black; border-radius: 5px;">
                DELETE
            </button>
        </div>
    </div>
</div>

<!-- INSERT Modal -->

<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="insertModalLabel">INSERT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" aria-describedby="ageHelp">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" aria-describedby="addressHelp">
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="contact" aria-describedby="contactHelp">
                    </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="background-color: green; border: 3px solid black;">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- UPDATE Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">UPDATE</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    
                    <div class="mb-3">
                        <label for="updateFirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="updateFirstName" aria-describedby="firstNameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="updateLastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="updateLastName" aria-describedby="lastNameHelp">
                    </div>
                    <div class="mb-3">
                        <label for="updateAge" class="form-label">Age</label>
                        <input type="text" class="form-control" id="updateAge" aria-describedby="ageHelp">
                    </div>
                    <div class="mb-3">
                        <label for="updateEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="updateEmail" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="updateAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="updateAddress" aria-describedby="addressHelp">
                    </div>
                    <div class="mb-3">
                        <label for="updateContact" class="form-label">Contact</label>
                        <input type="text" class="form-control" id="updateContact" aria-describedby="contactHelp">
                    </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning" style="border: 3px solid black;">Update</button>
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
                <h1 class="modal-title fs-5" id="deleteModalLabel">DELETE</h1>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
