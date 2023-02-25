<?php
if(isset($title) && !empty($title)){
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">Edit Student
        <?php
        echo $this->Html->link("List Students", "/list-students",[
            "style" => "margin-top: -7px",
            "class" => "btn btn-warning pull-right"
        ]);
        ?>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frm-edit-student" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="student_id" value="<?php echo $student->id;?>" name="student_id" required>
                    <input type="text" class="form-control" id="name" value="<?php echo $student->name;?>" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="<?php echo $student->email; ?>" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" value="<?php echo $student->phone; ?>" name="phone" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-control">
                        <option <?php if($student->gender == "male"){
                            echo "selected";}?> value="male" selected>Male</option>
                        <option <?php if($student->gender == "female"){
                            echo "selected";}?> value="female">Female</option>
                        <option <?php if($student->gender == "others"){
                            echo "selected";}?> value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    <?php if (!empty($student->profile_image)){
                        echo $this->Html->image( str_replace("img/", "",$student->profile_image),[
                            "style" => "width: 100px; height: 100px; margin-top: 10px",
                            "alt" => $student->name
                        ]);
                    }
                        ?>
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


