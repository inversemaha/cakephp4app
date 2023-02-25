<?php
if(isset($title) && !empty($title)){
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">Edit User
        <?php
        echo $this->Html->link("List User", "/list-user",[
            "style" => "margin-top: -7px",
            "class" => "btn btn-warning pull-right"
        ]);
        ?>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)" id="frm-edit-user" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" id="user_id" value="<?php echo $user->id;?>" name="user_id" required>
                    <input type="text" class="form-control" id="name" value="<?php echo $user->name;?>" name="name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" value="<?php echo $user->email; ?>" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="phone">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" value="<?php echo $user->phone; ?>" name="phone" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="password">Change Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $user->phone; ?>" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="gender">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" id="gender" class="form-control">
                        <option <?php if($user->gender == "male"){
                            echo "selected";}?> value="male" selected>Male</option>
                        <option <?php if($user->gender == "female"){
                            echo "selected";}?> value="female">Female</option>
                        <option <?php if($user->gender == "others"){
                            echo "selected";}?> value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profile_image">Profile Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="profile_image" name="profile_image">
                    <?php if (!empty($user->profile_image)){
                        echo $this->Html->image( str_replace("img/", "",$user->profile_image),[
                            "style" => "width: 100px; height: 100px; margin-top: 10px",
                            "alt" => $user->name
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


