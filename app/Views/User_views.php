<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Login &mdash; AIS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
</head>

<body>
    <div class="container">
    </div> <br>
        <h3>Add User</h3>
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add Account</button>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($user as $row):?>
                    <tr>
                        <td><?= $row->user_id?></td>
                        <td><?= $row->firstname?></td>
                        <td><?= $row->lastname?></td>
                        <td><?= $row->email?></td>
                        <td><?= $row->password?></td>
                        <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->user_id;?>" data-fname="<?= $row->firstname;?>" data-lname="<?= $row->lastname;?>" data-email="<?= $row->email;?>" data-password="<?= $row->password;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->user_id;?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
    </div>
  
    <!-- Modal Add User-->
    <form action="<?= base_url('User_login/saveUser/') ?>" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i>Add New Account</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>User Id</label>
                    <input type="text" class="form-control" name="user_id" placeholder="user_id">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="firstname">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="lastname">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add User-->

    <!-- Modal Edit User-->
    <form action="<?= base_url('User_login/updateUser/') ?>" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i>Edit User</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>User Id</label>
                    <input type="text" class="form-control" name="user_id" placeholder="user_id">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="firstname">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="lastname">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="email">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" placeholder="password">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" class="user_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit User-->

    <!-- Modal Delete User-->
    <form action="<?= base_url('user_login/deleteUser/') ?>" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i>Delete User</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <h5>Are you sure you want to <b>delete</b> your account?<h5>
            <h6>If you delete your account, you will lose your data.</h6>
            <h6>If you want to go back then you have to create a new account.</h6>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="user_id" class="user_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete User-->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function(){
        // Get Edit User
        $('.btn-edit').on('click',function(){
            // Get data from button edit
            const id = $(this).data('id');
            const fname = $(this).data('fname');
            const lname = $(this).data('lname');
            const email = $(this).data('email');
            const password = $(this).data('password');
            // Set data to Form Edit
            $('.user_id').val(id);
            $('.firstname').val(fname);
            $('.lastname').val(lname);
            $('.email').val(email);
            $('.password').val(password);
            // Call Modal Edit
            $('#editModal').modal('show');
        });
        // Gget Delete User
        $('.btn-delete').on('click',function(){
            // Get data from button delete
            const id = $(this).data('id');
            // Set data to Form Delete
            $('.user_id').val(id);
            // Call Modal Delete
            $('#deleteModal').modal('show');
        });
    });
</script>
</body>
</html>