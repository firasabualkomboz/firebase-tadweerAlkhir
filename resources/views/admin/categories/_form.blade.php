
        <div class="form-group">
          <label for="exampleInputEmail1">اسم الفئة </label>
          <input type="text" name="name" value="{{ $edit_data['name'] ?? ''}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">الصورة</label>
          <input type="file" name="imageUrl" class="form-control" id="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
