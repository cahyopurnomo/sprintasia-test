<script>
    $(document).ready(function(){
        $("input[required]").parent("label").addClass("required");

        $('#submit').click(function(){
            
            if( confirm('Yakin data disimpan?') ){
                return true;
            }

            return false;
        });
    })
</script>

<style>
    .card-header{ padding-bottom: 0; }
</style>

<!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form id="member_upgrade" action="<?php echo base_url() ?>alumagubi/<?php echo (isset($items[0]->IDX) && $items[0]->IDX != '' ? 'update' : 'create' ); ?>" method="POST">

                <div class="card" style="margin-top: 20px;">
                    <div class="card-header bg-success">
                        <h5 class="card-title float-left" style="width: 30%; color: #ffffff;"><?php echo $judul ?></h5>
                    </div>
                    <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-6 required">
                                    <label class="control-label">Nomer Kerangka</label>
                                    <input type="hidden" class="form-control" name="txtIdx" id="txtIdx" value="<?php echo (isset($mobil[0]->IDX) && $mobil[0]->IDX != '') ? $mobil[0]->IDX : ''; ?>">
                                    <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" min="0" maxlength="20" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" name="txtNoKerangka" id="txtNoKerangka" value="<?php echo (isset($mobil[0]->NO_RANGKA) && $mobil[0]->NO_RANGKA != '') ? $mobil[0]->NO_RANGKA : ''; ?>" required>
                                </div>
                                <div class="col-sm-6 required">
                                    <label class="control-label">Nomer Polisi</label>
                                    <input type="text" class="form-control" maxlength="12" name="txtNoPolisi" id="txtNoPolisi" value="<?php echo (isset($mobil[0]->NO_POLISI) && $mobil[0]->NO_POLISI != '') ? $mobil[0]->NO_POLISI : ''; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 required">
                                    <label class="control-label">Merek</label>
                                    <input type="text" class="form-control" maxlength="15" name="txtMerek" value="<?php echo (isset($mobil[0]->MEREK) && $mobil[0]->MEREK != '') ? $mobil[0]->MEREK : ''; ?>" required>
                                </div>
                                <div class="col-sm-6 required">
                                    <label class="control-label">Tipe</label>
                                    <input type="text" class="form-control" maxlength="15" name="txtTipe" value="<?php echo (isset($mobil[0]->TIPE) && $mobil[0]->TIPE != '') ? $mobil[0]->TIPE : ''; ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 required">
                                    <label class="control-label">Tahun</label>
                                    <input onkeypress="return event.charCode >= 48 && event.charCode <= 57" min="0" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" class="form-control" name="txtTahun" id="txtTahun" value="<?php echo (isset($mobil[0]->TAHUN) && $mobil[0]->TAHUN != '') ? $mobil[0]->TAHUN : ''; ?>">
                                </div>
                                <div class="col-sm-6 required">
                                    <!-- <label class="control-label">ACTION</label>   -->
                                    <input style="margin-top: 31px; width: 100%;" type="submit" name="submit" id="submit" class="btn btn-success px-4" value="<?php echo (isset($mobil[0]->IDX) && $mobil[0]->IDX != '' ? 'Update' : 'Simpan' ); ?>">
                                </div>
                            </div>
                    </div> <!-- panel body -->
                </div> <!-- panel -->
                </form>
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
    </div> <!-- container -->

