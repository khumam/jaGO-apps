<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, Multiple Select!</title>

    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.css">
</head>

<body>

    <form action="#" method="post">
        <select id="select" multiple="multiple" name="test[]">
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($_POST['test'])) {
        print_r(implode(', ', $_POST['test']));
    } ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.3.1/dist/multiple-select.min.js"></script>
    <script>
        $(function() {
            $('#select').multipleSelect({
                width: 500
            })
        })
    </script>
</body>

</html>