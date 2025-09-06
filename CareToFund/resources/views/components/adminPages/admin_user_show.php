<span style="display:none" data-total-pages="<?php echo isset($totalPages) ? $totalPages : 1; ?>" data-current-page="<?php echo isset($currentPage) ? $currentPage : 1; ?>"></span>
<?php $index = 0; ?>
<?php foreach ($users as $user): ?>
    <?php if ($user['role'] != 'admin'): ?>
        <tr style="font-size: 0.9rem;">
            <th scope="row"><?php echo $index += 1; ?></th>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
            <td><?php echo htmlspecialchars($user['name']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
            <td><?php echo htmlspecialchars($user['gcash_number']); ?></td>
            <td><?php echo htmlspecialchars(substr($user['password'], 0, 10)) . '...'; ?> </td>
            <?php if ($user['status'] == 'Active') { ?>
                <td class="text-success">Active</td>
            <?php } else if ($user['status'] == 'Offline') { ?>
                <td class="text-secondary">Offline</td>
            <?php } else if ($user['status'] == 'Pending') { ?>
                <td class="text-warning">Inactive</td>
            <?php } ?>
            <td class="action-col">
                <button class="btn btn-sm btn-yellow text-white" 
                    data-bs-target="#admin_user_edit"
                    data-user-id="<?php echo htmlspecialchars($user['id']); ?>">Edit</button>
                <button class="btn btn-sm btn-red text-white open-delete-modal" data-bs-toggle="modal"
                    data-bs-target="#admin_user_delete" 
                    data-user-id="<?php echo htmlspecialchars($user['id']); ?>">Delete</button>
            </td>
        </tr>
    <?php endif; ?>
<?php endforeach; ?>