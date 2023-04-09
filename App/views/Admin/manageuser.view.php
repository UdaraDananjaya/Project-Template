<?php require_once('layout/header.view.php'); ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>User List</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="row justify-content-center">
    <div class="col-lg-6">

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Vertical Form</h5>

    <!-- Vertical Form -->
    <form class="row g-3">
      <div class="col-12">
        <label for="inputId" class="form-label">Your ID</label>
        <input type="text" class="form-control" id="inputId" disabled>
      </div>
      <div class="col-12">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail">
      </div>
      <div class="col-12">
        <label for="inputPassword4" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword4">
      </div>
      <div class="col-12">
        <label for="inputDate" class="form-label">Date</label>
        <input type="text" class="form-control" id="inputDate" placeholder="1234 Main St">
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </form><!-- Vertical Form -->

  </div>
</div>





</div>
    </div>
  </section>
</main><!-- End #main -->
<?php require_once('layout/footer.view.php'); ?>