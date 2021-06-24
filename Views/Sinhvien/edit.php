<h1>Edit student</h1>
<form method='post' action='#'>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name" value ="<?php if (null != $sinhvien->getHoten()) echo $sinhvien->getHoten();?>">
    </div>

    <div class="form-group">
        <label for="course">Course</label>
        <input type="text" class="form-control" id="course" placeholder="Enter a course" name="course" value ="<?php if (null != $sinhvien->getKhoa()) echo $sinhvien->getKhoa();?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>