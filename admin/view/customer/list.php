<?php include "layout/header.php" ?>
<div id="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="index.php">Quản lý</a>
         </li>
         <li class="breadcrumb-item active">Khách hàng</li>
      </ol>
      <!-- DataTables Example -->
      <div class="action-bar">
			<a class="btn btn-primary btn-sm" href="index.php?c=customer&a=add">Thêm</a>
         <!-- <input type="submit" class="btn btn-primary btn-sm" value="Thêm" name="add"> -->
         <input type="submit" class="btn btn-danger btn-sm" value="Xóa" name="delete">
      </div>
      <div class="card mb-3">
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                 <thead>
                    <tr>
                     <th><input type="checkbox" onclick="checkAll(this)"></th>
                     <th>Tên </th>
                     <th>Email</th>
                     <th>Số điện thoại</th>
                     <th>Đăng nhập từ</th>
                     <th>Địa chỉ</th>
                     <th>Tên người nhận</th>
                     <th>Điện thoại người nhận</th>
                     <th></th>
                     <th></th>
                     <th></th>
                  </tr>
               </thead>
               <tbody>
               <?php foreach ($customers as $customer): 
               ?>
               <tr>
                  <td><input type="checkbox"></td>
                  <td ><?=$customer->getName()?></td>
                  <td ><?=$customer->getEmail()?></td>
                  <td ><?=$customer->getMobile()?></td>
                  <td><?=$customer->getLoginBy()?></td>
                  <td><?=$customer->getAddress()?></td>
                  <td><?=$customer->getShippingName()?></td>
                  <td><?=$customer->getShippingMobile()?></td>
                  <td><?=$customer->getIsActive() ? "Đã kích hoạt" : "Chưa kích hoạt"?></td>
                  <td > <input type="button" onclick="Edit('1');" value="Sửa" class="btn btn-warning btn-sm"></td>
                  <td>
                                        <?php if ($customer->getIsActive() == 1): ?>
                                        <a href="index.php?c=customer&a=disable&id=<?=$customer->getId()?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn muốn vô hiệu hóa viên này')">Vô hiệu</a>
                                        <?php else: ?>
                                        <a href="index.php?c=customer&a=active&id=<?=$customer->getId()?>"
                                            class="btn btn-primary btn-sm">Kích hoạt</a>
                                        <?php endif ?>
                                    </td>
                  <!-- <td ><input type="button" onclick="Delete('1');" value="Xóa" class="btn btn-danger btn-sm"></td> -->
                  <td> <a href="index.php?c=customer&a=delete&id=<?=$customer->getId()?>"class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn xóa khách hàng này')">Xóa</a>
               </tr>
               <?php endforeach ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
</div>
<!-- /.container-fluid -->
<!-- Sticky Footer -->

</div>
<?php include "layout/footer.php" ?>