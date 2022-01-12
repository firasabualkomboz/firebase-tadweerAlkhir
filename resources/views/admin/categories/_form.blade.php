
        <div class="card-body">
        <div class="form-group">
        <label for="exampleInputEmail1">الأسم بالعربية</label>
        <input type="text" name="arabicName" value="{{ $edit_data['arabicName'] ?? ''}}" class="form-control" >
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">الأسم بالأنجليزية</label>
        <input type="text" name="name" value="{{ $edit_data['name'] ?? ''}}" class="form-control">
        </div>

        <div class="form-group">
        <label for="exampleInputPassword1">الصورة</label>
        <input type="file" name="imageUrl" class="form-control" id="">
        </div>

        </div>

        <div class="card-footer">
        <button type="submit" class="btn btn-primary">حفظ</button>
        </div>

