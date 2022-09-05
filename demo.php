<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>
    <div class="container mt-5">
        <form action="makepdf.php" method="POST" class="offset-md-3 col-md-6">
            <h1>Generate PDF</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="fname" placeholder="First Name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="lname" placeholder="Last Name" class="form-control" required>
                </div>
            </div>

                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required>
                </div>
                <div class="mb-3">
                <textarea name="messege" placeholder="write your messege" class="form-control" ></textarea>
                </div>

                <button type="submit" class="btn btn-info btn-md btn-block">Create PDF</button>
        </form>

    </div>
    
</body>
</html>