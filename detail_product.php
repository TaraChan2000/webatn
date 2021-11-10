<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NenTang.vn</title>

    <!-- Nhúng file Quản lý các Liên kết CSS dùng chung cho toàn bộ trang web -->
    <?php include_once("connection.php"); ?>

    <link href="/php/myhand/assets/frontend/css/style.css" type="text/css" rel="stylesheet" />

    <style>
        body {
            font-family: 'open sans';
            overflow-x: hidden;
        }

        img {
            max-width: 100%;
        }

        .preview {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        @media screen and (max-width: 996px) {
            .preview {
                margin-bottom: 20px;
            }
        }

        .preview-pic {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            max-height: 300px;
        }

        .preview-thumbnail.nav-tabs {
            border: none;
            margin-top: 15px;
        }

        .preview-thumbnail.nav-tabs li {
            width: 18%;
            margin-right: 2.5%;
        }

        .preview-thumbnail.nav-tabs li img {
            max-width: 100%;
            display: block;
        }

        .preview-thumbnail.nav-tabs li a {
            padding: 0;
            margin: 0;
        }

        .preview-thumbnail.nav-tabs li:last-of-type {
            margin-right: 0;
        }

        .tab-content {
            overflow: hidden;
        }

        .tab-content img {
            width: 100%;
            -webkit-animation-name: opacity;
            animation-name: opacity;
            -webkit-animation-duration: .3s;
            animation-duration: .3s;
        }

        .card {
            margin-top: 50px;
            background: #eee;
            padding: 3em;
            line-height: 1.5em;
        }

        @media screen and (min-width: 997px) {
            .wrapper {
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
            }
        }

        .details {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }

        .colors {
            -webkit-box-flex: 1;
            -webkit-flex-grow: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
        }

        .product-title,
        .price,
        .sizes,
        .colors {
            text-transform: UPPERCASE;
            font-weight: bold;
        }

        .checked,
        .price span {
            color: #ff9f1a;
        }

        .product-title,
        .rating,
        .product-description,
        .price,
        .vote,
        .sizes {
            margin-bottom: 15px;
        }

        .product-title {
            margin-top: 0;
        }

        .size {
            margin-right: 10px;
        }

        .size:first-of-type {
            margin-left: 40px;
        }

        .color {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
            height: 2em;
            width: 2em;
            border-radius: 2px;
        }

        .color:first-of-type {
            margin-left: 20px;
        }

        .add-to-cart,
        .like {
            background: #ff9f1a;
            padding: 1.2em 1.5em;
            border: none;
            text-transform: UPPERCASE;
            font-weight: bold;
            color: #fff;
            -webkit-transition: background .3s ease;
            transition: background .3s ease;
        }

        .add-to-cart:hover,
        .like:hover {
            background: #b36800;
            color: #fff;
        }

        .not-available {
            text-align: center;
            line-height: 2em;
        }

        .not-available:before {
            font-family: fontawesome;
            content: "\f00d";
            color: #fff;
        }

        .orange {
            background: #ff9f1a;
        }

        .green {
            background: #85ad00;
        }

        .blue {
            background: #0076ad;
        }

        .tooltip-inner {
            padding: 1.3em;
        }

        @-webkit-keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes opacity {
            0% {
                opacity: 0;
                -webkit-transform: scale(3);
                transform: scale(3);
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <!-- header -->
    <?php include_once("connection.php"); ?>
    <!-- end header -->

    <main role="main" class="mb-2">
        <?php
        // Hiển thị tất cả lỗi trong PHP
        // Chỉ nên hiển thị lỗi khi đang trong môi trường Phát triển (Development)
        // Không nên hiển thị lỗi trên môi trường Triển khai (Production)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        // Truy vấn database
        // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
        include_once("connection.php");

        /* --- 
        --- 2.Truy vấn dữ liệu Sản phẩm 
        --- Lấy giá trị khóa chính được truyền theo dạng QueryString Parameter key1=value1&key2=value2...
        --- 
        */
    
        $id = $_GET["id"];
        $sqlstring = <<<EOT
        "SELECT store_id, cat_id, productname, price, pro_image, quantity, description,
        from product where pro_id='$id'";
EOT;


        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
		$result = mysqli_query($conn,$sqlstring);
        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $sanphamRow;
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $sanphamRow = array(
                'storeid' => $row['storeid'],
                'category' => $row['category'],
                'proname' => $row['proname'],
                'price' => $row['price'],
                'pro_image' => $row['pro_image'],
                'quantity' => $row['quantity']
                'description' => $row['description'];
        }

        /* --- End Truy vấn dữ liệu Sản phẩm --- */

        /* --- 
        --- 3.Truy vấn dữ liệu Hình ảnh Sản phẩm 
        --- 
        */
        $sqlSelect = <<<EOT
            SELECT product.pro_id, product.productname
            FROM `pro_image` product
            WHERE product.pro_id = $id
EOT;

        // Thực thi câu truy vấn SQL để lấy về dữ liệu ban đầu của record 
        $result = mysqli_query($conn, $sqlSelect);

        // Khi thực thi các truy vấn dạng SELECT, dữ liệu lấy về cần phải phân tích để sử dụng
        // Thông thường, chúng ta sẽ sử dụng vòng lặp while để duyệt danh sách các dòng dữ liệu được SELECT
        // Ta sẽ tạo 1 mảng array để chứa các dữ liệu được trả về
        $danhsachhinhanh = [];
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $danhsachhinhanh[] = array(
                'pro_id' => $row['pro_id'],
                'productname' => $row['productname']
            );
        }
        /* --- End Truy vấn dữ liệu Hình ảnh sản phẩm --- */

        // Hiệu chỉnh dữ liệu theo cấu trúc để tiện xử lý
        $sanphamRow['danhsachhinhanh'] = $danhsachhinhanh;
        ?>

        <div class="container mt-4">
            <!-- Vùng ALERT hiển thị thông báo -->
            <div id="alert-container" class="alert alert-warning alert-dismissible fade d-none" role="alert">
                <div id="thongbao">&nbsp;</div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post" action="">
                        <?php
                        $hinhsanphamdautien = empty($sanphamRow['danhsachhinhanh'][0]) ? '' : $sanphamRow['danhsachhinhanh'][0];
                        ?>
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $sanphamRow['pro_id'] ?>" />
                        <input type="hidden" name="productname" id="productname" value="<?= $sanphamRow['productname'] ?>" />
                        <input type="hidden" name="price" id="price" value="<?= $sanphamRow['price'] ?>" />
                        <input type="hidden" name="pro_image" id="pro_image" value="<?= empty($hinhsanphamdautien) ? '' : $hinhsanphamdautien['productname'] ?>" />

                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <!-- Nếu có hình sản phẩm nào => duyệt vòng lặp để hiển thị các hình ảnh -->
                                <?php if (count($sanphamRow['danhsachhinhanh']) > 0) : ?>
                                    <div class="preview-pic tab-content">
                                        <?php foreach ($sanphamRow['danhsachhinhanh'] as $hinhsanpham) : ?>
                                            <div class="tab-pane <?= ($hinhsanpham == $hinhsanphamdautien) ? 'active' : '' ?>" id="pic-<?= $hinhsanpham['pro_id'] ?>">
                                                <img src="/php/myhand/assets/uploads/products/<?= $hinhsanpham['productname'] ?>" />
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <?php foreach ($sanphamRow['danhsachhinhanh'] as $hinhsanpham) : ?>
                                            <li class="<?= ($hinhsanpham == $hinhsanphamdautien) ? 'active' : '' ?>">
                                                <a data-target="#pic-<?= $hinhsanpham['pro_id'] ?>" data-toggle="tab">
                                                    <img src="/php/myhand/assets/uploads/products/<?= $hinhsanpham['productname'] ?>" />
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <!-- Không có hình sản phẩm nào => lấy ảnh mặc định -->
                                <?php else : ?>
                                    <div class="preview-pic tab-content">
                                        <div class="tab-pane active" id="pic-1">
                                            <img src="/php/myhand/assets/shared/img/default-image_600.png" />
                                        </div>
                                    </div>
                                    <ul class="preview-thumbnail nav nav-tabs">
                                        <li class="active">
                                            <a data-target="#pic-1" data-toggle="tab">
                                                <img src="/php/myhand/assets/shared/img/default-image_600.png" />
                                            </a>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><?= $sanphamRow['productname'] ?></h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <span class="review-no">999 đánh giá</span>
                                </div>
                                <p class="product-description"><?= $sanphamRow['sp_mota_ngan'] ?></p>
                                <small class="text-muted">Giá cũ: <s><span><?= $sanphamRow['sp_giacu_formated'] ?></span></s></small>
                                <h4 class="price">Giá hiện tại: <span><?= $sanphamRow['sp_gia_formated'] ?></span></h4>
                                <p><?= $sanphamRow['sp_mota_ngan'] ?></p>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo <strong>Uy
                                        tín</strong>!</p>
                                <h5 class="sizes">sizes:
                                    <span class="size" data-toggle="tooltip" title="cỡ Nhỏ">s</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Trung bình">m</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Lớn">l</span>
                                    <span class="size" data-toggle="tooltip" title="cỡ Đại">xl</span>
                                </h5>
                                <h5 class="colors">colors:
                                    <span class="color orange not-available" data-toggle="tooltip" title="Hết hàng"></span>
                                    <span class="color green"></span>
                                    <span class="color blue"></span>
                                </h5>
                                <div class="form-group">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <div class="action">
                                    <a class="add-to-cart btn btn-default" id="btnThemVaoGioHang">Thêm vào giỏ hàng</a>
                                    <a class="like btn btn-default" href="#"><span class="fa fa-heart"></span></a>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="container-fluid">
                <h3>Thông tin chi tiết về Sản phẩm</h3>
                <div class="row">
                    <div class="col">
                        <?= $sanphamRow['description'] ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- End block content -->
    </main>
</body>

</html>