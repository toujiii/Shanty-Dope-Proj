<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charities</title>
    <?php include __DIR__ . '/../../head_assets.php'; ?>
</head>
<body>
<div id="headerContainer">
    <?php include __DIR__ . '/../../header.php'; ?>
</div>
<div id="createNewCharity"></div>
<div id="idPendingCharity"></div>
<div id="myCharity"></div>
<?php include __DIR__ . '/charity_header.php'; ?>
<div id="userCharities" > </div>
<?php include __DIR__ . '/create-charity-modal.php'; ?>
<?php include __DIR__ . '/abort-modal.php'; ?>
<div id="donatorsModalContainer"></div>
<?php include __DIR__ . '/donate-modal.php'; ?>


</body>
</html>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/base_script.js"></script>
<script rel="text/javascript" src="/Shanty-Dope-Proj/CareToFund/resources/js/user_script.js"></script>
