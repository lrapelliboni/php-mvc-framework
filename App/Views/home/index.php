<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div class="container">
        <h1><?php echo $title; ?></h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) { ?>
                <tr>
                    <td><?php echo $category['id'];?></td>
                    <td><?php echo $category['name'];?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>