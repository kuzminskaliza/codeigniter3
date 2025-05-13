<?php

/* @var string $title */
/* @var string $header */
/* @var string $content */
/* @var string $vendor_url */

$title = $title ?? '';
$vendor_url = config_item('vendor_url');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminDesk</title>

    <link rel="stylesheet" href="/assets/css/user-table.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= $vendor_url; ?>plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= $vendor_url; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= $vendor_url; ?>dist/css/adminlte.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= $vendor_url; ?>plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= $vendor_url; ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
