<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Todo - Basic</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 1px;
        }
        .task-table tbody tr td:nth-child(2){
            width: 120px;
        }
        .task-table tbody tr td:nth-child(3){
            width: 100px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                Danh sách công việc
            </a>
        </div>

    </div>
</nav>

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thêm công việc mới
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->

            <!-- New Task Form -->
                <form action="<?php echo e(route('task.create')); ?>" method="GET" class="form-horizontal">
                <?php echo e(csrf_field()); ?>


                <!-- Task Name -->
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Thêm công việc
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        <div class="">
            <div class="panel-heading" style="text-align:center">
                Danh sách công việc hiện tại
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                    <th>Tên công việc</th>
                    <th>Mô tả</th>
                    <th>Mức độ ưu tiên</th>
                    <!-- <th>Status</th> -->
                    <th>&nbsp;</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="table-text"><div><?php echo e($value->name); ?></div></td>
                        <td class="table-text"><div><?php echo e($value->content); ?></div></td>
                        <!-- Task Complete Button -->
                        <!-- <td class="table-text"><div><?php echo e($value->StatusText); ?></div></td> -->
                        <td>
                        <?php
                            if($value->priority == 0){
                        ?>
                            Bình thường
                        <?php 
                            }else if($value->priority == 1){
                        ?>
                            Quan trọng
                        <?php
                            }else{
                        ?> 
                            Khẩn cấp
                        <?php
                            }
                        ?>
                        <td>
                        <?php
                            if($value->status == 1){
                        ?> 
                        <a href="<?php echo e(route('task.complete' , $value->id)); ?>" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i><?php echo e($value->StatusText); ?>

                        </a>
                        <?php
                            }else{
                        ?>  
                        <a href="<?php echo e(route('task.recomplete' , $value->id)); ?>" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i><?php echo e($value->StatusText); ?>

                            </a>
                        <?php
                            }
                        ?>  
                        </td>
                        

                        <td>
                            <a href="<?php echo e(route('task.show', $value->id)); ?>" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Chi tiet cong viec
                            </a>
                        </td>

                        <td>
                            <a href="<?php echo e(route('task.edit', $value->id)); ?>" type="submit" class="btn btn-success">
                                <i class="fa fa-btn fa-check"></i>Update
                            </a>
                        </td>

                        <!-- Task Delete Button -->
                        <td>
                            <form action="{ route('task.destroy', $value->id)}" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('DELETE')); ?>


                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-trash"></i>Xoá
                                </button>
                            </form>
                        </td>
                    </tr><!-- End -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>
</html><?php /**PATH C:\xamppp\htdocs\laravel_21\resources\views/tasks/index.blade.php ENDPATH**/ ?>