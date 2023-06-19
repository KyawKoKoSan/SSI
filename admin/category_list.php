<table class="table table-hover table-responsive table-bordered mt-3 ">
    <thead>
    <tr>
        <th>#</th>
        <th class="text-nowrap">Title</th>
        <th class="text-nowrap">Created By</th>
        <th class="text-nowrap">Control</th>
        <th class="text-nowrap">Created</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach (fetchCategories() as $c){ ?>
        <tr>
            <td><?php echo $no;$no++;?></td>
            <td class="text-nowrap"><?php echo $c['title'];?></td>
            <td class="text-nowrap"><?php echo fetchAdmin($c['admin_id'])['name'];?></td>
            <td class="text-nowrap">
                <a onclick="return confirm('Are you sure to delete?')" href="category_delete.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-danger btn-sm">
                    <i class="feather-trash-2 fa-fw"></i>
                </a>
                <a href="category_update.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                    <i class="feather-edit-2 fa-fw"></i>
                </a>
            </td>

            <td class="text-nowrap"><?php echo $c['created_at'] ?></td>
        </tr>
    <?php }?>
    </tbody>
</table>


