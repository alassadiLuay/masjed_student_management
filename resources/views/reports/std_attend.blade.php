<!-- DataTables Example -->
<div class="card mb-3" style="direction: rtl;text-align: right;">
  <div class="card-header">
    <i class="fas fa-table"></i>
   الاستعلام عن غيابات الطلاب</div>
  <div class="card-body">
    <div class="row" style="margin-bottom: 5%;">
        <form method="POST" action="<?= 'index.php/Home/student_semester_attend_data' ?>" style="width: 100%;">
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="semester">الفصل</label>
                  <select class="form-control" id="semester" name="semester_id">
                    <?php if(isset($semesters)) : ?>
                      <?php foreach($semesters as $row): ?>
                        <option value="<?= $row->id?>" <?php if(isset($semester_id) && $semester_id == $row->id ) echo "selected"?> ><?= $row->semester_name?></option>
                      <?php endforeach;?>
                    <?php endif;?>
                  </select>
                  <!-- <input type="text" id="semester" class="form-control" placeholder="اسم الفصل" required="required" autofocus="autofocus"> -->
                  <!-- <label for="semester">الفصل</label> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="teacher">الأستاذ</label>
                  <select class="form-control" id="teacher" name="teacher_id">
                    <?php if(isset($teachers)) : ?>
                      <?php foreach($teachers as $row): ?>
                        <option value="<?= $row->id?>" <?php if(isset($teacher_id) && $teacher_id == $row->id) echo "selected"?>><?= $row->teacher_name?></option>
                      <?php endforeach;?>
                    <?php endif;?>
                  </select>
                  <!-- <input type="text" id="semester" class="form-control" placeholder="اسم الفصل" required="required" autofocus="autofocus"> -->
                  <!-- <label for="semester">الفصل</label> -->
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="date">التاريخ</label>
                  <input type="date" id="date" class="form-control" required="required" name="selected_date" value="<?php if(isset(
                    $selected_date)) echo $selected_date; else echo date('Y-m-d'); ?>">
                </div>
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-info btn-block" value="استعلام">
        </form> 
    </div>
      <?php if(isset($selected_date)): ?>
      <form method="POST" action="<?= 'index.php/Home/download_attend_csv'?>" style="width: 25%;">
        <input type="hidden" name="semester_id" value="<?= $semester_id?>">
        <input type="hidden" name="selected_date" value="<?= $selected_date ?>">
        <input type="hidden" name="teacher_id" value="<?= $teacher_id ?>">
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
            <th>التاريخ</th>
            <th>النتيجة</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
           <th>اسم الطالب</th>
            <th>الصف</th>
            <th>رقم هاتف ولي الأمر</th>
            <th>التاريخ</th>
            <th>النتيجة</th>
          </tr>
        </tfoot>
        <tbody>
          <?php if(isset($results)) : ?>
            <?php foreach($results as $row): ?>
              <tr>
                <td><?= $row["student_name"]?></td>
                <td><?= $row["class_name"]?></td>
                <td><?= $row["father_phone"]?></td>
                <td><?= $selected_date ?></td>
                <td style="background-color: antiquewhite;">لم يحضر</td>
              </tr>
            <?php endforeach;?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">آخر تحديث للاستعلام بتاريخ <?= date('m/d/Y h:i:s a', time()) ?></div>
</div>