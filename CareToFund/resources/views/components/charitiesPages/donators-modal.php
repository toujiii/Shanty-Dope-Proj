<div class="modal fade" id="donatorsModal" tabindex="-1" aria-labelledby="donatorsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <div class="container d-flex justify-content-between align-items-center pb-2 p-0" >
          <h5 class="m-0">List of Donators</h5>
          <button type="button" class="btn p-0 border-0 bg-transparent close-btn" data-bs-dismiss="modal" aria-label="Close">
            <i class="bi bi-x-circle fs-5"></i>
          </button>
        </div>
        <div class="container p-0 py-2">
          <div class="table-responsive" style="max-height: 500px; min-height: 400px; overflow-y: auto; border-radius: 10px; ">
            <table class="table m-0 table-hover align-middle" style="border-collapse: collapse; ">
              <thead class="table-secondary" style="position: sticky; top: 0; z-index: 1;">
                <tr>
                  <th scope="col">Donator</th>
                  <th scope="col" class="text-center" style="width: 250px;">Amount (₱)</th>
                  <?php if (!empty($donators)) : ?>
                    <th scope="col" style="width: 120px;"></th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody class="">
                <?php
                if (!empty($donators)) {
                  foreach ($donators as $donator):
                ?>
                    <tr>
                      <td><?php echo ucfirst($donator['name']); ?></td>
                      <td class="text-center text-success"><?php echo '₱ ' . number_format($donator['amount'], 2); ?></td>
                      <td class="text-center text-secondary"><?php echo timeAgo($donator['datetime']); ?></td>
                    </tr>
                  <?php endforeach;
                } else { ?>
                  <tr>
                    <td colspan='3' class='text-center'>No donators found.</td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php
function timeAgo($datetime)
{
  $timestamp = strtotime($datetime);
  $diff = time() - $timestamp;

  if ($diff < 60) return $diff . ' sec ago';
  if ($diff < 3600) return floor($diff / 60) . ' min ago';
  if ($diff < 86400) return floor($diff / 3600) . ' hour ago';
  if ($diff < 604800) return floor($diff / 86400) . ' day ago';
  return date('M d, Y', $timestamp);
}
?>