<?php
include "./includes/db_conn.php";
include "./includes/head.php";
$id = $_GET['id'];
$sql = "SELECT id, first_name,salary,mobile FROM users WHERE id='$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $name = $row['first_name'];
        $mobile = $row['mobile'];
        $salary = $row['salary'];

?>
<div class="container bg-light text-success mt-5">
    <div class="row ">
    <h1 class="col-9 px-0">Edit Data</h1>
        <form class="container mt-5" method="POST" action="./superadmin.php" enctype="multipart/form-data">
        <div class="p-3 mb-2 bg-dark text-success border border-success border-opacity-100">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                
                <div class="col">
                    <div class="form-outline">
                        <label class="form-label" for="name">Employee Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $name ?>" class="form-control" required />
                    </div>
                </div>

            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="mobile">mobile</label>
                <input type="text" id="address" class="form-control" value="<?php echo $mobile ?>" name="address" required />
            </div>


            <!-- Number input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="salary">salary</label>
                <input type="number" id="salary" name="salary" value="<?php echo $salary ?>" class="form-control" required />
            </div>

     



            <!-- Submit button -->

            <div class="text-center mt-5">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success fs-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Edit Employee
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-danger" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                are you sure that you want this edit?
                            </div>
                            <div class="modal-footer">
                            <button type="submit" value="editEmployee" name="edit" class="btn btn-success">Edit Employee</button>

                                <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="btn btn-outline-danger fs-4 mb-4 " href="./superadmin.php">Return Home</a>
            </div>
        </form>
        </div>


<?php
    }
} else {
    echo "Error 404";
}












include "./includes/footer.php";
?>