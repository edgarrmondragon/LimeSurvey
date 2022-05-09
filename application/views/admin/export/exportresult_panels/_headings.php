<!-- Heading -->
<div class="card" id="panel-4">
  <div class="card-header bg-primary">
      <?php eT("Headings");?>
  </div>
  <div class="card-body">

    <!-- Headers -->
    <div class="form-group row">
        <label class="col-md-12 form-label" for=''>
        <?php eT("Export questions as:"); ?>
      </label>
      <div class="btn-group col-md-12" data-toggle="buttons">
        <?php foreach($headexports as $type=>$headexport):?>
          <label class="btn btn-outline-secondary <?php if($headexport['checked']=='checked'){ echo 'active';}?>">
            <input value="<?php echo $type; ?>" id="headstyle-<?php echo $type; ?>" type="radio" name="headstyle" <?php if($headexport[ 'checked']=='checked' ){ echo 'checked';} ?> />
            <?php echo $headexport['label'];?>
          </label>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Strip HTML -->
    <div class="form-group row">
      <label class="col-md-12 form-label" for='striphtmlcode'>
        <?php eT("Strip HTML code:"); ?>
      </label>
      <div class='col-md-12'>
        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
            'name' => 'striphtmlcode',
            'id'=>'striphtmlcode',
            'value' => 1,
            'onLabel'=>gT('On'),
            'offLabel' => gT('Off')));
        ?>
      </div>
    </div>

    <!-- Convert spaces -->
    <div class="form-group row">
      <label class="col-md-12 form-label" for='headspacetounderscores'>
        <?php eT("Convert spaces in question text to underscores:"); ?>
      </label>
      <div class='col-md-12'>
        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
          'name' => 'headspacetounderscores',
          'id'=>'headspacetounderscores',
          'value' => 0,
          'onLabel'=>gT('On'),
          'offLabel' => gT('Off')));
        ?>
      </div>
    </div>

    <!-- Text abbreviated-->
    <div class="form-group row">
      <label class="col-md-12 form-label" for='abbreviatedtext'>
        <?php eT("Text abbreviated:"); ?>
      </label>
      <div class='col-md-12'>
        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
          'name' => 'abbreviatedtext',
          'id'=>'abbreviatedtext',
          'value' => 0,
          'onLabel'=>gT('On'),
          'offLabel' => gT('Off')));
        ?>
      </div>
    </div>

    <!-- Use ExpressionScript Engine code-->
    <div class="form-group row">
      <label class="col-md-12 form-label" for='emcode'>
        <?php eT("Use ExpressionScript code:"); ?>
      </label>
      <div class='col-md-12'>
        <?php $this->widget('yiiwheels.widgets.switch.WhSwitch', array(
          'name' => 'emcode',
          'id'=>'emcode',
          'value' => 0,
          'onLabel'=>gT('On'),
          'offLabel' => gT('Off')));
        ?>
      </div>
    </div>

    <div class="form-group row">
      <label for='abbreviatedtextto' class="col-md-12 form-label">
        <?php eT("Number of characters:"); ?>
      </label>
      <div class="col-md-12">
        <input min="1" step="1" type="number" value="15" name="abbreviatedtextto" id="abbreviatedtextto" class="form-control" />
      </div>
    </div>

    <div class="form-group row">
      <label for='codetextseparator' class="col-md-12 form-label">
        <?php eT("Code/text separator:"); ?>
      </label>
      <div class="col-md-12">
        <input size="4" type="text" value=". " name="codetextseparator" id="codetextseparator" class="form-control" />
      </div>
    </div>
  </div>
</div>
