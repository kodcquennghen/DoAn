<?php 
include('controller/c_index.php');
$c_index = new C_index();
$machude = isset($_GET['machude'])?$_GET['machude']:1;
$current_page = isset($_GET['page'])?$_GET['page']:1;
include('main/trangchude.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Ban sach</title>

    <!-- Bootstrap Core CSS -->
    <link href="View/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="View/css/shop-homepage.css" rel="stylesheet">
    <link href="View/css/my.css" rel="stylesheet">
    <link href="View/css/TrangChu.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Ban Sach</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="#">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>

                <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="#">Đăng ký</a>
                    </li>
                    <li>
                        <a href="#">Đăng nhập</a>
                    </li>
                </ul>
            </div>


            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                        Menu
                    </li>

                    <li href="#" class="list-group-item menu1">
                        Chu De
                    </li>
                    <ul>
                        <?php
                        foreach ($chude as $cd => $tenchude) 
                        {
                            ?>
                                <li class="list-group-item">
                            <a href="chude.php?machude=<?=$tenchude['machude']?>"><?php echo $tenchude['tenchude']?></a>
                        </li>
                        <?php
                        }
                        ?>
                    
                        
                    </ul>

                    <li href="#" class="list-group-item menu1">
                        Tac Gia
                    </li>
                    <ul>
                        <?php 
                        foreach ($tacgia as $tg => $tentacgia) 
                        {
                            ?>
                           <li class="list-group-item">
                            <a href="loaitin.html"><?php echo $tentacgia['TenTG']?></a>
                        </li>
                        <?php
                        }
                        ?>
                        
                        
                    </ul>


                    <li href="#" class="list-group-item menu1">
                        Nha Xuat Ban
                    </li>

                    <ul>
                         <?php 
                        foreach ($nhaxuatban as $nxb => $tennxb) 
                        {
                            ?>
                           <li class="list-group-item">
                            <a href="nhaxuatban.php?manxb=<?=$tennxb['MaNXB']?>"><?php echo $tennxb['TenNXB']?></a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
            </div>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b><?=$chitietchude['tenchude']?></b></h4>
                    </div>
                    <div id="divBody" style="background:White;">
                
                <?php 
                foreach ($chitietsach as $key => $value) {

                    ?>
                    <div id="SanPham">
                       <a href="chitiet.php?masach=<?=$value['MaSach']?>">  <div id="AnhBia"><img src="HinhAnhSP/<?=$value['AnhBia']?>" width="100" height="150" /></div></a>
                       <div id="ThongTin">

                         <?php 
                         if(strlen($value['TenSach'])<50)
                         {
                            ?>
                            <div id="TenSach" title="<?=$value['TenSach']?>"><?=$value['TenSach']?></div>
                            <?php
                        }
                        else
                        {
                            ?>
                            <div id="TenSach" title="<?=$value['TenSach']?>"><?=mb_substr($value['TenSach'],0,50)?> ...</div>
                            <?php
                        }
                        ?>  
                        <div id="DonGia" style="color:orange"><font  color="Green">Giá:</font> <?=number_format($value['Giaban'])?> VNĐ</div>
                    </div>
                    <div id="GioHang">

                        <input type="submit" style="cursor:pointer" value="Mua hàng &#xf07a;" id="btnGioHang" class="btn btn-primary">

                    </div>

                    </div>
                   
                <?php 
            } 
            ?>
        </div>
                    

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            <ul class="pagination">
                                <?php
                                $c_index = new C_index();
                                $total_record = $c_index->getTotalRecordSachByChude($machude);
                                $limit =6;
                                $total_page = ceil($total_record['Totalrecord']/$limit);
                                if($total_page>1)
                                {
                                    if ($current_page > $total_page){
                                        $current_page = $total_page;
                                    }
                                    else if ($current_page < 1){
                                        $current_page = 1;
                                    }
                                    if ($current_page > 1 && $total_page > 1){
                                        ?>
                                        <li>
                                            <a href="chude.php?machude=<?=$chitietchude['machude']?>&&page=<?=($current_page-1)?>">&laquo;</a>
                                        </li>
                                        <?php
                                    }
                                    for ($i=1; $i<=$total_page ; $i++) 
                                    {
                                        if($i == $current_page)
                                            {?>
                                                <li class="active">
                                                    <span><?=$i?></span>
                                                </li>
                                                <?php
                                            }
                                            else
                                                {    ?>

                                                    <li>
                                                        <a href="chude.php?machude=<?=$chitietchude['machude']?>&&page=<?=$i?>"><?=$i?></a>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            if ($current_page < $total_page && $total_page > 1)
                                            {
                                               ?>

                                               <li>
                                                <a href="chude.php?machude=<?=$chitietchude['machude']?>&&page=<?=($current_page+1)?>">&raquo;</a>
                                            </li>
                                            <?php
                                        }
                                }?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; Your Website 2014</p>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="View/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="View/js/bootstrap.min.js"></script>
    <script src="View/js/my.js"></script>

</body>

</html>
