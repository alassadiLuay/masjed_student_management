<!-- DataTables Example -->
<div class="card mb-3" style="direction: rtl;text-align: right;">
  <div class="card-header">
    <i class="fas fa-table"></i>
   الاستعلام عن معدل دوام الطلاب</div>
  <div class="card-body">
    <div class="row" style="margin-bottom: 5%;">
        <form method="POST" action="<?= base_url('index.php/Home/student_semester_attend_percentage_data')?>" style="width: 100%;">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="semester">الفصل</label>
                  <select class="form-control" id="semester" name="semester_id">
                    <?php if(isset($semesters)) : ?>
                      <?php foreach($semesters as $row): ?>
                        <option value="<?= $row["semester_id"]?>"><?= $row["semester_name"]?></option>
                      <?php endforeach;?>
                    <?php endif;?>
                  </select>
                  <!-- <input type="text" id="semester" class="form-control" placeholder="اسم الفصل" required="required" autofocus="autofocus"> -->
                  <!-- <label for="semester">الفصل</label> -->
                </div>
              </div>
<!--               <div class="col-md-4">
                <div class="form-group">
                  <label for="semester">الطالب</label>
                  <input type="text" id="semester" class="form-control" placeholder="اسم الطالب" required="required" autofocus="autofocus"> 
                </div>
              </div> -->
            </div>
          </div>
          <input type="submit" class="btn btn-info btn-block" value="استعلام">
        </form>
    </div>
        <?php if(isset($results)): ?>
            <form method="POST" action="<?= base_url('index.php/Home/download_attend_percentage_csv')?>" style="width: 25%;">
              <input type="hidden" name="semester_id" value="<?= $semester_id?>">
              <input type="submit" class="btn btn-success btn-block" value="تحميل الملف">
            </form>
          <?php  endif; ?>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>اسم الطالب</th>
            <th>الصف</th>
            <th>رقم هاتف ولي الأمر</th>
            <th>عدد جلسات الحضور</th>
            <th>عدد الجلسات الكلي</th>
            <th>معدل الحضور</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>اسم الطالب</th>
            <th>الصف</th>
            <th>رقم هاتف ولي الأمر</th>
            <th>عدد جلسات الحضور</th>
            <th>عدد الجلسات الكلي</th>
            <th>معدل الحضور</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if(isset($results)) : ?>
            <?php foreach($results as $row): ?>
              <tr>
                <td><?= $row["student_name"]?></td>
                <td><?= $row["class_name"]?></td>
                <td><?= $row["father_phone"]?></td>
                <td><?= $row["count"]?></td>
                <td><?= $max ?></td>
                <?php $res = round((int)$row["count"]/(int)$max,2) * 100 ?>
                
                <td <?php if($res > 75) echo 'style="background-color: lightgreen;"'; else if ($res > 50) echo 'style="background-color: #ffa50059;"'; else echo 'style="background-color: #ff00004d;"'; ?>><?= $res ?>%</td>
              </tr>
            <?php endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">آخر تحديث للاستعلام بتاريخ <?= date('m/d/Y h:i:s a', time()) ?></div>
</div>