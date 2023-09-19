<?php 
session_start();
if (!isset($_SESSION)) {
  header("Location: index.php");
}
include_once("./includes/config.php");

// query for admin
$result = $db->query("SELECT * FROM users")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="./dist/img/fevicon.png" type="image/x-icon">
  <title>TrueMedicare Haven | View Admin</title>
  <?php include("./includes/view_style_link.php")?>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <?php include("./includes/top_navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("./includes/left_sidebar.php")?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>View Admins</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">View Admins</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Sl No</th>
                      <th>Admin Name</th>
                      <th>Email Address</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sn = 1;
                    while($row = $result->fetch_object()): ?>
                    <tr>
                      <td><?php echo $sn; $sn++ ?></td>
                      <td><?php echo $row->name ?></td>
                      <td><?php echo $row->email ?></td>
                      <td><?php if($row->status == 1) echo "Active"; elseif($row->status == 0) echo "Inactive" ?></td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("./includes/footer.php") ?>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
<?php include("./includes/view_admin_footerLink.php")?>
</body>

</html>