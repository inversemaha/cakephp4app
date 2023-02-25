<?php
if (isset($title) && !empty($title)) {
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">Add Student
        <?php
        echo $this->Html->link("List Students", "/list-students", [
            "style" => "margin-top: -7px",
            "class" => "btn btn-warning pull-right"
        ]);
        ?>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frm-add-student" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-control">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


