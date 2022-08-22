<div class="card">
  <div class="card-header">
    <div class="row">
      <p class="col h4">Data Users</p>
    </div>
  </div>
  <div class="card-body">
    <table id="table_koi" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width: 10px;">No</th>
          <th>Action</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Phone</th>
          <th style="width: 20px;">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = query("SELECT * FROM user where level = 'user'");
        $no = 0;
        foreach ($data as $q) :
          $no++;

        ?>
          <tr>
            <td><?= $no ?></td>
            <td class="text-center">
              <button data-code="<?= base64_encode($q['uid'] . '?=?' . $q['full_name'] . '?=?1'); ?>" class="btn btn-outline-success btn-xs modify-user"><i class="fa fa-user-plus"> Active</i>
              </button> |
              <button data-code="<?= base64_encode($q['uid'] . '?=?' . $q['full_name'] . '?=?0'); ?>" class="btn btn-outline-danger btn-xs modify-user"><i class="fa fa-user-minus"> Blokir</i>
              </button>
            </td>
            <td><?= $q['full_name'] ?></td>
            <td><?= $q['email'] ?></td>
            <td><?= $q['address'] ?></td>
            <td><?= $q['phone'] ?></td>
            <td><?= $q['status'] == 1 ? 'active' : 'Blocked' ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>