<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charities</title>
    <?php include __DIR__ . '/../../head_assets.php'; ?>
</head>
<body>
<?php include __DIR__ . '/../../header.php'; ?>

<?php include __DIR__ . '/new_charity_card.php'; ?>
<?php include __DIR__ . '/pending_charity_card.php'; ?>
<?php include __DIR__ . '/my_charity_card.php'; ?>
<?php include __DIR__ . '/charity_header.php'; ?>
<div id="userCharities" > </div>
<?php include __DIR__ . '/create-charity-modal.php'; ?>
<?php include __DIR__ . '/abort-modal.php'; ?>
<?php include __DIR__ . '/donators-modal.php'; ?>
<?php include __DIR__ . '/donate-modal.php'; ?>


</body>
</html>

<script src="/Shanty-Dope-Proj/CareToFund/resources/js/styling.js"></script>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/base_ajax_requests.js"></script>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/user_ajax_requests.js"></script>
