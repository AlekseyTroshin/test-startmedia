<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Гонки</title>

    <style>
        body {
            margin: 0;
            font-size: 14px;
        }

        h2,
        h3 {
            margin: 0;
        }

        * {
            box-sizing: border-box;
            font-family: Arial;
        }

        .header {
            padding: 15px 0;
            background-color: rgb(33 37 41);
            color: white;
        }

        .container {
            margin: 0 auto;
            max-width: 1140px;
            width: 100%;
            padding-left: 15px;
            padding-right: 15px;
        }

        .flex-column {
            flex-direction: column;
        }

        .h-100 {
            height: 100%;
        }

        .d-flex {
            display: flex;
        }

        .mt-auto {
            margin-top: auto;
        }

        .footer {
            padding: 15px 0;
            background-color: rgb(248 249 250);
        }

        .mtb-20 {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            margin-top: 20px;
            border-collapse: collapse;
            counter-reset: schetchik 0;
        }

        .table tbody tr {
            counter-increment: schetchik;
        }

        .table th,
        .table td {
            padding: .75rem;
            vertical-align: top;
        }

        .table th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
            text-align: inherit;
        }

        .table td,
        .table tbody tr:before {
            border-top: 1px solid #dee2e6;
        }

        .table tbody tr:before {
            padding: .75rem;
            display: table-cell;
            vertical-align: top;
        }

        .table tbody tr:before,
        .table b:after {
            content: counter(schetchik);
            color: #978777;
        }

        .table th.active {
            background-color: #bee5eb;
        }

        .table td.active {
            background-color: #f3f3f3;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #0d6efd;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            background-color: transparent;
            border: 1px solid #0d6efd;
            padding: .375rem .75rem;
            font-size: 1rem;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }

        .btn.active {
            color: #fff;
            background-color: #0062cc;
            border-color: #005cbf;
        }

        .btn:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

    </style>
</head>
<body class="d-flex flex-column h-100">
<header class="header">
    <div class="container">
        <h2>Увлекательный Хедер</h2>
    </div>
</header>

