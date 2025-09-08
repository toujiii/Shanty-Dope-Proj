<span style="display:none" data-total-pages="<?php echo isset($totalPages) ? $totalPages : 1; ?>" data-current-page="<?php echo isset($currentPage) ? $currentPage : 1; ?>"></span>
<?php $index = 0; ?>
<?php foreach ($users as $user): ?>
        <tr  style="font-size: 0.9rem;">
            <th class="py-3" scope="row"><?php echo $index += 1; ?></th>
            <td class="py-3"><?php echo htmlspecialchars($user['id']); ?></td>
            <td class="py-3"><?php echo htmlspecialchars($user['name']); ?></td>
            <td class="py-3"><?php echo htmlspecialchars($user['email']); ?></td>
            <td class="py-3"><?php echo htmlspecialchars($user['gcash_number']); ?></td>
            <td class="py-3"><?php echo htmlspecialchars(substr($user['password'], 0, 10)) . '...'; ?> </td>
            <?php if ($user['status'] == 'Active') { ?>
                <td class="text-success py-3">Active</td>
            <?php } else if ($user['status'] == 'Offline') { ?>
                <td class="text-secondary py-3">Offline</td>
            <?php } else if ($user['status'] == 'Pending') { ?>
                <td class="text-warning py-3">Inactive</td>
            <?php } ?>
            <td class="action-col py-3">
                <button class="btn btn-sm btn-yellow text-white" 
                    data-bs-target="#admin_user_edit"
                    data-user-id="<?php echo htmlspecialchars($user['id']); ?>">Edit</button>
                <button class="btn btn-sm btn-red text-white open-delete-modal" data-bs-toggle="modal"
                    data-bs-target="#admin_user_delete" 
                    data-user-id="<?php echo htmlspecialchars($user['id']); ?>">Delete</button>
            </td>
        </tr>
<?php endforeach; ?>