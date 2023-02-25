<?php
if (isset($title) && !empty($title)) {
    $this->assign("title", $title);
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="text-center">Login Panel</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="javascript:void(0)">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Login</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <h6><b>Don't have account <a href="/register-user"</b>Register here</a></h6>
                </div>
            </div>
        </form>
    </div>
</div>
