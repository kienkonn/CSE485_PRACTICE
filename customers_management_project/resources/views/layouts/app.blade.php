<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles') <!-- Để thêm style riêng cho mỗi trang nếu cần -->
</head>
<body>
    <div class="container">
        @include('layouts.navbar') <!-- Navbar nếu cần -->

        @yield('content') <!-- Nơi nội dung của từng trang sẽ được chèn vào -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts') <!-- Để thêm script riêng cho mỗi trang nếu cần -->
</body>
</html>
