<!-- DataTables Example -->
<div class="card mb-3" style="direction: rtl;text-align: right;">
  <div class="card-header">
    <i class="fas fa-table"></i>
   الاستعلام عن نقاط الطلاب</div>
  <div class="card-body">
    <div class="row" style="margin-bottom: 5%;">
        <form method="POST" action="<?= base_url('index.php/Home/student_semester_points_data')?>" style="width: 100%;">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="semester">الفصل</label>
                  <select class="form-control" id="semester" name="semester_id">
                    <?php if(isset($semesters)) : ?>
                      <?php foreach($semesters as $row): ?>
                        <option value="<?= $row["semester_id"]?>" <?php if(isset($semester_id) && $semester_id == $row["semester_id"] ) echo "selected"?> ><?= $row["semester_name"]?></option>
                      <?php endforeach;?>
                    <?php endif;?>
                  </select>
                  <!-- <input type="text" id="semester" class="form-control" placeholder="اسم الفصل" required="required" autofocus="autofocus"> -->
                  <!-- <label for="semester">الفصل</label> -->
                </div>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-info btn-block" value="استعلام">
        </form>
    </div>
    <?php if(isset($semester_id)): ?>
      <form method="POST" action="<?= base_url('index.php/Home/download_points_csv')?>" style="width: 25%;">
        <input type="hidden" name="semester_id" value="<?= $semester_id?>">
        <input type="submit" class="btn btn-success btn-block" value="تحميل الملف">
      </form>
    <?php  endif; ?>    
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>اسم الطالب</th>
            <th <?php  if(isset($types_data)) echo "colspan='".sizeof($types_data)."'"; ?>>المجاميع الجزئية</th>
            <th>مجموع نقاطه في الفصل</th>
          </tr>
          <tr>
            <th> - </th>
            <?php
              if(isset($types_data))
              foreach($types_data as $k=>$v) 
                echo "<th>".$k."</th>";
            ?>
            <th> - </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>اسم الطالب</th>
            <th <?php if(isset($types_data)) echo "colspan='".sizeof($types_data)."'"; ?>>المجاميع الجزئية</th>
            <th>مجموع نقاطه في الفصل</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if(isset($results)) : ?>
            <?php foreach($results as $row): ?>
              <tr>
                <td><?= $row["student_name"]?></td>
                <?php
                  foreach($types_data as $k=>$v)
                    if(isset($row[$k]) && (int)$row[$k] < 1)
                      echo "<td style='background-color: antiquewhite;'>".$row[$k]."</td>";
                    else if(isset($row[$k]) && (int)$row[$k] > 0)
                      echo "<td style='background-color: lightgreen;'>".$row[$k]."</td>";
                    else
                      echo "<td style='background-color: antiquewhite;'> 0 </td>";
                ?>
                <td><?= $row["points"]?></td>
              </tr>
            <?php endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">آخر تحديث للاستعلام بتاريخ <?= date('m/d/Y h:i:s a', time()) ?></div>
</div>