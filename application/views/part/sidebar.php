  <!-- product category -->
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
          <aside class="aa-sidebar">
            <!-- single sidebar -->
            <div class="aa-sidebar-widget">
              <div class="layover">
                <h3>
                  <?php echo $imageprofile;?>
                  <!-- <div class='overlay'>
                    <div class='text'>
                    <form id="change" enctype='application/json'>
                      <input type='file' id='selectedFile' name = 'selectedFile' style='display: none;' accept="image/*"/>
                      <a href="#" id="btn_chageimage" onclick="document.getElementById('selectedFile').click();" data-toggle="tooltip" title=" Size Foto Maximal 1Mb 450px x 450px">Pilih Gambar</a>
                    </form>
                    </div>
                  </div> -->
                </h3>
                
              </div>
              <ul class="aa-catg-nav">
              <div id="the-sidebar"></div>
                <?php 
                $SideBarDynamic = $this->SideBarModels->sideBarDynamic($user_id);
                foreach($SideBarDynamic->result() as $dt):?>
                  <li>
                      <a <?php if($dt->link==$active):?>class="active"<?php endif;?> href="<?php echo base_url($dt->link);?>">
                        <?php echo $dt->permissionname;?>
                      </a>
                  </li>
                <?php endforeach;
                $SideBarDynamic = null;
                ?>
              </ul>
            </div>
          </aside>
        </div>
       
      </div>
    </div>
  </section>
  <!-- / product category -->