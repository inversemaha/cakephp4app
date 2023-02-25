<?php
if(isset($title) && !empty($title)){
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">User List
    </div>
    <?php
/*    echo $this->Html->link("Add Student", "/add-student", [
        "style" => "margin-top: -38px",
        "class" => "btn btn-warning pull-right"
    ]);
    */?>
</div>
<div class="panel-body">
    <table class="table table-striped" id="tbl_students">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Profile Image</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(count($users) > 0){

            foreach ($users as $user){
        ?>
        <tr>
            <td><?php echo $user->id ?></td>
            <td><?php echo $user->name ?></td>
            <td>
                <?php
                if (!empty($user->profile_image)){
                    echo $this->Html->image(str_replace("img/user/", "",$user->profile_image),[
                        "style" => "width: 50px; height: 50px; border-radius: 50%",
                        "alt" =>  $user->name
                    ]);
                }else{
                    echo "N/A";
                }
                ?>
            </td>
            <td><?php echo $user->email ?></td>
            <td><?php echo $user->phone ?></td>
            <td><?php echo ucfirst($user->gender) ?></td>
            <td>
                <?php
                echo $this->Html->link("Edit", "/edit-user/".$user->id , [
                    "class" => "btn btn-info"
                ]);
                ?>
                <a href="#" data-id="<?php echo $user->id; ?>" class="btn btn-danger btn-user-delete">Delete</a>
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


