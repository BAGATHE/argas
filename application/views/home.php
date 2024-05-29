<input type="hidden" id="base_path" value="<?php echo base_url()?>">
<div class="card text-center">
  <div class="card-header">
  <form class="row g-3" role="search">
  <div class="col-auto">
    <label for="search" class="visually-hidden">search</label>
    <input type="search" class="form-control"  placeholder="search" aria-label="Search" id="citizen"  name="search_citizen"  >
  </div>
  <div class="col-auto">
   <!-- <button type="submit" class="btn btn-primary mb-3">Confirm</button>-->
    <input type="submit" class="btn btn-outline-secondary" value="search">
  </div>
</form>
  </div>
  <div class="card-body overflow-auto">
  <table class="table caption-top">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">identifiant</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($citizens as $citizen ){ ?>
      <tr>
      <th scope="row"><?= $citizen['id_citizen'] ?></th>
      <td><?= $citizen['firstname'] ?></td>
      <td><?= $citizen['lastname'] ?></td>
      <td><button class="btn btn-info"><?php echo anchor(site_url('CitizenController/getdata/'.$citizen['id_citizen'] ),'sheet'); ?></button></td>
      <td> <td><?php echo anchor(site_url('CitizenController/deleteCitizen/'.$citizen['id_citizen'] ),'Delete'); ?></td></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
  </div>
  <div class="card-footer text-body-secondary">
    <h5 class="text-center">import data</h5>
    <form action="<?php echo site_url("CitizenController/importDataCitizen") ?>" enctype="multipart/form-data" method="post">  
    <div class="input-group mb-3">  
      <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon03">Button</button>
      <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
      <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" name="fichier" required>
    </div>
    </form> 
  </div>
</div>

<?php if(isset($errors)){
  var_dump($errors);
} ?>
                