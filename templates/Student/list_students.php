<?php
if(isset($title) && !empty($title)){
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">List
    </div>
    <?php
    echo $this->Html->link("Add Student", "/add-student", [
        "style" => "margin-top: -38px",
        "class" => "btn btn-warning pull-right"
    ]);
    ?>
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
        if(count($students) > 0){

            foreach ($students as $student){
        ?>
        <tr>
            <td><?php echo $student->id ?></td>
            <td><?php echo $student->name ?></td>
            <td>
                <?php
                if (!empty($student->profile_image)){
                    echo $this->Html->image(str_replace("img/", "",$student->profile_image),[
                        "style" => "width: 50px; height: 50px; border-radius: 50%",
                        "alt" =>  $student->name
                    ]);
                }else{
                    echo "N/A";
                }
                ?>
            </td>
            <td><?php echo $student->email ?></td>
            <td><?php echo $student->phone ?></td>
            <td><?php echo ucfirst($student->gender) ?></td>
            <td>
                <?php
                echo $this->Html->link("Edit", "/edit-student/".$student->id , [
                    "class" => "btn btn-info btn-xs"
                ]);
                ?>
                <a href="#" data-id="<?php echo $student->id; ?>" class="btn btn-danger btn-student-delete">Delete</a>
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


