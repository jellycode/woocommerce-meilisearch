
<?php @include('get_orders.php') ?>

<div class="wrap leenmenken-plugin-home">
  <div class="title-wrapper">
    <div class="left">
      <h2 class="wp-heading-inline"><?php echo esc_html( get_admin_page_title() ); ?></h2>

      <div class="form transform-up">
        <form action="<?php echo plugins_url( 'generate_flatfile.php', __FILE__ ); ?>" method="post" >
          <input type="hidden" name="encoded_collies" value='<?=$encodedCollies?>'>
          <input type="submit" value="Export table" class="button action">
        </form>
      </div>

      <a href="/wp-admin/options-general.php?page=crb_carbon_fields_container_leen_menken_settings.php" class="button action">Settings</a>
    </div>

    <div class="right form">

      <form action="<?php echo plugins_url( 'select_delivery_day.php', __FILE__ ); ?>" method="post" >
        <input type="submit" value="Select day" class="button action">
        <select name="selected_delivery_day" id="">
          <?php for ($i=1; $i < 8; $i++) :
          $datetime = new DateTime();
          $day = $datetime->modify('+'.$i.' day');
          ?>
          <option value="<?=$day->format('Y-m-d');?>" <?php if(isset($deliveryDate) && $deliveryDate === $day->format('Y-m-d')) { echo 'selected'; } ?>>
            <?= $day->format('l, d F');?>
          </option>
          <?php endfor; ?>
        </select>
      </form>
    </div>
  </div>

  <div class="table-wrapper">
    <table class="leen-table wp-list-table widefat fixed striped table-view-list posts">
      <thead>
        <tr>
          <th>NAV number</th>
          <th>Ordernumber</th>
          <th>Customer reference</th>
          <th>Delivery date</th>
          <th>Customer number</th>
          <th>Customer name</th>
          <th>To the attention of</th>
          <th>First name</th>
          <th>Last name</th>
          <th>E-mail</th>
          <th>Telephone</th>
          <th>Adress</th>
          <th>House number</th>
          <th>House number suffix</th>
          <th>Postal code</th>
          <th>Place</th>
          <th>Country</th>
          <th>Fixed telephone number</th>
          <th>Delivery window</th>
          <th>From</th>
          <th>Until</th>
          <th>Delivery instructions</th>
          <th>Line number</th>
          <th>Articlenumber</th>
          <th>Article description</th>
          <th>Barcode</th>
        </tr>
      </thead>
      <tbody>

        <?php if (isset($tableArray)) : foreach ($tableArray as $row): ?>
          <tr>
            <?php foreach ($row as $cell): ?>
            <td><?=$cell?></td>
            <?php endforeach ?>
          </tr>
        <?php endforeach; endif; ?>
      </tbody>
    </table>
  </div>

</div>
