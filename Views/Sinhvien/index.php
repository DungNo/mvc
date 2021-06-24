<h1>Student</h1>
<div class="row col-md-12 centered">
    <table class="table table-striped custab">
        <thead>
        <a href="/mvc/sinhvien/create/" class="btn btn-primary btn-xs pull-right"><b>+</b> Add new student</a>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        <?php
        foreach ($sinhviens as $sinhvien)
        {
            echo '<tr>';
            echo "<td>" . $sinhvien -> getId() . "</td>";
            echo "<td>" . $sinhvien -> getHoten() . "</td>";
            echo "<td>" . $sinhvien -> getKhoa() . "</td>";
            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='/mvc/sinhvien/edit/" . $sinhvien -> getId(). "' ><span class='glyphicon glyphicon-edit'></span> Edit</a> <a href='/mvc/sinhvien/delete/" . $sinhvien -> getId() . "' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>