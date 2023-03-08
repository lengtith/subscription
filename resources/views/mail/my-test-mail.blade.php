<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="card text-bg-primary mb-3 text-center" style="max-width: 100%;">
        <img src="data:image/png;base64,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"
            class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Email confirmation</h5>
            <p class="card-text">Hello {{ $data['name'] }} ,you're almost ready to start enjoying SBI Subscription.
                Simply type password and email for login form to start subscription.</p>
            <hr>
            <p>Here your password: <strong>{{ $data['password'] }}</strong></p>
        </div>
        <div class="py-4">
            <a href="#" class="btn btn-primary">Login</a>
        </div>
    </div>

</body>

</html>