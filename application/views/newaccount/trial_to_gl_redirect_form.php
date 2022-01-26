<?php echo form_open('Accounts/accounts_report_search', array('class' => 'form-inline', 'method' => 'post', 'id' => 'glForm')) ?>

<input type="hidden" name="cmbGLCode" value="<?= $cmbGLCode ?>">
<input type="hidden" name="cmbCode" value="<?= $cmbCode ?>">
<input type="hidden" name="dtpFromDate" value="">
<input type="hidden" name="dtpToDate" value="<?= $dtpToDate ?>">
<input type="hidden" name="outlet" value="<?= $outlet_id ?>">

<noscript>
    <input type="submit" value="Click here if you are not redirected automatically.">
</noscript>

<?php echo form_close() ?>

<script>
    $("#glForm").submit();
</script>