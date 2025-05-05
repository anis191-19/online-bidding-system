<!DOCTYPE html>
<html>
<head>
    <title>Bidding History</title>
    <style>
        /* Add your custom styles here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1><?php echo e($user->name); ?>'s Bidding History</h1>

    <?php if($biddings->isEmpty()): ?>
        <p>No bids placed yet.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Bid Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $biddings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bidding): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bidding->product->name); ?></td>
                        <td>$<?php echo e(number_format($bidding->bid_amount, 2)); ?></td>
                        <td><?php echo e($bidding->created_at->format('d/m/Y H:i')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Online_Bidding_System\resources\views/user/bidding_pdf.blade.php ENDPATH**/ ?>